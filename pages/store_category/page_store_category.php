<div class="grid_16">
  <? if ($category):
    $subcategories = $category->list_children('front_end_sort_order');
    
    $has_subcategories = $subcategories->count;
    $has_products = $category->eval_num_of_products();
  ?>
    <? if ($category->short_description): ?>
      <p><?= h($category->short_description) ?></p>
    <? endif ?>
    <? if ($has_subcategories): ?>
      <h3 class="bottom_border">Shop by subcategory</h3>
      <ul class="category_list inline">
        <? foreach ($subcategories as $subcategory):  ?>
          <li><a class="link_button" href="<?= $subcategory->page_url('store/category') ?>"><?= h($subcategory->name) ?></a></li>
        <? endforeach ?>
      </ul>
    <? endif ?>
    
    <? if ($has_products): ?>
      <? if ($has_subcategories): ?><h3 class="bottom_border">Shop by product</h3><? endif ?>
      <div id="category_products"><? $this->render_partial('shop:category_products') ?></div>
    <? endif  ?>
    
    <? if (!$has_subcategories && !$has_products): ?>
      <p>This category does not contain any products or subcategories.</p>
      <p><a class="link_button" href="<?= root_url('store')?>">Return to the Store</a></p>
    <? endif ?>
  <? else: ?>
    <h3>Category not found</h3>
    <p>We are sorry, the specified category cannot be found.</p>    
    <p><a class="link_button" href="<?= root_url('store')?>">Return to the Store</a></p>
  <? endif ?>
</div>