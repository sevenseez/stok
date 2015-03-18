<div class="modal fade" id="edit_screen">
    <a class="close" data-dismiss="modal">&times;</a>
    <div class="modal-header">
        <h3>Verileri Düzenle</h3>
    </div>
    <div class="modal-body" id="edit_body">
            
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
            echo $form->hiddenField($model, 'id', array('class' => 'form-control', 'type' => "hidden", 'size' => 2, 'maxlength' => 2));
            include('adres_form.php');
            ?>
            <div class="modal-footer">
                    <?php
                    echo CHtml::submitButton('Kaydet', array('name' => 'UpdateButton',
                        'id' => 'update',
                        'class' => 'btn btn-primary',));
                    ?>
                    <button type="button" data-dismiss="modal" class="btn btn-primary">İptal</button>
                
                <!-- <a id="submit" href="javascript: check_empty()">Send</a> -->
            </div>
            <?php $this->endWidget(); ?>
    </div>
</div> 