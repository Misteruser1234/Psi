$("img.d-block.w-100").click(function(){
//$(document).ready(function(){    
    galerijaInit();
});

$( window ).resize(function() {
    galerijaInit();
});

$(".maska").click(function(){
    $("body").css({"overflow":"auto", "margin-right":"0"});
    $(".maska").hide();
});

$(".maska img").click(function(e) {
    e.stopPropagation();
});

$(".maska i").click(function(e) {
    e.stopPropagation();
});

function galerijaInit(){
    $("body").css({"overflow":"hidden", "margin-right":"15px"});
    $(".maska").show();
    slikeDole = $(".slike-dole");
    slika = $(".glavna-slika"); //.width('30vw');

    wSpace = window.innerWidth;
    hSpace = window.innerHeight - slikeDole.height();

    faktor = 0.8;

    slikaRatio = slika.width() / slika.height();
    ekranRatio = wSpace / hSpace;

    if (slikaRatio >= ekranRatio) slika.outerWidth( wSpace * faktor );
    else slika.outerWidth( hSpace * faktor * slikaRatio);

    slikaTop  = (hSpace - slika.outerHeight()) / 2;
    slikaLeft = (wSpace - slika.outerWidth() ) / 2;
    slika.css({"top": slikaTop + "px", "left": slikaLeft + "px"});

    levo  = $("#strelica-levo");
    desno = $("#strelica-desno");

    levo.css({ "font-size": hSpace*0.1});
    desno.css({ "font-size": hSpace*0.1});

    levo.css({ "top": slikaTop + (slika.outerHeight() - levo.outerHeight())  / 2 + "px", "left": slikaLeft - 3.2*levo.outerWidth() + "px"});
    desno.css({"top": slikaTop + (slika.outerHeight() - desno.outerHeight()) / 2 + "px", "left": slikaLeft + slika.outerWidth() + 2*desno.outerWidth() + "px"});

}
