<?
    $item_num = Shop_Cart::get_item_total_num();
    $account_link = ($this->customer) ? root_url('store/orders') : root_url('store/login');
?>
<p class="mini_cart">
    <a href="<?= root_url('store/cart') ?>" class="first active">My Cart</a>
    <? if ($item_num): ?>
        <span class="item_num"><?= $item_num ?> <?= $item_num > 1 ? 'items' : 'item' ?></span>
        <span class="subtotal"><?= format_currency(Shop_Cart::total_price()) ?></span>
    <? endif ?>
    <a href="<?=$account_link?>" class="last">My Account</a>
</p>
<? if ($this->customer): ?>
<div class="clearfix"></div>
<p class="account_link">
    Welcome, <?=$this->customer->name?> | <a href="<?=root_url('/store/logout')?>">Log out</a>
</p>
<? endif ?>