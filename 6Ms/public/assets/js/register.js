$(document).ready(function (){
    $('form'). submit(function (ev){
       $('.required').each(function (){
          if($(this).val() == ''){
             $(this).css({'border-bottom':'1px solid red'});
             ev.preventDefault();
          }else{
            $(this).css({'border-bottom': '2px solid #fff'});
          }
       });
    });
    $('form').submit(function (event){
         var password = $('#password').val();
         var confirm = $('#confirm').val();
         var usName = $('#username').val();
         var email = $('#email').val();
         var address = $('#address').val();
         var phone = $('#phone').val();


         if(usName == ''){
           $('.usname').addClass('error')
                    .html('Username is required');
             event.preventDefault();
         }else{
           $('.usname').hide()
         }

         if(email == ''){
           $('.usemail').addClass('error')
                    .html('Email is required');
             event.preventDefault();
         }else{
           $('.usemail').hide();
         }
         if(address == ''){
          $('.usaddress').addClass('error')
                   .html('address is required');
            event.preventDefault();
        }else{
          $('.usaddress').hide();
        }
        if(phone == ''){
          $('.usphone').addClass('error')
                   .html('phone is required');
            event.preventDefault();
        }else{
          $('.usphone').hide();
        }
         if(password == ''){
           $('.uspass').addClass('error')
                    .html('password is required');
             event.preventDefault();
         }else{
           $('.uspass').hide();
         }

         if(password != confirm){
           $('.confirm').addClass('error')
                    .html('password dose not match confirm password');
           event.preventDefault();
         }
         else{
            $('.confirm').html('');

         }

     });
 });
 document.addEventListener("DOMContentLoaded", function () {
  let passwordInput = document.getElementById("password");
  let show = document.getElementById("show");

  passwordInput.addEventListener("input", function () {
      if (passwordInput.value.length > 0) {
          show.style.display = "block";
      } else {
          show.style.display = "none";
      }
  });

  show.onclick = function () {
      if (passwordInput.type === "password") {
          passwordInput.type = "text";
          show.innerHTML = '<i class="fa-solid fa-eye show"></i>';
      } else {
          passwordInput.type = "password";
          show.innerHTML = '<i class="fa-solid fa-eye-slash show"></i>';
      }
  };
});

document.addEventListener("DOMContentLoaded", function () {
  let passwordInput = document.getElementById("confirm");
  let show = document.getElementById("showe");

  passwordInput.addEventListener("input", function () {
      if (passwordInput.value.length > 0) {
          show.style.display = "block";
      } else {
          show.style.display = "none";
      }
  });

  show.onclick = function () {
      if (passwordInput.type === "password") {
          passwordInput.type = "text";
          show.innerHTML = '<i class="fa-solid fa-eye show"></i>';
      } else {
          passwordInput.type = "password";
          show.innerHTML = '<i class="fa-solid fa-eye-slash show"></i>';
      }
  };
});
