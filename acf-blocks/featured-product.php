<?php
/**
 * Featured Product Block Template.
 */

// Tạo ID duy nhất cho block
$id = 'featured-product-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Lấy các trường ACF
$product = get_field('featured_product');
$title = get_field('custom_title');
$description = get_field('custom_description');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
?>

<section id="<?php echo esc_attr($id); ?>" class="featured-product-block" style="background: #fff; border-radius: 12px; padding: 32px; margin: 32px auto; max-width: 1000px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
    <div class="featured-product-content" style="display: flex; gap: 32px; align-items: center;">
        <?php if ($product): ?>
            <div class="featured-product-image" style="flex: 0 0 40%;">
                <?php if (has_post_thumbnail($product->ID)): ?>
                    <?php echo get_the_post_thumbnail($product->ID, 'large', array('style' => 'width: 100%; height: auto; border-radius: 8px;')); ?>
                <?php endif; ?>
            </div>
            <div class="featured-product-info" style="flex: 1;">
                <h2 style="color: #2c3e50; font-size: 2em; margin-bottom: 16px;">
                    <?php echo $title ? esc_html($title) : esc_html($product->post_title); ?>
                </h2>
                <div class="product-description" style="color: #666; font-size: 1.1em; margin-bottom: 24px;">
                    <?php echo $description ? wp_kses_post($description) : wp_kses_post($product->post_excerpt); ?>
                </div>
                <?php if ($button_text && $button_link): ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="btn-view-product" style="display: inline-block; background: #27ae60; color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: bold; transition: background 0.3s;">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p style="text-align: center; width: 100%; color: #666;">Vui lòng chọn một sản phẩm nổi bật</p>
        <?php endif; ?>
    </div>
</section> 