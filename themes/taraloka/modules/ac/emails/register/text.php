The Taraloka Foundation

Dear <?php echo $user->nickname; ?>,
Thank you for registering with The Taraloka Foundation.  Use the following code to verify your account:

    Verification Code: <?php echo $authkey->key; ?>
    
or go to the following link:

<?php echo \Yii::$app->params['siteMeta']['url']; ?>/verify/<?php echo $authkey->key; ?>

We look forward to seeing you around.  If you need any more information, or if you have any questions/concerns, please be in touch.

Sincerely,
Uriah Clemmer
                                                                    
If this email was generated in error, please contact support@taraloka.org.

The Taraloka Foundation
705 Northern Avenue
Signal Mountain, TN 37377

*You received this email because you created <br />an account with The The Taraloka Foundation online.

<?php echo \Yii::$app->params['siteMeta']['url']; ?>
<?php echo \Yii::$app->params['siteMeta']['url']; ?>/pages/privacy
<?php echo \Yii::$app->params['siteMeta']['url']; ?>/unsubscribe