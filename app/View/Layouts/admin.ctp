<!DOCTYPE html>
<html lang="vi-VN">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="NamNV609" />
        <title><?php echo $title_for_layout; ?> | Administrator Control Panel</title>
        <script type="text/javascript">
            var siteConfigs = {
                SITE_DIR : '<?php echo SITE_DIR; ?>',
                SITE_URL : '<?php echo SITE_URL; ?>'
            };
        </script>
        <?php
            echo $this->Html->css(array(
                'admin/style',
                'admin/navi'
            ));
            
            echo $this->Html->script(array(
                'admin/jquery-1.7.2.min',
                'admin/ckeditor/ckeditor.js',
                'admin/ckfinder/ckfinder.js',
                'admin/script.js'
            ));
        ?>
        <script type="text/javascript">
            $(function() {
                //$(".box .h_title").not(this).next("ul").hide("normal");
                $(".box .h_title").not(this).next("#home").show("normal");
                $(".box").children(".h_title").click(function() {
                    //$(".box ul").hide("normal");
                    $(this).next("ul").slideToggle();
                });
            });
        </script>
    </head>
    <body>
        <div class="wrap">
            <div id="header">
                <div id="top">
                    <div class="left">
                        <p>Welcome, <strong><?php echo $this->Session->read('AdminSess.userName'); ?></strong>
                            [ <a href="<?php echo SITE_URL . ADMIN_ALIAS . '/logout'; ?>" onclick="return confirm('Are you sure you want to logout????????');">logout</a> ]
                        </p>
                    </div>
                    <!--<div class="right">
                        <div class="align-right">
                            <p>Last login: <strong>23-04-2012 23:12</strong></p>
                        </div>
                    </div>-->
                </div>
                <div id="nav">
                    <ul>
                        <li class="upp"><a href="#">Main control</a>
                            <ul>
                                <li>&#8250; <a href="<?php echo SITE_DIR; ?>" target="_blank">Visit site</a></li>
                                <li>&#8250; <a href="<?php echo SITE_DIR . ADMIN_ALIAS . '/website-configuration'; ?>">Site config</a></li>
                            </ul>
                        </li>
                        <li class="upp"><a href="#">Manage content</a>
                            <ul>
                                <li>&#8250; <a href="<?php echo SITE_DIR . ADMIN_ALIAS . '/categories'; ?>">Show all Categories</a></li>
                                <li>&#8250; <a href="<?php echo SITE_DIR . ADMIN_ALIAS . '/add-category'; ?>">Add new Category</a></li>
                                <li>&#8250; <a href="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/news">Show all News</a></li>
                                <li>&#8250; <a href="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/add-new-news">Add new News</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <div id="sidebar">
                    <div class="box">
                        <div class="h_title">&#8250; Main control</div>
                        <ul id="home">
                            <li class="b1"><a class="icon view_page" href="<?php echo SITE_DIR . ADMIN_ALIAS; ?>">Dashboard</a></li>
                            <li class="b2"><a class="icon view_page" href="<?php echo SITE_DIR; ?>" target="_blank">Visit site</a></li>
                            <li class="b1"><a class="icon config" href="<?php echo SITE_DIR . ADMIN_ALIAS . '/website-configuration'; ?>">Site config</a></li>
                        </ul>
                    </div>

                    <div class="box">
                        <div class="h_title">&#8250; Manage content</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="<?php echo SITE_DIR . ADMIN_ALIAS . '/categories'; ?>">Show all Categories</a></li>
                            <li class="b2"><a class="icon add_page" href="<?php echo SITE_DIR . ADMIN_ALIAS . '/add-category'; ?>">Add new Category</a></li>
                            <li class="b1"><a class="icon photo" href="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/news">Show all News</a></li>
                            <li class="b2"><a class="icon category" href="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/add-new-news">Add new News</a></li>
                        </ul>
                    </div>
                </div>
                <div id="main">
                    <?php echo $this->fetch('content'); ?>
                </div>
                <div class="clear"></div>
            </div>

            <div id="footer">
                <div class="left">
                    <p>Design: <b>NamNV609</b></p>
                </div>
                <!--<div class="right">
                    <p><a href="">Example link 1</a> | <a href="">Example link 2</a></p>
                </div>-->
            </div>
        </div>

    </body>
</html>
