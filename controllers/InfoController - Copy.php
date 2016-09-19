<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Info;
use app\models\InfoSearch;
use app\models\Education;
use app\models\Familybio;
use app\models\Profile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                   'class' => \app\components\AccessRule::className(),
                ],
                'only' => ['meroprofile', 'update'],
                'rules' => [
                    [
                        'actions' => ['meroprofile'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_MANAGER, 
                        ],
                    ], 
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_MANAGER,
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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

    public function actionMeroprofile()
    {
        $usernow = Yii::$app->user->identity->id;
        $info = Info::find()
            ->where(['std_id' => $usernow])
            ->one();
        $education = Education::find()
            ->where(['std_education_id' => $usernow])
            ->one();
        $profile = Profile::find()
            ->where(['std_profile_id' => $usernow])
            ->one();
        $familybio = Familybio::find()
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
     * Displays a single Info model.
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

    /**
     * Creates a new Info model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Info();
        $education = new Education();
        $profile = new Profile();
        $family = new Familybio();

        $post = Yii::$app->request->post();

        if ($model->load($post) && $education->load($post) && $profile->load($post) && $family->load($post))
        {
            //$isValid = $model->validate() && $education->validate() && $profile->validate() && $family->validate();
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

    public function actionUpdate()
    {
        $usernow = Yii::$app->user->identity->id;
        $model = $this->findModel($usernow);
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
    protected function findEducation($id){
        if (($model = Education::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findFamilybio($id){
        if (($model = Familybio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findProfile($id){
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
