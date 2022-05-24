<?php if(!(Session::has('Logged_In'))): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="logo-img" src="/images/logo/logo-dark2x.png" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('/'), 'nav-link'=>(True)]) ?>"  aria-current="page" href="/">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('login'), 'nav-link'=>(True)]) ?>" class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('register'), 'nav-link'=>(True)]) ?>" class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('contact_us'), 'nav-link'=>(True)]) ?>" class="nav-link" href="/contact_us">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="logo-img" src="/images/logo/logo-dark2x.png" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('service'), 'nav-link'=>(True)]) ?>"  aria-current="page" href="/service">Services</a>
                </li>
                <li class="nav-item">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('new_test'), 'nav-link'=>(True)]) ?>"  aria-current="page" href="/new_test">PCR</a>
                </li>
                
                <li class="nav-item">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('new_dose'), 'nav-link'=>(True)]) ?>" class="nav-link" href="/new_dose">Dose</a>
                </li>
                <li class="nav-item">
                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active'=>Request::is('contact_doc'), 'nav-link'=>(True)]) ?>" class="nav-link" href="/contact_doc">Contact Doctor</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?><?php /**PATH G:\HIS_Project_Kovido\resources\views/navbar.blade.php ENDPATH**/ ?>