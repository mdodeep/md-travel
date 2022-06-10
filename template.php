<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Zorial - Responsive Landing page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta content="Themesdesign" name="author" />

        <!--favicon-->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <?php include "hook/public/csshook.php"; ?>
    </head>

    <body>
        <!-- light-dark mode button -->
        <a href="#" id="mode" mode="light" class="p-3 text-white rounded-circle mode-btn">
            <i class="bx bx-moon font-size-24 mode-dark"></i>
            <i class="bx bx-sun font-size-24 bx-spin mode-light"></i>
        </a>

        <!-- Start navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky">
            <div class="container">
                <a class="navbar-brand" href="index-1.html">
                    <img src="images/logo-light.png" class="logo-light" alt="" height="20" />
                    <img src="images/logo-dark.png" class="logo-dark" alt="" height="20" />
                </a>

                <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"><i class="bx bx-menu"></i></span>
                </a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-lg-4">
                        <li class="nav-item active">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feature">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#review">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq">Faq</a>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-sm btn-outline-primary nav-btn ml-auto my-lg-0 my-2">Download</a>
                </div>
            </div>
            <!-- end container -->
        </nav>
        <!-- end navbar -->

        <!-- start hero -->
        <section class="hero-1 position-relative" id="home" style="background-image: url(images/hero-1-bg.png);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6">
                        <img class="img-fluid" src="images/hero-1-img.png" alt="" />
                    </div>
                    <!-- end col -->
                    <div class="col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-sm-6">
                        <div class="card form-box position-relative p-4 mt-sm-0 mt-4">
                            <div class="m-2">
                                <div class="text-center">
                                    <p class="text-muted text-uppercase mb-3">We will back to you</p>
                                    <h4 class="font-size-22">Get 14-Days Free Trial</h4>
                                </div>
                                <!-- start form -->
                                <form class="mt-4">
                                    <div class="form-group">
                                        <input class="form-control bg-transparent" type="text" placeholder="Enter Your Name" required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control bg-transparent" type="email" placeholder="Enter Your Email" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control bg-transparent h-auto" placeholder="Write Your Message" rows="3"></textarea>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-block" type="submit">send information</a>
                                    <div class="custom-control custom-checkbox mt-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label text-muted" for="customCheck1">I agree your terms & conditions</label>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->

            <div class="container-fluid">
                <div class="row">
                    <div class="hero-bottom-shape">
                        <img class="img-fluid w-100 shape-light" src="images/hero-1-bottom-shape-light.png" alt="" />
                        <img class="img-fluid w-100 shape-dark" src="images/hero-1-bottom-shape-dark.png" alt="" />
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end hero -->

        <!-- start service -->
        <section class="section bg-light" id="services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h3 class="font-weight-medium mb-3">Best we provide</h3>
                            <p class="text-muted">Donec nec nibh vestibulum, fringilla ante nec, convallis turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus tristique nibh.</p>
                        </div>
                    </div>
                    <!-- end-col -->
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5">
                                <img class="img-fluid mb-4 pb-2" src="images/icon-1.png" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Pro Features</h5>
                                <p class="text-muted mb-3">Curabitu pellentesque Quisque agtut nulltatnunc aboutit.</p>
                                <a href="#">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect active mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="img-fluid mb-4 pb-2" src="images/icon-2.png" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Brilliant Design</h5>
                                <p class="text-muted mb-3">Curabitu pellentesque Quisque agtut nulltatnunc aboutit.</p>
                                <a href="#">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="img-fluid mb-4 pb-2" src="images/icon-3.png" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Unique Features</h5>
                                <p class="text-muted mb-3">Curabitu pellentesque Quisque agtut nulltatnunc aboutit.</p>
                                <a href="#">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end services -->
        
        <!-- start features -->
        <section class="overflow-hidden bg-primary feature-section" id="feature">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <h3 class="text-white mb-3">Take a better chance</h3>
                            <p class="text-white-50 mb-0 pb-2">crown impresses you with fully responsive and highly customiz combination of very clean impresses you.</p>
                            <div class="mt-4">
                                <h4 class="text-white font-size-16 py-2"><i class="bx bx-check-circle align-middle icon mr-2"></i>Design</h4>
                                <h4 class="text-white font-size-16 py-2"><i class="bx bx-check-circle align-middle icon mr-2"></i>Development</h4>
                                <h4 class="text-white font-size-16 py-2"><i class="bx bx-check-circle align-middle icon mr-2"></i>Smart Features</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <img class="feature-img" src="images/feature-bg.jpg" alt="" />
                        <div class="video-button">
                            <a class="video-play-icon" href="https://vimeo.com/172433957">
                                <img class="img-fluid" src="images/play-icon.png" alt="" />
                            </a>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end features -->

        <!-- our pricing -->
        <section class="section" style="background-image: url(images/map-bg.png);" id="pricing">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h3 class="font-weight-medium mb-3">Take a best plans</h3>
                            <p class="text-muted">Donec nec nibh vestibulum, fringilla ante nec, convallis turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rhoncus tristique nibh.</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card price-card hover-effect">
                            <div class="position-relative">
                                <img class="card-img-top img-fluid position-relative" src="images/price-1.jpg" alt="" />
                                <div class="bg-overlay rounded-top"></div>
                                <div class="pricing-pr text-center">
                                    <h2 class="text-uppercase text-white mb-3">Free</h2>
                                    <div class="bottom-line mx-auto"></div>
                                    <p class="text-white mb-0 mt-3">Basic</p>
                                </div>
                            </div>
                            <div class="card-body p-4 m-1">
                                <ul class="list-unstyled mb-2">
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> 5 Analytics Campaigns</li>
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Unlimited Free Dashboards</li>
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Access to all APIs</li>
                                    <li class="text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Custom Charts</li>
                                </ul>
                                <div class="mt-3">
                                    <a class="text-uppercase font-weight-semibold" href="#">Start 15 Day Trial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card price-card hover-effect active">
                            <div class="position-relative">
                                <img class="card-img-top img-fluid position-relative" src="images/price-2.jpg" alt="" />
                                <div class="bg-overlay rounded-top"></div>
                                <div class="pricing-pr text-center">
                                    <h2 class="text-uppercase text-white mb-3">$199</h2>
                                    <div class="bottom-line mx-auto"></div>
                                    <p class="text-white mb-0 mt-3">Standard</p>
                                </div>
                            </div>
                            <div class="card-body p-4 m-1">
                                <ul class="list-unstyled mb-2">
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> 5 Analytics Campaigns</li>
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Unlimited Free Dashboards</li>
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Access to all APIs</li>
                                    <li class="text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Custom Charts</li>
                                </ul>
                                <div class="mt-3">
                                    <a class="text-uppercase font-weight-semibold" href="#">Start 15 Day Trial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card price-card hover-effect">
                            <div class="position-relative">
                                <div class="ribbon ribbon-primary">
                                    <span class="text-uppercase">Featured</span>
                                </div>
                                <img class="card-img-top img-fluid position-relative" src="images/price-3.jpg" alt="" />
                                <div class="bg-overlay rounded-top"></div>
                                <div class="pricing-pr text-center">
                                    <h2 class="text-uppercase text-white mb-3">$299</h2>
                                    <div class="bottom-line mx-auto"></div>
                                    <p class="text-white mb-0 mt-3">Premium</p>
                                </div>
                            </div>
                            <div class="card-body p-4 m-1">
                                <ul class="list-unstyled mb-2">
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> 5 Analytics Campaigns</li>
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Unlimited Free Dashboards</li>
                                    <li class="border-bottom text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Access to all APIs</li>
                                    <li class="text-muted py-3"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Custom Charts</li>
                                </ul>
                                <div class="mt-3">
                                    <a class="text-uppercase font-weight-semibold" href="#">Start 15 Day Trial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end-col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end pricing -->

        <!-- start testimonial -->
        <section class="section bg-light position-relative" id="review">
            <div class="container">
                <div class="hero-bg-overlay"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="text-center">
                                    <img class="img-fluid w-auto mx-auto mb-5" src="images/quote-icon.png" alt="" />
                                    <h3 class="font-size-20 mb-4">" This should be used to tell a story and include any testimonials you might have about your product or service for your clients "</h3>
                                    <h6 class="text-muted">- Christina Hawkins</h6>
                                </div>
                            </div>
                            <!-- end owl item -->
                            <div class="item">
                                <div class="text-center">
                                    <img class="img-fluid w-auto mx-auto mb-5" src="images/quote-icon.png" alt="" />
                                    <h3 class="font-size-20 mb-4">" It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. "</h3>
                                    <h6 class="text-muted">- Jessica Tyas</h6>
                                </div>
                            </div>
                            <!-- end owl item -->
                            <div class="item">
                                <div class="text-center">
                                    <img class="img-fluid w-auto mx-auto mb-5" src="images/quote-icon.png" alt="" />
                                    <h3 class="font-size-20 mb-4">" There are many variations of passages of Lorem Ipsum available,but the majority testimonials you might product. "</h3>
                                    <h6 class="text-muted">- Dylan Taber</h6>
                                </div>
                            </div>
                            <!-- end owl item -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end testimonial -->

        <!-- start faq -->
        <section class="section faq-bg position-relative" style="background-image: url(images/faq-bg.jpg);" id="faq">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <h3 class="text-white mb-5">
                            Frequently <br />
                            asked question
                        </h3>
                        <div class="accordion" id="accordionExample">
                            <div class="card rounded mb-3">
                                <div class="card-header position-relative border-bottom" id="headingOne">
                                    <a class="font-weight-medium faq-list mb-0" href="#collapseOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Collaborative and drive innovation faster than ever ?
                                    </a>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="text-muted mb-0">Dolor vel mauris justo. Ut sit amet semper ligula, non ullam ex convallis, lobortis. Phasellus...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded mb-3">
                                <div class="card-header border-bottom" id="headingTwo">
                                    <a class="font-weight-medium faq-list collapsed mb-0" href="#collapseTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Convallis turpis lorem ipsum dolor amet ?
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="text-muted mb-0">Dolor vel mauris justo. Ut sit amet semper ligula, non ullam ex convallis, lobortis. Phasellus...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded mb-3">
                                <div class="card-header border-bottom" id="headingThree">
                                    <a class="font-weight-medium faq-list collapsed mb-0" href="collapseThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Curabitur pellentesque Quisque eget ?
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p class="text-muted mb-0">Dolor vel mauris justo. Ut sit amet semper ligula, non ullam ex convallis, lobortis. Phasellus...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-4 col-lg-5 offset-lg-1 offset-xl-2 col-md-6">
                        <div class="card rounded text-center p-4">
                            <h4 class="font-size-22 my-4">Still have a Questions ?</h4>
                            <div class="border-bottom mb-4"></div>
                            <p class="text-muted mb-3">We hope our answers to some of your frequently asked questions help, but have any further queries.</p>
                            <p class="text-muted">We've developed a learnin in touch today please get is now tutorial videos.</p>
                            <a href="#" class="btn btn-primary my-4">Ask Us anything</a>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end faq -->

        <!-- start brandlogo -->
        <section class="brand-section border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="client-image my-3">
                            <img class="img-fluid mx-auto d-block" src="images/brand-logo-1.png" alt="" />
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-3 col-md-3">
                        <div class="client-image my-3">
                            <img class="img-fluid mx-auto d-block" src="images/brand-logo-2.png" alt="" />
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-3 col-md-3">
                        <div class="client-image my-3">
                            <img class="img-fluid mx-auto d-block" src="images/brand-logo-3.png" alt="" />
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-3 col-md-3">
                        <div class="client-image my-3">
                            <img class="img-fluid mx-auto d-block" src="images/brand-logo-4.png" alt="" />
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end brandlogo -->

        <!-- start contact us -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3 class="mb-0">Contact Us</h3>
                                    <div class="title-line mx-auto my-4"></div>
                                    <p class="text-uppercase font-size-14 font-weight-semibold mb-0">We'd love to hear from you </p>
                                    <p class="text-muted mt-4 mb-0">Learning web design online is now easier than ever <br> with our step-by-step annotated tutorial videos. We've developed a learning sequence to that will teach.</p>
                                </div>
                                <!-- start form -->
                                <form  method="post" name="myForm" onsubmit="return validateForm()" href="javascript: void(0);" class="mt-5">
                                    <p id="error-msg"></p>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="font-weight-medium mb-2" for="name">Your Name</label>
                                                <input type="text" class="form-control bg-transparent" placeholder="Your name" id="name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-medium mb-2" for="email">Email</label>
                                                <input type="email" class="form-control bg-transparent" placeholder="Enter email" id="email"  />
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-medium mb-2" for="subject">Subject</label>
                                                <input type="text" class="form-control bg-transparent" placeholder="Enter number" id="subject"  />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-md-7">
                                            <label class="font-weight-medium" for="comments">Message</label>
                                            <textarea class="form-control bg-transparent" id="comments" placeholder="Enter your message..." rows="9"></textarea>
                                            <div class="text-right">
                                                <input type="submit" id="submit" name="send" class="btn btn-primary mt-3" value="Send message" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                                                                
                                    </div>
                                    <!-- end row -->
                                </form>
                                <!-- end form -->
                            </div>
                        </div>   
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </section>
        <!-- end contact us -->

        <!-- start footer -->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <a href="index-1.html" class="footer-logo">
                            <img src="images/logo-dark.png" class="logo-dark" alt="" height="20" />
                            <img src="images/logo-light.png" class="logo-light" alt="" height="20" />
                        </a>
                        <p class="text-muted mt-4 pt-2">When an unknown printer took a galley of type scrambled it to make a type specimen book. It has survived not only five centuries, but also the...</p>
                        <a
                            href="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!
                        1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569"
                            class="google-map btn btn-white mt-3"
                        >
                            <i class="bx bx-map-pin icon font-size-18 align-middle mr-1"></i>View map
                        </a>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-2 offset-lg-3 col-md-3 mt-sm-0 mt-5">
                        <h4 class="font-size-18 mb-0">Company</h4>
                        <ul class="list-unstyled mt-4 mb-0">
                            <li class="py-1">
                                <a class="text-muted" href="#"> <i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Services</a>
                            </li>
                            <li class="py-1">
                                <a class="text-muted" href="#">
                                    <i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i>
                                    Blog
                                </a>
                            </li>
                            <li class="py-1">
                                <a class="text-muted" href="#">
                                    <i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i>
                                    Contact
                                </a>
                            </li>
                            <li class="py-1">
                                <a class="text-muted" href="#">
                                    <i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i>
                                    Sitemap
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-2 col-md-3 mt-sm-0 mt-5">
                        <h4 class="font-size-18 mb-0">Products</h4>
                        <ul class="list-unstyled mt-4 mb-0">
                            <li class="py-1">
                                <a class="text-muted" href="#"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Health</a>
                            </li>
                            <li class="py-1">
                                <a class="text-muted" href="#"><i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i> Insurance</a>
                            </li>
                            <li class="py-1">
                                <a class="text-muted" href="#">
                                    <i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i>
                                    Travel
                                </a>
                            </li>
                            <li class="py-1">
                                <a class="text-muted" href="#">
                                    <i class="bx bx-git-commit align-middle text-primary icon font-size-18 mr-2"></i>
                                    Technology
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- end footer -->

        <!-- start footer alter -->
        <div class="footer-alt bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="py-4">
                            <p class="text-white text-center mb-0">2020 © Zorial. Design By Themesdesign</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end footer alter -->
    </body>
</html>
