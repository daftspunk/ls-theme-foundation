<? if ($post): ?>
  <?= $post->content ?>

  <p class="light">
    Published by <?= h($post->author_first_name.' '.substr($post->author_last_name, 0, 1).'.') ?>
    on <?= $post->published_date->format('%F') ?> in 
    <? foreach ($post->categories as $index=>$category): ?>
      <a href="<?= root_url('news/category/'.$category->url_name)  ?>"><?= h($category->name) ?></a><?= $index < $post->categories->count-1 ? ', ' : '.' ?>
    <? endforeach ?>    
    Comments: <?= $post->approved_comment_num ?>
  </p>

  <h4>Comments</h4>
  
  <? if (!$post->approved_comment_num): ?>
    <p>No comments posted so far.</p>
  <? else: ?>
    <ul class="comment_list">
    <? foreach ($post->approved_comments as $comment):
      $site_url_specified = strlen($comment->author_url);
    ?>
      <li class="<?= $comment->blog_owner_comment ? 'owner_comment' : null  ?>">
        <p>
          Posted by
          <? if ($site_url_specified): ?><a href="<?= $comment->getUrlFormatted() ?>"><? endif ?><?= h($comment->author_name) ?><? if ($site_url_specified): ?></a><? endif ?>
          on
          <?= $comment->created_at->format('%F') ?>
        </p>
        <p><?= nl2br(h($comment->content)) ?></p>
      </li>
    <? endforeach ?>
    </ul>
  <? endif ?>
  
  <? if ($post->comments_allowed): ?>
    <div id="comment_form"><? $this->render_partial('blog;comment_form') ?></div>
  <? else: ?>
    <p class="comments_closed">Comments are not allowed for this post</p>
  <? endif ?>
<? else: ?>
  <p>Post not found.</p>
  <p><a class="link_button" href="<?= root_url('news')?>">Return to the News page</a></p>
<? endif ?>