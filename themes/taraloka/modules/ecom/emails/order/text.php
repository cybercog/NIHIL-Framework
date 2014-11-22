The Taraloka Foundation

Dear <?php echo $customer->first . ' ' . $customer->last; ?>,
Thank you for placing an order online with The Taraloka Foundation. The following is a brief summary:

    Order Id: <?php echo $invoice->invoice_number; ?>
    Amount: $<?php echo $invoice->total; ?>
    Card Type: <?php echo $payment->account_type; ?>
    Card Number: <?php echo $payment->account_number; ?>
	
	Order Summary
	<?php foreach($products as $product) { ?>
																				
		(<?php echo $product->quantity; ?>) <?php echo $product->name; ?> at $<?php echo $product->unit_price; ?>/unit totalling $<?php echo $product->total; ?>
																			
	<?php } ?>
	
	Subtotal: $<?php echo $invoice->subtotal; ?>
	Tax: $<?php echo $invoice->tax; ?>
	Shipping: $<?php echo $invoice->shipping; ?>
	Total: $<?php echo $invoice->total; ?>

We will notify you when your order has shipped - please allow 1-3 days for processing.  If you need any more information, or if you have any questions/concerns, you can contact me by replying to this email.

Sincerely,
Tim Williams
Executive Director
                                                                    
If this email was generated in error, please contact support@taraloka.org.

The Taraloka Foundation
705 Northern Avenue
Signal Mountain, TN 37377

*You received this email because you placed an order at The Taraloka Foundation online.

https://www.taraloka.org
https://www.taraloka.org/privacy
https://www.taraloka.org/unsubscribe