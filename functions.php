<?php
// Kích hoạt các tính năng cơ bản của theme
function fruitshop_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption'));
    register_nav_menus(array(
        'main-menu' => __('Menu chính', 'fruitshop')
    ));
}
add_action('after_setup_theme', 'fruitshop_theme_setup');

// Đăng ký sidebar
function fruitshop_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar chính', 'fruitshop'),
        'id'            => 'sidebar-1',
        'description'   => __('Thêm widget vào đây.', 'fruitshop'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'fruitshop_widgets_init');

// Đăng ký custom post type Product
function fruitshop_register_product_cpt() {
    $labels = array(
        'name' => 'Sản phẩm',
        'singular_name' => 'Sản phẩm',
        'add_new' => 'Thêm sản phẩm',
        'add_new_item' => 'Thêm sản phẩm mới',
        'edit_item' => 'Sửa sản phẩm',
        'new_item' => 'Sản phẩm mới',
        'view_item' => 'Xem sản phẩm',
        'search_items' => 'Tìm sản phẩm',
        'not_found' => 'Không tìm thấy sản phẩm',
        'not_found_in_trash' => 'Không có sản phẩm nào trong thùng rác',
        'menu_name' => 'Sản phẩm',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'san-pham'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-carrot',
    );
    register_post_type('product', $args);
}
add_action('init', 'fruitshop_register_product_cpt');

// Đăng ký block ACF
add_action('acf/init', 'fruitshop_register_acf_blocks');
function fruitshop_register_acf_blocks() {
    if( function_exists('acf_register_block_type') ) {
        // Block Khuyến mãi trái cây
        acf_register_block_type(array(
            'name'              => 'fruit-promo',
            'title'             => __('Khuyến mãi trái cây', 'fruitshop'),
            'description'       => __('Block hiển thị khuyến mãi trái cây.', 'fruitshop'),
            'render_template'   => 'acf-blocks/fruit-promo.php',
            'category'          => 'formatting',
            'icon'              => 'megaphone',
            'keywords'          => array( 'fruit', 'promo', 'khuyến mãi' ),
            'mode'              => 'preview',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'promo_title' => 'Khuyến mãi đặc biệt!',
                        'promo_desc' => 'Giảm giá 50% cho tất cả trái cây nhập khẩu',
                        'promo_button_text' => 'Mua ngay',
                        'promo_button_link' => '#'
                    )
                )
            )
        ));

        // Block Sản phẩm nổi bật
        acf_register_block_type(array(
            'name'              => 'featured-product',
            'title'             => __('Sản phẩm nổi bật', 'fruitshop'),
            'description'       => __('Block hiển thị sản phẩm nổi bật.', 'fruitshop'),
            'render_template'   => 'acf-blocks/featured-product.php',
            'category'          => 'formatting',
            'icon'              => 'star-filled',
            'keywords'          => array( 'product', 'featured', 'sản phẩm', 'nổi bật' ),
            'mode'              => 'preview',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'custom_title' => 'Sản phẩm nổi bật',
                        'custom_description' => 'Mô tả sản phẩm nổi bật của bạn',
                        'button_text' => 'Xem chi tiết',
                        'button_link' => '#'
                    )
                )
            )
        ));
    }
}

// Đăng ký ACF fields từ file JSON
add_filter('acf/settings/save_json', 'fruitshop_acf_json_save_point');
function fruitshop_acf_json_save_point($path) {
    return get_stylesheet_directory() . '/acf-blocks';
}

add_filter('acf/settings/load_json', 'fruitshop_acf_json_load_point');
function fruitshop_acf_json_load_point($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-blocks';
    return $paths;
} 