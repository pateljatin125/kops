$('#requestform').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        email: jQuery('#email').val(),
        phone: jQuery('#phone').val(),
    };
    $.ajax({
        type: "POST",
        url: 'sendreviewrequest',
        data: formData,
        success: function( msg ) {
            $("#response").html(msg);
        }
    });
});


$( document ).ready(function() {
$('#submitreviewvalue').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        requestId: jQuery('#requestId').val(),
        review: jQuery('#review').val(),
        rating: jQuery('#rating').val(),
        redirectUrl: jQuery('#redirectUrl').val(),
    };
    $.ajax({
        type: "POST",
        url: '/submitreview',
        data: formData,
        success: function( data ) {
            var json = $.parseJSON(data);
            if(json.redirect == '1')
            {
                alert("Thanks for rating! Please give us review on google too!");
                window.location.replace(json.url);
            }
            else{
                $("#response").html("Thanks For Review ! Please close the window");
            }

        }
    });
});
});