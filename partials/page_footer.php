<div class="footer_titles">
  <div class="row">
    <div class="two columns">
      <h4>Categories</h4>
    </div>
    <div class="four columns">
      <h4>Latest News</h4>
    </div>
    <div class="three columns">
      <h4>Contact Info</h4>
    </div>
    <div class="three columns">
      <h4>Stay In Touch</h4>
    </div>
  </div>
</div>

<div class="footer">
  <div class="row">
    <div class="two columns link_list">
      <ul>
        <?
          $root_categories = Shop_Category::create()->where('category_id is null')->order('front_end_sort_order')->limit(5)->find_all();
          foreach ($root_categories as $root_category):
        ?>
          <li><a href="<?= $root_category->page_url('store/category') ?>"><?= h($root_category->name) ?></a></li>
        <? endforeach ?>
      </ul>
    </div>
    <div class="four columns link_list">
      <ul>
        <?
          $latest_posts = Blog_Post::create()->where('is_published=1')->order('published_date desc')->limit(5)->find_all();
          foreach ($latest_posts as $post):
        ?>
          <li><a href="<?= root_url('news/post/'.$post->url_title) ?>"><?= h($post->title) ?></a></li>
        <? endforeach ?>
      </ul>
    </div>
    <div class="three columns">
      <dl class="address_info">
        <dt>Address</dt>
        <dd>lorem ipsum dolor sit amet, consectetur adipisicing elit</dd>
        <dt>Phone</dt>
        <dd>+1 3219871212</dd>
        <dt>Email</dt>
        <dd><a href="mailto:info@example.com">info@example.com</a></dd>
      </dl>
    </div>
    <div class="three columns">
      <?=open_form(array('class'=>'nice'))?>
        <div class="newsletter_form clearfix">
          <h5>Newsletter sign up</h5>
          <input type="text" class="input-text small subscribe" placeholder="Email address"/>
          <input type="submit" class="nice tiny button radius" value="Subscribe"/>
        </div>
      </form>

      <div class="follow_us">
        <h5>Follow us</h5>
        <a class="facebook" href="http://facebook.com">Facebook</a>
        <a class="twitter" href="http://twitter.com">Twitter</a>
      </div>
    </div>
  </div>
</div>