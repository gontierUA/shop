/**
 * Created by Evgeniy on 29.10.2014.
 */
'use strict';
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
    });

    $('.js-add-cart').on('click', function (e) {
        e.preventDefault();

        var itemID = $(this).data('item-id');

        $.ajax({
            type: "POST",
            url: "/cart/addToCart",
            dataType: 'json',
            data: {
                item: itemID
            }
        }).done(function(msg) {
            $('#cartCounter').html(' (' + msg + ')');
        });

    });

    checkoutCalc();
});

function checkoutCalc() {
    var itemRow = $('.checkout_table .item');
    var itemRowNumberField = itemRow.find('.counter');
    var thisItemDefaultPrice = null;
    var totalAmount = $('.total_amount');
    itemRowNumberField.on('change',function(){
        var allItemsPrice = 0;
        var thisItemPrice = $(this).parents('.item').find('.price_number');
        thisItemDefaultPrice = thisItemDefaultPrice ? thisItemDefaultPrice : parseInt(thisItemPrice.text().replace(/ /g,''));
        var currentItemPrice = $(this).val() * thisItemDefaultPrice;
        thisItemPrice.text(currentItemPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
        var allItemsPriceEl = itemRow.find('.price_number');
        allItemsPriceEl.each(function(){
            allItemsPrice += parseInt($(this).text().replace(/ /g,''));
        });
        totalAmount.text(allItemsPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
    });
}

