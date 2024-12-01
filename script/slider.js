
const slides = document.querySelectorAll(".slides img");
let slideIndex = 0;
let intervalId = null;

document.addEventListener("DOMContentLoaded", intializeSlider);
function intializeSlider() {
  if (slides.length > 0) {
    slides[slideIndex].classList.add("displaySlide");
    intervalId = setInterval(nextSlide, 3000);
  }
}
function showSlide(index) {
  if (index >= slides.length) {
    slideIndex = 0;
  } else if (index < 0) {
    slideIndex = slides.length - 1;
  }
  slides.forEach((slide) => {
    slide.classList.remove("displaySlide");
  });
  slides[slideIndex].classList.add("displaySlide");
}
function prevSlide() {
  // clearInterval(intervalId)
  slideIndex--;
  showSlide(slideIndex);
}
function nextSlide() {
  slideIndex++;
  showSlide(slideIndex);
}



// 
function loadSlider() {
    $.ajax({
        url: 'slider-fetch-script.php',  // Tệp PHP lấy lại slider
        type: 'GET',
        success: function(data) {
            $('#slider').html(data);  // Cập nhật lại nội dung slider
        }
    });
}

$('form').submit(function(e) {
    e.preventDefault();

    // Lấy dữ liệu từ form và gửi AJAX
    $.ajax({
        url: 'add-slider.php',  
        type: 'POST',
        data: new FormData(this),  // Gửi dữ liệu form
        contentType: false,
        processData: false,
        success: function(response) {
            loadSlider();  
        }
    });
});