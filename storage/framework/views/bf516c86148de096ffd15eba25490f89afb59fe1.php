
<?php $__env->startSection('content'); ?>
    <div class="main-div-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="register-form">
                        <form action="profile" method="post" class="row">
                            <div class="col-md-6">
                                <input class=" form-control"  type="text" placeholder="First Name" name="name"
                                id="name" aria-label="default input example">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control col-auto"  type="text" placeholder="Last Name" name="name"
                                id="name" aria-label="default input example">
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="email" placeholder="Patient Email" name="email"
                                id="email" aria-label="default input example">
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="password" placeholder="Password" name="password"
                                id="password" aria-label="default input example">
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="password" placeholder="Confirm Password" name="password_confirmation"
                                id="password" aria-label="default input example">
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="text" placeholder="Address" name="address"
                                id="address" aria-label="default input example">
                            </div>
                            <div class="col-lg-12">
                                <input class=" form-control" type="phone" placeholder="Phone Number" name="phone"
                                id="phone" aria-label="default input example">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="number" placeholder="Age" name="age"
                                id="age" aria-label="default input example">
                            </div>
                            <div class="col-md-6">
                                <select class=" form-select" aria-label="Default select example">
                                    <option selected disabled>Choose Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label>Birth Of Date</label>
                                <input class=" form-control" type="date" placeholder="Birth Of Date" name="BOD"
                                id="BOD" aria-label="default input example">
                            </div>
                            <a class="link" href="/login">allready have an account ?</a>
                            <input type="submit" class="btn btn-primary mb-3 submit" value="Register">
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-img">
                        <img src="/images/register-img.png" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\HIS_Proj\resources\views/register.blade.php ENDPATH**/ ?>