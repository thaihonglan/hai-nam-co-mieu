<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\base\Module;
use app\models\News;
use app\modules\admin\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Category;
use dosamigos\fileupload\FileUploadUI;
use dosamigos\fileupload\FileUpload;
use dosamigos\fileinput\FileInput;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $model->create_date = date('Y-m-d H:i:s');
        $model->update_date = date('Y-m-d H:i:s');
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $item = new Category;
            $sql = 'SELECT * FROM category WHERE `id`='.$model->category_id;
            $item = Category::findBySql($sql)->one();
            $model->category_name = $item->name;
            
            $max_id = News::find()->select('max(id)')->scalar();
            $id = $max_id;
            $path = Yii::$app->basePath . '/web/images/avatar/';
            if (!is_dir($path)) {
                mkdir($path);
            }
            
            if (@!empty($_FILES['News']['name']['avatar'])) {
                $model->avatar = $_POST['News']['avatar'];
                if ($model->validate(array('avatar'))) {
                    $model->avatar = UploadedFile::getInstance($model, 'avatar');
                } else {
                    $model->avatar = '';
                }
                $model->avatar->saveAs($path.$id.'_'.$model->avatar);
            }
            $model->avatar = $id.'_'.$model->avatar;
            
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->update_date = date('Y-m-d H:i:s');
        $item = new Category();
        $sql = 'SELECT * FROM category WHERE `id`=' . $model->category_id;
        $item = Category::findBySql($sql)->one();
        $model->category_name = $item->name;
        
        $oldavatar = $model->avatar;
        $path = Yii::$app->basePath . '/web/images/avatar/';
        
        if (! is_dir($path)) {
            mkdir($path);
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if (!empty($_FILES['News']['name']['avatar']))
			{
				$model->avatar = $_POST['News']['avatar'];
				if ($model->validate(array('avatar')))
				{
					$model->avatar = UploadedFile::getInstance($model, 'avatar');
					$model->avatar->saveAs($path.$id.'_'.$model->avatar);
					$model->avatar = $id.'_'.$model->avatar;
				}
			}
			else {
				$model->avatar = $oldavatar;
			}

			if($model->save())
			{
				$this->redirect(array('view','id'=>$model->id));
			}
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        else
        return $this->render('update', [
                'model' => $model,
            ]);
        
    }

    
    
    
    
    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
