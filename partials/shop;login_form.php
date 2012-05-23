<?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_login')", 'class'=>'nice')) ?>
  <?= flash_message() ?>

  <ul class="form">
    <li class="field">
      <label for="login_email">Email</label>
      <input id="login_email" type="text" name="email" value="<?= h(post('email')) ?>" class="input-text expand" autocomplete="off"/>
    </li>
    <li class="field">
      <label for="login_password">Password</label>
      <input id="login_password" type="password" name="password" class="input-text expand" autocomplete="off"/>
    </li>
  </ul>
  <p>
    <input type="submit" value="Login" class="nice button radius offset_right_2"/>
    <a class="float_right" href="<?= root_url('/store/password-restore') ?>">Forgot your password?</a>
  </p>
  <input type="hidden" name="redirect" value="<?= $redirect ?>"/>
</form>