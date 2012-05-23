<? if ($item->control_type == 'dropdown'):
  $selected_item_product = Shop_BundleHelper::get_bundle_item_product_item($item);
  $selected_product = Shop_BundleHelper::get_bundle_item_product($item, $selected_item_product);
?>
  <select
    name="<?= Shop_BundleHelper::get_product_selector_name($item, $selected_item_product) ?>"
    onchange="$(this).getForm().sendRequest('on_action', {update: {'product_bundle_items': 'shop:bundle'}, onAfterUpdate: init_effects})">

    <? if (!$item->is_required): ?>
      <option value="">&lt;please select&gt;</option>
    <? endif ?>

    <? foreach ($item->item_products as $item_product): ?>
      <option
        value="<?= Shop_BundleHelper::get_product_selector_value($item_product) ?>"
        <?= option_state(Shop_BundleHelper::is_item_product_selected($item, $item_product), true) ?>>
          <?= h($item_product->product->name) ?>
      </option>
    <? endforeach ?>
  </select>

  <? $this->render_partial('shop:bundle_product_parameters', array('product'=>$selected_product, 'item_product'=>$selected_item_product, 'item'=>$item)) ?>

  <?= Shop_BundleHelper::get_item_hidden_fields($item, $selected_item_product) ?>
<? elseif ($item->control_type == 'checkbox'): ?>
<ul>
  <?
    foreach ($item->item_products as $item_product):
      $selected_product = Shop_BundleHelper::get_bundle_item_product($item, $item_product);
      $is_selected = Shop_BundleHelper::is_item_product_selected($item, $item_product);
  ?>
  <li>
    <label>
      <input class="bundle_product_selector" type="checkbox" name="<?= Shop_BundleHelper::get_product_selector_name($item, $item_product) ?>" value="<?= Shop_BundleHelper::get_product_selector_value($item_product) ?>" <?= checkbox_state($is_selected) ?>/>
      <?= h($item_product->product->name) ?>
    </label>

      <div class="bundle_product_parameters <?= $is_selected ? null : 'hidden' ?>">
        <? $this->render_partial('shop:bundle_product_parameters', array('product'=>$selected_product, 'item_product'=>$item_product, 'item'=>$item)) ?>
      </div>
  </li>
  <? endforeach ?>
</ul>
<? else: ?>
  <ul>
    <? if (!$item->is_required): ?>
      <li>
        <label>
          <input class="bundle_product_selector" type="radio" name="<?= Shop_BundleHelper::get_product_selector_name($item,null) ?>" value="" checked="checked"/>
          No, thank you.
        </label>
      </li>
    <? endif ?>
    <?
      foreach ($item->item_products as $item_product):
        $selected_product = Shop_BundleHelper::get_bundle_item_product($item, $item_product);
        $is_selected = Shop_BundleHelper::is_item_product_selected($item, $item_product);
    ?>
      <li>
        <label>
          <input class="bundle_product_selector" type="radio" name="<?= Shop_BundleHelper::get_product_selector_name($item, $selected_product) ?>" value="<?= Shop_BundleHelper::get_product_selector_value($item_product) ?>" <?= radio_state($is_selected) ?>/>
          <?= h($item_product->product->name) ?>
        </label>

        <div class="bundle_product_parameters <?= $is_selected ? null : 'hidden' ?>">
          <? $this->render_partial('shop:bundle_product_parameters', array('product'=>$selected_product, 'item_product'=>$item_product, 'item'=>$item)) ?>
        </div>
      </li>
    <? endforeach ?>
  </ul>
<? endif ?>​