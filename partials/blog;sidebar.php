<h5>News categories</h5>
<ul class="category_list">
  <?
      $categories = Blog_Category::create()->find_all();
      foreach ($categories as $category):
  ?>
      <li>
        <a href="<?= root_url('news/category/'.$category->url_name) ?>"><?= h($category->name) ?></a>
      </li>
  <? endforeach ?>
</ul>

<h5>RSS channel</h5>

<p>Subscribe to our <a href="<?= root_url('news/rss') ?>">RSS feed</a> to stay updated with our latest blog news.</p>