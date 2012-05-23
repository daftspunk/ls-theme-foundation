<h3>Billing Information</h3>
<p class="header_description">Please enter your billing name and address</p>

<? if ($this->customer): ?>
  <p>Bill to: <strong><?= h($this->customer->name) ?>, <?= $this->customer->email ?></strong>.</p>
<? endif ?>

<ul class="form clearfix">
  <? if (!$this->customer): ?>
    <li class="field half_left">
      <label for="first_name">First Name</label>
      <input autocomplete="off" name="first_name" value="<?= h($billing_info->first_name) ?>" id="first_name" type="text" class="input-text expand"/>
    </li>
    <li class="field half_right">
      <label for="last_name">Last Name</label>
      <input autocomplete="off" name="last_name" value="<?= h($billing_info->last_name) ?>" id="last_name" type="text" class="input-text expand"/>
    </li>
    <li class="field">
      <label for="email">Email</label>
      <input autocomplete="off" id="email" name="email" value="<?= h($billing_info->email) ?>" type="text" class="input-text expand"/>
    </li>
  <? endif ?>

  <li class="field half_left">
    <label for="company">Company</label>
    <input autocomplete="off" id="company" type="text" value="<?= h($billing_info->company) ?>" name="company" class="input-text expand"/>
  </li>
  <li class="field half_right">
    <label for="phone">Phone</label>
    <input autocomplete="off" id="phone" type="text" class="input-text expand" value="<?= h($billing_info->phone) ?>" name="phone"/>
  </li>

  <li class="field">
    <label for="street_address">Street Address</label>
    <textarea rows="2" id="street_address" name="street_address" class="expand"><?= h($billing_info->street_address) ?></textarea>
  </li>

  <li class="field half_left">
    <label for="city">City</label>
    <input autocomplete="off" id="city" type="text" class="input-text expand" name="city" value="<?= h($billing_info->city) ?>"/>
  </li>
  <li class="field half_right">
    <label for="zip">Zip/Postal Code</label>
    <input autocomplete="off" id="zip" type="text" class="input-text expand" name="zip" value="<?= h($billing_info->zip) ?>"/>
  </li>

  <li class="field half_left">
    <label for="country">Country</label>
    <select autocomplete="off" id="country" name="country" onchange="return $('#country').getForm().sendRequest('shop:on_updateStateList', {
        extraFields: {'country': $('#country').val(), 'control_name': 'state', 'control_id': 'state', 'current_state': '<?= $billing_info->state ?>'},
        update: {'billing_states': 'shop:state_selector'}
      })">
      <? foreach ($countries as $country): ?>
      <option <?= option_state($billing_info->country, $country->id) ?> value="<?= h($country->id) ?>"><?= h($country->name) ?></option>
      <? endforeach ?>
    </select>
  </li>

  <li class="field half_right">
    <label for="state">State</label>
    <div id="billing_states">
    <?= $this->render_partial('shop:state_selector', array('states'=>$states, 'control_id'=>'state', 'control_name'=>'state', 'current_state'=>$billing_info->state)) ?>
    </div>
  </li>
</ul>

<input type="hidden" name="checkout_step" value="<?= $checkout_step ?>"/>
<p><input type="submit" value="Next" class="nice button radius"/></p>