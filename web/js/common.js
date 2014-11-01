$(document).ready(function () {
    'use strict';
    $('.add_to_card').on('click', function (e) {
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
            console.log(msg);
        });

    });
});