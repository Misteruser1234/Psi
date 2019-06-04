$("img.d-block.w-100").click(function(){
    $("body").css({"overflow":"hidden", "margin-right":"15px"});
    $(".maska").show();   
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

    //Dinamicki ucitava link prve slike sa stranice UO u glavnu sliku
    $(".glavna-slika").attr('src', $( $(".uo-slika")[0] ).attr('src') );

    // Dinamicki ucitava linkove slika na dnu galirije od slika sa stranice UO
    for (i=0; i<9; i++) $( $(".g-slika")[i] ).attr('src', $( $(".uo-slika")[i] ).attr('src') );

    resizeGlavnaSlika();
}

function resizeGlavnaSlika(){
    // Postavlja width glavne slike u odnosu na dimenzije slike i dimenzije ekrana
    slikeDole = $(".slike-dole");
    slika = $(".glavna-slika"); //.width('30vw');

    wSpace = window.innerWidth;
    hSpace = window.innerHeight - slikeDole.height();

    faktor = 0.8;

    slikaRatio = slika.width() / slika.height();
    ekranRatio = wSpace / hSpace;

    if (slikaRatio >= ekranRatio) slika.outerWidth( wSpace * faktor );
    else slika.outerWidth( hSpace * faktor * slikaRatio);

    // Centrira glavnu sliku na ekranu
    slikaTop  = (hSpace - slika.outerHeight()) / 2;
    slikaLeft = (wSpace - slika.outerWidth() ) / 2;
    slika.css({"top": slikaTop + "px", "left": slikaLeft + "px"});

    // Pozicionira strelice i odredjuje im velicinu
    levo  = $("#strelica-levo");
    desno = $("#strelica-desno");

    levo.css({ "font-size": hSpace*0.1});
    desno.css({ "font-size": hSpace*0.1});

    levo.css({ "top": slikaTop + (slika.outerHeight() - levo.outerHeight())  / 2 + "px", "left": slikaLeft - 3.2*levo.outerWidth() + "px"});
    desno.css({"top": slikaTop + (slika.outerHeight() - desno.outerHeight()) / 2 + "px", "left": slikaLeft + slika.outerWidth() + 2*desno.outerWidth() + "px"});
}

// Postavlja src glavne slike da budi isti kao i src slike na dnu na koju je kliknuto
$(".g-slika").click(function(){
    $(".glavna-slika").attr('src', $(this).attr('src') );
    $(".glavna-slika").attr('pos', $(this).attr('pos') );
    resizeGlavnaSlika();
});

// Menja glavnu sliku u levo u odnosu na slilke na dnu
$("#strelica-desno").click(function(){
    pos = parseInt( $(".glavna-slika").attr('pos'), 10);
    pos = (pos + 1) % 9;
    $(".glavna-slika").attr('src', $( $(".uo-slika")[pos] ).attr('src') );
    $(".glavna-slika").attr('pos', pos);
    resizeGlavnaSlika();
});

// Menja glavnu sliku u desno u odnosu na slilke na dnu
$("#strelica-levo").click(function(){
    pos = parseInt( $(".glavna-slika").attr('pos'), 10);
    pos = pos - 1;
    if (pos == -1) pos = 8;
    $(".glavna-slika").attr('src', $( $(".uo-slika")[pos] ).attr('src') );
    $(".glavna-slika").attr('pos', pos);
    resizeGlavnaSlika();
});