<h1 class="page-title"><?php echo $newsDetail['Cate']['cateName']; ?></h1>
			
			<!-- BEGIN .breadcrumbs-wrapper -->
			<div class="breadcrumbs-wrapper clearfix">
				<ul class="breadcrumbs">
                                    <li><span><a href="<?php echo SITE_DIR; ?>">Home</a></span></li>
                                        <li><span><?php echo $newsDetail['Cate']['cateName']; ?></span></li>
				</ul>
			</div>
			<!-- END .breadcrumbs-wrapper -->
			
			<!-- BEGIN .page-content -->
			<div class="page-content">
			
                            <img src="<?php echo $newsDetail['News']['newsImage']; ?>" alt="" class="article-image-full">
				
				<h2 class="article-title">
					<a><?php echo $newsDetail['News']['newsTitle']; ?></a>
					<span class="article-meta">
                                            <span class="article-date"><?php echo date('F jS, Y', strtotime($newsDetail['News']['newsPublished'])); ?></span>
                                                <span class="article-category"><a href="#"><?php echo $newsDetail['Cate']['cateName']; ?></a></span>
					</span>
				</h2>
				
                            <p><?php echo $newsDetail['News']['newsContent']; ?></p>
				
				<div class="article-social-links">
					
					<ul class="clearfix">
						<li class="tweet-link"><a href="#">Tweet this article</a></li>
						<li class="facebook-link"><a href="#">Share on Facebook</a></li>
						<li class="pinterest-link"><a href="#">Pin on Pinterest</a></li>
					</ul>
					
				</div>
				
				<div class="shadow-wrapper">
					<div class="left-shadow"></div>
					<div class="mid-shadow"></div>
					<div class="right-shadow"></div>
				</div>
			<!-- END .page-content -->
			</div>