<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.5"/>
        <title>Thank You From The Taraloka Foundation</title>
    </head>
    <body style="height:100% !important; margin:0; padding:0; width:100% !important; background-color:#F5F5F5;">
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="border-collapse:collapse; height:100% !important; margin:0; padding:0; background-color:#F5F5F5;">
            	<tr>
                	<td align="center" valign="top" style="height:100% !important; margin:0; padding:0; width:100% !important; padding-top:40px; padding-bottom:40px;">
                    	<!-- EMAIL CONTAINER // -->
                        <!--
                        	The table "emailBody" is the email's container.
                            Its width can be set to 100% for a color band
                            that spans the width of the page.
                        -->
                    	<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;background-color:#FFFFFF; border:1px solid #DDDDDD; border-collapse:separate; border-radius:4px;">

							<!-- MODULE ROW // -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse; background-color:#292929; border-bottom:2px solid #afbd21;">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" style="padding-top:20px; padding-Right:20px; padding-Left:20px;">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The table cell imageContent has padding
                                                                applied to the bottom as part of the framework,
                                                                ensuring images space correctly in Android Gmail.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                                                <tr>
                                                                    <td valign="top" style="padding-bottom:20px;">
                                                                        <a href="https://www.taraloka.org" style="border:0; outline:none; text-decoration:none;"><img src="http://www.taraloka.org/img/logo.png" width="260" style="height:auto; border:0; outline:none; text-decoration:none; padding: 0 150px;" /></a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->

							<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse; border-top:5px solid #ec008c;">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" style="padding-top:20px; padding-Right:20px; padding-Left:20px;">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                                                <tr>
                                                                    <td valign="top" style="color:#404040; font-family:Helvetica; font-size:16px; line-height:125%; text-align:Left; padding-bottom:20px;">
                                                                        <h3 style="margin:0; padding:0; color:#202020; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left;">Dear <?php echo $user->nickname; ?>,</h3>
                                                                        <br />
                                                                        We are sorry to hear that you are having trouble accessing your account.  Use the code below:<br /><br />
																		<strong>Reset Code:</strong> <code style="color:#afbd21;font-weight:bold;font-size:1.1em;"><?php echo $authkey->key; ?></code><br /><br />
																		or go to the following link:<br /><br />
																		<a href="<?php echo \Yii::$app->params['siteMeta']['url']; ?>/change-password/<?php echo $authkey->key; ?>" style="color:#ec008c;"><?php echo \Yii::$app->params['siteMeta']['url']; ?>/change-password/<?php echo $authkey->key; ?></a><br /><br />
																		It is our hope that this straightens things out.  If you need any more information, or if you have any questions/concerns, please be in touch.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
							
							<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" style="padding-top:0px; padding-Right:20px; padding-Left:300px;">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                                                <tr>
                                                                    <td valign="top" style="color:#404040; font-family:Helvetica; font-size:16px; line-height:125%; text-align:Left; padding-bottom:20px;">
                                                                        Sincerely,<br />
																		Uriah Clemmer
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
							
							<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse; border-bottom:5px solid #ec008c;">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" style="padding-top:20px; padding-Right:20px; padding-Left:20px;">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                                                <tr>
                                                                    <td valign="top" style="color:#404040; font-family:Helvetica; font-size:16px; line-height:125%; text-align:Left; padding-bottom:20px;">
                                                                         If this email was generated in error, please contact <a href="mailto:support@taraloka.org" style="color:#ec008c;">support@taraloka.org</a>.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
							
							<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; background-color:#292929;">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse; border-top:2px solid #afbd21;"">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="" style="padding-top:20px; padding-Right:20px; padding-Left:20px;">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
																<tr>
																	<td width="160" valign="top" align="left" style="color:#FFFFFF; font-family:Helvetica; font-size:12px; line-height:125%; text-align:Left; padding-bottom:20px;">
																		 <strong style="color:#afbd21;">The Taraloka Foundation</strong><br />
																		 705 Northern Avenue<br />
																		 Signal Mountain, TN 37377
                                                                    </td>
                                                                    <td valign="top" align="right" style="color:#FFFFFF; font-family:Helvetica; font-size:12px; line-height:125%; text-align:Right; padding-bottom:20px;">
																		 *You received this email because you reset your<br />account with <strong style="color:#afbd21;">The Taraloka Foundation</strong> online.
																		 <ul style="padding:0;margin:0;">
																			<li style="list-style:none;display:inline;margin:0;padding:0;"><a href="<?php echo \Yii::$app->params['siteMeta']['url']; ?>" style="color:#ec008c;">www.taraloka.org</a></li>
																			<li style="list-style:none;display:inline;margin:0;padding:0;"><a href="<?php echo \Yii::$app->params['siteMeta']['url']; ?>/pages/privacy" style="color:#ec008c;">privacy policy</a></li>
																			<li style="list-style:none;display:inline;margin:0;padding:0;"><a href="<?php echo \Yii::$app->params['siteMeta']['url']; ?>/unsubscribe" style="color:#ec008c;">unsubscribe</a></li>
																		 </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->

                        </table>
                    	<!-- // EMAIL CONTAINER -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>