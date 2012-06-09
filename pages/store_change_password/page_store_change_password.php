<div class="row">
    <div class="five columns">
    <? if (!Phpr::$request->getField('success')): ?>
      <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_changePassword')", 'class'=>'nice')) ?>
      <ul class="form clearfix">
        <li class="field">
          <label for="old_password">Old password</label>
          <input id="old_password" type="password" name="old_password" class="input-text expand"/>
        </li>
        <li class="field align_left">
          <label for="password">New password</label>
          <input id="password" type="password" name="password" class="input-text expand"/>
        </li>
        <li class="field align_right">
          <label for="password_confirm">Password confirmation</label>
          <input id="password_confirm" type="password" name="password_confirm" class="input-text expand"/>
        </li>
      </ul>
        <p><input type="submit" value="Submit" class="button_control"/></p>
        <input type="hidden" name="redirect" value="<?= root_url('/store/change-password').'?success=1' ?>"/>
      </form>
    <? else: ?>
      <p>Your password has been successfully updated.</p>
      <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
    <? endif ?>
  </div>
</div>