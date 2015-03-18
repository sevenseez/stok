<?php
require_once 'importExcel.php';
class AdresController extends Controller {
    
    public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users'=>array('@'),
            ),
            array('deny'),
        );
    }
    
    public function actionIndex() {
        
        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            }
        $model = new Adres('search');
        if (isset($_GET['Adres'])) {
            $model->attributes = $_GET['Adres'];
        }    
            
        $this->checkInsert();
        $this->checkEdit();
        $this->render('index',array('model'=>$model));
    }

    public function actionUpload() {
        $import = new importExcel();
        $import->copyFile();
          
        }
   
    public function actionExport(){
        
        if(isset($_POST['exportButton'])){
            $exportAs = $_POST['optionsRadios'];
        }
        
       $dataProvider = Adres::model()->search();
       $this->widget('application.extensions.EExcelView', array(
        'dataProvider'=> $dataProvider,
        'grid_mode'=>'export',
        'exportType'=>$exportAs,
        'autoWidth'=>true,
        'filename'=>'Adres_Defteri',
        'columns'=>array(
                'firma_adi',
                'firma_yetkili',
                'yetkilinin_konumu',
                'firma_adresi',
                'firma_telefonu',
                'firma_fax',
                'firma_web_sitesi',
                'e_mail',
                'gsm'
            )
        ));   
      Yii::app()->end();
      
    }
    
    public function actionEdit($id){
        $model = Adres::model()->findByPk($id);
        $this->renderPartial('edit_adres',array('model'=>$model),false,true);
        
    }
    
    public function actionInsert(){
        $model = new Adres();
        $this->renderPartial('insert_adres',array('model'=>$model),false,true);
    }
    
    public function actionDelete(){
        
        $bool = 0;  
        if (isset($_POST['ids']) && !empty($_POST['ids']))
            {
            foreach ($_POST['ids'] as $id)
                {
                    $model = Adres::model()->findByPk($id);
                    if (!$model->delete() )
                    {
                        
                        $bool = 1;
                    }
                }
                if($bool==0)
                 echo CJavaScript::jsonEncode('success');
                else echo CJavaScript::jsonEncode('error');// refresh page without submitting filled data:
                
            }
        else echo CJavaScript::jsonEncode ('noData');
        
    }
    
    public function actionDeleteOne($id){
        $model= Adres::model()->findByPk($id);
        $model->delete();
        $this->redirect(array('adres/'));
    }
    
    public function checkEdit(){
        if(isset($_POST['UpdateButton'])){
        $adres = Adres::model()->findByPk($_POST['Adres']['id']);
        $adres->attributes = $_POST['Adres'];
        $adres->save();
        }
    }
   
    
     public function checkInsert(){
        if(isset($_POST['InsertButton'])){
        $adres = new Adres();
        $adres->attributes = $_POST['Adres'];
        $adres->save();
        }
    }
    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
