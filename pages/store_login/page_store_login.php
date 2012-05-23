<div class="row" id="cart_page">
  <? if (!Phpr::$request->getField('register_success')): ?>
    <div class="six columns">
      <div class="vert_separator_right">
        <h5>Login</h5>
        <p>Please sign in using your existing account. Use the Register form if you do not have an account.</p>

        <? $this->render_partial('shop:login_form', array('redirect'=>root_url('/'))) ?>
      </div>
    </div>
    <div class="six columns">
      <h5>Register</h5>
      <p>Please specify your name and email address and click Submit. We will send you confirmation email with your password.</p>

      <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_signup')", 'class'=>'nice')) ?>
        <?= flash_message() ?>

        <ul class="form">
          <li class="field half_left">
            <label for="first_name">First Name</label>
            <input name="first_name" id="first_name" type="text" class="input-text expand"/>
          </li>
          <li class="field half_right">
            <label for="last_name">Last Name</label>
            <input name="last_name" id="last_name" type="text" class="input-text expand"/>
          </li>
          <li class="field">
            <label for="signup_email">Email</label>
            <input id="signup_email" type="text" name="email" value="<?= h(post('email')) ?>" class="input-text expand"/>
          </li>
        </ul>
        <p><input type="submit" class="nice button radius" value="Submit"/></p>
        <input type="hidden" name="redirect" value="<?= root_url('/store/login').'?register_success=1' ?>"/>
      </form>
    </div>
  <? else: ?>
    <h3>Thank you!</h3>
    <p>We just sent you a confirmation email message with your password. Please <a href="<?= root_url('/store/login') ?>">sign in</a> using your email and password.</p>
    <p><a class="link_button" href="<?= root_url('store/login')?>">Login</a></p>
  <? endif ?>
</div>