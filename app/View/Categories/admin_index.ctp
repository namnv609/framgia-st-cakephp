<?php
//    $cateStatus = array(
//        0   => '<span class="table-icon cancel"></span>',
//        1   => '<span class="table-icon n_ok"></span>'
//    );
    $cateStatus = array(
        0   => 'Inactivated',
        1   => 'Activated'
    );
?>
<div class="full_w">
    <div class="h_title"><?php echo $title_for_layout; ?></div>
    <table data-change="categories/adminajaxchangestatus" data-delete="categories/adminajaxdelete">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(count($listNewsCategories) > 0){
                    foreach($listNewsCategories AS $newsCate) :
                        $editLink = SITE_DIR . ADMIN_ALIAS . '/edit-category-' . $newsCate["Category"]["cateID"];
            ?>
            <tr>
                <td><?php echo $newsCate["Category"]["cateID"]; ?></td>
                <td><?php echo $newsCate["Category"]["cateName"]; ?></td>
                <td align="center">
                    <a href="#" data-id="<?php echo $newsCate["Category"]["cateID"]; ?>" data-status="<?php echo $newsCate["Category"]["cateStatus"]; ?>" class="ajax-change-status">
                        [ <?php echo $cateStatus[$newsCate["Category"]["cateStatus"]]; ?> ]
                    </a>
                </td>
                <td align="center">
                    <a href="<?php echo $editLink; ?>" class="table-icon edit"></a>
                    <a href="#" class="ajax-delete-item table-icon delete" data-id="<?php echo $newsCate["Category"]["cateID"]; ?>"></a>
                </td>
            </tr>
            <?php
                    endforeach;
                }else{
                    echo "<tr><td colspan='4'>No category available here.</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <div class="entry">
        <div class="sep"></div>
        <a href="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/add-category" class="button add">Add new Category</a>
    </div>
</div>