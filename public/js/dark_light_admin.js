const css = document.getElementById('cssToggleAdmin'); // ID of Css Link In main-template.blade.php
const btnDarkLight = document.getElementById("ToggleDarkLight"); // ID of Button Dark To Light
let darkMode = localStorage.getItem('darkMode'); // Creat Local Storage in Browser => inspect-> Application

if (darkMode === null) {
    localStorage.setItem('darkMode', "false");
}


// Admin
const dark_mode_admin = () => {
    css.href = '/css/style-admin_light.css';
    document.getElementById('icon-dl').classList.remove('fa-sun');
    document.getElementById('icon-dl').classList.add('fa-moon');
    localStorage.setItem('darkMode', 'false');
}
const light_mode_admin = () => {
    css.href = '/css/style-admin.css';
    document.getElementById('icon-dl').classList.remove('fa-moon'); // Icon To Dark
    document.getElementById('icon-dl').classList.add('fa-sun'); // Icon To Light
    localStorage.setItem('darkMode', 'true');
}

if (darkMode === 'true') {
    dark_mode_admin();
}

// The Action And Run Functions To Use Dark Mode
btnDarkLight.addEventListener('click', function () {
    darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'false') {
        light_mode_admin();
    }
    else {
        dark_mode_admin();
    }
});
