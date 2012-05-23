<? if ($item_product && $product): ?>
  <div class="product_parameters">
    <div class="row">
      <div class="two columns">
        <? if ($product->images->count): ?>
          <a title="<?= h($product->images->first->title) ?>" class="gallery_image" rel="product_image" href="<?= $product->images->first->getThumbnailPath(500, 'auto') ?>"><img src="<?= $product->images->first->getThumbnailPath(50, 'auto') ?>" alt="" /></a>
        <? endif ?>
      </div>
      <div class="nine columns end">
        <?
          if ($product && ($product->grouped_products->count || $product->options->count)):
        ?>
          <table class="product_attributes">
            <?
              $this->render_partial('shop:bundle_grouped_products', array('product'=>$product, 'item'=>$item, 'item_product'=>$item_product));
              $this->render_partial('shop:bundle_product_options', array('product'=>$product, 'item'=>$item, 'item_product'=>$item_product));
            ?>
          </table>
        <? endif ?>
        <?
          $this->render_partial('shop:bundle_product_extras', array('product'=>$product, 'item'=>$item, 'item_product'=>$item_product));
          $this->render_partial('shop:bundle_product_quantity', array('product'=>$product, 'item'=>$item, 'item_product'=>$item_product));
        ?>
      </div>
    </div>
  </div>
<? endif ?>​