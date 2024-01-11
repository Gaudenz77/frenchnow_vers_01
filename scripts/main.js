// HAMBURGER MENU SCRIPT ----------------------------------------------------------------
  const menuButton = document.querySelector("a#menu-icon");

  menuButton.addEventListener("click", function(e) {
    e.preventDefault();
    menuButton.classList.toggle("close");
  });

// Banner CLOSE ONCLICK

  function closeBanner() {
    // Hide the banner container smoothly
    document.querySelector('.bannercontainer').style.transition = 'height 0.5s ease';
    document.querySelector('.bannercontainer').style.height = '0';

    // Scroll to the contact section after the banner is closed (tease to contact if wanted with timeout?)
    /* setTimeout(function () {
      document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
    }, 500); */
  }

  // Scroll to the contact section when "BOOK FREE LESSON NOW" is clicked
  document.querySelector('.booking').addEventListener('click', function () {
    document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
  });

