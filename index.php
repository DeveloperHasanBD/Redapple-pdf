<form class="d-none" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
    <input type="hidden" name="action" value="generate_sample_pdf">
    <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
    <input id="dkr-product-pdf" type="submit" name="submit" value="SCARICA SCHEDA PDF">
</form>