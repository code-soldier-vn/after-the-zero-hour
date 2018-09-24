<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <a href="index.html"><img src="./images/logo.png" alt=""></a>
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                <div class="navigation">
                    <div id="navigation">
                        <ul>
                            <li class="active"><a href="index.html" title="Home">Home</a></li>
                            <li><a href="service.html" title="My service">my service</a> </li>
                            <li><a href="about-me.html" title="About me">About me</a> </li>
                            <li class="has-sub"><a href="blog-default.html" title="Blog ">Blog</a>
                                <ul>
                                    <li><a href="blog-default.html" title="Blog">Blog Default</a></li>
                                    <li><a href="blog-single.html" title="Blog Single ">Blog Single</a></li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#" title="Features ">Features</a>
                                <ul>
                                    <li><a href="diet-plan.html" title="diet-plan">Diet plan</a> </li>
                                    <li><a href="testimonials.html" title="Testimonials">Testimonials</a></li>
                                    <li><a href="faq.html" title="FAQ">FAQ</a></li>
                                    <li><a href="404-error.html" title="404-error">404-error</a> </li>
                                    <li><a href="styleguide.html" title="Styleguide">styleguide</a> </li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html" title="Contact Us">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 hidden-md hidden-sm hidden-xs">
                <div class="header-btn"><a href="#" class="btn btn-default">get started</a></div>
            </div>
        </div>
    </div>
</div>
<!-- header-section close -->
<!-- page-header-start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="page-section">
                    <h1 class="page-title ">Blog</h1>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
<!--                            <li><a href="#">Home</a></li>-->
<!--                            <li>Blog</li>-->

                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>

                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
                <div class="page-section">
                    <p>Please Enjoy!! Healthy Eating and Dietitian blogs. Get nutrition advice, tips and facts from Jessica</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-header-close -->
<!-- news-start -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <?= $content ?>
        </div>
    </div>
</div>

<!-- news-close -->
<!-- footer start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- footer-about-start -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="footer-widget">
                    <h3 class="footer-title">Contact Infomation</h3>
                    <div class="">
                        <ul>
                            <li> <i class="icon-placeholder"></i>2177 Shearwood Forest , NH 03801</li>
                            <li><i class="icon-phone-call"></i>+180-123-4567</li>
                            <li><i class="icon-envelope"></i>info@dietcoach.com</li>
                        </ul>
                    </div>
                    <div class="footer-social"> <a href="#"><span><i class="fa fa-facebook-square"></i></span></a> <a href="#"><span><i class="fa fa-google-plus-square"></i></span> </a> <a href="#"><span class="active"><i class="fa fa-twitter-square"></i> </span></a> <a href="#"><span><i class=" fa fa-pinterest-square"></i> </span></a> <a href="#"><span><i class="fa fa-linkedin-square"></i></span></a> </div>
                </div>
            </div>
            <!-- footer-useful links-start -->
            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="angle angle-right">
                        <li><a href="#">Home </a></li>
                        <li><a href="#">Service </a></li>
                        <li><a href="#">About me</a></li>
                        <li><a href="#">Diet Plans </a></li>
                        <li> <a href="#">Blog</a></li>
                        <li> <a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <!-- footer-useful links-close -->
            <!-- footer-form-start -->
            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">contact us</h3>
                    <form>
                        <div class="form-group">
                            <label class="control-label sr-only" for="name"></label>
                            <input id="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="control-label sr-only" for="Email"></label>
                            <input id="email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="control-label sr-only" for="Phone"></label>
                            <input id="phone" type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label class="control-label sr-only" for="textarea"></label>
                            <textarea class="form-control" id="textarea" name="textarea" rows="3" placeholder="textarea"></textarea>
                        </div>
                        <button class="btn btn-primary btn-sm">submit</button>
                    </form>
                </div>
            </div>
            <!-- footer-tiny-text-start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="tiny-footer">
                    <p>© 2020 - The Nutrition Diet Coach. All Rights Reserved.</p>
                </div>
            </div>
            <!-- footer-tiny-text-start -->
            <!-- footer-form-close -->
        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
