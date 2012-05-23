<?
  if ($product->properties->count):
?>
  <table class="product_attributes">
    <? foreach ($product->properties as $attribute): ?>
    <tr>
      <td><?= h($attribute->name) ?>:</td>
      <td><?= h($attribute->value) ?></td>
    </tr>
    <? endforeach ?>
  </table>
<? endif ?>