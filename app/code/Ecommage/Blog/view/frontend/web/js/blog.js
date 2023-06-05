define([
    'jquery',
    "mage/url",
    'mage/mage'
], function($,urlBuilder){
   $('#blog-button-data').click(function(){

    var dataForm = $('#blog-form-data').serializeArray().reduce(function(obj, item) {
             obj[item.name] = item.value;
            return obj;
        }, {});

        var url = urlBuilder.build('blog/blog/save/');
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                showLoader: true, 
                data: {
                    data: dataForm 
                },
                success: function(response) {
                  
                },
                error: function (xhr, status, errorThrown) {
                }
            });
   });

});