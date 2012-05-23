<div class="row">
  <div class="three columns product_image">
    <? if ($product->is_discounted()):  ?>
      <span class="on_sale">On sale!</span>
    <? endif ?>
    <? $this->render_partial('shop:product_images') ?>
  </div>
  <div class="nine columns">
    <p class="light"><?= h($product->short_description) ?></p>
    <? $this->render_partial('shop:product_attributes') ?>
    <? if ($product->rating_all):  ?>
      <p class="rating_info clearfix">Customer rating: <span class="rating_<?= $product->rating_all*10 ?>">based on <?= $product->rating_all_review_num ?> reviews</span></p>
    <? endif ?>

    <?= flash_message() ?>

    <?= open_form() ?>
      <div class="row">
        <div class="<?= $product->grouped_products->count ? 'six columns' : 'twelve columns' ?>">
          <?= $product->description ?>

          <? if (!$product->is_out_of_stock() || $product->allow_pre_order): ?>
            <? $this->render_partial('shop:product_options') ?>
            <? $this->render_partial('shop:product_extra_options') ?>

            <? if (!$product->bundle_items->count): ?>
              <? $this->render_partial('shop:product_add_to_cart_controls') ?>
            <? endif ?>
          <? else: ?>
            <p>This product is temporarily unavailable.
              <? if ($product->expected_availability_date): ?>
                The expected availability date is <strong><?= $product->displayField('expected_availability_date') ?></strong>
              <? endif ?>
            </p>
          <? endif ?>
        </div>

        <? if ($product->grouped_products->count): ?>
          <div class="six columns">
            <? $this->render_partial('shop:grouped_products') ?>
          </div>
        <? endif ?>

        <? if ($product->bundle_items->count): ?>
        </div>
        <div class="row">
          <div class="twelve columns">
            <div id="product_bundle_items"><? $this->render_partial('shop:bundle') ?></div>
            <? $this->render_partial('shop:product_add_to_cart_controls') ?>
          </div>
        <? endif ?>
      </div>
    </form>

    <div class="clear"></div>

    <? $this->render_partial('shop:product_reviews') ?>
    <? $this->render_partial('shop:add_review_form') ?>
  </div>​
</div>