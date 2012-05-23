<?
  if ($product->extra_options->count):
?>
  <div class="extra_options">
    <table class="product_attributes">
      <? foreach ($product->extra_options as $option):
        $control_name = 'product_extra_options['.$option->option_key.']';
        $posted_options = post('product_extra_options', array());
        $is_checked = isset($posted_options[$option->option_key]);
      ?>
      <tr>
        <td>
          <input name="<?= $control_name ?>" <?= checkbox_state($is_checked) ?> id="extra_option_<?= $option->id ?>" value="1" type="checkbox" class="extra_option_cb"/>
          <input type="hidden" value="<?= $option->get_price($product) ?>" class="extra_option_price"/>
          <!-- This hidden is used by the optional JavaScript-based product price calculator -->
        </td>
        <td>
          <label for="extra_option_<?= $option->id ?>"><?= h($option->description) ?>:</label>

          <? if ($option->price > 0): ?>
            <span class="price">+ <?= format_currency($option->get_price($product)) ?></span>
          <? else: ?>
            <span class="price">free</span>
          <? endif ?>
        </td>
      </tr>
      <? endforeach ?>
    </table>
  </div>
<? endif ?>
