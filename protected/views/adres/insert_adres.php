<div class="modal fade" id="insert_screen">
        <a class="close" data-dismiss="modal">&times;</a>
    <div class="modal-header">
        <h3>Veri Ekle</h3>
    </div>
    <div class="modal-body" id="insert_body">
            <?php
            $form = $this->beginWidget(
                'CActiveForm', array(
                'id' => 'form',
                'htmlOptions'=>array('class'=>'form-horizontal'),
                'action' => Yii::app()->createUrl('adres/'),
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'afterValidate' => 'js:function(hasError) {
                        return confirm("İşleme devam edilsin mi?");
                        }'
                ),
                    )
            );
            ?>
            <?php
            include('adres_form.php');
            ?>
            <div class="modal-footer">
                    <?php
                    echo CHtml::submitButton('Kaydet', array('name' => 'InsertButton',
                        'id' => 'update',
                        'class' => 'btn btn-primary',));
                    ?>
                    <button type="button" data-dismiss="modal" class="btn btn-primary">İptal</button>
               
            </div>
            <?php $this->endWidget(); ?>
    </div>
</div> 