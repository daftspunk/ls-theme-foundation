<div class="row">
  <div class="twelve columns" id="cart_page">
    <? if (strlen($query)): ?>
      <p class="bottom_border">Products found: <?= $pagination->getRowCount() ?></p>

      <? $this->render_partial('shop:product_list', array('products'=>$products, 'paginate'=>false)) ?>

      <? if ($pagination->getRowCount()):  ?>
        <div class="view_controls clearfix offset_bottom">
          <? $this->render_partial('pagination', array('pagination'=>$pagination, 'base_url'=>root_url('/store/search'), 'suffix'=>'?query='.urlencode($query).'&amp;records='.urlencode($records))) ?>
        </div>
      <? endif ?>
    <? else: ?>
      <p>Please enter a search query to the <strong>Find products</strong> field and hit Enter.</p>
    <? endif ?>
  </div>
</div>