<?php

namespace app\controllers;

use Yii;
use app\models\Info;
use app\models\InfoSearch;
use app\models\DbStudentEducationbio;
use app\models\DbStudentProfile;
use app\models\DbStudentFamilybio;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InfoController implements the CRUD actions for Info model.
 */
class InfoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Info models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Info model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Info model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Info();
        $education = new DbStudentEducationbio();
        $profile = new DbStudentProfile();
        $family = new DbStudentFamilybio();

        $post = Yii::$app->request->post();

        if ($model->load($post) && $education->load($post) && $profile->load($post) && $family->load($post))
        {
            $isValid = $model->validate() && $education->validate() && $profile->validate() && $family->validate();
            if ($isValid) {
                $model->save(false);
                $education->save(false);
                $profile->save(false);
                $family->save(false);
            } 
            if($education->save() && $profile->save() && $family->save()){
                $model->std_education = $education->std_education_id;
                $model->std_profile = $profile->std_profile_id;
                $model->std_family = $family->std_familybio_id;
                $model->save();
                if($model->save()){
                    return $this->redirect(['index']);
                }
            }
            return $this->redirect(['out']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'education' => $education,
                'profile' => $profile,
                'family' => $family,
            ]);
        }
    }

    /**
     * Updates an existing Info model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->std_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Info model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Info model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Info the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
