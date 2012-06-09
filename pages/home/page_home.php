<div class="row">
  <div class="twelve columns">
    <h3>Featured products</h3>
    <p class="header_description">Best products from our catalog</p>

    <? $this->render_partial('shop:custom_group', array('group_code'=>'featured_products')) ?>

    <div class="clear"></div>

    <div class="hor_separator"></div>

    <h3>Latest products</h3>
    <p class="header_description">Newest products directly from manufacturers!</p>

    <?
      $latest_products = Shop_Product::create()->apply_filters()->order('created_at desc')->limit(5);
      $this->render_partial('shop:product_list', array('products'=>$latest_products, 'paginate'=>false));
    ?>
  </div>
</div>