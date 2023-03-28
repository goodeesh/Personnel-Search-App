//Starting point for JQuery init
$(document).ready(function () {
    $("#searchID").hide();
    $("#searchResult").hide();
    $("#searchContact").hide();
    $("#searchDepartment").hide();
    $("#btn_Search").click(function (e) {
       loaddata($("#seachfield").val());
    });
    $("#btn_SearchID").click(function (e) {
        loaddataID($("#seachfieldID").val());
     });
     $("#btn_SearchContact").click(function (e) {
        loaddataContact($("#seachfieldContact").val());
     });
     $("#btn_SearchDepartment").click(function (e) {
        loaddataDepartment($("#seachfieldDepartment").val());
     });
});


function loaddata(searchterm) {

    $.ajax({
        type: "GET",
        url: "../serviceHandler.php",
        cache: false,
        data: {method: "queryPersonByName", param: searchterm},
        dataType: "json",
        success: function (response) {
            $("#noOfentries").val(response.length);
            $("#searchResult").show(1000).delay(1000).hide(1000);
        }
        
    });
}

function loaddataID(searchterm) {

    $.ajax({
        type: "GET",
        url: "../serviceHandler.php",
        cache: false,
        data: {method: "queryPersonById", param: searchterm},
        dataType: "json",
        success: function (response) {
            $("#noOfentriesID").val(response);
            $("#searchID").show(1000).delay(1000).hide(1000);
        }
        
    });
}
function loaddataContact(searchterm) {

    $.ajax({
        type: "GET",
        url: "../serviceHandler.php",
        cache: false,
        data: {method: "queryPersonByFullname", param: searchterm},
        dataType: "json",
        success: function (response) {
            $("#noOfentriesContact").val(response);
            $("#searchContact").show(1000).delay(1000).hide(1000);
        }
        
    });
}
function loaddataDepartment(searchterm) {

    $.ajax({
        type: "GET",
        url: "../serviceHandler.php",
        cache: false,
        data: {method: "queryPersonByFullnameDepartment", param: searchterm},
        dataType: "json",
        success: function (response) {
            $("#noOfentriesDepartment").val(response);
            $("#searchDepartment").show(1000).delay(1000).hide(1000);
        }
        
    });
}



