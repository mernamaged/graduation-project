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
  document.addEventListener('DOMContentLoaded', function() {
    const nextStepButton = document.querySelector('.cfirst');

    nextStepButton.addEventListener('click', function() {
      const secondCard = document.getElementById('second');
      secondCard.style.display = 'block';
    });
  });
  document.addEventListener('DOMContentLoaded', function() {
    const nextStepButton = document.querySelector('.csecond');

    nextStepButton.addEventListener('click', function() {
      const secondCard = document.getElementById('third');
      secondCard.style.display = 'block';
    });
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
        $('.scrollup').fadeIn('slow');
    } else {
        $('.scrollup').fadeOut('slow');
    }
  });

  $('.scrollup').click(function () {
    $("html, body").animate({scrollTop: 0}, 1000);
    return false;
  });
  function toggleGallery(productId) {
    var gallery = document.getElementById("menu-" + productId);
    var button = document.querySelector(".sp");

    if (gallery.style.display === "none" || gallery.style.display === "") {
        gallery.style.display = "block";
        button.textContent = "Read Less";
    } else {
        gallery.style.display = "none";
        button.textContent = "Read More";
    }
}
function addDesign(productId) {
    var designFile = document.getElementById('design-file-' + productId).value;
    if (!designFile) {
        alert('Please upload a design file before adding.');
    } else {
        // Perform any necessary action when design is added
        document.getElementById('design-file-' + productId).dataset.added = "true";
    }
}
document.querySelectorAll('form[id^="package1-form-"]').forEach(function(form) {
    form.addEventListener('submit', function(event) {
        var productId = form.id.split('-')[2]; // Extracting productId from form id
        var designAdded = document.getElementById('design-file-' + productId).dataset.added;
        if (!designAdded) {
            event.preventDefault();
            alert('Please upload a design file before adding to cart.');
        }
    });
});
