<?php if(!is_page(DIR_LP)){?>
<?php get_template_part('template/content/footer');?>
<?php }else{?>
<?php get_template_part('template/lp/footer');?>
<?php }?>
<div id="wp-footer">
    <?php wp_footer(); ?>
</div>
</body>

</html>