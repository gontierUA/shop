/**
 * Created by Evgeniy on 29.10.2014.
 */
'use strict';
$(document).ready(function(){
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
    itemRowNumberField.on('change',function(){
        var thisItemPrice = $(this).parents('.item').find('.price_number');
        thisItemDefaultPrice = thisItemDefaultPrice ? thisItemDefaultPrice : parseInt(thisItemPrice.text().replace(/ /g,''));
        var currentItemPrice = $(this).val() * thisItemDefaultPrice;
        thisItemPrice.text(currentItemPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "));

        refreshTotalAmount();
    });

}

function refreshTotalAmount() {
    var itemRow = $('.checkout_table .item');
    var allItemsPrice = 0;
    var allItemsPriceEl = itemRow.find('.price_number');
    var totalAmount = $('.total_amount');
    allItemsPriceEl.each(function(){
        allItemsPrice += parseInt($(this).text().replace(/ /g,''));
    });
    totalAmount.text(allItemsPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
}