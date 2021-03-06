<?php 
    if(!isset($title_for_layout)){
        $title_for_layout = $__globalSiteConfigs['siteName'];
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]> 
<html dir="ltr" lang="en-US" class="ie6">
        <![endif]-->
<!--[if IE 7]>    
<html dir="ltr" lang="en-US" class="ie7">
        <![endif]-->
<!--[if IE 8]>    
<html dir="ltr" lang="en-US" class="ie8">
        <![endif]-->
<!--[if gt IE 8]><!--> 
<html dir="ltr" lang="en-US">
    <!--<![endif]-->
    <!-- BEGIN head -->
    <head>
        <!--Meta Tags-->
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--Title-->
        <title><?php echo $title_for_layout; ?> | <?php echo $__globalSiteConfigs['siteName']; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Cardo:400,400italic,700' rel='stylesheet' type='text/css'>
        <!--Favicon-->
        <link rel="shortcut icon" href="favicon.html" type="image/x-icon" />
        <!--JavaScript-->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script>
        <?php
            echo $this->Html->css(array(
                'style',
                'superfish',
                'responsive',
                'prettyPhoto',
                'flexslider'
            ));
            echo $this->Html->script(array(
                'jquery.prettyPhoto',
                'superfish',
                'jquery.flexslider-min',
                'jquery.jcarousel.min',
                'cloud-zoom.1.0.2',
                'scripts'
                
            ));
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <!--[if (gte IE 6)&(lte IE 8)]>
        <?php echo $this->Html->script('selectivizr-min'); ?>
        <![endif]-->
        <!-- END head -->
    </head>
    <!-- BEGIN body -->
    <body>
        <!-- BEGIN #background-wrapper -->
        <div id="background-wrapper">
            <!-- BEGIN .content-wrapper -->
            <div class="content-wrapper clearfix">
                <!-- BEGIN #header-wrapper -->
                <div id="header-wrapper" class="clearfix">
                    <!-- BEGIN #header-left -->
                    <div id="header-left">
                        <div id="site-title">
                            <h2>
                                <a href="<?php echo SITE_URL; ?>">
                                    <img src="<?php echo IMG_RESIZER . $__globalSiteConfigs["siteLogo"]; ?>&amp;w=134&amp;h=40" alt="<?php echo $__globalSiteConfigs["siteName"] . ' - ' . $__globalSiteConfigs["siteSlogan"]; ?>" />
                                </a>
                            </h2>
                            <p id="tagline"><?php echo $__globalSiteConfigs['siteSlogan']; ?></p>
                        </div>
                    </div>
                    <!-- END #header-left -->
                    <!-- BEGIN #header-right -->
                    <div id="header-right">
                        
                        <div class="clearboth"></div>
                        <!-- BEGIN .social-icons -->
                        <ul class="social-icons">
                            <li><a href="https://twitter.com/nambattai"><span class="twitter_icon"></span></a></li>
                            <li><a href="http://pinterest.com/nambattai"><span class="pinterest_icon"></span></a></li>
                            <li><a href="http://fb.com/tencuaminhnganlamnhungphaigiaithichnennomoidai"><span class="facebook_icon"></span></a></li>
                            <li><a href="http://gplus.to/nambattai"><span class="googleplus_icon"></span></a></li>
                            <!-- END .social-icons -->
                        </ul>
                    </div>
                    <!-- END #header-right -->
                </div>
                <!-- END #header-wrapper -->
                <!-- BEGIN #main-menu-wrapper -->
                <div id="main-menu-wrapper" class="clearfix">
                    <div class="mobile-menu-button"></div>
                    <div class="mobile-menu-wrapper">
                        <ul id="mobile-menu">
                            <?php 
                                if(isset($__listCategories) && count($__listCategories) > 0){
                                    foreach($__listCategories AS $__categories){
                                        $categoryLink = SITE_DIR . Inflector::slug(strtolower($__categories['Layout']['cateName']), '-') . '-' . $__categories['Layout']['cateID'];// . '.html';
                                        echo '<li><a href="'.$categoryLink.'">'.$__categories['Layout']['cateName'].'</a></li>';
                                    }
                                }
                            ?>
                        </ul>
                        <!-- END #main-menu -->
                    </div>
                    <!-- BEGIN #main-menu -->
                    <ul id="main-menu" class="fl">
                        <?php 
                            if(isset($__listCategories) && count($__listCategories) > 0){
                                foreach($__listCategories AS $__categories){
                                    $categoryLink = SITE_DIR . Inflector::slug(strtolower($__categories['Layout']['cateName']), '-') . '-' . $__categories['Layout']['cateID'];// . '.html';
                                    echo '<li><a href="'.$categoryLink.'">'.$__categories['Layout']['cateName'].'</a></li>';
                                }
                            }
                        ?>
                    </ul>
                    <!-- END #main-menu -->
                    <div class="menu-search-button"></div>
                    <form method="get" action="#" class="menu-search-form">
                        <input class="menu-search-field" type="text" onblur="if (this.value == '')
                                    this.value = 'To search, type and hit enter';" onfocus="if (this.value == 'To search, type and hit enter')
                                                this.value = '';" value="To search, type and hit enter" name="s" />
                    </form>
                </div>
                <!-- END #main-menu-wrapper -->
                <!-- BEGIN #main-content -->
                <div id="main-content">
                    <?php echo $this->fetch('content'); ?>
                </div>
                <!-- END #main-content -->
                <!-- BEGIN #sidebar-content -->
                <div id="sidebar-content">
                    <!-- BEGIN .widget -->
                    <!--<div class="widget clearfix">
                        <ul class="adverts-four">
                            <li><a href="#"><img src="img/advert1.png" alt="" /></a></li>
                            <li><a href="#"><img src="img/advert1.png" alt="" /></a></li>
                            <li><a href="#"><img src="img/advert1.png" alt="" /></a></li>
                            <li><a href="#"><img src="img/advert1.png" alt="" /></a></li>
                        </ul>
                    </div>-->
                    <!-- END .widget -->
                    <!-- BEGIN .widget -->
                    <!--<div class="widget clearfix">
                        <div class="widget-title clearfix">
                            <h3>Newsletter</h3>
                            <div class="widget-title-border">
                                <div class="widget-title-block"></div>
                            </div>
                        </div>
                        <p>All the latest StyleMag picks emailed directly to you every week!</p>
                        <form method="post" action="#">
                            <input type="text" name="s" class="newsletter-input" />
                            <input type="submit" value="Submit" class="newsletter-submit" />
                        </form>
                    </div>-->
                    <!-- END .widget -->
                    <!-- BEGIN .widget -->
                    <div class="widget clearfix">
                        <div class="widget-title clearfix">
                            <h3>Featured News</h3>
                            <div class="widget-title-border">
                                <div class="widget-title-block"></div>
                            </div>
                        </div>
                        <ul class="latest-posts-list clearfix">
                            <?php
                                if(count($__globalFeaturedNews) > 0){
                                    foreach($__globalFeaturedNews AS $_ftNews) :
                                        $_ftLink = SITE_DIR . My_Lib::titleToUrl($_ftNews["Layout"]["newsTitle"] . '-' .  $_ftNews["Layout"]["newsID"], $_ftNews["Cate"]["cateName"], ".html");
                            ?>
                            <li class="clearfix">
                                <div class="lpl-img">
                                    <a href="<?php echo $_ftLink; ?>" rel="bookmark">
                                        <img src="<?php echo IMG_RESIZER . $_ftNews["Layout"]["newsImage"]; ?>&amp;w=73&amp;h=52" alt="" />
                                    </a>
                                </div>
                                <div class="lpl-content">
                                    <h6>
                                        <a href="<?php echo $_ftLink; ?>" rel="bookmark"><?php echo $_ftNews["Layout"]["newsTitle"]; ?></a>
                                        <span> <?php echo date("F j, Y", strtotime($_ftNews["Layout"]["newsPublished"])); ?></span>
                                    </h6>
                                </div>
                            </li>
                            <?php
                                    endforeach;
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- END .widget -->
                    <!-- BEGIN .widget -->
                    <div class="widget clearfix">
                        <a href="#" class="advert-side-wrapper"><img src="img/advert2.png" alt="" /></a>
                    </div>
                    <!-- END .widget -->
                </div>
                <!-- END #sidebar-content -->
            </div>
            <!-- END .content-wrapper -->
            <!-- #footer-bottom -->
            <div id="footer-bottom" class="clearfix">
                <div class="fl clearfix">
                    <ul class="footer-menu">
                        <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                        <li><a href="<?php echo SITE_DIR . 'news'; ?>">News</a></li>
                    </ul>
                </div>
                <div class="fr clearfix">&copy; Copyright 2014 by NamNV609</div>
            </div>
            <!-- #footer-bottom -->
        </div>
        <!-- END #background-wrapper -->
        <!-- END body -->
    </body>
</html>