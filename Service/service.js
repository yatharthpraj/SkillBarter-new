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

function closeSliderBtn(){
  console.log("Closing slider btn");
  document.querySelectorAll(".slider-btn").forEach(btn => {
    btn.style.display = 'none';
});
}

function scrollToTop() {
  window.scrollTo({
      top: 0,  // Scroll to the top
      behavior: 'smooth'  // Smooth scrolling effect
  });

}
function openLogin(){
  document.querySelector('.form-container').addEventListener('click', function () {
    document.querySelector('.form-container').style.display = 'none';
});

document.querySelector('.login-popup').addEventListener('click', function (event) {
    // Stop the event from propagating to the parent
    event.stopPropagation();
});
}
function openFilterContent() {
  let filter_content = document.querySelector('.filter-content');

  if (filter_content.style.display === 'flex' || filter_content.style.display === '') {
      filter_content.style.display = 'none';
  } else {
      filter_content.style.display = 'flex';
  }

}
function openManagePostContent() {
  let manage_post = document.querySelector('.manage-post');
  if (manage_post.style.display === 'flex' || manage_post.style.display === '') {
      manage_post.style.display = 'none';
  } else {
      manage_post.style.display = 'flex';
  }
}





function noPost() {
  document.querySelector('.create-post-form').style.display = 'flex';
  // document.querySelector('#your-post').style.display='none';
}

// Function to handle the "Know more" button click
function openDetails(event) {
  
  const card = event.target.closest('.card'); // Find the card that was clicked
  const details = card.querySelector('.onclick'); // Find the details inside that card
  const open_btn = card.querySelector('.open-detail-btn'); // Find the button inside the clicked card

  // Toggle the visibility of the details
  const isCurrentlyVisible = details.classList.toggle('show');

  // Rotate the button based on the visibility state
  if (isCurrentlyVisible) {
    open_btn.style.transform = 'rotate(180deg)';
  } else {
    open_btn.style.transform = 'rotate(0deg)';
  }
  document.getElementsByClassName
  // Close details on other cards and reset their buttons
  document.querySelectorAll('.card').forEach(otherCard => {
    if (otherCard !== card) {
      const otherDetails = otherCard.querySelector('.onclick');
      const otherOpenBtn = otherCard.querySelector('.open-detail-btn');
      
      otherDetails.classList.remove('show'); // Hide details on other cards
      if (otherOpenBtn) {
        otherOpenBtn.style.transform = 'rotate(0deg)'; // Reset button to its original state
      }
    }
  });
}




function filterServices() {
  // Get all checkboxes with the name 'filter'
  const checkboxes = document.querySelectorAll('input[name="filter"]');

  // Get all sliders (service containers)
  const sliders = document.querySelectorAll('.service-container');

  // Variable to check if any checkbox is selected
  let anyChecked = false;

  // Loop through each checkbox and decide which sliders to show or hide
  checkboxes.forEach(checkbox => {
      const filterValue = checkbox.value; // Value corresponds to filter classes (filter-1, filter-2, etc.)
      const slider = document.querySelector(`.${filterValue}`);

      // If checkbox is checked, show the corresponding slider
      if (checkbox.checked) {
          anyChecked = true; // Mark as checked
          if (slider) {
              slider.style.display = 'block';
              
            }
      } else {
          if (slider) {
              slider.style.display = 'none';
          }
      }
  });

  // If no checkboxes are checked, reload the page
  if (!anyChecked) {
    location.reload();
  }
  document.querySelector(".filter-content").style.display = 'none';
  
}





class CardSlider {
    constructor(containerSelector) {
      // Select the container and its elements
      this.container = document.querySelector(containerSelector);
      if (!this.container) {
        console.warn(`Container "${containerSelector}" not found.`);
        return;
      }
  
      this.slider = this.container.querySelector('.slider');
      this.nextBtn = this.container.querySelector('.next-btn');
      this.prevBtn = this.container.querySelector('.prev-btn');
  
      // Track the current position of the slider
      this.currentIndex = 0;
  
      // Bind methods
      this.updateSlider = this.updateSlider.bind(this);
      this.handleResize = this.handleResize.bind(this);
  
      // Initialize event listeners
      this.init();
    }
  
    // Function to move the slider based on the currentIndex
    updateSlider() {
      const card = this.slider.querySelector('.card');
      const cardStyle = window.getComputedStyle(card);
      const cardWidth =
        card.offsetWidth +
        parseInt(cardStyle.marginRight) + 
        parseInt(cardStyle.marginLeft)+30; // Card width + spacing
  
      this.slider.style.transform = `translateX(-${this.currentIndex * cardWidth }px)`; // Shift the slider
    }
  
    // Handle resizing
    handleResize() {
      this.updateSlider(); // Recalculate the slider position on window resize
    }
  
    // Initialize event listeners
    init() {
      if (!this.slider || !this.nextBtn || !this.prevBtn) {
        console.warn(`Slider structure is incomplete in "${this.container.id}".`);
        return;
      }
  
      // Move the slider to the next set of cards
      this.nextBtn.addEventListener('click', () => {
        const card = this.slider.querySelector('.card');
        const cardStyle = window.getComputedStyle(card);
        const cardWidth =
          card.offsetWidth +
          parseInt(cardStyle.marginRight) +
          parseInt(cardStyle.marginLeft);
        const visibleCards = Math.floor(this.container.offsetWidth / cardWidth); // How many cards fit in the visible area
        const maxIndex = this.slider.childElementCount - visibleCards; // Maximum index we can slide to
  
        if (this.currentIndex < maxIndex) {
          this.currentIndex++; // Move to the next card
        } else {
          this.currentIndex = 0; // Wrap around to the first card
        }
        this.updateSlider(); // Update the slider position
      });
  
      // Move the slider to the previous set of cards
      this.prevBtn.addEventListener('click', () => {
        if (this.currentIndex > 0) {
          this.currentIndex--; // Move to the previous card
        } else {
          const card = this.slider.querySelector('.card');
          const cardStyle = window.getComputedStyle(card);
          const cardWidth =
            card.offsetWidth +
            parseInt(cardStyle.marginRight) +
            parseInt(cardStyle.marginLeft);
          const visibleCards = Math.floor(this.container.offsetWidth / cardWidth); // How many cards fit in the visible area
          const maxIndex = this.slider.childElementCount - visibleCards; // Maximum index we can slide to
  
          this.currentIndex = maxIndex; // Wrap around to the last card
        }
        this.updateSlider(); // Update the slider position
      });
  
      // Adjust the slider when the window size changes
      window.addEventListener('resize', this.handleResize);
    }
  }
  
  // Initialize multiple sliders
  new CardSlider('#slider1'); // Slider 1
  new CardSlider('#slider2'); // Slider 2
  new CardSlider('#slider3'); // Slider 3
  new CardSlider('#slider4'); // Slider 4
  new CardSlider('#slider5'); // Slider 5
  new CardSlider('#your-post');



 