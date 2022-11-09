$(function() {
    /*-------------------------------------Header Fixed-------------------------*/
    "use strict";
    $(document).on("click", ".delete-item", function() {
        var url = $(this).data("url");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.isConfirmed) {
                window.location = url;
            }
        });
    });

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
    /* if (selected_state_id != '') {
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
    } */
    //End state list
    //get state by country
    $(document).on('change', '#country-dd', function() {
        var idCountry = this.value;
        //console.log(idCountry);
        $("#state-dd").html('');
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
            }
        });
    });

});