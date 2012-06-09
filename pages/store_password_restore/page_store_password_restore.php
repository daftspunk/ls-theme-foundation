<div class="row">
  <div class="twelve columns" id="cart_page">
    <? if (!Phpr::$request->getField('success')): ?>
      <div class="row">
        <div class="five columns">
          <p>Please specify your email address and click Submit. We will send you a message with new password.</p>
          <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_passwordRestore')")) ?>
            <ul class="form clearfix">
              <li class="field text">
                <label for="email">Email</label>
                <input id="email" type="text" name="email" value="<?= h(post('email')) ?>" class="text"/>
              </li>
            </ul>
            <p><input type="submit" class="button_control" value="Submit"/></p>
            <input type="hidden" name="redirect" value="<?= root_url('/store/password-restore').'?success=1' ?>"/>
          </form>
        </div>
      </div>
    <? else: ?>
      <p>Thank you! We just sent you an email message with your new password.</p>
      <p><a class="link_button" href="<?= root_url('store/login')?>">Login</a></p>
    <? endif ?>
  </div>
</div>