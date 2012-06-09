<div class="row">
  <div class="twelve columns" id="cart_page">
    <? if (!$order): ?>
      <p>Order not found.</p>
    <? else: ?>
      <h3>Order # <?= $order->id ?></h3>

      <? $this->render_partial('shop:order_details', array('order'=>$order, 'items'=>$order->items)) ?>

      <h5>Please choose a payment method</h5>

      <?= open_form() ?>
        <? $payment_methods = Shop_PaymentMethod::list_applicable(
           $order->billing_country_id,
           $order->total) ?>

        <ul class="form clearfix">
          <? foreach ($payment_methods as $payment_method): ?>
            <li class="field checkbox">
              <div class="container">
                <input
                  <?= radio_state($payment_method->id == $order->payment_method_id) ?>
                  type="radio"
                  value="<?= $payment_method->id ?>"
                  name="payment_method"
                  id="<?= 'payment_method'.$payment_method->id ?>"
                  onclick="$(this).getForm().sendRequest('shop:on_updatePaymentMethod', {
                     update: {'payment_form': 'shop:payment_form'}})"/>
              </div>

              <label for="<?= 'payment_method'.$payment_method->id ?>"><?= h($payment_method->name) ?></label>
            </li>
          <? endforeach ?>
        </ul>
      </form>

      <div class="row">
        <div class="six columns offset_bottom">
          <div id="payment_form"><? $this->render_partial('shop:payment_form') ?></div>
        </div>
      </div>

    <? endif ?>
  </div>
</div>