<?
  $curPageIndex = $pagination->getCurrentPageIndex();
  $pageNumber = $pagination->getPageCount();
  $suffix = isset($suffix) ? $suffix : null;
?>
<div class="toggle float_left">
  <span>Page</span>
  <ul>
    <? for ($i = 1; $i <= $pageNumber; $i++): ?>
      <li class="<?= ($i == $curPageIndex+1) ? 'current' : null ?>">
        <? if ($i != $curPageIndex+1): ?><a href="<?= $base_url.'/'.$i.$suffix ?>/"><? endif ?>
        <?= $i ?>
        <? if ($i != $curPageIndex+1): ?></a><? endif ?>
      </li>
    <? endfor ?>
  </ul>
</div>