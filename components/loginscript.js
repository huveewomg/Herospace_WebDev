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
  }, 10000); // Change image every 10 seconds
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
let password = document.querySelector('.input-box input[name="registerPassword"]');
let cpassword = document.querySelector('.input-box input[name="cpassword"]');
let message = document.querySelector('#message');
const registerButton = document.querySelector('button[onclick="CheckPassword()"]'); 
registerButton.disabled = true;



function checkPassword () {
  const passwordValue = password.value;
  const cpasswordValue = cpassword.value;
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;


  if (passwordValue !== cpasswordValue){
    message.innerText = 'Passwords do not match!';
    registerButton.disabled = true;
    return;
  }

  if (passwordValue.length < 8){
    message.innerText = 'Password must be at least 8 characters long';
    registerButton.disabled = true;
    return;
  }

  if (!passwordRegex.test(passwordValue)){
    message.innerText = 'Password must contain at least 1 letter, 1 number, and 1 special character';
    registerButton.disabled = true;
    return;
  }

  message.innerText = '';
  registerButton.disabled = false;
}

password.addEventListener('keyup', () => {
    if (cpassword.value.length != 0) checkPassword();
})

cpassword.addEventListener('keyup', checkPassword);