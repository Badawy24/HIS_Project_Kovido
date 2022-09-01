<?php
use Illuminate\Support\Facades\DB;
?>
<?php if(Session::get('Logged_In')): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img id="dark-light-logo" class="logo-img" src="/images/logo/logo-dark2x.png" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('profile'), 'nav-link' => true]) ?>" class="nav-link" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('service'), 'nav-link' => true]) ?>" aria-current="page" href="/service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('test_option'), 'nav-link' => true]) ?>" aria-current="page" href="/test_option">Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('new_dose'), 'nav-link' => true]) ?>" class="nav-link" href="/new_dose">Dose</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('contact_doc'), 'nav-link' => true]) ?>" class="nav-link" href="/contact_doc">Contact Doctor</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<?php elseif(Session::get('adminLogin')): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark adm-nav">
        <div class="container">
            <a class="navbar-brand admin-nav" href="#">
                <i class="fa-solid fa-gear fa-spin"></i> Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="/logout">Admin</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/logout">Log Out</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" id="ToggleDarkLight">Dark Mode</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    



<?php elseif(Session::get('doc_Logged_In')): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img id="dark-light-logo" class="logo-img" src="/images/logo/logo-dark2x.png" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active"><?php
                        $id = Session::get('doc_user_id');
                        $doc = DB::select('select doc_fname, doc_lname from doctor where doc_id = ?', [$id]);
                        ?><?php echo e('D/ ' . $doc[0]->doc_fname . ' ' . $doc[0]->doc_lname); ?>

                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="/logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php else: ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img id="dark-light-logo" class="logo-img" src="/images/logo/logo-dark2x.png" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('/'), 'nav-link' => true]) ?>" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('login'), 'nav-link' => true]) ?>" class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('register'), 'nav-link' => true]) ?>" class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['active' => Request::is('contact_us'), 'nav-link' => true]) ?>" class="nav-link" href="/contact_us">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
<?php /**PATH L:\T95_github\HIS_Project_Kovido\resources\views/navbar.blade.php ENDPATH**/ ?>