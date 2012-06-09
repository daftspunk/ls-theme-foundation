<div class="row">
  <div class="twelve columns">
    <ul class="category_list">
      <?
        $root_categories = Shop_Category::create()->where('category_id is null')->order('front_end_sort_order')->find_all();
        foreach ($root_categories as $root_category):
          $subcategories = $root_category->list_children('front_end_sort_order');
      ?>
        <li class="clearfix">
          <div class="row">
            <div class="two columns">
              <a href="<?= $root_category->page_url('store/category') ?>"><img src="<?= $root_category->image_url(0, 100, 'auto') ?>"/></a>
            </div>
            <div class="ten columns">
              <h4><a href="<?= $root_category->page_url('store/category') ?>"><?= h($root_category->name) ?></a></h4>
              <? foreach ($subcategories as $subcategory):  ?>
                <a class="link_button" href="<?= $subcategory->page_url('store/category') ?>"><?= h($subcategory->name) ?></a>
              <? endforeach ?>
            </div>
          </div>
        </li>
      <? endforeach ?>
    </ul>
  </div>
</div>