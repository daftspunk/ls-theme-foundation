<h5>Select your <?= h(mb_strtolower($product->grouped_menu_label)) ?></h5>
<input type="hidden" value="<?= $product->id ?>" name="product_id"/>
<table class="grouped_selector">
  <thead>
    <tr>
      <th class="first"><?= h($product->grouped_menu_label) ?></th>
      <th class="number">Price</th>
      <th class="last number">Stock</th>
    </tr>
  </thead>
  <tbody>
    <? 
      $current_product_id = null;
      foreach ($product->grouped_products as $grouped_product): 
        $current_product_id = $current_product_id ? $current_product_id : post('product_id', $grouped_product->id);
        $is_current = $current_product_id == $grouped_product->id;
        
        $click_handler = "return $(this).getForm().sendRequest('on_action', {onAfterUpdate: init_effects, update: {'product_page': 'shop:product_partial'}, extraFields: {'product_id': '".$grouped_product->id."'}})";
    ?>
      <tr onclick="<?= $click_handler ?>" class="<?= $is_current ? 'current' : null ?> <?= zebra('grouped') ?>">
        <th>
          <a onclick="<?= $click_handler ?>" href="#">
            <?= h($grouped_product->grouped_option_desc) ?>
            <? if ($is_current): ?><span class="marker">&nbsp;</span><? endif ?>
          </a>
        </th>
        <td class="number"><a onclick="<?= $click_handler ?>" href="#"><?= format_currency($grouped_product->get_discounted_price()) ?></a></td>
        <td class="number"><a onclick="<?= $click_handler ?>" href="#"><?= $grouped_product->in_stock ?></a></td>
      </tr>
    <? endforeach ?>
  </tbody>
</table>