$("form").submit(function(event) {
    // 阻止表单的默认提交行为
    event.preventDefault();

    var keyword = $("#search-input").val();

    // 发起Ajax请求
    $.ajax({
        type: "GET",
        url: "../../../Online_Marketplace/backend/serviceHandler.php",
        cache: false,
        data: {method: "queryProductbyName", param: keyword},
        dataType: "json",
        success: function(response) {
            $("#search-results").empty();

            // 循环遍历搜索结果，并将其添加到页面中
            // !!!替换为实际的搜索结果展示方式!!!
            /*
            for (var i = 0; i < response.length; i++) {
                var result = response[i];
                var resultHtml = "<div>" + result.name + "</div>";
                $("#search-results").append(resultHtml);
            }
            */
        },
        error: function(xhr, status, error) {
            console.log("AJAX error: " + status + " - " + error);
        }
    });
});