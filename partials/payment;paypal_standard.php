<p class="top_offset">
	Please click the button to pay with PayPal.
</p>	
<form action="<?= $payment_method_obj->get_form_action($payment_method) ?>" method="post">
	<?
		$hidden_fields = $payment_method_obj->get_hidden_fields($payment_method, $order);
		foreach ($hidden_fields as $name=>$value):
	?>
		<input type="hidden" name="<?= $name ?>" value="<?= h($value) ?>"/>
	<? endforeach ?>
	<input type="submit" value="Pay with PayPal"/>
</form>