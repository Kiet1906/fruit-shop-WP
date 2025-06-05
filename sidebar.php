<aside class="sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else: ?>
        <div class="widget">
            <h2 class="widget-title">Sản phẩm nổi bật</h2>
            <ul>
                <?php
                $hot_products = get_posts(array('post_type'=>'product','numberposts'=>5,'orderby'=>'comment_count'));
                foreach ($hot_products as $post) : setup_postdata($post); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endforeach; wp_reset_postdata(); ?>
            </ul>
        </div>
        <div class="widget">
            <h2 class="widget-title">Danh mục</h2>
            <ul>
                <?php wp_list_categories(array('taxonomy'=>'category','title_li'=>'','show_count'=>true)); ?>
            </ul>
        </div>
        <div class="widget">
            <h2 class="widget-title">Tìm kiếm</h2>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</aside> 