$(function() {
    "use strict";
    var select_country_id = $('#country-dd').val();
    var selected_state_id = $('#selected_state').val();
    var selected_city_id = $('#selected_city').val();
    //console.log(select_country_id);
    //On selected get state
    if (select_country_id != '') {
        $("#state-dd").html('');
        $.ajax({
            url: base_url + "/fetch-states",
            type: "POST",
            data: {
                country_id: select_country_id,
                _token: csrf
            },
            dataType: 'json',
            success: function(result) {
                $('#state-dd').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    var selected = '';
                    if (value.id == selected_state_id) {
                        selected = 'selected';
                    }
                    $("#state-dd").append('<option value="' + value
                        .id + '" ' + selected + '>' + value.name + '</option>');
                });
                $('#city-dd').html('<option value="">Select City</option>');
            }
        });
    }
    //selected city
    if (selected_state_id != '') {
        //var idState = this.value;
        $("#city-dd").html('');
        $.ajax({
            url: base_url + "/fetch-cities",
            type: "POST",
            data: {
                state_id: selected_state_id,
                _token: csrf
            },
            dataType: 'json',
            success: function(res) {
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(res.cities, function(key, value) {
                    var selected = '';
                    if (value.id == selected_city_id) {
                        selected = 'selected';
                    }
                    $("#city-dd").append('<option value="' + value
                        .id + '" ' + selected + '>' + value.name + '</option>');
                });
            }
        });
    }
    //End state list
    //get state by country
    $(document).on('change', '#country-dd', function() {
        var idCountry = this.value;
        //console.log(idCountry);
        $("#state-dd").html('');
        $("#loading_container").attr("style", "display:block");
        $.ajax({
            url: base_url + "/fetch-states",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: csrf
            },
            dataType: 'json',
            success: function(result) {
                $('#state-dd').html('<option value="">Select State</option>');
                $.each(result.states, function(key, value) {
                    $("#state-dd").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                $('#city-dd').html('<option value="">Select City</option>');
                $("#loading_container").attr("style", "display:none");
            }
        });
    });

    //get city by state
    $(document).on('change', '#state-dd', function() {
        var idState = this.value;
        $("#city-dd").html('');
        $("#loading_container").attr("style", "display:block");
        $.ajax({
            url: base_url + "/fetch-cities",
            type: "POST",
            data: {
                state_id: idState,
                _token: csrf
            },
            dataType: 'json',
            success: function(res) {
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(res.cities, function(key, value) {
                    $("#city-dd").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                $("#loading_container").attr("style", "display:none");
            }
        });
    });
    $("#city_autocomplete").autocomplete({
        source: function(request, response) {
            //console.log(request.term);
            $("#loading_container").attr("style", "display:block");
            $.ajax({
                url: base_url + "/fetch-city-autocomplete",
                dataType: "json",
                type: "POST",
                data: {
                    _token: csrf,
                    q: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                    $("#loading_container").attr("style", "display:none");
                }
            });
        },
        /*  select: function(event, ui) {
             $('#city_autocomplete').val(ui.item.value);
             console.log(ui.item);
             return false;
         }, */
        select: function(event, ui) {
            // Set selection
            $('#city_autocomplete').val(ui.item.label); // display the selected text
            $('#location_id').val(ui.item.value); // save selected id to input
            return false;
        }
    });

    $("#newsletter_form").validate({
        rules: {
            email: {
                required: true,
                email: true,
                //regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            }
        },

        submitHandler: function(form) {
            $.ajax({
                type: "POST",
                url: base_url + "/store-newsletter",
                data: $(form).serialize(),
                success: function() {
                    //$(form).html("<div id='message'></div>");
                    //$('#message').html("<h2>Thank you !</h2>")
                    toastr.success('Thank you for subscribing !');
                    $('#newsletter_form').each(function() {
                        this.reset();
                    });
                }
            });
            return false; // required to block normal submit since you used ajax
        }
    });

    $('#city-dd').change(function() {
        var selectedCity = $("#city-dd option:selected").text();
        $('#city_name').val(selectedCity);
    });

});