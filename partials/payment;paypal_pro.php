<p>Please provide your credit card information.</p>

<?= open_form() ?>
	<?= flash_message() ?>
	<ul class="form">
		<li class="field radio_horizontal">
			<label>Credit Card Type</label>
			<div>
				<input autocomplete="off" type="radio" name="CREDITCARDTYPE" id="cc_visa" value="Visa"/>
				<span>
					<label for="cc_visa"><img src="<?= theme_resource_url('images/cc_visa.gif') ?>" alt="Visa"/></label>
				</span>
			</div>
			<div>
				<input autocomplete="off" type="radio" name="CREDITCARDTYPE" id="cc_mc" value="MasterCard"/>
				<span>
					<label for="cc_mc"><img src="<?= theme_resource_url('images/cc_mc.gif') ?>" alt="Master Card"/></label>
				</span>
			</div>
			<div>
				<input autocomplete="off" type="radio" name="CREDITCARDTYPE" id="cc_discover" value="Discover"/>
				<span>
					<label for="cc_discover"><img src="<?= theme_resource_url('images/cc_discover.gif') ?>" alt="Discover"/></label>
				</span>
			</div>
			
			<div>
				<input autocomplete="off" type="radio" name="CREDITCARDTYPE" id="cc_amex" value="Amex"/>
				<span>
					<label for="cc_amex"><img src="<?= theme_resource_url('images/cc_amex.gif') ?>" alt="American Express"/></label>
				</span>
			</div>
		</li>
		
		<li class="field text left">
			<label for="FIRSTNAME">Cardholder First Name</label>
			<div><input autocomplete="off" name="FIRSTNAME" value="" id="FIRSTNAME" type="text" class="text"/></div>
		</li>		
		
		<li class="field text right">
			<label for="LASTNAME">Cardholder Last Name</label>
			<div><input autocomplete="off" name="LASTNAME" value="" id="LASTNAME" type="text" class="text"/></div>
		</li>		

		<li class="field text">
			<label for="ACCT">Credit Card Number</label>
			<div><input autocomplete="off" name="ACCT" value="" id="ACCT" type="text" class="text"/></div>
		</li>
		
		<li class="field select left">
			<label for="EXPDATE_MONTH">Expiration Date - Month</label>
			<select autocomplete="off" name="EXPDATE_MONTH" id="EXPDATE_MONTH">
				<? for ($month=1; $month <= 12; $month++): ?>
					<option value="<?= $month ?>"><?= $month ?></option>
				<? endfor ?> 
			</select>
		</li>

		<li class="field text right">
			<label for="EXPDATE_YEAR">Expiration Date - Year</label>

			<select autocomplete="off" name="EXPDATE_YEAR" id="EXPDATE_YEAR">
				<?
				  $startYear = Phpr_DateTime::now()->getYear();
				  for ($year=$startYear; $year <= $startYear + 10; $year++): ?>
					<option value="<?= $year ?>"><?= $year ?></option>
				<? endfor ?> 
			</select>
		</li>

		<li class="field text">
			<label for="CVV2">
				CVV2
				<span class="comment">For MasterCard, Visa, and Discover, the CSC is the last three digits in the signature area on the back of your card. For American Express, it's the four digits on the front of the card.</span>
			</label>
			
			<div><input autocomplete="off" name="CVV2" value="" id="CVV2" type="text" class="text"/></div>
		</li>		
	</ul>
	<div class="clear"></div>
	<input type="button" onclick="return $(this).getForm().sendRequest('shop:on_pay')" value="Submit"/>
</form>