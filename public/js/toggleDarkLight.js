
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

    img_dark('dark-light-logo', '/images_dark/logo/kovid19-light.png'); //Logo Dark Mode
    img_dark('img-welcome', '/images_dark/home-dark.png'); // welcome Dark Mode
    img_dark('login-img', '/images_dark/login-img-dark.png'); // login Dark Mode
    img_dark('register-img', '/images_dark/register-img-dark.png'); // Register Dark Mode
    img_dark('contact-us-img', '/images_dark/contact/contact-us-dark.png'); // Contact-us Dark Mode
    img_dark('img-send-forgetPass', '/images_dark/Forgot password-bro-dark.png'); // forget-pass-send Dark Mode
    img_dark('img-reset-pass', '/images_dark/Reset-password-dark.png'); // forget-pass-reset Dark Mode
    img_dark('service1', '/images_dark/service/Vaccine.png'); // Service Dark Mode
    img_dark('service2', '/images_dark/service/test.png'); // Service Dark Mode
    img_dark('test1', '/images_dark/test_menu.png'); // menu_test Dark Mode
    img_dark('test2', '/images_dark/test_menu_2.png'); // menu_test Dark Mode
    img_dark('newTest', '/images_dark/test_reservation.png'); // menu_test Dark Mode
    img_dark('conDoc', '/images_dark/contact/Online Doctor.png'); // contact_doc Dark Mode
    img_dark('dose', '/images_dark/service/Vaccinee.png'); // new_Dose Dark Mode
    img_dark('updateTest', '/images_dark/update_test.png'); // update_test Dark Mode
    img_dark('profile', '/images_dark/profile.png'); // profile Dark Mode
    img_dark('editprof', '/images_dark/editprof.png'); // editprof Dark Mode

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
    img_light('img-reset-pass', '/images/Reset password.gif'); // forget-pass-reset Light Mode
    img_light('service1', '/images/service/Vaccine.png'); // Service Light Mode
    img_light('service2', '/images/service/test.png'); // Service Light Mode
    img_light('service3', '/images/service/contact-Doctor.png'); // Service Light Mode
    img_light('test1', '/images/test_menu.png'); // menu_test Light Mode
    img_light('test2', '/images/test_menu_2.png'); // menu_test Light Mode
    img_light('newTest', '/images/test_reservation.png'); // menu_test Light Mode
    img_light('newTest', '/images/test_reservation.png'); // menu_test Light Mode
    img_light('conDoc', '/images/contact/Online Doctor.png'); // contact_doc Light Mode
    img_light('dose', '/images/service/Vaccinee.png'); // new_Dose Light Mode
    img_light('updateTest', '/images/update_test.png'); // update_test Light Mode
    img_light('profile', '/images/profile.png'); // profile Light Mode
    img_light('editprof', '/images/editprof.png'); // editprof Light Mode

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
