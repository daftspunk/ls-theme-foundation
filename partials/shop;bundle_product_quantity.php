<div class="bundle_item_quantity_controls">
  <? if ($item_product->allow_manual_quantity): ?>
    <table class="add_to_cart_controls">
      <tbody>
        <tr>
          <td>
            <span class="product_price"><?= format_currency($item_product->get_price($product)) ?></span>
          </td>
          <td class="x">x</td>
          <td class="qty_controls">
            <div>
              <input
                class="text"
                type="text"
                name="<?= Shop_BundleHelper::get_product_control_name($item, $item_product, 'quantity') ?>"
                value="<?= Shop_BundleHelper::get_product_quantity($item, $item_product) ?>"/>

              <a href="#" class="arrow up">Up</a>
              <a href="#" class="arrow down">Down</a>
            </div>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">Price</td>
          <td colspan="2">Quantity</td>
        </tr>
      </tfoot>
    </table>
  <? else: ?>
    <span class="product_price"><?= format_currency($item_product->get_price($product)) ?></span>
  <? endif ?>

  <input type="hidden" value="<?= $item_product->get_price($product) ?>" class="bundle_item_price"/>
  <!-- This hidden is used by the optional JavaScript-based product price calculator -->
</div>​