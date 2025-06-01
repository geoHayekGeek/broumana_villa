document.addEventListener("DOMContentLoaded", function () {
  /**ADDING OBSERVER FOR ANIMATIONS */
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fade-in-top");
        observer.unobserve(entry.target);
      }
    });
  });

  document.querySelectorAll(".fade-in-target").forEach((el) => {
    observer.observe(el);
  });

  /**NAVBAR CODE */
  window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
      navbar.classList.add("bg-dark");
    } else {
      navbar.classList.remove("bg-dark");
    }
  });

  /**PRELOADER CODE */
  setTimeout(function () {
    const preloader = document.getElementById("preloader");
    if (preloader) {
      preloader.style.opacity = "0";
      setTimeout(function () {
        preloader.style.display = "none";
      }, 800); // This should match the transition time in CSS
    }
  }, 1500);

  /**ADDING TESTIMONIALS SCRIPT */
  const slidesContainer = document.querySelector(".testimonial-slides");
  const slides = document.querySelectorAll(".testimonial-slide");
  const prevButton = document.querySelector(".prev-button");
  const nextButton = document.querySelector(".next-button");
  let currentIndex = 0;
  const totalSlides = slides.length;
  let autoScrollInterval;
  let autoScrollPaused = false;

  updateSlidePosition();

  startAutoScroll();

  if (prevButton) {
    prevButton.addEventListener("click", function () {
      if (currentIndex > 0) {
        currentIndex--;
      } else {
        currentIndex = totalSlides - 1;
      }
      updateSlidePosition();

      stopAutoScroll();
    });
  }

  if (nextButton) {
    nextButton.addEventListener("click", function () {
      if (currentIndex < totalSlides - 1) {
        currentIndex++;
      } else {
        currentIndex = 0;
      }
      updateSlidePosition();

      stopAutoScroll();
    });
  }

  function updateSlidePosition() {
    const position = -currentIndex * 100;
    if (slidesContainer) {
      slidesContainer.style.transform = `translateX(${position}%)`;
    }
  }

  function startAutoScroll() {
    autoScrollInterval = setInterval(function () {
      if (!autoScrollPaused) {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlidePosition();
      }
    }, 5000);
  }

  function stopAutoScroll() {
    autoScrollPaused = true;
    clearInterval(autoScrollInterval);
  }

  /** ABOUT IMAGE ZOOM ON SCROLL ANIMATION */
  const image = document.querySelector(".about-outlet-section .about-images");

  function handleScroll() {
    if (!image) return;

    const rect = image.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    // Offset center upward to start zooming earlier
    const earlyOffset = -100; // try 100–300 for earlier start
    const modifiedCenter = windowHeight / 2 - earlyOffset;

    if (rect.top < windowHeight && rect.bottom > 0) {
      const visibleRatio =
        1 -
        Math.abs(rect.top + rect.height / 2 - modifiedCenter) /
          (windowHeight / 2);
      const clampedRatio = Math.max(0, Math.min(visibleRatio, 1));

      const scale = 1 + clampedRatio * 0.4; // zoom range: 1 to 1.2
      image.style.transform = `scale(${scale})`;
    } else {
      image.style.transform = "scale(1)";
    }
  }

  window.addEventListener("scroll", handleScroll);
  handleScroll();

});
