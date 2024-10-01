
<?php
$current_category = get_queried_object_id();
$categories = get_categories();
foreach ($categories as $category) {
    $active_class = ($current_category == $category->term_id) ? 'active' : ''; ?>
    <li class="<?php echo $active_class; ?>">
        <a href="<?php echo get_category_link($category->cat_ID); ?>">
            <?php echo $category->name ?>
        </a>
    </li>
<?php } ?>