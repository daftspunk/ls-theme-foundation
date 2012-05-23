<?
  /*
   * Process product list sorting and view mode updates.
   *
   * Save the category product sorting mode if it has been changed.
   */
  if (post('sorting'))
    Cms_VisitorPreferences::set('cat_sorting_'.$category->id, post('sorting'));

  /*
   * Save the view mode if it has been changed.
   */
  if (post('view_mode'))
    Cms_VisitorPreferences::set('cat_view_'.$category->id, post('view_mode'));

  /*
   * Load the product sorting and view modes.
   */
  $sorting_preferences = Cms_VisitorPreferences::get('cat_sorting_'.$category->id, 'name');
  $view_mode = Cms_VisitorPreferences::get('cat_view_'.$category->id, 'list');

  $sort_options = array('name'=>'Name', 'price'=>'Price');
  $view_mode_options = array('list'=>'List', 'table'=>'Table');
?>
<div class="clearfix offset_bottom">
  <?= open_form() ?>
    <? 
    
    $products = $category->list_products(array(
      'sorting'=>array($sorting_preferences)
    ));
    
    $this->render_partial(
      'shop:product_list', array(
        'products'=>$products, 
        'paginate'=>true,
        'records_per_page'=>6,
        'pagination_base_url'=>$category->page_url('store/category'),
        'page_index'=>$this->request_param(1, 0),
        'view_mode'=>$view_mode
    )); ?>

    <div class="toggle float_right last">
      <span>View mode</span>
      <ul>
        <? 
          foreach ($view_mode_options as $option_id=>$option_name):
            $is_current = $view_mode == $option_id;
        ?>
          <li class="<?= $is_current ? 'current' : null  ?>">
            <? if (!$is_current): ?><a href="#" onclick="return $(this).getForm().sendRequest('on_action', {extraFields: {view_mode: '<?= $option_id ?>'}, update: {'category_products': 'shop:category_products'}})"><? endif ?><?= $option_name ?><? if (!$is_current): ?></a><? endif ?>
          </li>
        <? endforeach ?>
      </ul>
    </div>

    <div class="toggle float_right">
      <span>Sorting</span>
      <ul>
        <? 
          foreach ($sort_options as $option_id=>$option_name):
            $is_current = $sorting_preferences == $option_id;
        ?>
          <li class="<?= $is_current ? 'current' : null  ?>">
            <? if (!$is_current): ?><a href="#" onclick="return $(this).getForm().sendRequest('on_action', {extraFields: {sorting: '<?= $option_id ?>'}, update: {'category_products': 'shop:category_products'}})"><? endif ?><?= $option_name ?><? if (!$is_current): ?></a><? endif ?>
          </li>
        <? endforeach ?>
      </ul>
    </div>
  </form>
</div>