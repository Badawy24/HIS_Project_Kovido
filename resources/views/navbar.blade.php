@if (Session::get('Logged_In'))
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
                        <a @class([
                            'active' => Request::is('service'),
                            'nav-link' => true,
                        ]) aria-current="page" href="/service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'active' => Request::is('test_option'),
                            'nav-link' => true,
                        ]) aria-current="page" href="/test_option">Test</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'active' => Request::is('new_dose'),
                            'nav-link' => true,
                        ]) class="nav-link" href="/new_dose">Dose</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'active' => Request::is('contact_doc'),
                            'nav-link' => true,
                        ]) class="nav-link" href="/contact_doc">Contact Doctor</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@elseif(Session::get('adminLogin'))
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="admin-options p-3 bg-dark">
        <div class="container">
            <div class="row">
                <div class='col-md-3'>
                    <div class="opt-btn">
                        <a @class([
                            'btn-primary' => true,
                            'btn-danger' => Request::is('admin_doc_data'),
                            'btn' => true,
                        ]) href="/admin_doc_data"><i
                                class="fa-solid fa-calendar-minus"></i> Doctor Data</a>
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class="opt-btn">
                        <a @class([
                            'btn-primary' => true,
                            'btn-danger' => Request::is('admin_doc_msg'),
                            'btn' => true,
                        ]) href="/admin_doc_msg"><i class="fa-solid fa-inbox"></i> Doctor
                            Message</a>
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class="opt-btn">
                        <a @class([
                            'btn-primary' => true,
                            'btn-danger' => Request::is('admin_dose_data'),
                            'btn' => true,
                        ]) href="/admin_dose_data"><i class="fa-solid fa-virus"></i> Dose
                            Data</a>
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class="opt-btn">
                        <a @class([
                            'btn-primary' => true,
                            'btn-danger' => Request::is('admin_test_data'),
                            'btn' => true,
                        ]) href="admin_test_data"><i class="fa-solid fa-vials"></i> Test
                            Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
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
                        <a @class([
                            'active' => Request::is('/'),
                            'nav-link' => true,
                        ]) aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a @class([
                            'active' => Request::is('login'),
                            'nav-link' => true,
                        ]) class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'active' => Request::is('register'),
                            'nav-link' => true,
                        ]) class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a @class([
                            'active' => Request::is('contact_us'),
                            'nav-link' => true,
                        ]) class="nav-link" href="/contact_us">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif
