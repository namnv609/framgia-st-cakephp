<?php
    $newsFeatured = array(
        0   => "Normal",
        1   => "Featured"
    );
    $newsStatus = array(
        1   => "[ Activated ]",
        0   => "[ Unactivated ]"
    )
?>
<div class="full_w">
    <div class="h_title"><?php echo $title_for_layout; ?></div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Published</th>
                <th>Featured</th>
                <th>Category</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(count($listNews) > 0){
                    foreach($listNews as $news) :
                        $editLink = SITE_DIR . ADMIN_ALIAS . '/edit-news-' . $news["News"]["newsID"]
            ?>
            <tr>
                <td><?php echo $news["News"]["newsID"]; ?></td>
                <td><?php echo $news["News"]["newsTitle"]; ?></td>
                <td>
                    <img src="<?php echo IMG_RESIZER . $news["News"]["newsImage"]; ?>&amp;w=73&amp;h=52" alt="" />
                </td>
                <td><?php echo date("m/d/Y H:i", strtotime($news["News"]["newsPublished"])); ?></td>
                <td><?php echo $newsFeatured[$news["News"]["newsFeatured"]]; ?></td>
                <td><?php echo $news["Cate"]["cateName"]; ?></td>
                <td><?php echo $newsStatus[$news["News"]["newsStatus"]]; ?></td>
                <td>
                    <a href="<?php echo $editLink; ?>" class="table-icon edit"></a>
                    <a href="#" class="table-icon delete"></a>
                </td>
            </tr>
            <?php
                    endforeach;
                }else{
                    echo "<tr><td colspan='8'>No news available here.</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <div class="entry">
        <div class="sep"></div>
        <a href="<?php echo SITE_DIR . ADMIN_ALIAS; ?>/add-new-news" class="button add">Add new News</a>
    </div>
</div>