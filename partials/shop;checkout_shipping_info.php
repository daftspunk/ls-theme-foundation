<h3>Shipping Information</h3>
<p class="header_description">Please enter your shipping name and address</p>

<p>Copy <a href="#" onclick="return $(this).getForm().sendRequest('shop:on_copyBillingInfo', {update:{'checkout_page': 'shop:checkout_partial'}})">billing information</a>.<p>

<ul class="form clearfix">
  <li class="field text half_left">
    <label for="first_name">First Name</label>
    <input autocomplete="off" id="first_name" name="first_name" type="text" class="input-text expand" value="<?= h($shipping_info->first_name) ?>"/>
  </li>
  <li class="field text half_right">
    <label for="last_name">Last Name</label>
    <input autocomplete="off" id="last_name" name="last_name" type="text" class="input-text expand" value="<?= h($shipping_info->last_name) ?>"/>
  </li>

  <li class="field text half_left">
    <label for="company">Company</label>
    <input autocomplete="off" id="company" type="text" value="<?= h($shipping_info->company) ?>" class="input-text expand" name="company"/>
  </li>
  <li class="field text half_right">
    <label for="phone">Phone</label>
    <input autocomplete="off" id="phone" type="text" class="input-text expand" value="<?= h($shipping_info->phone) ?>" name="phone"/>
  </li>

  <li class="field text">
    <label for="street_address">Street Address</label>
    <textarea rows="2" id="street_address" name="street_address" class="expand"><?= h($shipping_info->street_address) ?></textarea>
  </li>

  <li class="field text half_left">
    <label for="city">City</label>
    <input autocomplete="off" id="city" type="text" class="input-text expand" name="city" value="<?= h($shipping_info->city) ?>"/>
  </li>
  <li class="field text half_right">
    <label for="zip">Zip/Postal Code</label>
    <input autocomplete="off" id="zip" type="text" class="input-text expand" name="zip" value="<?= h($shipping_info->zip) ?>"/>
  </li>

  <li class="field select half_left">
    <label for="country">Country</label>
    <select autocomplete="off" id="country" name="country" onchange="return $('#country').getForm().sendRequest('shop:on_updateStateList', {
        extraFields: {'country': $('#country').val(), 'control_name': 'state', 'control_id': 'state', 'current_state': '<?= $shipping_info->state ?>'},
        update: {'shipping_states': 'shop:state_selector'}
      })">
      <? foreach ($countries as $country): ?>
      <option <?= option_state($shipping_info->country, $country->id) ?> value="<?= h($country->id) ?>"><?= h($country->name) ?></option>
      <? endforeach ?>
    </select>
  </li>

  <li class="field select half_right">
    <label for="state">State</label>
    <div id="shipping_states">
    <?= $this->render_partial('shop:state_selector', array('states'=>$states, 'control_id'=>'state', 'control_name'=>'state', 'current_state'=>$shipping_info->state)) ?>
    </div>
  </li>
</ul>

<input type="hidden" name="checkout_step" value="<?= $checkout_step ?>"/>
<p><input type="submit" value="Next" class="nice button radius"/></p>