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
                        <!-- BEGIN .news-one-half -->
                        <div class="news-one-half">
                            <!-- BEGIN .news-image-container -->
                            <div class="news-image-container">
                                <a href="#"><img src="img/image6.jpg" alt="" /></a>
                                <a href="#" class="news-image-title">Food &amp; Drink</a>
                            </div>
                            <!-- END .news-image-container -->
                            <h3 class="news-title"><a href="#">Thai Cafe in brixton</a><span>November 12th, 2012</span></h3>
                            <p>Vestibulum a magna in eros pellentesque imperdiet ut in leo cras lacus arcu</p>
                        </div>
                        <!-- END .news-one-half -->
                        <!-- BEGIN .news-one-half-last -->
                        <div class="news-one-half-last">
                            <!-- BEGIN .news-image-container -->
                            <div class="news-image-container">
                                <a href="#"><img src="img/image7.jpg" alt="" /></a>
                                <a href="#" class="news-image-title">Fashion</a>
                            </div>
                            <!-- END .news-image-container -->
                            <h3 class="news-title"><a href="#">Calming Summer Vibes</a><span>November 1st, 2012</span></h3>
                            <p>Vestibulum a magna in eros pellentesque imperdiet ut in leo cras lacus arcu</p>
                        </div>
                        <!-- END .news-one-half-last -->
                    </div>
                    <!-- END .clearfix -->
                    <div class="title-block">
                        <h3>Style</h3>
                    </div>
                    <!-- BEGIN .news-block-columns-5 -->
                    <ul class="news-block-columns-5 clearfix">
                        <li class="news-block-col-5">
                            <div class="news-image-container">
                                <a href="#"><img src="img/image8.jpg" alt="" /></a>
                            </div>
                            <h3 class="news-title-lower"><a href="#">Key Winter Fashion Trends</a><span>October 23rd, 2012</span></h3>
                        </li>
                        <li class="news-block-col-5">
                            <div class="news-image-container">
                                <a href="#"><img src="img/image9.jpg" alt="" /></a>
                            </div>
                            <h3 class="news-title-lower"><a href="#">The Skin Care Guide</a><span>October 20th, 2012</span></h3>
                        </li>
                        <li class="news-block-col-5">
                            <div class="news-image-container">
                                <a href="#"><img src="img/image10.jpg" alt="" /></a>
                            </div>
                            <h3 class="news-title-lower"><a href="#">100% Natural Ingredients</a><span>October 8th, 2012</span></h3>
                        </li>
                        <li class="news-block-col-5">
                            <div class="news-image-container">
                                <a href="#"><img src="img/image11.jpg" alt="" /></a>
                            </div>
                            <h3 class="news-title-lower"><a href="#">Our Fashion Wish List</a><span>October 1st, 2012</span></h3>
                        </li>
                        <li class="news-block-col-5">
                            <div class="news-image-container">
                                <a href="#"><img src="img/image12.jpg" alt="" /></a>
                            </div>
                            <h3 class="news-title-lower"><a href="#">Style Highlights for 2013</a><span>September 23rd, 2012</span></h3>
                        </li>
                    </ul>
                    <!-- END .news-block-columns-5 -->
                    <!-- BEGIN .shop-block-columns-2 -->
                    <ul class="shop-block-columns-2 clearfix">
                        <li class="shop-block-col-2">
                            <div class="title-block">
                                <h3>Culture</h3>
                            </div>
                            <!-- BEGIN .slider-news -->
                            <div class="slider-news clearfix">
                                <ul class="slides">
                                    <li>
                                        <ul class="shop-block-list">
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image13.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image14.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image15.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="shop-block-list">
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image14.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image15.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image13.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- END .slider -->
                            </div>
                        </li>
                        <li class="shop-block-col-2">
                            <div class="title-block">
                                <h3>Dining</h3>
                            </div>
                            <!-- BEGIN .slider-news -->
                            <div class="slider-news clearfix">
                                <ul class="slides">
                                    <li>
                                        <ul class="shop-block-list">
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image16.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image17.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image18.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul class="shop-block-list">
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image18.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image16.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                            <li class="clearfix">
                                                <div class="shop-block-img-wrapper">
                                                    <a href="#"><img src="img/image17.jpg" alt="" /></a>
                                                </div>
                                                <h4><a href="#">Mauris Rutrum Euismod Nibhat Porta Metus</a><span>November 18th, 2012</span></h4>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- END .slider-news -->
                            </div>
                        </li>
                    </ul>
                    <!-- END .shop-block-columns-2 -->