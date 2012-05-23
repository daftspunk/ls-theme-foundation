<select autocomplete="off" id="<?= h($control_id) ?>" name="<?= $control_name ?>">
  <? foreach ($states as $state): ?>
  <option <?= option_state($current_state, $state->id) ?> value="<?= h($state->id) ?>"><?= h($state->name) ?></option>
  <? endforeach ?>
</select>