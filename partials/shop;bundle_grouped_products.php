<?
  if ($product && $product->grouped_products->count):
?>
  <tr>
    <td><?= h($product->grouped_menu_label) ?>:</td>
    <td>
      <select
        name="<?= Shop_BundleHelper::get_product_control_name($item, $item_product, 'grouped_product') ?>"
        onchange="$(this).getForm().sendRequest('on_action', {update: {'product_bundle_items': 'shop:bundle'}, onAfterUpdate: init_effects})">
        <? foreach ($product->grouped_products as $cur_grouped_product): ?>
          <option <?= option_state($product->id, $cur_grouped_product->id) ?> value="<?= $cur_grouped_product->id ?>">
            <?= h($cur_grouped_product->grouped_option_desc) ?>
          </option>
        <? endforeach ?>
      </select>
    </td>
  </tr>
<? endif ?>​