var RealVue = new Vue({
    el: '#realisateurs',
    datatype: JSON,
    data: {
        items:[]
    },
    mounted : function () {
        var self = this;
        $.ajax({
            url: 'models/model_rea.php',
            success: function (response) {
               self.items = JSON.parse(response);      
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});
