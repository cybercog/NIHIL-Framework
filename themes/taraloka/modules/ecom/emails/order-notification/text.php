The Taraloka Foundation

Time to Quit Slacking,

It seems someone has purchased some merchandise.  The following is a brief summary:

    Customer Name: <?php echo $customer->first . ' ' . $customer->last; ?>
    Customer Email: <?php echo $customer->email; ?>
    Order Id: <?php echo $invoice->invoice_number; ?>
    Total: $<?php echo $invoice->total; ?>
    Card Type: <?php echo $payment->account_type; ?>
    Card Number: <?php echo $payment->account_number; ?>
    
    Ship By: <?php echo date("12:00 F j, Y", strtotime("+2 day") ); ?>
    Ship To: <?php echo $shipping->first . ' ' . $shipping->last; ?>
             <?php echo $shipping->address1; ?>
             <?php if($shipping->address2) { echo $shipping->address2; } ?>
             <?php echo $shipping->city . ', ' . $shipping->state . ' ' . $shipping->zipcode; ?>
    
    <?php if($payment->comments) { echo 'Comments: ' . $payment->comments; } ?>
	
	Order Summary
	<?php foreach($products as $product) { ?>
																				
		(<?php echo $product->quantity; ?>) <?php echo $product->name; ?> at $<?php echo $product->unit_price; ?>/unit totalling $<?php echo $product->total; ?>
																			
	<?php } ?>
	
	Subtotal: $<?php echo $invoice->subtotal; ?>
	Tax: $<?php echo $invoice->tax; ?>
	Shipping: $<?php echo $invoice->shipping; ?>
	Total: $<?php echo $invoice->total; ?>

This email was automatically generated - do not reply to this email.

Sincerely,
Uriah Clemmer
Webmaster
                                                                    
If this email was generated in error, please contact support@taraloka.org.

The Taraloka Foundation
705 Northern Avenue
Signal Mountain, TN 37377

*You received this email because you are an administrator at The Taraloka Foundation online.

https://www.taraloka.org
https://www.taraloka.org/privacy
https://www.taraloka.org/unsubscribe