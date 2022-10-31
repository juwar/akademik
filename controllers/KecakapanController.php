<?php

namespace app\controllers;

use app\models\Kecakapan;
use app\models\KecakapanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KecakapanController implements the CRUD actions for Kecakapan model.
 */
class KecakapanController extends Controller
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
            ]
        );
    }

    /**
     * Lists all Kecakapan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KecakapanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kecakapan model.
     * @param string $id_kecakapan Id Kecakapan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_kecakapan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_kecakapan),
        ]);
    }

    /**
     * Creates a new Kecakapan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Kecakapan();

        if ($this->request->isPost) {
            $newId = strtoupper(substr(uniqid('KP'),0, 10));
            $model->id_kecakapan = $newId;
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
     * Updates an existing Kecakapan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_kecakapan Id Kecakapan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_kecakapan)
    {
        $model = $this->findModel($id_kecakapan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_kecakapan' => $model->id_kecakapan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kecakapan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_kecakapan Id Kecakapan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_kecakapan)
    {
        $this->findModel($id_kecakapan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kecakapan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_kecakapan Id Kecakapan
     * @return Kecakapan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_kecakapan)
    {
        if (($model = Kecakapan::findOne(['id_kecakapan' => $id_kecakapan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
