<div class="grid_16">
  <? if (!$orders || !$orders->count): ?>
    <p>Orders not found</p>
    <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
  <? else: ?>
    <table class="data_table">
      <thead>
        <tr>
          <th>#</th>
          <th>Date</th>
          <th>Status</th>
          <th class="right last">Total</th>
        </tr>
      </thead>
      <tbody>
        <? foreach ($orders as $order):
          $url = root_url('/store/order/'.$order->id);
        ?>
        <tr class="<?= zebra('order') ?>">
          <td><a href="<?= $url ?>"><?= $order->id ?></a></td>
          <td><a href="<?= $url ?>"><?= $order->order_datetime->format('%x') ?></a></td>
          <td><a href="<?= $url ?>"><strong><?= h($order->status->name) ?></strong> since <?= $order->status_update_datetime->format('%x') ?></a></td>
          <td class="total right last"><a href="<?= $url ?>"><?= format_currency($order->total) ?></a></td>
        </tr>
        <? endforeach ?>
      </tbody>
    </table>
  <? endif ?>
</div>