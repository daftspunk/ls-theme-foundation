<table class="add_to_cart_controls">
  <tbody>
    <tr>
      <td>
        <span class="product_price" id="product_price"><?= format_currency($product->get_discounted_price()) ?></span>
        <input type="hidden" value="<?= $product->get_discounted_price() ?>" id="base_product_price"/>
        <!-- This hidden is used by the optional JavaScript-based product price calculator -->
      </td>
      <td class="x">x</td>
      <td class="qty_controls">
        <div>
          <input type="text" name="product_cart_quantity" class="text" value="<?= post('product_cart_quantity', 1) ?>"/>
          <a href="#" class="arrow up">Up</a>
          <a href="#" class="arrow down">Down</a>
        </div>
      </td>
      <td><a href="#" class="nice button radius" onclick="return $(this).getForm().sendRequest('shop:on_addToCart', {onAfterUpdate: init_effects, update: {'mini_cart': 'shop:mini_cart', 'product_page': 'shop:product_partial'}})">Add to cart</a></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2">Price</td>
      <td colspan="2">Quantity</td>
    </tr>
  </tfoot>
</table>
<? if ($product->is_discounted()): ?>
  <p>This product is on sale! Original price: <span class="original_price"><?= format_currency($product->price()) ?></span></p>
<? endif ?>