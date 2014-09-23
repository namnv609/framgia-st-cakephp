<?php
    $inputConfigs = array(
        'div' => FALSE,
        'error' => FALSE
    );
    $slbCateStatus = array(
        '1' => 'Activated',
        '0' => 'Inactivated'
    )
?>
<div class="full_w">
    <div class="h_title"><?php echo $title_for_layout; ?></div>
    <?php
        $succMsg = $this->Session->flash();
        
        echo My_Lib::formErrorSummary($validationErrs);
        echo My_Lib::formSuccessSummary($succMsg);
    ?>
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
        <div class="element">
            <?php
                echo $this->Form->input('cateStatus',
                    array_merge($inputConfigs, array(
                        'name' => 'slbCateStatus',
                        'class' => 'text',
                        'label' => 'Category status',
                        'default' => $cateData["Category"]["cateStatus"],
                        'type' => 'select',
                        'options' => $slbCateStatus
                    ))
                );
            ?>
        </div>
        <div class="entry">
            <button type="submit">Save</button>
        </div>
    </form>
</div>