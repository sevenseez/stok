<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module module-login span4 offset4">
                   <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'login-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        ));
                        ?>
                    <div class="module-head">
                        <h3>Giriş Yap</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <?php echo $form->textField($model, 'username',array('class'=>'span12','placeholder'=>'Kullanıcı Adı')); ?>
                                <?php echo $form->error($model, 'username'); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <?php echo $form->passwordField($model, 'password',array('class'=>'span12','placeholder'=>'Şifre')); ?>
                                <?php echo $form->error($model, 'password'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <?php echo CHtml::submitButton('Gönder', array('class'=>'btn btn-primary pull-right'))?> 
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model, 'rememberMe'); ?> Beni Hatırla
                                </label>
                            </div>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div><!--/.wrapper-->
