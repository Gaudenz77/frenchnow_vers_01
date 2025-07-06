// Function to get the user's browser language
function getUserLanguage() {
  return navigator.language || navigator.userLanguage;
}

// Variable to track whether redirection has been performed
var redirectionPerformed = false;

// Function to redirect the user based on their browser language
function redirectToLanguagePage() {
  // If redirection has already been performed, return
  if (redirectionPerformed) return;

  var userLanguage = getUserLanguage();
  var currentPage = window.location.pathname;

  // Check if the current page is one of the language pages
  if (
    currentPage.endsWith('index_french.html') ||
    currentPage.endsWith('index_rus.html') ||
    currentPage.endsWith('index.html') ||
    currentPage.endsWith('index_engl.html')
  ) {
    redirectionPerformed = true;
    return;
  }

  // Check the user's language and redirect accordingly
  if (userLanguage.startsWith('fr')) {
    window.location.href = 'index_french.html';
  } else if (userLanguage.startsWith('ru')) {
    window.location.href = 'index_rus.html';
  } else if (userLanguage.startsWith('en')) {
    window.location.href = 'index_engl.html';
  } else {
    // Default to German
    window.location.href = 'index.html';
  }

  redirectionPerformed = true;
}

// Call the redirection function when the page loads
document.addEventListener('DOMContentLoaded', redirectToLanguagePage);


// HAMBURGER MENU SCRIPT ----------------------------------------------------------------
const menuButton = document.querySelector("a#menu-icon");

menuButton.addEventListener("click", function (e) {
  e.preventDefault();
  menuButton.classList.toggle("close");
});

// Banner CLOSE ONCLICK
function closeBanner() {
  var bannerContainer = document.querySelector('.bannercontainer');
  bannerContainer.style.transition = 'height 0.5s ease';
  bannerContainer.style.height = '0';

  var header = document.querySelector('.tf-header');
  header.style.marginTop = '0';
}

// Scroll to the contact section when "BOOK FREE LESSON NOW" is clicked
document.querySelector('.booking').addEventListener('click', function () {
  var header = document.querySelector('.tf-header');
  header.style.marginTop = '0';
  document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
});

// languageSwitch.js
document.addEventListener("DOMContentLoaded", function () {
  function getCurrentPage() {
    var pathArray = window.location.pathname.split('/');
    return pathArray[pathArray.length - 1];
  }

  function setSelectedOption() {
    var currentPage = getCurrentPage();
    var select = document.getElementById('languageDropdown');

    if (currentPage === 'index_french.html') {
      select.value = 'index_french.html';
    } else if (currentPage === 'index_rus.html') {
      select.value = 'index_rus.html';
    } else if (currentPage === 'index_engl.html') {
      select.value = 'index_engl.html';
    } else {
      select.value = 'index.html'; // Default to German
    }
  }

  setSelectedOption();

  var select = document.getElementById('languageDropdown');
  select.addEventListener('change', function () {
    var selectedOption = select.options[select.selectedIndex];
    var selectedPage = selectedOption.value;
    window.location.href = selectedPage;
  });
});
