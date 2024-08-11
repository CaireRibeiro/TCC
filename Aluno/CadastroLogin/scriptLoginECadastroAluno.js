$('.message a').click(function(){
      $('.form-login').animate({height: "toggle", opacity: "toggle"}, "slow");
   });

   setTimeout(function () {
      document.getElementById('error-message').style.display = 'none';
   }, 4000);

   setTimeout(function () {
      document.getElementById('success-message').style.display = 'none';
   }, 4000);