        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>crop/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>crop/css/loadding.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>crop/css/popup-style.css">
<section>
	<div class="tournamet-table features depo_mony">
    	<div class="container">
        	<div class="row">
            	<div class="banner-box">
                	<h1>
                    	Deposit money
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="payment-page">
                    <div class="deposit-box">
						<p class="depo_txt">Choose online payment method</p>
                        <div class="deposit-img">
                            <a class="for-pypl" href="<?php echo base_url(); ?>paypal-amount"><img src="<?php echo base_url(); ?>assets/images/paypal-logo.png" class="img-responsive"></a>                        
                        </div>  
                    </div>
                    <div class="link">
                        <a onClick="history.go(-1);" href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/images/depo_mony_arr.png" /></a>    
                    </div>    
                </div>
 
                     <!-- <form action="<?php echo base_url();?>php-paypal-credit-card/DirectPayment/DoDirectPayment.php" method="POST">
                <div id="">
                    <h2>Pay with my debit or credit card</h2>
                    <hr/>
                    <center> <h3>Billing Information</h3></center>
                    <input type="hidden" name="paymentType" value="Sale"/>
                    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
                    <table style="width:100%">
                        <tr>
                            <td id="td-label">First name : </td>
                            <td><input type="text" name="firstName" id="name" placeholder="enter first name"></td>		

                        </tr>
                        <tr>
                            <td id="td-label">Last name : </td>
                            <td><input type="text" name="lastName" id="name" placeholder="enter last name"></td>		

                        </tr>
                        <tr>
                            <td id="td-label">Card type : </td>
                            <td>
                                <select name="creditCardType">
                                    <option value="Visa" selected="selected">Visa</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="Discover">Discover</option>
                                    <option value="Amex">American Express</option>
                                </select>
                            </td>		

                        </tr>
                        <tr>

                            <td id="td-label">Card number : </td>
                            <td><input type="text" name="creditCardNumber" id="cardno" placeholder="enter card number" required="true"></td>		

                        </tr>

                        <tr>

                            <td id="td-label">Expiry date : </td>
                            <td><div id="date-div"><select name="expDateMonth">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select></div>
                                <div id="year-div">

                                    <select name="expDateYear">					

                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>						
                                    </select>
                                </div></td>		

                        </tr>

                        <tr>

                            <td id="td-label">CVV : </td>
                            <td><div id="date-div"><input type="text" name="cvv2Number" id="cvv" placeholder="cvv" required="true"></div></td>		

                        </tr>
                        <tr>

                            <td id="td-label">Amount( USD ) : </td>
                            <td><input type="text" name="amount" id="name" placeholder="enter amount " value="<?php echo $p_price; ?>"  ></td>		

                        </tr>
                    </table>

                    <center> <h3>Billing address</h3></center>

                    <table style="width:100%">
                        <tr>
                            <td id="td-label">Address 1 : </td>
                            <td><input type="text" name="address1" id="name" placeholder="enter address "></td>		

                        </tr>
                        <tr>
                            <td id="td-label">Address 2 : </td>
                            <td><input type="text" name="address2" id="name" placeholder="enter address"></td>		

                        </tr>
                        <tr>
                            <td id="td-label">City : </td>
                            <td><input type="text" name="city" id="name" placeholder="enter city name"></td>	

                        </tr>
                        <tr>

                            <td id="td-label">State : </td>
                            <td>
                                <div id="date-div">
                                    <select id="state" name="state">
                                        <option value=""></option>
                                        <option value="AK">AK</option>
                                        <option value="AL">AL</option>
                                        <option value="AR">AR</option>
                                        <option value="AZ">AZ</option>
                                        <option value="CA" selected="">CA</option>
                                        <option value="CO">CO</option>
                                        <option value="CT">CT</option>
                                        <option value="DC">DC</option>
                                        <option value="DE">DE</option>
                                        <option value="FL">FL</option>
                                        <option value="GA">GA</option>
                                        <option value="HI">HI</option>
                                        <option value="IA">IA</option>
                                        <option value="ID">ID</option>
                                        <option value="IL">IL</option>
                                        <option value="IN">IN</option>
                                        <option value="KS">KS</option>
                                        <option value="KY">KY</option>
                                        <option value="LA">LA</option>
                                        <option value="MA">MA</option>
                                        <option value="MD">MD</option>
                                        <option value="ME">ME</option>
                                        <option value="MI">MI</option>
                                        <option value="MN">MN</option>
                                        <option value="MO">MO</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="NC">NC</option>
                                        <option value="ND">ND</option>
                                        <option value="NE">NE</option>
                                        <option value="NH">NH</option>
                                        <option value="NJ">NJ</option>
                                        <option value="NM">NM</option>
                                        <option value="NV">NV</option>
                                        <option value="NY">NY</option>
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
                                        <option value="VA">VA</option>
                                        <option value="VT">VT</option>
                                        <option value="WA">WA</option>
                                        <option value="WI">WI</option>
                                        <option value="WV">WV</option>
                                        <option value="WY">WY</option>
                                        <option value="AA">AA</option>
                                        <option value="AE">AE</option>
                                        <option value="AP">AP</option>
                                        <option value="AS">AS</option>
                                        <option value="FM">FM</option>
                                        <option value="GU">GU</option>
                                        <option value="MH">MH</option>
                                        <option value="MP">MP</option>
                                        <option value="PR">PR</option>
                                        <option value="PW">PW</option>
                                        <option value="VI">VI</option>
                                    </select>

                                </div>  
                            </td>		

                        </tr>

                        <tr>

                            <td id="td-label">Zip code : </td>
                            <td>
                                <input type="text" name="zip" id="name" placeholder="enter zip code  (5 or 9 digits)">
                            </td>		

                        </tr>
                        <tr>
                            <td id="td-label">Country : </td>
                            <td><input type="text" name="country" id="name" placeholder="enter country name"></td>		

                        </tr>
                        <tr>

                            <td id="td-label">Phone Number : </td>
                            <td><input type="text" name="phone" id="name" placeholder="enter Phone number "></td>		
                        </tr>
                    </table><br>
                  <!--  <center><!--<a href="#" id="paynow"> Pay Now </a><input  style=<!--"  width: 20%;"type="submit" id="buynow" name="DoDirectPaymentBtn" value="Pay Now"></center><br>
                </div>
            </form> -->
 
			
			
			
			
			
			
			
			</div>

			

        </div>
    </div>
</section>
        <script src="<?php echo base_url();?>crop/js/jquery.simplePopup.js" type="text/javascript"></script>
        <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('input#buynow').click(function() {
                                            if ($('input#cardno').val() != '') {
                                                if ($('input#cvv').val() != '') {
                                                    $('#pop2').simplePopup();
                                                }
                                            }

                                        });
                                    });
        </script>