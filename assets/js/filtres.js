var searchFilters = document.getElementById('recherche');
searchFilters.addEventListener('click',function(e){
    e.preventDefault();
    var option = document.getElementById('realisateurs');
    console.log(option.options[option.selectedIndex].innerText);

    var format = document.getElementById('types');
    console.log(format.options[format.selectedIndex].innerText);
    
//     var checkbox = document.getElementsByClassName('check');
//     for(var i = 0; i<checkbox.length; i++){
//         checkbox[i].addEventListener('click', function(e){
//         console.log(e.target.value)
//     })
// }
})





