<?php
/* @var $this \yii\web\View */
/* @var $content string */

use Yii;
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
      
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/nprogress.js"></script>
      
    </head>
    <body  class="nav-md">
          <script>
      //  NProgress.start();
    </script>
        <?php $this->beginBody() ?>
        <div class="container body">


        <div class="main_container">

          
            <!-- page content -->
            <div class="right_col" role="main">

                    <?= $content ?>
        
               

            </div>
            <!-- /page content -->

        </div>

    </div>

   
        <script src="/admin/js/bootstrap.min.js"></script>

    <!-- bootstrap progress js -->
    <script src="/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/admin/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="/admin/js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="/admin/js/moment.min.js"></script>
    <script type="text/javascript" src="/admin/js/datepicker/daterangepicker.js"></script>

    <script src="/admin/js/custom.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="/admin/js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="/admin/js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="/admin/js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="/admin/js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="/admin/js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="/admin/js/flot/date.js"></script>
    <script type="text/javascript" src="/admin/js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="/admin/js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="/admin/js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="/admin/js/flot/jquery.flot.resize.js"></script>
  
        <?php $this->endBody() ?>
     
    <!-- worldmap -->
    <script type="text/javascript" src="/admin/js/maps/jquery-jvectormap-2.0.1.min.js"></script>
    <script type="text/javascript" src="/admin/js/maps/gdp-data.js"></script>
    <script type="text/javascript" src="/admin/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="/admin/js/maps/jquery-jvectormap-us-aea-en.js"></script>
    
  
    <!-- dashbord linegraph -->
    
    <!-- /dashbord linegraph -->
    <!-- datepicker -->
   
    </body>

</html>
<?php $this->endPage() ?>
