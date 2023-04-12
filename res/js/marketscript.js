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
            var storeInfo = response;
            console.log(storeInfo);
            var storeDescription = storeInfo.description;
            console.log(storeDescription);
            var storeContact = storeInfo.contact;
            console.log(storeContact);
            var storeInfoBox = $('#storeInfoBox');
            storeInfoBox.html('<p>' + storeInfo + '</p>');
        },
        error: function(xhr, status, error) {
            console.log("AJAX error: " + status + " - " + error);
        }
    })
}