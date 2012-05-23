<ul class="post_list">
  <? foreach ($post_list as $post): ?>
  <li>
    <h3><a href="<?= root_url('news/post/'.$post->url_title) ?>"><?= h($post->title) ?></a></h3>
    <p class="light">
      Published by <?= h($post->author_first_name.' '.substr($post->author_last_name, 0, 1).'.') ?>
      on <?= $post->published_date->format('%F') ?>.
      Comments: <?= $post->approved_comment_num ?>
    </p>
    <p><?= h($post->description) ?> <a href="<?= root_url('news/post/'.$post->url_title) ?>">Read more...</a></p>
  </li>
<? endforeach ?>
</ul>

<div class="view_controls offset_bottom clearfix">
  <? $this->render_partial('pagination', array('pagination'=>$pagination, 'base_url'=>root_url('news'))); ?>
</div>