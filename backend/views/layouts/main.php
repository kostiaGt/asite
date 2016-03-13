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

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="/admin/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Anthony Fernando</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <?= \backend\widgets\menu\MenuWidget::widget(['isAutoInitMenu'=>true, 'icons'=>[
                        'Menu'=>'fa fa-tasks',
                        'Lang' => 'fa fa-language',
                        'Domains' => 'fa fa-globe',
                        'SiteOptions' => 'fa fa-gears'
                    ], 
                        'urls' => [
                            'SiteOptions' => 'site-options'
                        ],
                        'hideControllers'=> [
                            'Site'
                        ]
                        ]); ?>
                     <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="/admin/images/img.jpg" alt="">John Doe
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="/admin/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="/admin/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="/admin/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="/admin/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong><a href="inbox.html">See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">

                    <?= $content ?>
        
               

            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
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
