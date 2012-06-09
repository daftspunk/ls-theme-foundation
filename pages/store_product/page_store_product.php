<div class="row">
  <div class="twelve columns">
    <? if ($product_unavailable): ?>
      <h2>Product unavailable</h2>
      <p>We are sorry, the product is unavailable.</p>
      <p><a class="link_button" href="<?= root_url('store')?>">Return to the Store</a></p>
    <? elseif(!$product): ?>
      <h2>Product not found</h2>
      <p>We are sorry, the specified product cannot be found.</p>
      <p><a class="link_button" href="<?= root_url('store')?>">Return to the Store</a></p>
    <? else: ?>
      <div id="product_page"><? $this->render_partial('shop:product_partial') ?></div>
    <? endif ?>
  </div>
</div>