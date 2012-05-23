<p id="estimator_trigger">
  <a href="#" class="link_button" onclick="$('#estimator_trigger').addClass('hidden'); $('#estimator_form').removeClass('hidden'); return false">Estimate shipping cost</a>
</p>

<div class="shipping_estimator hidden" id="estimator_form">
  <div class="form">

    <select id="country" name="country" onchange="return $('#country').getForm().sendRequest(
      'shop:on_updateStateList', {
      extraFields: {'country': $('country').get('value'),
      'control_name': 'state',
      'control_id': 'state',
      'current_state': '<?= $shipping_info->state ?>'},
      update: {'shipping_states': 'shop:state_selector'}
    })">
      <? foreach ($countries as $country): ?>
        <option value="<?= $country->id ?>" <?= option_state($country->id, $shipping_info->country) ?>><?= h($country->name) ?></option>
      <? endforeach ?>
    </select>

    <span id="shipping_states">
      <?= $this->render_partial('shop:state_selector', array('states'=>$states, 'control_id'=>'state', 'control_name'=>'state', 'current_state'=>$shipping_info->state)) ?>
    </span>

    <input type="text" placeholder="ZIP" class="text button_height" name="zip" value="<?= h($shipping_info->zip) ?>"/>
    <a href="#" class="nice button radius" onclick="return $(this).getForm().sendRequest('shop:on_evalShippingRate', {update: {'shipping_options': 'shop:shipping_estimator_options'}})">OK</a>
  </div>

  <div id="shipping_options"></div>
</div>