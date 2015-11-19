
console.log('B');
(function () {
    'use strict';
    var tools = {
        ajax: function (url, arrDataobj, type, callback) {
            $.ajax({
              url: url,
                type: type,
                data: {
                    arrData : arrDataobj
                },
                dataType: 'json',
                success: function (data) {
                    callback(data);
                },
                error: function (data) {
                 callback(data);
                },
                async: true
    });  
    
  }
};
 
    var App= function () {
        this.init = function () {
            console.log('A');
            this.bind();
            this.data.import();
        }
        
    this.bind = function () {
        console.log('c')
        $("#mytable #checkall").click(function () {
            if ($("#mytable #checkall") .is(':checked')) {
                 $("#mytable input [type=checkbox]").each(function () {
                        $(this).prop("checked", true); 
                 });
                
            } else {
                $("#mytbale input[type=checkbox]"). each(function () {
                        $(this) .prop("checked", false)
            });
     }
        
        
});
        $("[data-toggle=tooltip]").tooltip();
        
    };
    
    this.data = {
        import: function () {
            console.log('D')
            var url = '/crud/database_index.php',
                postObj = {};
            tools.ajax(url, postObj, 'post', function(faqs) {
                
                console.log(JSON.stringify( postObj, null, 2))
                for ( var idx in faqs){
                    var question = faqs[idx]['question'],
                        answer = faqs[idx]['answer'];
        
                $('#projects-row').append('\
                        <tr>\
                            <td><input class="checkthis" type= "checkbox"></td>\
                            <td>' + question + '</td>\
                             <td> ' + answer + ' </td>\
                            <td>######</td>\
                             <td>######</td>\
                        <tr>\
                  ');

                 }
      });
    }
  };
};
var app = new App();
app.init();

}) ();
        