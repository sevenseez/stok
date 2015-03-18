<?php
echo '<div class="control-group">';
echo $form->label($model,'firma_adi',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'firma_adi',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'firma_yetkili',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'firma_yetkili',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'yetkilinin_konumu',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'yetkilinin_konumu',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'firma_adresi',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'firma_adresi',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'firma_telefonu',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'firma_telefonu',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'firma_fax',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'firma_fax',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'firma_web_sitesi',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'firma_web_sitesi',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'e_mail',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'e_mail',array('class'=>'form-control'));
echo '</div></div>';

echo '<div class="control-group">';
echo $form->label($model,'gsm',array('class'=>'col-sm-2 control-label'));
echo '<div class="controls">';
echo $form->textField($model, 'gsm',array('class'=>'form-control'));
echo '</div></div>';
?>