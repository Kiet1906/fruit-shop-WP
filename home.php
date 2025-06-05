<?php
/**
 * The template for displaying the blog posts index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fruit_Shop
 */

get_header();
?>

<div class="container">
    <div class="site-content">
        <main class="main-content">
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>

            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    
                    // Hiển thị nội dung bài viết (có thể dùng get_template_part để tách ra)
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid #eee;">
                        <header class="entry-header">
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </header>

                        <div class="entry-content">
                            <?php the_excerpt(); // Hoặc the_content(); ?>
                        </div>

                        <footer class="entry-footer">
                            <?php printf( esc_html__( 'Posted on %s', 'fruitshop' ), '<a href="' . esc_url( get_permalink() ) . '">' . get_the_date() . '</a>' ); ?>
                        </footer>
                    </article>
                    <?php

                endwhile;

                the_posts_navigation(); // Hiển thị phân trang

            else :
                // Nếu không có bài viết nào
                ?>
                <p><?php esc_html_e( 'No posts found.', 'fruitshop' ); ?></p>
                <?php

            endif;
            ?>
        </main>
        <?php get_sidebar(); // Hiển thị sidebar ?>
    </div>
</div>

<?php
get_footer(); 