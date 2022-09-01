<div class="admin-options p-3 bg-dark">
    <div class="container">

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Doctors
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-calendar-minus"></i> Doctor Data</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-user-plus"></i> Add Doctor </a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-user-plus"></i> Doctor Messages </a>
                            </li>
                        <ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Patient
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-calendar-minus"></i> Patient Data</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-user-plus"></i> Add Patient </a>
                            </li>

                        <ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Dose
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-calendar-minus"></i> Dose data</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-user-plus"></i> Add Dose </a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-user-plus"></i> View Patient Dose </a>
                            </li>
                        <ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                        Test
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <ul class="list-unstyled">
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-calendar-minus"></i> Test data</a>
                            </li>
                            <li>
                                <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'active' => Request::is('admin_doc_data'),
                                //'btn-primary' => true,
                                //'btn-danger' => Request::is('admin_doc_data'),
                                //'btn' => true,
                                ]) ?>" href="/admin_doc_data"><i class="fa-solid fa-user-plus"></i> Add Dose </a>
                            </li>

                        <ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                        Radiology
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingsix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                        Appointment
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                    <div class="accordion-body">

                    </div>
                </div>
            </div>


        </div>
    </div>

</div>















<?php /**PATH C:\Users\DELL\OneDrive\Desktop\3rd_Project\HIS_Project_Kovido\resources\views/admin/admin_option.blade.php ENDPATH**/ ?>