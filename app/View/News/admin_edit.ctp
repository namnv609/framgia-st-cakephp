<?php
    $inputConfigs = array(
        'error' => FALSE,
        'div' => FALSE
    );
    
    $slbCategories = array();
    $slbCategories[""] = "---News categories---";
    if(count($listCategories) > 0){
        foreach($listCategories as $category){
            $slbCategories[$category["Category"]["cateID"]] = $category["Category"]["cateName"];
        }
    }
    $slbFeatured = array(
        '0' => 'Normal',
        '1' => 'Featured'
    );
    $slbStatus = array(
        '1' => 'Activated',
        '0' => 'Inactivated'
    )
?>
<div class="full_w">
    <div class="h_title"><?php echo $title_for_layout; ?></div>
    <?php
        echo My_Lib::formErrorSummary($validationErrs);
        echo My_Lib::formSuccessSummary($this->Session->flash());
    ?>
    <form action="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/news/save" method="post" autocomplete="off">
        <?php 
            echo $this->Form->hidden('newsID', array('name' => 'txtNewsID', 'default' => $newsData["News"]["newsID"]));
        ?>
        <div class="element">
            <?php
                echo $this->Form->input('newsTitle', array_merge($inputConfigs, array(
                    'label' => 'News title',
                    'class' => 'text',
                    'name' => 'txtNewsTitle',
                    'default' => $newsData["News"]["newsTitle"]
                )));
            ?>
        </div>
        <div class="element">
            <?php
                echo $this->Form->input('newsImage', array_merge($inputConfigs, array(
                    'label' => 'News image',
                    'class' => 'text',
                    'name' => 'txtNewsImage',
                    'default' => $newsData["News"]["newsImage"],
                    'readonly' => 'readonly'
                )));
            ?>
            <button class="add" id="btnSelectImage" type="button" data-width="73" data-height="54" data-input="#newsImage" data-preview="#previewNewsImage">
                Select
            </button>
            <br /><br />
            <img src="<?php echo IMG_RESIZER . 'http://' . $_SERVER["HTTP_HOST"] . $newsData["News"]["newsImage"]; ?>&amp;w=73&amp;h=54" alt="" id="previewNewsImage" />
        </div>
        <div class="element">
            <label for="newsDesc">Short description</label>
            <?php
                echo $this->Form->textarea('newsDesc', array_merge($inputConfigs, array(
                    'class' => 'text',
                    'name' => 'txtNewsDesc',
                    'default' => $newsData["News"]["newsDesc"]
                )));
            ?>
        </div>
        <div class="element">
            <label for="newsContent">Content</label>
            <?php
                echo $this->Form->textarea('newsTitle', array_merge($inputConfigs, array(
                    'class' => 'text ckeditor',
                    'name' => 'txtNewsContent',
                    'default' => $newsData["News"]["newsContent"]
                )));
            ?>
        </div>
        <div class="element">
            <?php
                echo $this->Form->input('cateID', array_merge($inputConfigs, array(
                    'class' => 'text',
                    'name' => 'slbCateID',
                    'options' => $slbCategories,
                    'default' => $newsData["News"]["cateID"],
                    'label' => 'Category'
                )));
            ?>
        </div>
        <div class="element">
            <?php
                echo $this->Form->input('newsFeatured', array_merge($inputConfigs, array(
                    'class' => 'text',
                    'name' => 'slbNewsFeatured',
                    'options' => $slbFeatured,
                    'default' => $newsData["News"]["newsFeatured"],
                    'label' => 'Featured'
                )));
            ?>
        </div>
        <div class="element">
            <?php
                echo $this->Form->input('newsStatus', array_merge($inputConfigs, array(
                    'class' => 'text',
                    'name' => 'slbNewsStatus',
                    'options' => $slbStatus,
                    'default' => $newsData["News"]["newsStatus"],
                    'label' => 'Status'
                )));
            ?>
        </div>
        <div class="element">
            <button type="submit" class="button">
                Save
            </button>
        </div>
    </form>
</div>