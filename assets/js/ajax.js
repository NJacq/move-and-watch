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
