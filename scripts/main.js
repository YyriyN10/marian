(function ($) {
    $(document).ready(function () {

        getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        }

        //compare page scripts

        //dropdown
        $('.dropdown').on('click', function () {
            $(this).toggleClass('active');
        })

        //select for compare
        $('.single_house_name_list').on('click', function () {
            var compare_target_house = $(this).data('target');
            var compare_target_option = $(this).data('option');
            var text = $(this).parent().parent().find('span').text() + " <small>" + $(this).text().trim() + "</small>";

            $(this).parent().parent().parent().parent().find('.name_holder span').html(text);
            $(this).parent().parent().parent().parent().parent().find('.house_holder, .spec_table').removeClass('active');
            $(this).parent().parent().parent().parent().parent().find('.house_holder.' + compare_target_house).addClass('active');
            $(this).parent().parent().parent().parent().parent().find('.house_holder .spec_table.' + compare_target_option).addClass('active');
        })

        //end compare page scripts

        //archive house filtering
        $('.filter .menu li').on('click', function () {
            var target = $(this).data('target');
            $(this).parent().find('li').removeClass('active');
            $(this).addClass('active');
            $('.clear_filters').addClass('active');
            $('.active-filter-wrapper').addClass('active');

            $('#active-filters').html(
                $('#active-filters').html() + ", " +
                $(this).parent().parent().parent().find('span').html() + ": " + $(this).html()
            );

            $('#active-filters').html( $('#active-filters').html().replace(/^, /, '') );

            if ($('.single_house_holder').hasClass('filtering')) {
                $('.single_house_holder.filtering').removeClass('show');
                $('.single_house_holder.filtering.' + target).addClass('show');
            } else {
                $('.single_house_holder').removeClass('show');
                $('.single_house_holder.' + target).addClass('show');
                $('.single_house_holder.show').addClass('filtering');
            }
        })

        $('.clear_filters').on('click', function () {
            $('.single_house_holder').removeClass('show');
            $('.single_house_holder').removeClass('filtering');
            $('.single_house_holder').addClass('show');
            $('.filter .menu li').removeClass('active');
            $(this).removeClass('active');
            $('#active-filters').html('');
            $('.active-filter-wrapper').removeClass('active');
        })

        var filter_holder = $('.filter');

        $(filter_holder).on('click', function () {
            $(this).toggleClass('active');
        })

        $('body').click(function (e) {
            if ($(filter_holder).is(':visible') && !$(e.target).closest(filter_holder).length) {
                $(filter_holder).removeClass('active');
                $(filter_holder).removeClass('active');
            }
        });


        // Prefiltering
        // Read GET parameter "type"
        var type = getUrlParameter('type');

        // Lookup the filter menu item with the data-target attribute equal to the type
        var filterItem = $('.filter .menu li[data-target="' + type + '"]');

        // If the filter menu item exists, click it
        if (filterItem.length) {
            filterItem.click();
        }

        // -----------------------------------------------

        // Preselect for compare
        // Read GET parameter "house"
        var house = getUrlParameter('preselect');

        // Get second parameter for size and roof
        var option = getUrlParameter('option');

        // Lookup the filter menu item with the data-target attribute equal to the type
        var houseItem = $('.single_house_name_list[data-target="' + house + '"][data-option="' + option + '"]');

        // If the filter menu item exists, click it
        if (houseItem.length) {
            houseItem.click();
            houseItem.click();
        }

    })
})
(jQuery)