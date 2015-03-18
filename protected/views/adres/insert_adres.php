<div class="modal fade" id="insert_screen">
    <div class="modal-dialog" id="insert_dialog">
        <div class="modal-content" id="insert_content">
            <a class="close" data-dismiss="modal">&times;</a>
            <?php
            $form = $this->beginWidget(
                'CActiveForm', array(
                'id' => 'form',
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
            <div class="form-group ">
                <div class="edit_buttons">
                    <?php
                    echo CHtml::submitButton('Kaydet', array('name' => 'InsertButton',
                        'id' => 'update',
                        'class' => 'btn btn-primary',));
                    ?>
                    <button type="button" data-dismiss="modal" class="btn btn-primary">İptal</button>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div> 