function searchEvents() {
    let keyword = document.getElementById("search").value;

    $.ajax({
        url: "../ajax/search_events.php",
        method: "POST",
        data: {key: keyword},
        success: function(data){
            $("#result").html(data);
        }
    });
}