/**
 * Created by Evgeniy on 29.10.2014.
 */
$(document).ready(function(){
	$('select').selectric();
	$("#example_id").ionRangeSlider({
		min: 1000000,
		max: 100000000,
		type: "double",
		postfix: " pounds",
		step: 10000,
		from: 25000000,
		to: 35000000,
		onChange: function(obj) {

		},
		onLoad: function(obj) {

		},
		onFinish: function() {
			var filterValue = $("#example_id").val();
			$('<div class="goods_preload"><imgs src="imgs/goods_preloader.gif" alt=""/></div>').prependTo($('.goods_wraper')).fadeIn()
			$.ajax({
				url: '',
				type: 'POST',
				data: filterValue,
				dataType: 'text',
				success: function(response){
					//$('.goods_wraper').html('correct response');
				},
				error: function(xhr,ajaxOptions,thrownError) {
					alert(thrownError)
				}
			})

		}
	});

	$('.tab__switcher').on('click',function(){
		var target = $(this).attr('rel');
		$('.tabs__content').removeClass('shown');
		$('.tab__switcher').removeClass('active');
		$(this).addClass('active');
		$('#'+target).addClass('shown');
	})

	checkoutCalc();
});

function checkoutCalc() {
	var itemRow = $('.checkout_table .item');
	var itemRowNumberField = itemRow.find('.counter');
	var thisItemDefaultPrice = null;
	itemRowNumberField.on('change',function(){
		var thisItemPrice = $(this).parents('.item').find('.price_number');
		thisItemDefaultPrice = thisItemDefaultPrice ? thisItemDefaultPrice : thisItemPrice.text();
		thisItemPrice.text($(this).val() * thisItemDefaultPrice);
	});
	console.log(itemRowNumberField);
	//itemRow.each(function(){
	//	var itemRowNumberField = $(this).find('.counter');
	//})
}
