<?php

namespace app\controllers;

use Yii;
use app\models\Maininfo;
use app\models\MaininfoSearch;
use app\models\DbStudentEducationbio;
use app\models\DbStudentFamilybio;
use app\models\DbStudentProfile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaininfoController implements the CRUD actions for Maininfo model.
 */
class MaininfoController extends Controller
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
     * Lists all Maininfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaininfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Maininfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $profile = $this->findProfile($model->std_profile);
        $education = $this->findEducation($model->std_education);
        $family = $this->findFamilybio($model->std_family);
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()){
            return $this->refresh();
        }
        if ($education->load($post) && $education->save()){
            return $this->refresh();
        }
        if ($profile->load($post) && $profile->save()){
            return $this->refresh();
        }
        if ($family->load($post) && $family->save()){
            return $this->refresh();
        }
        else {
            return $this->render('view', [
                'model' => $model,
                'education'=> $education,
                'profile'=> $profile,
                'family'=> $family,
            ]);
        }
    }

    public function actionMeroprofile()
    {
        $usernow = Yii::$app->user->identity->id;
        $info = Maininfo::find()
            ->where(['std_id' => $usernow])
            ->one();
        $education = DbStudentEducationbio::find()
            ->where(['std_education_id' => $usernow])
            ->one();
        $profile = DbStudentProfile::find()
            ->where(['std_profile_id' => $usernow])
            ->one();
        $familybio = DbStudentFamilybio::find()
            ->where(['std_familybio_id' => $usernow])
            ->one();

        return $this->render('meroprofile', [
            'info' => $info,
            'education' => $education,
            'profile' => $profile,
            'familybio' => $familybio,
        ]);
        // return $this->render('meroprofile');
    }

    /**
     * Creates a new Maininfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Maininfo();
        $education = new DbStudentEducationbio();
        $profile = new DbStudentProfile();
        $family = new DbStudentFamilybio();
        $post = Yii::$app->request->post();

        if ($model->load($post) && $education->load($post) && $profile->load($post) && $family->load($post)){
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
     * Updates an existing Maininfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //$usernow = Yii::$app->user->identity->id;
        $model = $this->findModel($id);
        $education = $this->findEducation($model->std_education);
        $profile = $this->findProfile($model->std_profile);
        $family = $this->findFamilybio($model->std_family);
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
                $model->save();
            }
            //return $this->redirect(['view', 'id' => $model->std_id]);
            return $this->redirect(['index']);
        } else {
            // return $this->renderAjax('update', [
            return $this->render('update', [
                'model' => $model,
                'education' => $education,
                'profile' => $profile,
                'family' => $family,
            ]);
        }
    }

    /**
     * Deletes an existing Maininfo model.
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
     * Finds the Maininfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Maininfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Maininfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findEducation($id){
        if (($model = DbStudentEducationbio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findFamilybio($id){
        if (($model = DbStudentFamilybio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findProfile($id){
        if (($model = DbStudentProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
