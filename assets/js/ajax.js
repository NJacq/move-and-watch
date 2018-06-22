var RealVue = new Vue({
    el: '#realisateurs',
    datatype: JSON,
    data: {
        items:[]
    },
   
    beforeCreate : function () {
      
        var self = this;
        $.ajax({
            url: 'models/model_rea.php',
            success: function (response) {
               self.items = JSON.parse(response);
               console.log(self.items);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});

var CheckboxVue = new Vue({
    el: '#types',
    datatype: JSON,
    data: {
        items:[]
    },
    beforeCreate : function () {
        var self = this;
        $.ajax({
            url: 'models/model_for.php',
            success: function (response) {
                self.items = JSON.parse(response);
                console.log(self.items);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});


var searchFilters = document.getElementById('recherche');
searchFilters.addEventListener('click',function(e){
    e.preventDefault();
    var option = document.getElementById('realisateurs').innerText;
    console.log(option)
    
})


// var Ardt = new Vue({
//     el: '#checkboxArdt',
//     datatype: JSON,
//     data: {
//         items: []
//     },
//     beforeCreate: function () {
//         var self = this;
//         $.ajax({
//             url: 'models/model_allardt.php',
//             success: function (response) {
//                 self.items = JSON.parse(response);
//                 console.log(self.items);
//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     }
// });

var checkbox = document.getElementsByClassName('check');

for(var i = 0; i<checkbox.length; i++){
    checkbox[i].addEventListener('click', function(e){
        console.log(e.target.value)
    })
}
