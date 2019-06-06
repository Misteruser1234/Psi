$(document).ready(function(){
    executeAJAX();
});

$(".np-checkbox").click(function(){
    executeAJAX();
});

function collectData(){
    data = [];
    $(".np-checkbox").each(function(){
        if ($(this).prop("checked")){
             data[$(this).attr('name')] = $(this).attr('value'); 
        }
    });
    return data;
}

function executeAJAX(){
    $("#np-rezultati").html("");

    data = collectData();
    $.ajax({
        method: "POST",
        url: "naprednaPretraga",
        data: Object.assign({}, data)
      })
        .done(function( msg ) {
           response = jQuery.parseJSON(msg);
           $("#count").html(response.count);
           if (response.count){
            $("#np-rezultati").show();
            $("#np-rezultati").html(response.data);
           }else $("#np-rezultati").hide();
          
        });
}

$("#pogledaj-rezultate").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#np-rezultati").offset().top - $(".navbar").height()
    }, 1000);
});