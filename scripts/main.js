// HAMBURGER MENU SCRIPT ----------------------------------------------------------------
  const menuButton = document.querySelector("a#menu-icon");

  menuButton.addEventListener("click", function(e) {
    e.preventDefault();
    menuButton.classList.toggle("close");
  });

// Banner CLOSE ONCLICK
function closeBanner() {
  // Hide the banner container smoothly
  var bannerContainer = document.querySelector('.bannercontainer');
  bannerContainer.style.transition = 'height 0.5s ease';
  bannerContainer.style.height = '0';

  // Reset the margin-top of the header to 0
  var header = document.querySelector('.tf-header'); // Replace 'tf-header' with the actual class of your header
  header.style.marginTop = '0';
}

// Scroll to the contact section when "BOOK FREE LESSON NOW" is clicked
document.querySelector('.booking').addEventListener('click', function () {
  // Reset the margin-top of the header to 0 before scrolling
  var header = document.querySelector('.tf-header'); // Replace 'tf-header' with the actual class of your header
  header.style.marginTop = '0';

  // Scroll to the contact section when "BOOK FREE LESSON NOW" is clicked
  document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
});


