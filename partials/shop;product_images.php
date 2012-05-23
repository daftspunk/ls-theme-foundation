<? if ($product->images->count): ?>
  <ul class="product_images <? if ($product->images->count > 1): ?>carousel<? endif ?> jcarousel-skin-custom">
    <? foreach ($product->images as $image): ?>
      <li><a title="<?= h($image->title) ?>" class="gallery_image" rel="product_image" href="<?= $image->getThumbnailPath(500, 'auto') ?>"><img src="<?= $image->getThumbnailPath(220, 'auto') ?>" alt="" width="220"/></a></li>
    <? endforeach ?>
  </ul>
  <? if ($product->images->count > 1): ?>
    <div class="image_controls">
      <div class="prev_image" id="carousel_prev">Previous</div>
      <div class="image_index">Image <span id="image_index">1</span> of <?= $product->images->count ?></div>
      <div class="next_image" id="carousel_next">Next</div>
    </div>
  <? endif  ?>
<? endif ?>