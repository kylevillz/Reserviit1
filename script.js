// Login form
const userBtn = document.querySelector(".account");
const userBtn1 = document.querySelector(".reserv");
const userBtn2 = document.querySelector("#reservnow");
const userBtn3 = document.querySelector("#account1");

const login = document.querySelector(".login-container");
const overlay = document.querySelector(".overlay");
const buttonClose = document.querySelector(".close-btn");

const openModal = function () {
  login.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const closeModal = function () {
  login.classList.add("hidden");
  overlay.classList.add("hidden");
};

userBtn.addEventListener("click", openModal);
userBtn1.addEventListener("click", openModal);
userBtn2.addEventListener("click", openModal);
userBtn3.addEventListener("click", openModal);

buttonClose.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

document.addEventListener("keydown", function (event) {
  if (event.key === "Escape" && !login.classList.contains("hidden")) {
    closeModal();
  }
});

// Image Slider
const slider = document.querySelector(".slider");
const nextBtn = document.querySelector(".next-btn");
const prevBtn = document.querySelector(".prev-btn");
const slides = document.querySelectorAll(".slide");
const slideIcons = document.querySelectorAll(".slide-icon");
const numberOfSlides = slides.length;
var slideNumber = 0;

//image slider next button
nextBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  slideIcons.forEach((slideIcon) => {
    slideIcon.classList.remove("active");
  });

  slideNumber++;

  if (slideNumber > numberOfSlides - 1) {
    slideNumber = 0;
  }

  slides[slideNumber].classList.add("active");
  slideIcons[slideNumber].classList.add("active");
});

//image slider previous button
prevBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  slideIcons.forEach((slideIcon) => {
    slideIcon.classList.remove("active");
  });

  slideNumber--;

  if (slideNumber < 0) {
    slideNumber = numberOfSlides - 1;
  }

  slides[slideNumber].classList.add("active");
  slideIcons[slideNumber].classList.add("active");
});

//image slider autoplay
var playSlider;

var repeater = () => {
  playSlider = setInterval(function () {
    slides.forEach((slide) => {
      slide.classList.remove("active");
    });
    slideIcons.forEach((slideIcon) => {
      slideIcon.classList.remove("active");
    });

    slideNumber++;

    if (slideNumber > numberOfSlides - 1) {
      slideNumber = 0;
    }

    slides[slideNumber].classList.add("active");
    slideIcons[slideNumber].classList.add("active");
  }, 4000);
};
repeater();

//stop the image slider autoplay on mouseover
slider.addEventListener("mouseover", () => {
  clearInterval(playSlider);
});

//start the image slider autoplay again on mouseout
slider.addEventListener("mouseout", () => {
  repeater();
});
