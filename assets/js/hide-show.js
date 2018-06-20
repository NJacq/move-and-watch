
// apparition et disparaition de la div Filtres 
    $("#exit").click(function(event){ // exit = id de la croix
    
        event.preventDefault(); 
        $("#filtres").hide(1000); // #filtres = id de la div filtres 
    });
    $(".searchNav").click(function(event){ // .searchNav = class de l'ensemble recherche+ loupe
       
        event.preventDefault();
        $("#filtres").show(1000);
    });

