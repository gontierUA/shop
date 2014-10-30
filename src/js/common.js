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
			$('<div class="goods_preload"><img src="imgs/goods_preloader.gif" alt=""/></div>').prependTo($('.goods_wraper')).fadeIn()
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
});
