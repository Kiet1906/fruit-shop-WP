<?php get_header(); ?>

<div class="container">
    <div class="site-content">
        <main class="main-content">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title" style="color:#5cb85c;"><?php the_title(); ?></h1>
                    </header>
                    <div class="entry-content" style="margin-top:16px;">
                        <?php the_content(); // Dòng này sẽ hiển thị toàn bộ nội dung block ?>
                    </div>
                    
                    <?php
                        // Hiển thị comment form và danh sách comment nếu cần
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                </article>
            <?php endwhile; ?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 