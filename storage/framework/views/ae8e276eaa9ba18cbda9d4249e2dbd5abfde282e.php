<div class="admin-options p-3 bg-dark">
    <div class="container">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Doctors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne"
                    class="accordion-collapse collapse <?php echo e(Request::is('admin_doc_data') ? 'show' : ''); ?> <?php echo e(Request::is('admin_add_doc') ? 'show' : ''); ?> <?php echo e(Request::is('admin_doc_msg') ? 'show' : ''); ?>"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_doc_data'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_doc_data"><i
                                        class="fa-solid fa-user-doctor"></i> Doctor Data</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_add_doc'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_add_doc"><i
                                        class="fa-solid fa-user-plus"></i> Add Doctor </a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_doc_msg'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_doc_msg"><i
                                        class="fa-solid fa-comment"></i> Doctor Messages </a>
                            </li>
                            <ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Patient
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo"
                    class="accordion-collapse collapse <?php echo e(Request::is('admin_patient_data_show') ? 'show' : ''); ?> <?php echo e(Request::is('admin_add_patient') ? 'show' : ''); ?>"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_patient_data_show'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_patient_data_show"><i
                                        class="fa-solid fa-calendar-minus"></i> Patient Data</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_add_patient'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_add_patient"><i
                                        class="fa-solid fa-user-plus"></i> Add
                                    Patient </a>
                            </li>
                            <ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Dose
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree"
                    class="accordion-collapse collapse <?php echo e(Request::is('admin_dose_data') ? 'show' : ''); ?> <?php echo e(Request::is('admin_add_dose') ? 'show' : ''); ?>"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_dose_data'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_dose_data"><i
                                        class="fa-solid fa-square-virus"></i>
                                    Dose data</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_add_dose'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_add_dose"><i
                                        class="fa-solid fa-circle-plus"></i>
                                    Add Dose </a>
                            </li>
                            <ul>
                    </div>
                </div>
            </div>



            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFour">
                        Test
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour"
                    class="accordion-collapse collapse <?php echo e(Request::is('admin_all_tests') ? 'show' : ''); ?> <?php echo e(Request::is('admin_existed_test') ? 'show' : ''); ?> <?php echo e(Request::is('admin_test_data') ? 'show' : ''); ?>"
                    aria-labelledby="panelsStayOpen-headingfour">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_all_tests'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_all_tests"><i
                                        class="fa-solid fa-vials"></i> Test
                                    data</a>
                            </li>


                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_existed_test'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_existed_test"><i
                                        class="fa-solid fa-circle-plus"></i>
                                    Add Test </a>
                            </li>

                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_test_data'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_test_data"><i
                                        class="fa-solid fa-street-view"></i>
                                    View Patient tests </a>
                            </li>
                            <ul>
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFive">
                        Live Conversation
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive"
                    class="accordion-collapse collapse <?php echo e(Request::is('admin_live') ? 'show' : ''); ?> <?php echo e(Request::is('admin_live_meet') ? 'show' : ''); ?>"
                    aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_live'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_live">
                                    <i class="fa-solid fa-forward-fast"></i> Live Consultation</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'active' => Request::is('admin_live_meet'),
                                    'nav-link' => true,
                                ]) ?>" href="/admin_live_meet">
                                    <i class="fa-sharp fa-solid fa-video"></i> Live Meeting </a>
                            </li>
                            <ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingsix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseSix">
                        Appointment
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingSix">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseSeven">
                        Radiology
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingSeven">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseEight">
                        Billing
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingEight">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseNine">
                        OPD - Out Patient
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingNine">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTen">
                        IPD - In Patient
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingEleven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseEleven" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseEleven">
                        Pharmacy
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseEleven" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingEleven">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwelvel">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwelvel" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwelvel">
                        Pathology
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwelvel" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwelvel">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThrteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThrteen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThrteen">
                        Blood Bank
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThrteen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThrteen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingForteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseForteen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseForteen">
                        Ambulance
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseForteen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingForteen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFifteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFifteen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFifteen">
                        Front Office
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFifteen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingFifteen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingsixteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapsesixteen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapsesixteen">
                        Birth & Death Record
                    </button>
                </h2>
                <div id="panelsStayOpen-collapsesixteen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingsixteen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingSeventeen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseSeventeen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseSeventeen">
                        Human Resource
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSeventeen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingSeventeen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingEighteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseEighteen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseEighteen">
                        Referral
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseEighteen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingEighteen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingNineteen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseNineteen" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseNineteen">
                        TPA Management
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseNineteen" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingNineteen">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTewntey">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTewntey" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTewntey">
                        Messaging
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTewntey" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTewntey">
                    <div class="accordion-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Badawy\Desktop\v0.2\HIS_Project_Kovido\resources\views/admin/admin_option.blade.php ENDPATH**/ ?>