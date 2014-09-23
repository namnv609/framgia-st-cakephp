        <!-- BEGIN .slider -->
                    <div class="slider clearfix">
                        <ul class="slides">
                            <?php
                                if(isset($__homeSlide) AND count($__homeSlide) > 0){
                                    foreach($__homeSlide as $_homeSlide) :
                                        $slideLink = SITE_DIR . Inflector::slug(strtolower($_homeSlide['Cate']['cateName']), '-') . '/' . Inflector::slug(strtolower($_homeSlide['Layout']['newsTitle']), '-') . '-' . $_homeSlide['Layout']['newsID'] . '.html';
                            ?>
                            <li>
                                <img src="<?php echo $_homeSlide['Layout']['newsImage']; ?>" alt="" />
                                <div class="flex-caption">
                                    <h2>
                                        <a href="<?php echo $slideLink; ?>"><?php echo $_homeSlide['Layout']['newsTitle']; ?></a>
                                        <span><?php echo date('F jS, Y', strtotime($_homeSlide['Layout']['newsPublished'])); ?></span>
                                    </h2>
                                    <p><?php echo $_homeSlide['Layout']['newsDesc']; ?></p>
                                </div>
                            </li>
                            <?php
                                    endforeach;
                                }
                            ?>
                        </ul>
                        <!-- END .slider -->
                    </div>
                    <!-- BEGIN .clearfix -->
                    <div class="clearfix">
                        <?php
                            if(count($listNewNews) > 0){
                                $i = 1;
                                $isLast = "";
                                
                                foreach($listNewNews AS $newNews):
                                    $newsLink = SITE_DIR . My_Lib::titleToUrl($newNews['Home']['newsTitle'] . '-' . $newNews["Home"]["newsID"], $newNews['Cate']['cateName'] . '/', '.html');
                                    $cateName = SITE_DIR . Inflector::slug(strtolower($newNews["Cate"]["cateName"]) . '-' . $newNews["Home"]["cateID"], '-');
                                    if($i % 2 === 0){
                                        $isLast = "-last";
                                    }else{
                                        $isLast = "";
                                    }
                        ?>
                        <div class="news-one-half<?php echo $isLast; ?>">
                            <!-- BEGIN .news-image-container -->
                            <div class="news-image-container">
                                <a href="<?php echo $newsLink; ?>">
                                    <img src="<?php echo IMG_RESIZER . $newNews["Home"]["newsImage"]; ?>&amp;w=319&amp;h=213" alt="" />
                                </a>
                                <a href="<?php echo $cateName; ?>" class="news-image-title"><?php echo $newNews["Cate"]["cateName"]; ?></a>
                            </div>
                            <!-- END .news-image-container -->
                            <h3 class="news-title">
                                <a href="<?php echo $newsLink; ?>">
                                    <?php echo String::truncate($newNews["Home"]["newsTitle"], 22, array('ellipsis' => '...', 'exact' => FALSE)); ?>
                                </a>
                                <span><?php echo date("F j, Y", strtotime($newNews["Home"]["newsPublished"])); ?></span>
                            </h3>
                            <p><?php echo $newNews["Home"]["newsDesc"]; ?></p>
                        </div>
                        <?php
                                    $i++;
                                endforeach;
                            }
                        ?>
                    </div>
                    <!-- END .clearfix -->