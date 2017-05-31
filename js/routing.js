function goToPage(urlPath, urlNamed){
    $.ajax({
       url: urlPath,
        type: "GET",
        success: function(data) {
            $("#main").html($(data).find('#main').html());
            window.history.pushState(null, null, urlNamed);
        }
    });
}