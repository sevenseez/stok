
<script src="<?php echo BaseUrl?>/scripts/custom.js"></script>

<div class="span9">
    <div class="btn-box-row row-fluid impext">
        <div class="btn-box big span6 impext-box first">
            <h2 class="impext_header" >Veri Aktar</h2>
            <p class="impext_border"></p>
                  <form action="" id="uploadForm" method="POST" enctype="multipart/form-data" name="uploadPost">
                      <div class="control-group">
                        <input type="file" id="browse" name="upload" style="display: none" onChange="Handlechange();"/>
                        <input type="text" id="filename" readonly="true"/>
                        <input type="button" value="Dosya Seç" class="btn btn-default" id="fakeBrowse" onclick="HandleBrowseClick();"/>
                      </div>
                  <?php echo CHtml::htmlButton('Varolana Ekle', array('class'=>'btn btn-primary','name'=>'addImport',
                      "onclick"=>"js:upload_file('addImport')",'confirm'=>'Veriler tabloya eklenecek. Devam edilsin mi?'));?>
                   <?php echo CHtml::htmlButton('Baştan Yarat', array('class'=>'btn btn-primary','name'=>'createImport',
                      "onclick"=>"js:upload_file('createImport')",'confirm'=>'Tüm veriler değiştirilecek. Devam edilsin mi?'));?>
                  </form>
           
        </div>

        <div class="btn-box big span6 impext-box second">
            <h2 class="impext_header">Çıktı Al</h2>
             <p class="impext_border"></p>
            <?php 
            echo CHtml::beginForm(array('adres/export'), 'POST',array('id'=>'radioForm'));
            
            ?>
             <div class="control-group">
            <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="Excel5" checked>
                  XLS
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="Excel2007">
                  XLSX
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="CSV">
                  CSV
                </label>
              </div>
               <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="HTML">
                  HTML
                </label>
              </div>
             </div>
                <?php echo CHtml::submitButton('Çıkar', array('class'=>'btn btn-primary','id'=>'exportButton','name'=>'exportButton')); ?>
            
            <?php echo CHtml::endForm();?>
        </div>
    </div>
    <div class="table-buttons">
        <?php 
        $pageSize=Yii::app()->user->getState('pageSize',10); 
      
        echo CHtml::ajaxLink('Ekle', Yii::app()->createUrl('adres/insert'),
                  array('type'=>'POST',
                       'url'=>Yii::app()->createUrl('adres/insert'),
                        'success'=>' function(data) {
                                       $("#insertContent").html(data);
                                       $("#insert_screen").modal("show");
                                    }'),
                array('class'=>'btn btn-default'));
        
          echo CHtml::ajaxLink('Çoklu Sil', Yii::app()->createUrl('adres/delete'),
                array('type'=>'POST',
                       'url'=>Yii::app()->createUrl('adres/delete'),
                       'data'=>'js:{ids:$.fn.yiiGridView.getSelection("adres-grid")}',
                       'dataType'=>'JSON',
                        'success'=>'function(response){'
                    . 'if(response=="success") location.href="/stok/adres"; '
                    . 'else if(response=="noData") alert("Lütfen veri seçimi yapınız."); else console.log("Failed");}'),
                array('class'=>'btn btn-default','confirm'=>'Verileri silmek istediğinize emin misiniz ?'));
        
        ?>
    </div>

    <?php  
            $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=> $model->search(),
            'summaryText'=>'',
            'selectableRows'=>2,
            'ajaxUpdate' => true,
            'filter'=>$model,
            'id'=>'adres-grid',
             'columns'=>array(
                array(
                    'id' => 'selectedIds',
                    'class' => 'CCheckBoxColumn',
                    ),
                  'firma_adi',
                  'firma_yetkili',
                  'yetkilinin_konumu',
                  'firma_adresi',
                  'firma_telefonu',
                  'firma_fax',
                  'firma_web_sitesi',
                  'e_mail',
                  'gsm',
                   array
                    (
                        'class' => 'CButtonColumn',
                        'template' => '{edit}{remove}',
                        'buttons' => array(
                            //edit button begins
                            'edit' => array(
                                'label'=>'<i class="fa fa-pencil"></i>',
                                'options'=>array('style'=>'font-size:20px; color:black;','title'=>'Ekle'),
                                'url' => 'Yii::app()->createUrl("adres/edit", array("id"=>$data->id) )',
                                'click' => "function() {
                                    $.ajax({
                                    type:'POST',
                                    url:$(this).attr('href'),
                                    success:function(data) {
                                       $('#editContent').html(data);
                                       $('#edit_screen').modal('show');
                                    }
                                    });
                                    return false;
                                    }",
                                 ),
                            'remove' => array(
                                'label'=>'<i class="fa fa-close" style="color:RED;"></i>',
                                'options'=>array('style'=>'font-size:20px;margin-left:10px;',
                                'title'=>'Sil','confirm'=>'Bu veriyi silmek istediğinize emin misiniz?'),
                                'url' => 'Yii::app()->createUrl("adres/deleteOne",array("id"=>$data->id))',
                                 ),
                        )
                    )
                )
              
        ));
    ?>
   <!-- Grid Ends--> 
   
    <!-- Modal Content-->
    <div id="editContent"></div>
    <div id="insertContent"></div>
</div>