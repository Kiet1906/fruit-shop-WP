<?php get_header(); ?>

<div class="container">
    <div class="site-content">
        <main class="main-content">
            <h2 style="color:#5cb85c;margin-bottom:24px;">Sản phẩm trái cây mới nhất</h2>
            <div class="product-grid">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12
            );
            $products = new WP_Query($args);
            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('product-item'); ?> >
                        <div class="product-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium_large');
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/images/fruit-default.png" alt="Trái cây" />';
                                } ?>
                            </a>
                        </div>
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </header>
                        <div class="product-price">
                            <?php if ($price = get_post_meta(get_the_ID(), 'product_price', true)) {
                                echo number_format($price, 0, ',', '.') . ' đ';
                            } else {
                                echo 'Liên hệ';
                            } ?>
                        </div>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn-buy">Xem chi tiết</a>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Chưa có sản phẩm nào.</p>';
            endif;
            ?>
            </div>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 