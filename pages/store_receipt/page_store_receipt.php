<div class="grid_16" id="cart_page">
  <? if (!$order): ?>
    <p>Order not found</p>
  <? else: ?>
    <h3>Order # <?= $order->id ?></h3>
    <p class="header_description">Placed on <?= h($order->order_datetime->format('%x')) ?></p>
    
    <? if ($payment_processed): ?>
      <p>This order is PAID now. Thank you!</p>
    <? else:?>
      <p>This order is NOT PAID.</p>
    <? endif ?>
    
    <? $this->render_partial('shop:order_details', array('order'=>$order, 'items'=>$items)) ?>

    <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
  <? endif ?>
</div>