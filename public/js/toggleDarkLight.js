
const css = document.getElementById('cssToggle'); // ID of Css Link In main-template.blade.php
const btnDarkLight = document.getElementById("ToggleDarkLight"); // ID of Button Dark To Light
let darkMode = localStorage.getItem('darkMode'); // Creat Local Storage in Browser => inspect-> Application

/****************************************** */

// To Enable Local Storage The First Time
if (darkMode === null) {
    localStorage.setItem('darkMode', "false");
}

/****************************************** */

// Function Change Images To Dark
function img_dark(id, path_dark) {
    if (document.getElementById(id))
        document.getElementById(id).setAttribute('src', path_dark);
}
function img_light(id, path_light) {
    if (document.getElementById(id))
        document.getElementById(id).setAttribute('src', path_light);
}

const dark_img = () => {
    document.getElementById('icon-dl').classList.remove('fa-moon'); // Icon To Dark
    document.getElementById('icon-dl').classList.add('fa-sun'); // Icon To Light

    img_dark('dark-light-logo', '/images/logo/kovid19-light.png'); //Logo Dark Mode
    img_dark('img-welcome', '/images/home-dark.png'); // welcome Dark Mode
    img_dark('login-img', '/images/login-img-dark.png'); // login Dark Mode
    img_dark('register-img', '/images/register-img-dark.png'); // Register Dark Mode
    img_dark('contact-us-img', '/images/contact/contact-us-dark.png'); // Contact-us Dark Mode
    img_dark('img-send-forgetPass', '/images/Forgot password-bro-dark.png'); // forget-pass-send Dark Mode

}

// Function Change Images To Light
const light_img = () => {
    document.getElementById('icon-dl').classList.remove('fa-sun');
    document.getElementById('icon-dl').classList.add('fa-moon');

    img_light('dark-light-logo', '/images/logo/logo-dark2x.png'); //Logo light Mode
    img_light('img-welcome', '/images/home.png'); // welcome light Mode
    img_light('login-img', '/images/login-img-2.png'); // login light Mode
    img_light('register-img', '/images/register-img.png'); // Register Light Mode
    img_light('contact-us-img', '/images/contact/contact-us.png'); // Contact-us Light Mode
    img_light('img-send-forgetPass', '/images/Forgot password-bro.png'); // forget-pass-send Light Mode

}

// Function Enabled Dark Mode
const light_mode = () => {
    css.href = '/css/style.css';
    localStorage.setItem('darkMode', 'false');
    light_img();
}

// Function Enabled Light Mode
const dark_mode = () => {
    css.href = '/css/stylee.css';
    localStorage.setItem('darkMode', 'true');
    dark_img();
}

/****************************************** */
// To Save The Theme
if (darkMode === 'true') {
    dark_mode();
}

// The Action And Run Functions To Use Dark Mode
btnDarkLight.addEventListener('click', function () {
    darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'false') {
        dark_mode();
    }
    else {
        light_mode();
    }
});
