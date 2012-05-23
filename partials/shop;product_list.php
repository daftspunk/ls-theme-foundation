<?
  if (isset($paginate) && $paginate)
  {
    $page_index = isset($page_index) ? $page_index-1 : 0;
    $records_per_page = isset($records_per_page) ? $records_per_page : 3;
    $pagination = $products->paginate($page_index, $records_per_page);
  }
  else
    $pagination = null;

  $view_mode = isset($view_mode) ? $view_mode : 'list';
?>
<div class="product_list">
  <ul class="<?= ($view_mode=='table')?'block-grid two-up':''?>">
  <?
    $products = $products instanceof Db_ActiveRecord ? $products->find_all() : $products;
    foreach ($products as $index=>$product):
      $is_discounted = $product->is_discounted();
      $image_url = $product->image_url(0, 150, 'auto');
  ?>
    <li>
      <div class="row">
        <div class="two columns product_image">
          <? if ($image_url): ?>
            <? if ($product->is_discounted()):  ?>
              <span class="on_sale">On sale!</span>
            <? endif ?>
            <a href="<?= $product->page_url('store/product') ?>"><img src="<?= $image_url ?>" alt="<?= h($product->name) ?>"/></a>
          <? endif  ?>
        </div>
        <div class="ten columns">
          <h4><a href="<?= $product->page_url('store/product') ?>"><?= h($product->name) ?></a></h4>
          <p><?= h($product->short_description) ?></p>
          <? if ($product->rating_all):  ?>
            <p class="rating_info clearfix">
              <span class="rating_<?= $product->rating_all*10 ?>">based on <?= $product->rating_all_review_num ?> reviews</span>
            </p>
          <? endif ?>

          <p class="clearfix"><a href="<?= $product->page_url('store/product') ?>" class="link_button">Learn more about <?= h($product->name) ?></a></p>
        </div>
      </div>
    </li>
  <? endforeach ?>
  </ul>

  <? if ($pagination): ?>
    <div class="view_controls">
      <? $this->render_partial('pagination', array('pagination'=>$pagination, 'base_url'=>$pagination_base_url)); ?>
    </div>
  <? endif ?>
</div>
