<?php

namespace app\controllers;

use app\models\Refleksi;
use app\models\RefleksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefleksiController implements the CRUD actions for Refleksi model.
 */
class RefleksiController extends Controller
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
     * Lists all Refleksi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RefleksiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Refleksi model.
     * @param int $id_refleksi Id Refleksi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_refleksi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_refleksi),
        ]);
    }

    /**
     * Creates a new Refleksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Refleksi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_refleksi' => $model->id_refleksi]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Refleksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_refleksi Id Refleksi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_refleksi)
    {
        $model = $this->findModel($id_refleksi);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_refleksi' => $model->id_refleksi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Refleksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_refleksi Id Refleksi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_refleksi)
    {
        $this->findModel($id_refleksi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Refleksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_refleksi Id Refleksi
     * @return Refleksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_refleksi)
    {
        if (($model = Refleksi::findOne(['id_refleksi' => $id_refleksi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
