<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Letta</title>
        
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
           
        <?php 
            $cs = Yii::app()->getClientScript();
            $cs->registerCssFile(BaseUrl.'/bootstrap/css/bootstrap.min.css');
            $cs->registerCssFile(BaseUrl.'/bootstrap/css/bootstrap-responsive.min.css');
            $cs->registerCssFile(BaseUrl.'/css/theme.css');
            $cs->registerCssFile(BaseUrl.'/images/font-awesome/css/font-awesome.css');
            $cs->registerCssFile(BaseUrl.'/css/custom.css');
            
            // $cs->registerScriptFile(BaseUrl.'/scripts/jquery-1.11.2.js');
            $cs->registerCoreScript('jquery');
            $cs->registerScriptFile(BaseUrl.'/scripts/jquery-ui-1.10.1.custom.min.js');
            $cs->registerScriptFile(BaseUrl.'/bootstrap/js/bootstrap.min.js');
            $cs->registerScriptFile(BaseUrl.'/scripts/flot/jquery.flot.js');
            $cs->registerScriptFile(BaseUrl.'/scripts/flot/jquery.flot.resize.js');
        ?>
    </head>
    <body>
       
        <!-- /navbar -->
        <?php  

        if (!Yii::app()->user->isGuest)
            Yii::import('application.views.layouts.nav', true); 
        else 
            Yii::import('application.views.layouts.navLogin',true);
        echo $content;
                
                ?> 
                </div>
            </div>
            <!--/.container-->
        </div>
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
            </div>
        </div>
    
      
        <?php
        ?>
    </body>
