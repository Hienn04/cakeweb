$jq('#search_desktop').on("keyup", function () {
    if ($jq('#search_desktop').val().length >= 4) {
        $jq('.product-suggestions').html("");
        $jq.ajax({
            url: "/Home/IndexCP",
            method: 'post',
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({
                q: $jq('#search_desktop').val()
            }),
            success: function (data) {
                if (data.results != "") {
                    $jq('.product-suggestions').html(data.results);
                    $jq('#result-seach').attr("style", "display:block !important")
                }
            }
        });
    }
});
$jq('#search_desktop').on("focus", function () {
    $jq('#search_desktop').val("");
    //if ($jq('#search_desktop').val().length >= 4) {
    //    $jq('.product-suggestions').html("");
    //    $jq.ajax({
    //        url: "/Home/IndexCP",
    //        method: 'post',
    //        dataType: "json",
    //        contentType: "application/json; charset=utf-8",
    //        data: JSON.stringify({
    //            q: $jq('#search_desktop').val()
    //        }),
    //        success: function (data) {
    //            if (data.results != "") {
    //                $jq('.product-suggestions').html(data.results);
    //                $jq('#result-seach').attr("style", "display:block !important")
    //            }
    //        }
    //    });
    //}
});
$jq('#search_mobile').on("keyup", function () {
    if ($jq('#search_mobile').val().length >= 4) {
        $jq('.product-suggestions-mobile').html("");
        $jq.ajax({
            url: "/Home/IndexCP",
            method: 'post',
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({
                q: $jq('#search_mobile').val()
            }),
            success: function (data) {
                if (data.results != "") {
                    $jq('.product-suggestions-mobile').html(data.results);
                    $jq('#result-seach-mobile').attr("style", "display:block !important")
                }
            }
        });
    }
});
$jq('#search_mobile-mobile').on("focus", function () {
    $jq('#search_mobile').val("");
    //if ($jq('#search_desktop').val().length >= 4) {
    //    $jq('.product-suggestions').html("");
    //    $jq.ajax({
    //        url: "/Home/IndexCP",
    //        method: 'post',
    //        dataType: "json",
    //        contentType: "application/json; charset=utf-8",
    //        data: JSON.stringify({
    //            q: $jq('#search_desktop').val()
    //        }),
    //        success: function (data) {
    //            if (data.results != "") {
    //                $jq('.product-suggestions').html(data.results);
    //                $jq('#result-seach').attr("style", "display:block !important")
    //            }
    //        }
    //    });
    //}
});