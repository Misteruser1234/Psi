$("img.d-block.w-100").click(function(){
// $(document).ready(function(){    
    galerijaInit();
});

$( window ).resize(function() {
    galerijaInit();
});

$(".maska").click(function(){
    $(".maska").hide();
});

$(".maska div").click(function(e) {
    e.stopPropagation();
});

function galerijaInit(){
    $(".maska").show();
    slikeDole = $(".sve-slike");
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
}
