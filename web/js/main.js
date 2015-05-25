/*$('document').ready(function(){
      $('#rechercheForm').bind('submit', function () {
          $.ajax({
             type:"post",
              url:'http://localhost/AdsProject/web/app_dev.php/search/',
              beforeSend: function () {
                  console.log('before ........');
              },
              success: function (data) {
                   alert('response');
                  console.log('success');
              },
              error: function(error){
                  alert('errror');
              }

          });
      });

});*/