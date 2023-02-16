<?php
include("./Header/header.php");
?>

<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-4 col-lg-6 wow slideInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded h-100 p-5">
                    <div class="section-title">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Contact Us</h5>
                        <h1 class="display-6 mb-4">Feel Free To Contact Us</h1>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h5 class="mb-0">Our Office</h5>
                            <span>123 Street, New York, USA</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h5 class="mb-0">Email Us</h5>
                            <span>info@example.com</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h5 class="mb-0">Call Us</h5>
                            <span>+012 345 6789</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                <h1 class="text-center m-2">Join Us</h1>
                <form action="./Backend/register.php" method="POST">
                    <div class="row g-3">
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="firstName" placeholder="First Name" style="height: 55px;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="middleName" placeholder="Middle Name" style="height: 55px;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="lastName" placeholder="Last Name" style="height: 55px;">
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control border-0 bg-light px-4" placeholder="Mobile Number" name="mobile" style="height: 55px;">
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" name="email" style="height: 55px;">
                        </div>
                        <div class="col-6">
                            <label for="gender:" class="form-label">Gender</label><br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="others" value="others">
                                <label class="form-check-label" for="inlineRadio3">Others</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="occupation:" class="form-label">Occupation</label><br />
                            <select class="form-select" name="occupation" aria-label="Default select example">
        
                                <option value="student">Student</option>
                                <option value="business">Business</option>
                                <option value="job">Job</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control border-0 bg-light px-4" name="address" placeholder="Address" style="height: 55px;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="street" placeholder="Street" style="height: 55px;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="city" placeholder="City" style="height: 55px;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="state" placeholder="State" style="height: 55px;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="pin" placeholder="Pin Code" style="height: 55px;">
                        </div>

                        <div class="col-6">
                            <input type="password" class="form-control border-0 bg-light px-4" name="password" placeholder="Password" style="height: 55px;">
                        </div>
                        <div class="col-6">
                            <input type="password" class="form-control border-0 bg-light px-4" name="confirmPassword" placeholder="Confirm Password" style="height: 55px;">
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="col-xl-2 col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div> -->
        </div>
    </div>
</div>
<!-- Contact End -->

<?php
include("./Footer/footer.php");
?>