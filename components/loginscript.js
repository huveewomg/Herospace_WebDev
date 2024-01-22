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





// validation password/email for login
let loginEmail = document.querySelector('.input-box input[name="email"]');
let loginPassword = document.querySelector('.input-box input[name="password"]');
let loginMessage = document.querySelector('#loginMessage');
const loginButton = document.querySelector('button[onclick="CheckLogin()"]'); 
loginButton.disabled = true;

function CheckLogin() {
  const loginEmailValue = loginEmail.value;
  const loginPasswordValue = loginPassword.value;
  const emailRegix = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if(!emailRegix.test(loginEmailValue)){
    loginMessage.innerText = 'Please enter a valid email!';
    loginButton.disabled = true;
    return;
  }

  if (loginPasswordValue.length < 6){
    loginMessage.innerText = 'Password must be at least 6 characters long';
    loginButton.disabled = true;
    return;
  }

  loginMessage.innerText = '';
  loginButton.disabled = false;
}

loginEmail.addEventListener('keyup', () => {
  if (loginEmail.value.length != 0) CheckLogin();
});

loginPassword.addEventListener('keyup', CheckLogin);





// validation password/name/email for registration
let password = document.querySelector('.input-box input[name="registerPassword"]');
let cpassword = document.querySelector('.input-box input[name="cpassword"]');
let message = document.querySelector('#message');
let name = document.querySelector('.input-box input[name="registerName"]');
let email = document.querySelector('.input-box input[name="registerEmail"]');
const registerButton = document.querySelector('button[onclick="CheckPassword()"]'); 
registerButton.disabled = true;


function checkPassword () { 
  const nameValue = name.value;
  const passwordValue = password.value;
  const cpasswordValue = cpassword.value;
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
  const nameRegex = /^[a-zA-Z\s]+(([',. -][a-zA-Z\s])?[a-zA-Z\s]*)*$/;
  const emailRegix = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if(!nameRegex.test(nameValue)){
    message.innerText = 'Please enter a valid name!';
    registerButton.disabled = true;
    return;
  }

  if(!emailRegix.test(email.value)){
    message.innerText = 'Please enter a valid email!';
    registerButton.disabled = true;
    return;
  }
  

  if (passwordValue !== cpasswordValue){
    message.innerText = 'Passwords do not match!';
    registerButton.disabled = true;
    return;
  }

  if (passwordValue.length < 6){
    message.innerText = 'Password must be at least 6 characters long';
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

name.addEventListener('keyup', () => {
    if (name.value.length != 0) checkPassword();
})

cpassword.addEventListener('keyup', checkPassword);