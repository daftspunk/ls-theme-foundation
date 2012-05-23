<?
  if ($product->options->count):
?>
  <table class="product_attributes">
    <? foreach ($product->options as $option):
      $control_name = 'product_options['.$option->option_key.']';
      $posted_options = post('product_options', array());
      $posted_value = isset($posted_options[$option->option_key]) ? $posted_options[$option->option_key] : null;
    ?>
    <tr>
      <th class="label"><?= h($option->name) ?>:</th>
      <td>
        <select name="<?= $control_name ?>">
          <?
          $values = $option->list_values();
          foreach ($values as $value):
          ?>
          <option <?= option_state($posted_value, $value) ?> value="<?= h($value) ?>"><?= h($value) ?></option>
          <? endforeach ?>
        </select>
      </td>
    </tr>
    <? endforeach ?>
  </table>
<? endif ?>