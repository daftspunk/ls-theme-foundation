<?= flash_message() ?>

<?
  $items = Shop_Cart::list_active_items();
  $item_num = count($items);
  if ($item_num):
    $last_index = count($items)-1;
?>
  <?= open_form() ?>
    <table class="data_table products">
      <thead>
        <tr>
          <th class="align_left">Product</th>
          <th class="align_right">Price</th>
          <th class="align_right">Discount</th>
          <th class="align_right">Quantity</th>
          <th class="align_right last">Total</th>
          <th class="controls">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?
          foreach ($items as $index=>$item):
          $bundle_item = $item->get_bundle_item();
          $bundle_item_product = $item->get_bundle_item_product();

          $image_url = $item->product->image_url(0, $bundle_item ? 40 : 70, 'auto'); // Make smaller images for bundle items
          $options_str = $item->options_str();
        ?>
          <tr class="<?= $index == $item_num-1 ? 'last' : null ?>">
            <td class="qty_shift">
              <div class="<?= $bundle_item ? 'bundle_item' : null ?>">
                <? if ($image_url): ?><img align="float_left" class="product_image" src="<?= $image_url ?>" alt="<?= h($item->product->name) ?>"/><? endif ?>
                <div class="product_description">
                  <strong><?= h($item->product->name) ?></strong>
                  <? if (strlen($options_str)): ?><br/><?= h($options_str) ?><? endif ?>
                  <? foreach ($item->extra_options as $option): ?>
                    <br/> + <?= h($option->description) ?>
                  <? endforeach ?>
                </div>
              </div>
            </td>
            <td class="align_right qty_shift"><?= format_currency($item->single_price()) ?></td>
            <td class="align_right qty_shift"><?= format_currency($item->discount()) ?></td>
            <td <? if (!$bundle_item_product || $bundle_item_product->allow_manual_quantity): ?>class="align_right qty_controls"<? else: ?>class="right qty_shift"<? endif ?>>
              <? if (!$bundle_item_product || $bundle_item_product->allow_manual_quantity): ?>
                <div>
                  <input type="text" name="item_quantity[<?= $item->key ?>]" class="text" value="<?= $item->get_quantity() ?>" onkeydown="if ((event.keyCode ? event.keyCode : event.which) == 13) $(this).getForm().sendRequest('on_action', {onAfterUpdate: init_effects, update: {'cart_page': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}})"/>
                  <a href="#" class="arrow up">Up</a>
                  <a href="#" class="arrow down">Down</a>
                </div>
              <? else: ?>
                <?= $item->get_quantity() ?>
              <? endif ?>
            </td>
            <td class="align_right last qty_shift total">
              <? if (!$item->is_bundle_item()): ?>
                <?= format_currency($item->total_price()) ?>
              <? else:
                $master_item = $item->get_master_bundle_item();
                $multiplier = ($master_item && $master_item->quantity > 1) ? ' x '.$master_item->quantity : null;
              ?>
                <?= format_currency($item->bundle_item_total_price()).$multiplier ?>
              <? endif  ?>
            </td>
            <td class="qty_shift controls">
              <? if (!$bundle_item || !$bundle_item->is_required): ?>
                <a href="#" onclick="return $(this).getForm().sendRequest('shop:on_deleteCartItem', {onAfterUpdate: init_effects, update: {'cart_page': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}, confirm: 'Do you really want to remove this item from cart?', extraFields: {key: '<?= $item->key ?>'}})" class="delete_row" title="Remove">Remove</a>
              <? endif ?>
            </td>
          </tr>

          <?
            if (($bundle_item && $index == $last_index) || ($bundle_item && $bundle_item->id && !$items[$index+1]->get_bundle_item())):
              $master_item = $item->get_master_bundle_item();
              if ($master_item):
          ?>
              <tr class="bundle_totals">
                <td class="qty_shift"><?= h($master_item->product->name) ?> bundle totals</td>
                <td class="align_right qty_shift"><?= format_currency($master_item->bundle_single_price()) ?></td>
                <td class="align_right qty_shift"><?= format_currency($master_item->bundle_total_discount()) ?></td>
                <td class="align_right qty_shift"><?= $master_item->quantity ?></td>
                <td class="align_right qty_shift last"><?= format_currency($master_item->bundle_total_price()) ?></td>
                <td class="qty_shift controls"></td>
              </tr>
          <?
              endif;
            endif ?>

        <? endforeach ?>
      </tbody>
      <tfoot>
          <tr>
              <td colspan="4" class="align_right">SUBTOTAL</td>
              <td colspan="2" class="align_right"><span class="product_price" style="padding-right:25px"><?= format_currency($estimated_total) ?></span></td>
          </tr>
      </tfoot>
    </table>

    <div class="row">
      <div class="six columns">
        <? $this->render_partial('shop:shipping_cost_estimator') ?>
      </div>

      <div class="six columns clearfix offset_bottom align_right">
        <p class="coupon_label offset_right">Do you have a coupon?</p>
        <input type="text" value="<?= h($coupon_code) ?>" placeholder="COUPON" class="text offset_right_2 button_height coupon" name="coupon" onkeydown="if ((event.keyCode ? event.keyCode : event.which) == 13) $(this).getForm().sendRequest('on_action', {onAfterUpdate: init_effects, update: {'cart_page': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}})"/>

        <a href="#" class="nice button offset_right" onclick="return $(this).getForm().sendRequest('on_action', {onAfterUpdate: init_effects, update: {'cart_page': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}})">Apply changes</a>
        <a href="<?= root_url('/store/checkout-start') ?>" class="nice large red button radius" onclick="return $(this).getForm().sendRequest('shop:on_setCouponCode')">Check out</a>
        <input type="hidden" name="redirect" value="<?= root_url('/store/checkout-start') ?>"/>
      </div>
    </div>
  </form>
<? else: ?>
  <p>Your cart is empty.</p>
  <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
<? endif ?>