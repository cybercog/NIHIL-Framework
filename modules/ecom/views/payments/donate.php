<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="payment-index">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1>Holiday Headlamps</h1>
				<img src="/img/girl-6.png" alt="" class="pull-right content-image" />
				<p>Take a second and search the web for some images of electrical wiring in India... Something doesn't look quite right... This kind of thing is not uncommon.</p>
				<p>As you can expect, flash-lights are a must.  Thanks to our partners, and with your support, we can get each girl a headlamp this holiday season.  Headlamps are $25/each and will be gifted to the girls on our trip this December.  So brighten (see what we did there?) a girl's holiday and make your donation today.</p>
				<p>The girls in green already have a headlamp on the way.  Select one (or more) of the other girls by clicking on her image below.  See, Bimla already has hers, but Binita, Chozum, Christina, Dawa, Dechen, Dekhyong, Gayatri, Gyalmit, Karma, Ongmu, Palmu, Pasang, Pasangkee, Pema, Rinsing, Saraswasti, Sonam, Soyata, Sunita, Tashi, Tenzing, Tenzing Paden, and Tsering all need one too.</p>
			</div>
		  </div>
		  <div class="row">
		    <div class="col-sm-9">
				
				<div class="row">
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox disabled">
					  <label>
					    <input type="checkbox" value="" disabled />
						<i class="fa fa-lightbulb-o fa-4x hl-check-select"></i>
						<img src="/img/girls/bimla.png" class="img-responsive hl-image" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g2" onclick='calctotals("g2");' />
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/binita.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g3" onclick='calctotals("g3");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/chozum.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g4" onclick='calctotals("g4");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/christina.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g5" onclick='calctotals("g5");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/dawa.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g6" onclick='calctotals("g6");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/dechen.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
					<div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g7" onclick='calctotals("g7");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/dekhyong.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g8" onclick='calctotals("g8");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/gayatri.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g9" onclick='calctotals("g9");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/gyalmit.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g10" onclick='calctotals("g10");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/karma.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g11" onclick='calctotals("g11");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/ongmu.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g12" onclick='calctotals("g12");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/palmu.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g13" onclick='calctotals("g13");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/pasang.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g14" onclick='calctotals("g14");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/pasangkee.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g15" onclick='calctotals("g15");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/pema.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g16" onclick='calctotals("g16");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/rinsing.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g17" onclick='calctotals("g17");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/saraswati.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g18" onclick='calctotals("g18");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/sonam.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g19" onclick='calctotals("g19");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/soyata.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g20" onclick='calctotals("g20");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/sunita.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g21" onclick='calctotals("g21");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/tashi.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g22" onclick='calctotals("g22");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/tenzing.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g23" onclick='calctotals("g23");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/tenzing-paden.png" class="img-responsive" alt="blank" />
					  </label>
					</div>
				  </div>
				  <div class="col-xs-4 col-sm-3 col-md-2">
				    <div class="checkbox">
					  <label>
					    <input type="checkbox" value="" id="g24" onclick='calctotals("g24");' /> 
						<i class="fa fa-check fa-4x hl-check-select"></i>
						<img src="/img/girls/tsering.png" class="img-responsive" />
					  </label>
					</div>
				  </div>
				</div>
				
				<script>
				function calctotals(id)
				{
					count = document.getElementById('donationform-hlcount');
					amount = document.getElementById('donationform-hlamount');
				
				  if(document.getElementById(id).checked)
					 count.value++;
				  else
					count.value--;
				}
				</script>
				
				
			</div>
			<div class="col-sm-9">
			
			  <form id="ecom-donate-form" action="/donate" method="post" onsubmit="$(&quot;#processingModal&quot;).modal(&quot;show&quot;);">
<input type="hidden" name="_csrf" value="eHdQMEtDVkoLDzEBfhYZMDUgEWB/NR17Oh1gBBMXYxhJTwVGchMfGw==">	
							<div class="row">
								<div class="col-md-4">
									<div class="form-group field-donationform-amount required">
<label class="control-label" for="donationform-amount">Headlamps</label>
<div class="input-group">
  <input type="text" id="donationform-hlcount" class="form-control" name="DonationForm[hlcount]" value="0" disabled>
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" value="$25/each" disabled>
  <span class="input-group-addon">=</span>
  <input type="text" id="donationform-hlamount" class="form-control" name="DonationForm[hlamount]" value="0" disabled>
</div>

<div class="help-block"></div>
</div>								</div>
<div class="col-md-4">
									<div class="form-group field-donationform-amount required">
<label class="control-label" for="donationform-amount">Donation</label>
<input type="text" id="donationform-amount" class="form-control" name="DonationForm[amount]">

<div class="help-block"></div>
</div>								</div>
							<div class="col-md-4">
									<div class="form-group field-donationform-amount required">
<label class="control-label" for="donationform-amount">Total</label>
<input type="text" id="donationform-amount" class="form-control" name="DonationForm[total]" disabled>

<div class="help-block"></div>
</div>								</div>	

							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group field-donationform-card_number required">
