        function processSwipe(value) {
			console.log(value);
            var parsedSwipe = parseSwipe(value);
            if (parsedSwipe.CreditCardNumber) {
                $("#txtCreditCardNumber").val(parsedSwipe.CreditCardNumber);
                $("#expir").val("");
                $("#txtNameOnCard").val("");
            }
            if (parsedSwipe.ExpirationDate) {
                $("#expir").val(parsedSwipe.ExpirationDate);
            }
            if (parsedSwipe.NameOnCard) {
                $("#txtNameOnCard").val(parsedSwipe.NameOnCard);
            }
           // $("#swipe-dialog").dialog("close");
            $("body").unbind("click");
        }

        function parseSwipe(swipe) {
            var swipeData = {};
            if (swipe.indexOf('^') > -1) {
                var cardData = swipe.split('^');
                swipeData.CreditCardNumber = $.trim(cardData[0].replace(/[^0-9]/g, ''));
                if (swipe.length > 1)
                    swipeData.NameOnCard = $.trim(cardData[1].replace(/\//, ' '));
                if (swipe.length > 2)
                    swipeData.ExpirationDate = $.trim(cardData[2].substring(2, 4) + cardData[2].substring(0, 2));
            }
            else if (swipe.indexOf('=') > -1) {
                var cardData = swipe.split('=');
                swipeData.CreditCardNumber = $.trim(cardData[0].replace(/[^0-9]/g, ''));
                if (swipe.length > 1)
                    swipeData.ExpirationDate = $.trim(cardData[1].substring(2, 4) + cardData[1].substring(0, 2));
            }
            return swipeData;
        }

 $(document).ready(function() {
	$(document).on('click',"#btnSwipe",function() {
		$("#swipe_card_pop").modal("show");
		$('#swipe_card_pop').on('shown.bs.modal', function() {
			 $(document).find("#txtSwipe").val('');
			 $(document).find("#txtSwipe").focus();
			 $(document).on('keypress',"#txtSwipe",function(e) {
				// console.log(e.keyCode);
				if (e.keyCode == 13) {							
					var sentinel = $(this).val().indexOf(";");							
				$('#trk2').val($(this).val().substring(sentinel)); 
				   // console.log($('#trk2').val());
					processSwipe($(this).val().substring(0,78));
					$("#swipe_card_pop").modal("hide");
				}
			});
		})
	});
});