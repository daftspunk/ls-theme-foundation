<div class="row" id="cart_page">
  <? if (Shop_Cart::get_item_total_num() != 0): ?>
    <div class="five columns">
      <div class="vert_separator_right">
        <h5>Existing customers</h5>
        <p>Please sign in using your existing account.</p>

        <? $this->render_partial('shop:login_form', array('redirect'=>root_url('store/checkout'))) ?>
        <p>Don’t have an account? <a href="<?= root_url('store/login') ?>">Register!</a></p>
      </div>
    </div>
    <div class="seven columns">
      <h5>New customers</h5>
      <p>If you do not have an account and you do not want to register, you may checkout as a guest.</p>
      <p>
        <a class="nice button radius" href="<?= root_url('store/checkout') ?>">Checkout as Guest</a>
      </p>

      <h6>Why register?</h6>
      <p>Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website.</p>
    </div>
  <? else: ?>
    <p>Your cart is empty.</p>
    <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
  <? endif ?>
</div>