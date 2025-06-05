<?php get_header(); ?>

<div class="container">
    <div class="site-content">
        <main class="main-content">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title" style="color:#5cb85c;"><?php the_title(); ?></h1>
                    </header>
                    <div class="product-thumbnail" style="margin-bottom:20px;">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/images/fruit-default.png" alt="Trái cây" />';
                        } ?>
                    </div>
                    <div class="product-price" style="font-size:1.3em;">
                        <?php if ($price = get_post_meta(get_the_ID(), 'product_price', true)) {
                            echo number_format($price, 0, ',', '.') . ' đ';
                        } else {
                            echo 'Liên hệ';
                        } ?>
                    </div>
                    <div class="entry-content" style="margin-top:16px;">
                        <?php the_content(); ?>
                    </div>
                    <a href="#" class="btn-buy" style="margin-top:20px;">Đặt mua</a>
                </article>
            <?php endwhile; ?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 