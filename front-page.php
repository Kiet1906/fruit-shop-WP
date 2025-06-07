<?php
/**
 * The template for displaying the static front page (product listing).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fruit_Shop
 */

// @codingStandardsIgnoreFile
// phpcs:ignoreFile

get_header();
?>

<div class="container">
    <div class="site-content">
        <main class="main-content">
            <?php
            // Query để lấy các sản phẩm (Custom Post Type 'product')
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12 // Số sản phẩm hiển thị trên một trang
            );
            $products = new WP_Query($args);

            if ($products->have_posts()) : ?>

                <div class="product-list">
                    <?php while ($products->have_posts()) : $products->the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('product-item'); ?> style="margin-bottom: 20px; padding: 15px; border: 1px solid #eee; border-radius: 5px;">
                            <header class="entry-header">
                                <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                            </header>

                            <div class="entry-content">
                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail('medium', array('style' => 'max-width: 100%; height: auto;'));
                                endif; ?>
                                
                                <?php // Hiển thị giá sản phẩm từ ACF
                                $product_price = get_field('product_price');
                                if ($product_price) {
                                    echo '<p class="product-price" style="font-weight: bold; color: #e74c3c; margin-top: 10px;">Giá: ' . esc_html($product_price) . '</p>';
                                }
                                ?>

                                <?php the_excerpt(); // Hoặc the_content(); ?>
                            </div>
                            
                            <footer class="entry-footer" style="margin-top: 15px;">
                                <a href="<?php the_permalink(); ?>" class="btn-view-product" style="display: inline-block; background: #3498db; color: white; padding: 8px 15px; border-radius: 4px; text-decoration: none;">Xem chi tiết</a>
                            </footer>
                        </article>

                    <?php endwhile; ?>
                </div>

                <?php
                // Phân trang (nếu cần)
                the_posts_navigation();

            else : // Nếu không có sản phẩm nào ?>
                <p><?php esc_html_e('Chưa có sản phẩm nào.', 'fruitshop'); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); // Reset the main query ?>
        </main>
        <?php get_sidebar(); // Hiển thị sidebar ?>
    </div>
</div>

<?php get_footer(); ?> 