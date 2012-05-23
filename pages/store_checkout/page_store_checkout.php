<div id="cart_page">
  <? if (Shop_Cart::get_item_total_num() != 0): ?>
    <div id="checkout_page">
      <? $this->render_partial('shop:checkout_partial') ?>
    </div>
  <? else: ?>
    <p>Your cart is empty.</p>
    <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
  <? endif ?>
</div>