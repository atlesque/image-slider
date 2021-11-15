<?php

/**
 * Flickity Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flickity-' . $block['id'];

if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'flickity';

if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

$title         = get_field('title');
$images        = get_field('images');
$cellalign     = get_field('cellalign');
$wraparound    = get_field('mode');
$image_width   = get_field('image_width') ?: '25%';
$gap           = get_field('gap') ?: '10px';
$show_buttons  = get_field('show_buttons');
$show_dots     = get_field('show_dots');

$size = 'flickity_image'; // (thumbnail, medium, large, full or custom size)

?>
<section id="<?php echo esc_attr($id); ?>" class="flickity-outer-wrapper <?php echo esc_attr($className); ?>">
  <?php
  if ($images) {
  ?>
    <span class="flickity-title"><?= esc_attr($title) ?></span>
    <div class="flickity-container" data-flickity='{
      "imagesLoaded": true,
			"groupCells": true,
      "freeScroll": true,
      "cellAlign": "<?= esc_attr($cellalign) ?>",
      "wrapAround": <?= esc_attr($wraparound) ?>,
      "prevNextButtons": <?= esc_attr($show_buttons) ?>,
      "pageDots": <?= esc_attr($show_dots) ?>
    }'>
      <?php
      foreach ($images as $image) {
        /* printf(
          '<img src="%s" alt="%s" width="%s" height="%s" style="margin-right: %s;">',
          esc_attr(wp_get_attachment_image_url($image['ID'], $size)),
          esc_attr($image['alt']),
          esc_attr($image_width),
          $image['sizes'][$size . '-height'],
          esc_attr($gap),
        ); */
      ?>
        <img class="flickity-image" src="<?= wp_get_attachment_image_url($image['ID'], $size) ?>">
      <?php
      }
      ?>
    </div>
  <?php
  } else {
    echo 'No images found. Add/select some by clicking on the "Add to gallery" button.';
  }
  ?>
</section>