<?php

namespace app\controllers;

use Yii;
use app\models\StudentActivity;
use app\models\SearchStudentActivity;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StudentActivityController implements the CRUD actions for StudentActivity model.
 */
class StudentActivityController extends Controller
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
     * Lists all StudentActivity models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new SearchStudentActivity();
            if(Yii::$app->request->get('from') && Yii::$app->request->get('to')){
                $searchModel->to = Yii::$app->request->get('to');
                $searchModel->from = Yii::$app->request->get('from');
            }
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Displays a single StudentActivity model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Creates a new StudentActivity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentActivity();
        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) ){
            $model->activity_file = UploadedFile::getInstance($model, 'activity_file');
            $model->activity_file2 = UploadedFile::getInstance($model, 'activity_file2');
            $model->activity_file3 = UploadedFile::getInstance($model, 'activity_file3');
            $model->activity_file4 = UploadedFile::getInstance($model, 'activity_file4');
                if ($model->activity_file ) {                
                    $model->activity_file->saveAs('uploads/student-activity/' . $model->activity_file ->baseName . '.' . $model->activity_file ->extension);
                    $model->activity_file= 'uploads/student-activity/' . $model->activity_file ->baseName . '.' . $model->activity_file ->extension;
                }
                if ($model->activity_file2 ) {                
                    $model->activity_file2->saveAs('uploads/student-activity/' . $model->activity_file2 ->baseName . '.' . $model->activity_file2 ->extension);
                    $model->activity_file2= 'uploads/student-activity/' . $model->activity_file2 ->baseName . '.' . $model->activity_file2 ->extension;
                }
                if ($model->activity_file3 ) {                
                    $model->activity_file3->saveAs('uploads/student-activity/' . $model->activity_file3 ->baseName . '.' . $model->activity_file3 ->extension);
                    $model->activity_file3= 'uploads/student-activity/' . $model->activity_file3 ->baseName . '.' . $model->activity_file3 ->extension;
                }
                if ($model->activity_file4 ) {                
                    $model->activity_file4->saveAs('uploads/student-activity/' . $model->activity_file4 ->baseName . '.' . $model->activity_file3 ->extension);
                    $model->activity_file4= 'uploads/student-activity/' . $model->activity_file4 ->baseName . '.' . $model->activity_file3 ->extension;
                }
	            $model->save();
                return $this->redirect(['view', 'id' => $model->student_activity_id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing StudentActivity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    
            $model = $this->findModel($id);
            $old_data = $this->findModel($id);
    
            if(!Yii::$app->user->isGuest){
                if ($model->load(Yii::$app->request->post()) ) {
                    $model->activity_file = UploadedFile::getInstance($model, 'activity_file');
    
                    if(!$model->activity_file){
                        $model->activity_file = $old_data->activity_file;
                    }
                    else{
         
                        $model->activity_file->saveAs('uploads/student-activity/' . $model->activity_file ->baseName . '.' . $model->activity_file ->extension);
                        $model->activity_file= 'uploads/student-activity/' . $model->activity_file ->baseName . '.' . $model->activity_file->extension;
                    
                    }
    
                    $model->activity_file2 = UploadedFile::getInstance($model, 'activity_file2');
                    if(!$model->activity_file2 ){
                        $model->activity_file2 = $old_data->activity_file2;
                    }
                    else{
                  
                        $model->activity_file2->saveAs('uploads/student-activity/' . $model->activity_file2 ->baseName . '.' . $model->activity_file2 ->extension);
                        $model->activity_file2= 'uploads/student-activity/' . $model->activity_file2 ->baseName . '.' . $model->activity_file2 ->extension;
                    
                    }
    
                    $model->activity_file3 = UploadedFile::getInstance($model, 'activity_file3');
                    if(!$model->activity_file3){
                        $model->activity_file3 = $old_data->activity_file3;
                    }
                    else{
                              
                        $model->activity_file3->saveAs('uploads/student-activity/' . $model->activity_file3 ->baseName . '.' . $model->activity_file3 ->extension);
                        $model->activity_file3= 'uploads/student-activity/' . $model->activity_file3 ->baseName . '.' . $model->activity_file3 ->extension;
                    
                    }
    
                     $model->activity_file4 = UploadedFile::getInstance($model, 'activity_file4');
                    if(!$model->activity_file4 ){
                        $model->activity_file4 == $old_data->activity_file4;
                    }
                    else{
                       
                        $model->activity_file4->saveAs('uploads/student-activity/' . $model->activity_file4 ->baseName . '.' . $model->activity_file4 ->extension);
                        $model->activity_file4= 'uploads/student-activity/' . $model->activity_file4 ->baseName . '.' . $model->activity_file4 ->extension;
                    }
                
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->student_activity_id]);
                    
                }
    
                return $this->render('update', [
                    'model' => $model,
                ]);
            }else{
                throw new \yii\web\ForbiddenHttpException;   
            }
        }

    /**
     * Deletes an existing StudentActivity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentActivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentActivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentActivity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
