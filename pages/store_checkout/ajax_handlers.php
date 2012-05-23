<?
function place_order_and_pay($controller, $page, $params)
  {
    // Find a payment method with the "default" API code
    $payment_method = Shop_PaymentMethod::find_by_api_code('default');
    
    // If it is not available, use the first available payment method
    if (!$payment_method)
    {
      $payment_methods = Shop_PaymentMethod::list_applicable(Shop_CheckoutData::get_billing_info()->country, Shop_Cart::total_price());
      if ($payment_methods->count)
        $payment_method = $payment_methods[0];
    }

    if (!$payment_method)
      throw new Phpr_ApplicationException('Payment method not found. Please define payment methods.');
    
    Shop_CheckoutData::set_payment_method($payment_method->id);
 
    // Call the default action handler
    $controller->action();

    // Pretend that we are on the Review checkout step
    // to force LemonStand to place the order
    $_POST['checkout_step'] = 'review';
    $controller->action();
  }
?>