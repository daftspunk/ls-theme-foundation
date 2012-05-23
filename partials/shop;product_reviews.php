<h4 class="bottom_border">Customer reviews</h4>

<?
  // Use $product->list_all_reviews() to get a list of all reviews
  // and $product->list_reviews() to get a list of approved reviews
  //
  $reviews = $product->list_all_reviews();
  if (!$reviews->count):
?>
  <p>There are no reviews for this product.</p>
<? else: ?>
  <ul class="review_list">
    <? foreach ($reviews as $review): ?>
      <li>
        <h4><?= h($review->title) ?></h4>
        <p class="description">Posted by <?= h($review->author) ?> on <?= $review->created_at->format('%x') ?></p>
        <? if ($review->rating): ?>
            <p class="rating_info"><span class="rating_<?= $review->rating*10 ?>">&nbsp;</span></p>
        <? endif ?>
        <p class="content"><?= nl2br(h($review->review_text)) ?></p>
      </li>
    <? endforeach ?>
  </ul>
<? endif ?>

