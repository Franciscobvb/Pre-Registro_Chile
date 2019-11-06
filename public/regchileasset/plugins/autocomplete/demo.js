$(function () {
    'use strict';
    $.ajax({
        type: 'GET',
        url: URLactual + '/sponsors',
        success: function(Response) {
            var countries = {};

            for (var i = 0; i < Response.length; i++) {
                var currentSponsor = Response[i].associateid + "-" + Response[i].associateName.trim();
                countries[i] = currentSponsor;
            }
        
            var countriesArray = $.map(countries, function (value, key) { return { value: value, data: key }; });
        
            $('#autocomplete-dynamic').autocomplete({
                lookup: countriesArray
            });
        }
    });
});