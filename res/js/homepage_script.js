$(document).ready(function() {
    loaddata();
});

function loaddata() {
    $.ajax({
        type: "GET",
        url: "../../../Online_Marketplace/backend/serviceHandler.php?method=queryStore",
        cache: false,
        dataType: "json",
        success: function (response) {
            console.log(response);
            var storeDescription = response[0].store_description;
            console.log(storeDescription);
            var storeContact = response[0].store_contact;
            var storeInfoBox = $('#storeInfoBox');
            storeInfoBox.html('<p>' + storeDescription + '</p><p style="color: orange;">Contact: ' + storeContact + '</p>');
        },
        error: function(xhr, status, error) {
            console.log("AJAX error: " + status + " - " + error);
        }
    })
}
