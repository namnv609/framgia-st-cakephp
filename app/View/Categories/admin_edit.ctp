<?php
    $inputConfigs = array(
        'div' => FALSE,
        'error' => FALSE
    );
?>
<div class="full_w">
    <div class="h_title"><?php echo $title_for_layout; ?></div>
    <form action="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/category/save" method="post" autocomplete="off">
        <?php
            echo $this->Form->hidden('cateID', array_merge($inputConfigs, 
                    array(
                        'name' => 'txtCateID',
                        'default' => $cateData["Category"]["cateID"]
                )));
        ?>
        <div class="element">
            <?php 
                echo $this->Form->input('cateName',
                    array_merge($inputConfigs,
                    array(
                        'name' => 'txtCateName',
                        'class' => 'text', 
                        'label' => 'Category name',
                        'default' => $cateData["Category"]["cateName"]
                    )
                ));
            ?>
        </div>
        <div class="entry">
            <button type="submit">Save</button>
        </div>
    </form>
</div>