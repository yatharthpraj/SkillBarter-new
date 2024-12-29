function toggleDarkMode() {
    const body = document.body;
    const lightModeIcon = document.getElementById('light-mode-icon');
    const darkModeIcon = document.getElementById('dark-mode-icon');
  
    // Toggle dark mode class
    const isDarkModeActive = body.classList.toggle('dark-mode');
  
    // Update localStorage and icons
    if (isDarkModeActive) {
      lightModeIcon.style.display = 'inline-block';
      darkModeIcon.style.display = 'none';
      localStorage.setItem('dark-mode', 'enabled');
    } else {
      lightModeIcon.style.display = 'none';
      darkModeIcon.style.display = 'inline-block';
      localStorage.setItem('dark-mode', 'disabled');
    }
  }
  
  // Apply saved mode on page load
  document.addEventListener('DOMContentLoaded', () => {
    const isDarkMode = localStorage.getItem('dark-mode') === 'enabled';
    const body = document.body;
    const lightModeIcon = document.getElementById('light-mode-icon');
    const darkModeIcon = document.getElementById('dark-mode-icon');
  
    if (isDarkMode) {
      body.classList.add('dark-mode');
      lightModeIcon.style.display = 'inline-block';
      darkModeIcon.style.display = 'none';
    }
  });
  
  
 
  

function openSidebar() {
    document.querySelector(".sidebar").style.display = 'block';
    document.querySelector(".overlay").style.display = 'block';

}
function closeSidebar() {
    document.querySelector(".sidebar").style.display = 'none';
    document.querySelector(".overlay").style.display = 'none';
}
function openProfile(key) {
    if (key == 'form') {
        document.querySelector(".form-popup").style.display = 'block';
    }
    else {
        document.querySelector(".info-" + key).style.display = 'block';
    }
}
function closeProfile(key) {
    if (key == 'form') {
        document.querySelector(".form-popup").style.display = 'none';
    } else if (key == 'login') {
        document.querySelector(".login-pop").style.display = 'none';
    }
    else {
        document.querySelector(".info-" + key).style.display = 'none';
    }
}
// Get the button
// JavaScript code for scrolling from bottom to top in a web page
function scrollToTop() {
    window.scrollTo({
        top: 0,  // Scroll to the top
        behavior: 'smooth'  // Smooth scrolling effect
    });

}

function openLogin() {
    document.querySelector('.form-container').addEventListener('click', function () {
        document.querySelector('.form-container').style.display = 'none';
    });

    document.querySelector('.login-popup').addEventListener('click', function (event) {
        // Stop the event from propagating to the parent
        event.stopPropagation();
    });
}

function togglePassword() {
    const passwordInput = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('show-password');
    console.log("password function invoked");
    if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text'; // Show password
    } else {
        passwordInput.type = 'password'; // Hide password
    }
}