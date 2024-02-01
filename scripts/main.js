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

// languageSwitch.js

document.addEventListener("DOMContentLoaded", function () {
  // Function to get the current page name
  function getCurrentPage() {
    var pathArray = window.location.pathname.split('/');
    return pathArray[pathArray.length - 1];
  }

  // Function to set the selected option based on the current page
  function setSelectedOption() {
    var currentPage = getCurrentPage();
    var select = document.getElementById('languageDropdown');

    if (currentPage === 'index_french.html') {
      select.value = 'index_french.html';
    } else if (currentPage === 'index_rus.html') {
      select.value = 'index_rus.html';
    } else {
      // Default to 'index.html' (German)
      select.value = 'index.html';
    }
  }

  // Initial setup
  setSelectedOption();

  // Event listener for language change
  var select = document.getElementById('languageDropdown');
  select.addEventListener('change', function () {
    var selectedOption = select.options[select.selectedIndex];
    var selectedPage = selectedOption.value;

    // Navigate to the selected page
    window.location.href = selectedPage;
  });
});



