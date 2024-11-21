const slider = document.querySelector('.courses-container');
let index = 0; // Current slide index
const totalCategories = document.querySelectorAll('.courses-container > div').length;

// Function to update slider position
function updateSlider() {
    slider.style.transform = `translateX(-${index * 100}%)`;
}

// Function to go to the next slide
function nextSlide() {
    index = (index + 1) % totalCategories; // Loop back to first slide
    updateSlider();
}

// Function to go to the previous slide
function prevSlide() {
    index = (index - 1 + totalCategories) % totalCategories; // Loop back to last slide
    updateSlider();
}
