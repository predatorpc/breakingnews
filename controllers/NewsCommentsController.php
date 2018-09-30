<?php

namespace app\controllers;

use Yii;
use app\models\NewsComments;
use app\models\NewsCommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Expression;
use app\models\News;
use yii\helpers\Url;
/**
 * NewsCommentsController implements the CRUD actions for NewsComments model.
 */
class NewsCommentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all NewsComments models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new NewsCommentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsComments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NewsComments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewsComments();

        $model->created_at = new Expression('NOW()');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }    /**
 * Creates a new NewsComments model.
 * If creation is successful, the browser will be redirected to the 'view' page.
 * @return mixed
 */
    public function actionAddcomment()
    {
        $model = new NewsComments();
        $model->created_at = new Expression('NOW()');

        if ($model->load(Yii::$app->request->get()) && $model->save()) {
            //$modelNews = News::find()->where(['ID' => $model->newsid])->one();
            return $this->redirect('/news/'.$model->newsid);
        }
        else {
            //$modelNews = News::find()->where(['ID' => $model->newsid])->one();
            return $this->render('/news/' . $model->newsid, [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing NewsComments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NewsComments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = $this->findModel($id);
        $model->status=0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NewsComments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsComments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsComments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
