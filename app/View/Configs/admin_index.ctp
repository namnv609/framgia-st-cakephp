<div class="full_w">
    <div class="h_title"><?php echo $title_for_layout; ?></div>
    <?php
        $succMsg = $this->Session->flash();
        
        if(!empty($validationErrs)){
            echo My_Lib::formErrorSummary($validationErrs);
        }
        $slbNews = array();
        if(count($listNews) > 0){
            foreach($listNews as $news){
                $slbNews[$news['News']['newsID']] = $news['News']['newsTitle'];
            }
        }
        
        echo My_Lib::formSuccessSummary($succMsg);
    ?>
    <form action="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/website-configuration/update" method="post">
        <div class="element">
            <label>Logo</label>
            <input type="text" class="text" name="txtSiteLogo" id="txtSiteLogo" readonly="readonly" value="<?php echo $websiteConfigs["siteLogo"]; ?>" />
            <button class="add" id="btnSelectImage" type="button" data-width="100" data-height="100" data-input="#txtSiteLogo" data-preview="#imgPreviewImage">
                Select
            </button>
            <br /><br />
            <img src="<?php echo $websiteConfigs["siteLogo"]; ?>" id="imgPreviewImage" />
        </div>
        <div class="element">
            <label>Site name</label>
            <input type="text" class="text" name="txtSiteName" value="<?php echo $websiteConfigs["siteName"]; ?>" />
        </div>
        <div class="element">
            <label>Site slogan</label>
            <input type="text" class="text" name="txtSiteSlogan" value="<?php echo $websiteConfigs["siteSlogan"]; ?>" />
        </div>
        <div class="element">
            <label>Home slide</label>
            <p>
                Select news to show in homepage slide. Ctrl+Select to select multi news.
            </p>
            <?php
                echo $this->Form->input(FALSE, array(
                    'type' => 'select',
                    'label' => FALSE,
                    'options' => $slbNews,
                    'name' => 'slbSiteSlide',
                    'class' => 'text',
                    'size' => 10,
                    'multiple' => 'multiple',
                    'default' => unserialize($websiteConfigs['siteSlide'])
                ));
            ?>
        </div>
        <div class="element">
            <button type="submit" class="button">
                Save
            </button>
        </div>
    </form>
</div>