<!DOCTYPE html>
<!-- saved from url=(0067)https://banquest.com/secure/payforms_sandbox/ctech/webswipedemo.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Web Swipe Demo</title>
<link rel="shortcut icon" href="https://banquest.com/images/banquest_favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width">
<script src="assets/jquery.min.js"></script>
<script src="assets/jquery.validate.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/jquery-ui.min.js"></script>
<script src="assets/epayswipe.js"></script>
<link href="assets/jquery-ui.css"  rel="stylesheet">
<link href="assets/bootstrap.min.css"  rel="stylesheet">

</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
  <div class="container">
  <!--END header-->
	<form action="example.php" method="post" id="payment_form">
		<div class="form-group">
		  <label>Name:</label>
		  <input name="payment[cardholder]" size="25" value="" type="text" id="txtNameOnCard" class="form-control required">
		</div>      
		<div class="form-group">
		  <label>Card Number:</label>
		  <input id="txtCreditCardNumber" name="payment[card]" value="" size="19" type="text" class="form-control required">
		</div>
		<div class="form-group">
		  <label>Card Expiration Date (MMYY): </label>
		  <input id="expir" name="payment[exp]" value="" size="4" type="text" class="form-control required">
		</div>
		<div class="form-group">
		  <label>Payment Amount: </label>
		  <input name="payment[amount]" value="" size="4" type="text" class="form-control required">
		</div>
		<div class="form-group">
			<input class="submitbutton btn btn-primary" type="button" id="btnSwipe" value="Swipe Card" />		
			<input id="trk2" name="payment[magstripe]" class="form-control" style="width:88%;float:right;display:none;"/>
			<input class="submitbutton btn btn-primary" type="submit" value="Process payment" />
		</div>
    </form>
	<?php //swipe card functionality ?>
	<div class="col-sm-12">				
		<input id="trk2" name="payment[magstripe]" class="form-control" style="display:none;"/>		
	</div>

	<div id="swipe_card_pop" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<input id="txtSwipe" type="text" style="position: absolute; top: -1000px;" />
			<div style="padding: 10px 0 0 10px;"> 
				Please swipe your credit card... 
				<img src="assets/loading.gif" width="24" height="24"> 
			</div>
			<div class="modal-footer">			
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>	
		</div>
	  </div>
	</div>
	<?php //swipe card functionality ?>
   </div>
<!--END footer-->
<style>
.error{color:#ff0000;font-size:14px;font-weight:normal}
</style>
<script>
$(document).ready(function(){
	$("#payment_form").validate();
});
</script>
</body>
</html>