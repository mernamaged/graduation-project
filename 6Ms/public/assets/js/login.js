$(document).ready(function (){
    $('form'). submit(function (ev){
       $('.input').each(function (){
          if($(this).val() == ''){
             $(this).css({'border-bottom':'1px solid red'});
             ev.preventDefault();
          }else{
            $(this).css({'border-bottom':'1px solid #eee'});
          }
       });
    });
    $('form').submit(function(event){
        var email = $('#email').val();
        var password = $('#password').val();
        if(email == ''){
            $('.usemail').addClass('error')
                          .html('Email is required');
            event.preventDefault();
            
        }else{
            $('.usemail').hide();

        }
        if(password == ''){
            $('.uspass').addClass('error')
                        .html('password is required');
            event.preventDefault();
        }else{
            $('.uspass').hide();

        }
    })
 });
 document.addEventListener("DOMContentLoaded", function() {
    let show = document.getElementById("show");
    let passwordInput = document.getElementById("password");

    passwordInput.addEventListener("input", function() {
        if (passwordInput.value.length > 0) {
            show.style.display = "block";
        } else {
            show.style.display = "none";
        }
    });

    show.onclick = function() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            show.innerHTML = '<i class="fa-solid fa-eye show"></i>';
        } else {
            passwordInput.type = "password";
            show.innerHTML = '<i class="fa-solid fa-eye-slash show"></i>';
        }
    };
});
document.getElementById('login').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    
    // Store email in hidden input for cart script
    document.getElementById('user-email').value = email;
    
    // Simulate login (replace with your actual login logic)
   
    
    // Initialize the cart after login
    startCart();
  });

