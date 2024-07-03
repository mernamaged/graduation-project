function toggleGallery() {
    var gallery = document.getElementById("menu"); // Updated ID
    var button = document.querySelector(".sp");

    if (gallery.style.display === "none" || gallery.style.display === "") {
        gallery.style.display = "block";
        button.textContent = "Read Less";
    } else {
        gallery.style.display = "none";
        button.textContent = "Read More";
    }
  }

  function toggleGaller() {
    var gallery = document.getElementById("mo"); // Updated ID
    var button = document.querySelector(".sl");

    if (gallery.style.display === "none" || gallery.style.display === "") {
        gallery.style.display = "block";
        button.textContent = "Read Less";
    } else {
        gallery.style.display = "none";
        button.textContent = "Read More";
    }
  }

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
            const targetPosition = targetSection.offsetTop - 50;
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

                if (scrollPosition >= sectionTop -220 && scrollPosition < sectionBottom) {
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


  