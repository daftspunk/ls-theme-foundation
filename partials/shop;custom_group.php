<?
  $group = Shop_CustomGroup::create()->find_by_code($group_code);
  if (!$group):
    echo "<p>The product group <strong>".$group_code."</strong> not found. Please create this group on the Shop/Products/Product Groups page.</p>";
  else:
    foreach ($group->products as $index=>$product):
?>
  <? if (!($index % 2)): ?>
  <div class="row">
  <? endif ?>
  <div class="six columns product_details">
    <div class="row">
      <div class="four columns product_image">
        <a href="<?= $product->page_url('store/product') ?>">
          <? if ($product->is_discounted()):  ?>
            <span class="on_sale">On sale!</span>
          <? endif ?>
          <img src="<?= $product->image_url(0, 160, 'auto') ?>" alt=""/>
        </a>
      </div>
      <div class="eight columns">
        <h4><a href="<?= $product->page_url('store/product') ?>"><?= h($product->name) ?></a></h4>
        <?= open_form() ?>
          <p>
            <span class="product_price"><?= format_currency($product->get_discounted_price()) ?></span>
            <a href="#" class="nice red button small radius" onclick="return $(this).getForm().sendRequest('shop:on_addToCart', {onSuccess: function(){ custom_alert('The product has been added to the cart'); }, update: {'mini_cart': 'shop:mini_cart'}})">Add to cart</a>
          </p>
          <input type="hidden" name="product_id" value="<?= $product->id ?>"/>
          <input type="hidden" name="no_flash" value="1"/>
        </form>
        <p><?= h($product->short_description) ?></p>
        <? if ($product->rating_all):  ?>
          <p class="rating_info clearfix">
            <span class="rating_<?= $product->rating_all*10 ?>">based on <?= $product->rating_all_review_num ?> reviews</span>
          </p>
        <? endif ?>
        <p><a href="<?= $product->page_url('store/product') ?>" class="link_button">Learn more about <?= h($product->name) ?></a></p>
      </div>
    </div>
  </div>
  <? if ($index % 2): ?>
  </div>
  <? endif  ?>
  <? endforeach  ?>
<? endif  ?>