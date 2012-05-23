<? if ($order->payment_method->has_payment_form()): ?>
  <div class="payment_form">
    <? $payment_method->render_payment_form($this) ?>
  </div>
<? else: ?>
  <? if ($message = $payment_method->pay_offline_message()): ?>
    <p><?= h($message) ?></p>    
  <? else: ?>
    <p>Payment method "<?= h($payment_method->name) ?>" has no payment form. Please pay and notify us.</p>    
  <? endif ?>
  <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
<? endif ?>
