
css = document.getElementById('cssToggle');

let darkMode = localStorage.getItem('darkMode');

const btnDarkLight = document.getElementById("ToggleDarkLight");

const dark_mode = () => {
    // btnDarkLight.innerHTML = "Light Mode";
    document.getElementById('icon-dl').classList.remove('fa-moon');
    document.getElementById('icon-dl').classList.add('fa-sun');
    document.getElementById('dark-light-logo').setAttribute('src', '/images/logo/kovid19-light.png')
    css.href = '/css/stylee.css';
    localStorage.setItem('darkMode', 'true');
}

const light_mode = () => {
    // btnDarkLight.innerHTML = "Dark Mode";
    document.getElementById('icon-dl').classList.remove('fa-sun');
    document.getElementById('icon-dl').classList.add('fa-moon');
    document.getElementById('dark-light-logo').setAttribute('src', '/images/logo/logo-dark2x.png')
    css.href = '/css/style.css';
    localStorage.setItem('darkMode', 'false');
}

if (darkMode === 'true') {
    dark_mode();
}

btnDarkLight.addEventListener('click', function () {
    darkMode = localStorage.getItem('darkMode');

    if (darkMode === 'false') {
        dark_mode();
    }
    else {
        light_mode();
    }
});