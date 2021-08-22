require('./bootstrap');

require('alpinejs');

$(function() {
    $('.select2').select2({
        width: 'resolve'
    });

    $('.select-states').select2({
        width: 'resolve',
        ajax: {
            url: '/estados-json/',
            data: function (params) {
                let dataQuery = {
                    term: params.term,
                    type: 'public'
                }
                return dataQuery;
            },
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data,
                    pagination: {
                        more: false,
                    }
                }
            }
        }
    }).trigger('change');

    $('.select-cities').select2({
        width: 'resolve',
        ajax: {
            url: '/ciudades-json/',
            data: function (params) {
                let dataQuery = {
                    term: params.term,
                    type: 'public'
                }
                return dataQuery;
            },
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data,
                    pagination: {
                        more: false,
                    }
                }
            }
        }
    }).trigger('change');
});
