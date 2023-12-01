// image slider
let slideIndex = 0;
showSlides();

function showSlides() {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("fade", "zoomOut");
    slides[i].style.display = "none";
  }

  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }

  slides[slideIndex - 1].style.display = "block";
  slides[slideIndex - 1].classList.add("fade", "zoomOut");

  document.body.classList.add("hide-scrollbar");

  setTimeout(() => {
    document.body.classList.remove("hide-scrollbar");
    for (let i = 0; i < dots.length; i++) {
      dots[i].classList.remove("active");
    }
    dots[slideIndex - 1].classList.add("active");
    showSlides();
  }, 10000); // Change image every 10 seconds (matching the total animation duration)
}


// jump between login and register
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

registerLink.addEventListener('click', ()=> {
  wrapper.classList.add('active');
} )

loginLink.addEventListener('click', ()=> {
  wrapper.classList.remove('active');
} )

// validation password
function CheckPassword(){
  let password = document.getElementById("password").value;
  let cpassword = document.getElementById("cpassword").value;
  console.log(password,password);
  let mesasge = document.getElementById("message");

  if (password.length !=0) {
    if(password == cpassword){
      mesasge.textContent = ""
    }
    else{
      mesasge.textContent = "Passwords don't match"
    }
  }
}