<label class="control-label" for="donationform-card_number">Card Number</label>
<input type="text" id="donationform-card_number" class="form-control" name="DonationForm[card_number]">

<div class="help-block"></div>
</div>								</div>

<div class="col-md-2">
									<div class="form-group field-donationform-card_exp_month required">
<label class="control-label" for="donationform-card_exp_month">Month</label>
<select id="donationform-card_exp_month" class="form-control" name="DonationForm[card_exp_month]">
<option value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

<div class="help-block"></div>
</div>								</div>
								<div class="col-md-3">
									<div class="form-group field-donationform-card_exp_year required">
<label class="control-label" for="donationform-card_exp_year">Year</label>
<select id="donationform-card_exp_year" class="form-control" name="DonationForm[card_exp_year]">
<option value=""></option>
<option value="14">2014</option>
<option value="15">2015</option>
<option value="16">2016</option>
<option value="17">2017</option>
<option value="18">2018</option>
<option value="19">2019</option>
<option value="20">2020</option>
<option value="21">2021</option>
<option value="22">2022</option>
<option value="23">2023</option>
<option value="24">2024</option>
<option value="25">2025</option>
<option value="26">2026</option>
<option value="27">2027</option>
<option value="28">2028</option>
<option value="29">2029</option>
</select>

<div class="help-block"></div>
</div>								</div>

<div class="col-md-2">
									<div class="form-group field-donationform-card_cvv2 required">
<label class="control-label" for="donationform-card_cvv2">CVV2</label>
<input type="text" id="donationform-card_cvv2" class="form-control" name="DonationForm[card_cvv2]">

<div class="help-block"></div>
</div>								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group field-donationform-first_name required">
<label class="control-label" for="donationform-first_name">First Name</label>
<input type="text" id="donationform-first_name" class="form-control" name="DonationForm[first_name]">

<div class="help-block"></div>
</div>								</div>
								<div class="col-md-6">
									<div class="form-group field-donationform-last_name required">
<label class="control-label" for="donationform-last_name">Last Name</label>
<input type="text" id="donationform-last_name" class="form-control" name="DonationForm[last_name]">

<div class="help-block"></div>
</div>								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<div class="form-group field-donationform-email required">
<label class="control-label" for="donationform-email">Email</label>
<input type="text" id="donationform-email" class="form-control" name="DonationForm[email]">

<div class="help-block"></div>
</div>								</div>
								<div class="col-md-5">
									<div class="form-group field-donationform-phone">
<label class="control-label" for="donationform-phone">Phone</label>
<input type="text" id="donationform-phone" class="form-control" name="DonationForm[phone]">

<div class="help-block"></div>
</div>								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group field-donationform-address1 required">
<label class="control-label" for="donationform-address1">Address1</label>
<input type="text" id="donationform-address1" class="form-control" name="DonationForm[address1]">

<div class="help-block"></div>
</div>								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group field-donationform-address2">
<label class="control-label" for="donationform-address2">Address2</label>
<input type="text" id="donationform-address2" class="form-control" name="DonationForm[address2]">

<div class="help-block"></div>
</div>								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group field-donationform-city required">
<label class="control-label" for="donationform-city">City</label>
<input type="text" id="donationform-city" class="form-control" name="DonationForm[city]">

<div class="help-block"></div>
</div>								</div>
								<div class="col-md-3">
									<div class="form-group field-donationform-state required">
<label class="control-label" for="donationform-state">State</label>
<select id="donationform-state" class="form-control" name="DonationForm[state]">
<option value=""></option>
<option value="AL">AL</option>
<option value="AK">AK</option>
<option value="AZ">AZ</option>
<option value="AR">AR</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DE">DE</option>
<option value="DC">DC</option>
<option value="FL">FL</option>
<option value="GA">GA</option>
<option value="HI">HI</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="IA">IA</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="ME">ME</option>
<option value="MD">MD</option>
<option value="MA">MA</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MS">MS</option>
<option value="MO">MO</option>
<option value="MT">MT</option>
<option value="NE">NE</option>
<option value="NV">NV</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NY">NY</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VT">VT</option>
<option value="VA">VA</option>
<option value="WA">WA</option>
<option value="WV">WV</option>
<option value="WI">WI</option>
<option value="WY">WY</option>
</select>

<div class="help-block"></div>
</div>								</div>
								<div class="col-md-3">
									<div class="form-group field-donationform-postal_code required">
<label class="control-label" for="donationform-postal_code">Postal Code</label>
<input type="text" id="donationform-postal_code" class="form-control" name="DonationForm[postal_code]">

<div class="help-block"></div>
</div>								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group field-donationform-comments">
<label class="control-label" for="donationform-comments">Comments</label>
<textarea id="donationform-comments" class="form-control" name="DonationForm[comments]" rows="5"></textarea>

<div class="help-block"></div>
</div>								</div>
							</div>

									<button type="submit" class="btn btn-success btn-lg pull-right">Donate</button>
							</form>
			
			</div>
		  </div>
		</div>
	  </section>