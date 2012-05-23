<div class="shipping_options">
    <? if (isset($shipping_options)): ?>
      <? if (count($shipping_options)): ?>
        <table>
          <? foreach ($shipping_options as $option): ?>
            <? if ($option->multi_option): ?>
              <? foreach ($option->sub_options as $sub_option): ?>
                  <tr class="<?= zebra('shipping_options') ?>">
                    <td><?= h($option->name) ?> - <?= h($sub_option->name) ?></td>
                    <td class="align_right"><?= !$sub_option->is_free ? format_currency($sub_option->quote) : 'free' ?></td>
                  </tr>
              <? endforeach ?>
            <? else: ?>
              <tr class="<?= zebra('shipping_options') ?>">
                <td><?= h($option->name) ?></td>
                <td class="align_right"><?= !$option->is_free ? format_currency($option->quote) : 'free' ?></td>
              </tr>
            <? endif ?>
          <? endforeach ?>
        </table>
      <? else: ?>
        <p>There are no shipping options available for your location.</p>
      <? endif ?>
    <? endif ?>
</div>