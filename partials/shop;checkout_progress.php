<?
  $steps = array(
    'billing_info' => 'Billing Information',
    'shipping_info' => 'Shipping Information',
    'shipping_method' => 'Shipping Method',
    'review' => 'Review<br/>and Pay'
  );

  if (!$shipping_required)
    unset($steps['shipping_method']);
?>

<div class="checkout_progress">
  <ul class="clearfix">
  <?
    $current_found = false;
    $index = 0;
    foreach ($steps as $step=>$name):
      $is_current = $checkout_step == $step;
      $current_found = $current_found || $is_current;
      $index++;
  ?>
    <li <? if (!$current_found || $is_current): ?>class="active"<? endif ?>>
      <span class="num"><?= $index ?></span>

      <span class="name">
        <? if ($current_found): ?>
          <?= $name ?>
        <? else: ?>
          <a href="javascript:;" onclick="return $(this).getForm().sendRequest('on_action', {update:{'checkout_page': 'shop:checkout_partial'}, extraFields: {'move_to': '<?= $step ?>'}})"><?= h($name) ?></a>
        <? endif ?>
      </span>
    </li>
  <?
    endforeach
  ?>
  </ul>
</div>

<div class="clearfix"></div>