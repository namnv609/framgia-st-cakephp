                <h1 class="page-title"><?php echo $pageTitle; ?></h1>

                    <!-- BEGIN .breadcrumbs-wrapper -->
                    <div class="breadcrumbs-wrapper clearfix">
                        <ul class="breadcrumbs">
                            <li><span><a href="#">Home</a></span></li>
                            <li><span><?php echo $pageTitle; ?></span></li>
                        </ul>
                    </div>
                    <!-- END .breadcrumbs-wrapper -->

                    <!-- BEGIN .page-content -->
                    <div class="page-content">

                        <ul class="article-category-col-1 clearfix">

                            <?php
                                if(count($listNews) > 0){
                                    foreach($listNews as $news) :
                                        $newsLinks = SITE_DIR . Inflector::slug(strtolower($news['Cate']['cateName']), '-') . '/' . Inflector::slug(strtolower($news['News']['newsTitle']), '-') . '-' . $news['News']['newsID'] . '.html';
                                        //$newsLinks = SITE_DIR . My_Lib::titleToUrl($news['News']['newsTitle'], $news['Cate']['cateName'] . '/', '.html');
                            ?>
                            <li class="clearfix">
                                <div class="article-image">
                                    <a href="<?php echo $newsLinks; ?>"><img src="<?php echo $news["News"]["newsImage"]; ?>" alt="" /></a>
                                </div>
                                <div class="article-content">
                                    <h3>
                                        <a href="<?php echo $newsLinks; ?>"><?php echo $news["News"]["newsTitle"]; ?></a>
                                        <span class="article-meta clearfix">
                                            <span class="article-date"><?php echo date('F j, Y', strtotime($news['News']['newsPublished'])); ?></span>
                                        </span>
                                    </h3>
                                    <p><?php echo $news['News']["newsDesc"]; ?></p>
                                </div>
                            </li>
                            <?php
                                    endforeach;
                                }
                            ?>

                        </ul>

                        <div class="pagination-wrapper">
                            <a class="selected" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">></a>
                        </div>

                        <!-- END .page-content -->
                    </div>