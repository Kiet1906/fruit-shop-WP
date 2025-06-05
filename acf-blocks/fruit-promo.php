<?php
/**
 * Fruit Promo Block Template.
 */

// Tạo ID duy nhất cho block
$id = 'fruit-promo-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Lấy các trường ACF
$title = get_field('promo_title');
$desc = get_field('promo_desc');
$img = get_field('promo_image');
$link = get_field('promo_button_link');
$text = get_field('promo_button_text');
?>

<section id="<?php echo esc_attr($id); ?>" class="fruit-promo-block" style="background:#f8ffae;border-radius:12px;padding:32px 20px;text-align:center;margin:32px auto;max-width:800px;">
    <?php if ($title): ?>
        <h3 style="color:#5cb85c;font-size:1.8em;margin-bottom:12px;"><?php echo esc_html($title); ?></h3>
    <?php endif; ?>
    <?php if ($desc): ?>
        <p style="font-size:1.1em;color:#222;margin-bottom:20px;"><?php echo esc_html($desc); ?></p>
    <?php endif; ?>
    <?php if ($img): ?>
        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" style="max-width:100%;height:auto;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.08);" />
    <?php endif; ?>
    <?php if ($link && $text): ?>
         <p style="margin-top:20px;"><a href="<?php echo esc_url($link); ?>" class="btn-buy" style="display: inline-block; background: #f39c12; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;"><?php echo esc_html($text); ?></a></p>
    <?php endif; ?>
</section> 