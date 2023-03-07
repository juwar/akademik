<?php

namespace app\controllers;

use app\models\Nilai;
use app\models\NilaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\components\AccessRule;
use Yii;

/**
 * NilaiController implements the CRUD actions for Nilai model.
 */
class NilaiController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    // We will override the default rule config with the new AccessRule class 
                    'ruleConfig' => [
                        'class' => AccessRule::className(),
                    ],
                    'only' => ['index', 'create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            // Allow users, moderators and admins to view 
                            'roles' => [
                                User::ROLE_USER,
                                User::ROLE_MODERATOR,
                                User::ROLE_ADMIN
                            ],
                        ],
                        [
                            'actions' => ['create'],
                            'allow' => true,
                            // Allow users, moderators and admins to create 
                            'roles' => [
                                User::ROLE_ADMIN,
                                User::ROLE_MODERATOR
                            ],
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            // Allow moderators and admins to update 
                            'roles' => [
                                User::ROLE_ADMIN,
                                User::ROLE_MODERATOR
                            ],
                        ],
                        [
                            'actions' => ['delete'],
                            'allow' => true,
                            // Allow admins to delete 
                            'roles' => [
                                User::ROLE_ADMIN,
                                User::ROLE_MODERATOR
                            ],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Nilai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NilaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $role = Yii::$app->user->identity->role;
        $actionButton = "";
        $actionRules = (object) [
            'admin' => "{view} {update} {delete}",
            'dosen' => "{view} {update} {delete}",
            'mahasiswa' => ""
        ];
        switch ($role) {
            case 10:
                $actionButton = $actionRules->admin;
                break;
            case 20:
                $actionButton = $actionRules->dosen;
                break;
            case 30:
                $actionButton = $actionRules->mahasiswa;
                break;
            default:
                $actionButton = "";
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'actionButton' => $actionButton,
        ]);
    }

    /**
     * Displays a single Nilai model.
     * @param int $id_nilai Id Nilai
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_nilai)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_nilai),
        ]);
    }

    /**
     * Creates a new Nilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Nilai();

        function getGradeInNumber($grade)
        {
            $gradeInNumber = 0;
            switch ($grade) {
                case "A":
                    $gradeInNumber = 4;
                    break;
                case "B":
                    $gradeInNumber = 3.5;
                    break;
                case "C":
                    $gradeInNumber = 3;
                    break;
                case "D":
                    $gradeInNumber = 2.5;
                    break;
                default:
                    $gradeInNumber = 0;
            }

            return $gradeInNumber;
        }

        function getNewId($index)
        {
            $newId = strtoupper(substr(uniqid('NL-'), 0, 10));
            $stringIndex = (string)$index;
            return substr_replace($newId, $stringIndex, 4, strlen($stringIndex));
        }

        if ($this->request->isPost) {
            $postData = Yii::$app->request->post()['Nilai'];

            for ($i = 0; $i < count($postData['nilai']); $i++) {
                $data[$i][0] = getNewId($i);
                $data[$i][1] = $postData['nim'];
                $data[$i][2] = $postData['nilai'][$i]['matkul'];
                $data[$i][3] = $postData['semester'];
                $data[$i][4] = $postData['nilai'][$i]['nilai'];
                $data[$i][5] = getGradeInNumber($postData['nilai'][$i]['nilai']);
            }

            $request = Yii::$app->db->createCommand()->batchInsert(
                'nilai',
                [
                    'id_nilai',
                    'nim',
                    'kode_matkul',
                    'semester',
                    'nilai',
                    'bobot_nilai',
                ],
                $data
            )->execute();

            // echo "<pre>";
            // print_r($request);
            // echo "</pre>";
            // die;
            if ($request > 0) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Nilai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_nilai Id Nilai
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_nilai)
    {
        $model = $this->findModel($id_nilai);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_nilai' => $model->id_nilai]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Nilai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_nilai Id Nilai
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_nilai)
    {
        $this->findModel($id_nilai)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nilai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_nilai Id Nilai
     * @return Nilai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_nilai)
    {
        if (($model = Nilai::findOne(['id_nilai' => $id_nilai])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
