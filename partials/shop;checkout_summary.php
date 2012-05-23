<ul class="receipt_data totals">
  <li class="clearfix">
    <dl class="float_left">
      <dt>Subtotal</dt>
      <dd><?= format_currency($cart_total) ?></dd>
    </dl>
    
    <? if ($discount): ?>
      <dl class="float_right">
        <dt>Applied discount</dt>
        <dd class="align_right light"><?= format_currency($discount) ?></dd>
      </dl>
    <? endif?>
  </li>
  <li>
    <dl>
      <dt>Tax</dt>
      <dd><?= format_currency($estimated_tax) ?></dd>
    </dl>
  </li>
  <li class="last">
    <dl>
      <dt>Estimated total</dt>
      <dd><span class="product_price"><?= format_currency($estimated_total) ?></span></dd>
    </dl>
  </li>
</ul>

<ul class="receipt_data">
<? 
  $bill_info_str = $billing_info->as_string();
  $ship_info_str = $shipping_info->as_string();
  
  $address_matches = $billing_info->equals($shipping_info);
  if ($bill_info_str):
?>
  <li>
    <dl>
      <dt><? if (!$address_matches): ?>Bill to<? else: ?>Bill and ship to<? endif ?></dt>
      <dd><?= h($bill_info_str) ?></dd>
    </dl>
  </li>
<? endif ?>

<? if ($ship_info_str && !$address_matches): ?>
  <li>
    <dl>
      <dt>Ship to</dt>
      <dd><?= h($ship_info_str) ?></dd>
    </dl>
  </li>
<? endif ?>

<? if ($shipping_method->id): ?>
  <li>
    <dl>
      <dt>Shipping method</dt>
      <dd><?= h($shipping_method->name) ?></dd>
    </dl>
  </li>
<? endif ?>

<? if ($payment_method->id): ?>
  <li>
    <dl>
      <dt>Payment method</dt>
      <dd><?= h($payment_method->name) ?></dd>
    </dl>
  </li>
<? endif ?>
</ul>