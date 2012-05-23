<div class="grid_16">
  <? if (!$order): ?>
    <p>Order not found</p>
    <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
  <? else: ?>
    <h3>Order # <?= $order->id ?></h3>
    <p class="header_description">Placed on <?= h($order->order_datetime->format('%x')) ?></p>

    <? $this->render_partial('shop:order_details', array('order'=>$order, 'items'=>$items)) ?>

    <div class="grid_8 alpha">
      <p>
        <a class="link_button" href="<?= root_url('store/orders') ?>">Return to the order list</a>
      </p>
    </div>
    <div class="grid_8 omega">
      <? if($order->payment_method->has_payment_form() && !$order->payment_processed()): ?>
        <p class="align_right">
            This order is not paid
            <a class="button_control offset_left" href="<?= root_url('store/pay/'.$order->order_hash) ?>">Pay now</a>
          </p>
      <? endif ?>
    </div>
  <? endif ?>
</div>