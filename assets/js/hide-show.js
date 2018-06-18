
// apparition et disparaition de la div Filtres 
    $("#exit").click(function(event){ // exit = id de la croix
    
        event.preventDefault();
        $("#filtres").hide(); // #filtres = id de la div filtres 
    });
    $(".searchNav").click(function(event){ // .searchNav = class de l'ensemble recherche+ loupe
       
        event.preventDefault();
        $("#filtres").show();
    });
