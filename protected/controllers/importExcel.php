<?php 
class importExcel {
        public function copyFile(){
            
        
          if (isset($_FILES['upload'])) {
              if($_POST['action']=='addImport') $action=1; else $action=0;
            $allow = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            $file = $_FILES['upload'];
            $target = YiiBase::getPathOfAlias('webroot') . "/files/" . basename($file['name']);

            if (in_array($file['type'], $allow) && $file['size'] < 1024 * 1024) {
                if (!file_exists($target)) {

                    if (move_uploaded_file($file["tmp_name"], $target))
                        echo basename($file["name"]) . " dosyası başarıyla yüklendi.";
                } else
                {
                   //echo CJavaScript::jsonEncode("confirm('Aynı isimde bir dosya var.Üzerine yazılsın mı?')");
                }
            }
            $this->insertDatabase($target,$action);
            
        }
    }
    
    
        public function insertDatabase($target,$action){
        
            
        $phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');
        
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
        $objPHPExcel = new PHPExcel();
        
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($target);
        } catch (Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getActiveSheet();
        $maxCell = $sheet->getHighestRowAndColumn();
        $data = $sheet->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row']);
       
        $column_count = array_filter($data[1]);
	$column_count = count($column_count);
        
        $columns = array();
        for($i=0;$i<$column_count;$i++){
                $newData = $this->convertText($data[1][$i]);
                array_push($columns, $newData);
        }
        
        $adres = new Adres();
        if($action==0) { $adres->deleteAll();}
        for($i=2;$i<count($data);$i++)
        {
            for($k=0;$k<$column_count;$k++)
            {
                $adres[$columns[$k]] = $data[$i][$k];
            }
            
            $adres->setIsNewRecord(true);
            $adres->insert();
            $adres->unsetAttributes();
        }
        
     
    }
    
    public function convertText($text){
        
        $text = trim($text);
        $turkish= array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ','-');
        $english = array('c','c','g','g','i','i','o','o','s','s','u','u','_','_');
        
        $new_text = str_replace($turkish,$english,$text);
        return strtolower($new_text);
        
    }
}

?> 