<? if (!isset($comment_success) || !$comment_success): ?>
  <h5>Post a comment</h5>
  <?= open_form(array('onsubmit'=>"return $(this).sendRequest('blog:on_postComment', {update: {'comment_form': 'blog:comment_form'}})")) ?>
    <ul class="form">
      <li class="field half_left">
        <label for="author_name">Name</label>
        <input id="author_name" class="text" type="text" name="author_name"/><br/>
      </li>

      <li class="field half_right">
        <label for="author_email">Email</label>
        <input type="text" class="text" id="author_email" name="author_email"/><br/>
      </li>

      <li class="field">
        <label for="author_url">Website URL</label>
        <input type="text" class="text" id="author_url" name="author_url"/><br/>
      </li>

      <li class="field">
        <label for="comment_content">Comment</label>
        <textarea id="comment_content" name="content"></textarea><br/>
      </li>
    </ul>

    <p>
      <input type="submit" class="nice button radius" value="Submit" onclick=""/>
    </p>
  </form>
<? else: ?>
  <p class="flash success">Your comment has been posted. Thank you!</p>
<? endif ?>