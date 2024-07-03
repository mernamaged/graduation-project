$(document).ready(function () {
    // Add click event handler for portfolio filter buttons
    $('.portfolio-filter a').on('click', function (e) {
        e.preventDefault();

        // Remove active class from all filter buttons
        $('.portfolio-filter a').removeClass('active');

        // Add active class to the clicked filter button
        $(this).addClass('active');

        // Get the filter value from the data attribute
        var filterValue = $(this).data('filter');

        // Show/hide portfolio items based on the selected filter
        if (filterValue === '*') {
            $('.portfolio-items li').show();
        } else {
            $('.portfolio-items li').hide();
            $('.portfolio-items li' + filterValue).show();
        }
    });
});
window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink');
        } else {
            navbarCollapsible.classList.add('navbar-shrink');
        }
    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when the page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    }

    // Collapse responsive navbar when the toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );

    // Function to handle the click event on nav items
    const handleNavItemClick = (event) => {
        // Remove the 'active' class from all nav items
        responsiveNavItems.forEach(item => item.classList.remove('active'));

        // Add the 'active' class to the clicked nav item
        event.currentTarget.classList.add('active');

        // Collapse the navbar if toggler is visible
        if (window.getComputedStyle(navbarToggler).display !== 'none') {
            navbarToggler.click();
        }

        // Scroll to the target section
        const targetId = event.currentTarget.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            const targetPosition = targetSection.offsetTop - 200;
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }

        // Prevent the default anchor link behavior
        event.preventDefault();
    };

    // Function to update active state based on scroll position
    const updateActiveStateOnScroll = () => {
        const scrollPosition = window.scrollY;

        responsiveNavItems.forEach(item => {
            const targetId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                const sectionTop = targetSection.offsetTop;
                const sectionBottom = sectionTop + targetSection.offsetHeight;

                if (scrollPosition >= sectionTop -200 && scrollPosition < sectionBottom) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            }
        });
    };

    // Add click event listener to each responsive nav item
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', handleNavItemClick);
    });

    // Update active state on scroll
    document.addEventListener('scroll', updateActiveStateOnScroll);
});


$('.counter').counterUp({
    delay: 15,
    time: 2000
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
        $('.scrollup').fadeIn('slow');
    } else {
        $('.scrollup').fadeOut('slow');
    }
});

$('.scrollup').click(function () {
    $("html, body").animate({scrollTop: 0}, 500);
    return false;
});

document.querySelectorAll('.btn-close').forEach(function(button) {
    button.addEventListener('click', function() {
        var alert = button.closest('.alert');
        alert.classList.remove('show');
        alert.classList.add('fade');
        setTimeout(function() {
            alert.remove();
        }, 150); // Matches the Bootstrap fade transition duration
    });
});

$(document).ready(function (){
    $('#contactForm'). submit(function (ev){
       $('.lp').each(function (){
          if($(this).val() == ''){
             $(this).css({'border':'1px solid red'});
             $('.msg').html('Fields are required');
             ev.preventDefault();
          }else{
            $(this).css({'border':'1px solid #eee'});
            $('.msg').html('');
          }
       });
    });
 });
