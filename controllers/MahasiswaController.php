<?php

namespace app\controllers;

use app\models\Mahasiswa;
use app\models\MahasiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\components\AccessRule;

/**
 * MahasiswaController implements the CRUD actions for Mahasiswa model.
 */
class MahasiswaController extends Controller
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
                    'only' => ['index','create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            // Allow users, moderators and admins to view 
                            'roles' => [
                                User::ROLE_MODERATOR,
                                User::ROLE_ADMIN
                            ],
                        ],
                        [
                            'actions' => ['create'],
                            'allow' => true,
                            // Allow users, moderators and admins to create 
                            'roles' => [
                                User::ROLE_ADMIN
                            ],
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            // Allow moderators and admins to update 
                            'roles' => [
                                User::ROLE_ADMIN
                            ],
                        ],
                        [
                            'actions' => ['delete'],
                            'allow' => true,
                            // Allow admins to delete 
                            'roles' => [
                                User::ROLE_ADMIN
                            ],
                        ],
                   ],
                ],
            ]
        );
    }

    /**
     * Lists all Mahasiswa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mahasiswa model.
     * @param string $nim Nim
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nim)
    {
        return $this->render('view', [
            'model' => $this->findModel($nim),
        ]);
    }

    /**
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mahasiswa();

        if ($this->request->isPost) {
            $newId = strtoupper(substr(uniqid('MH-'),0, 20));
            $model->nim = $newId;
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing Mahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nim Nim
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nim)
    {
        $model = $this->findModel($nim);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nim' => $model->nim]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Mahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nim Nim
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nim)
    {
        $this->findModel($nim)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nim Nim
     * @return Mahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nim)
    {
        if (($model = Mahasiswa::findOne(['nim' => $nim])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
