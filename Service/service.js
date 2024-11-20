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
        parseInt(cardStyle.marginLeft); // Card width + spacing
  
      this.slider.style.transform = `translateX(-${this.currentIndex * cardWidth}px)`; // Shift the slider
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
  new CardSlider('#your-post');



 