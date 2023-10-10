<x-app-layout>
    <!-- ~~~ Hero Section ~~~ -->
    <section class="hero-section banner-overlay bg_img"
        data-img="{{ asset('assets/frontend/images/banner/banner-bg.jpg') }}">
        <div class="custom-container">
            <div class="hero-content">
                <h1 class="title uppercase cl-white">Contact</h1>
                <ul class="breadcrumb cl-white p-0 m-0">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        Contact
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ~~~ Hero Section ~~~ -->


    <!-- ~~~ Contact Section ~~~ -->
    <section class="contact-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-xl-5">
                    <div class="section-header left-style mb-lg-0">
                        <h2 class="title">We look forward <span>to hearing from you!</span></h2>
                        <p>To send us a message, simply fill out all fields marked
                            with and click on "Submit". You can also send us an email to
                            <a href="Mailto:{{ setting('general_settings')?->option_value['support_email'] }}">{{
                                setting('general_settings')?->option_value['support_email'] }}</a> or
                            contact us at the following address:
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <h6 class="title">Email Address</h6>
                            <ul>
                                <li>
                                    <a href="Mailto:{{ setting('general_settings')?->option_value['support_email'] }}"><span>{{
                                            setting('general_settings')?->option_value['support_email'] }}</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <h6 class="title">Phone Number</h6>
                            <ul>
                                <li>
                                    <a href="Tel:{{ setting('general_settings')?->option_value['support_phone'] }}">{{
                                        setting('general_settings')?->option_value['support_phone'] }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-destination"></i>
                            </div>
                            <h6 class="title">Location</h6>
                            <ul>
                                <li>
                                    {{ setting('general_settings')?->option_value['company_address'] }}
                                </li>
                            </ul>
                        </div>
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="flaticon-earth-grid-symbol"></i>
                            </div>
                            <h6 class="title">Website</h6>
                            <ul>
                                <li>
                                    <a href="#0" target="_blank">www.yoursite.ccom</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Contact Section ~~~ -->


    <!-- ~~~ Maps Section ~~~ -->
    {{-- <div class="maps"></div> --}}
    <!-- ~~~ Maps Section ~~~ -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28020.25374887811!2d77.31294282285877!3d28.613821945587784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5937b2c99f9%3A0xfc405c47d6745d4d!2sLal%20Bahadur%20Shastri%20Hospital!5e0!3m2!1sen!2sin!4v1696916745973!5m2!1sen!2sin"
        width="100%" height="822" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>


    <!-- ~~~ Contact Section ~~~ -->
    <section class="contact-section pb-120">
        <div class="container">
            <div class="gradient-bg mt--360 contact-wrapper">
                <div class="contact-header">
                    <h2 class="title">Get In Touch</h2>
                </div>
                <form class="contact-form row" id="contact_form_submit" action="{{ route('queries.store') }}"
                    method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <label class="icon" for="first_name"><i class="fas fa-user"></i></label>
                            <input type="text" placeholder="First Name" id="first_name" name="first_name"
                                value="{{ old('first_name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <label class="icon" for="last_name"><i class="fas fa-user"></i></label>
                            <input type="text" placeholder="Last Name" id="last_name" name="last_name"
                                value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <label class="icon" for="email"><i class="fas fa-envelope"></i></label>
                            <input type="text" placeholder="Enter Email" id="email" name="email"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <label class="icon" for="mobile"><i class="fas fa-phone-alt"></i></label>
                            <input type="text" placeholder="Mobile Number" id="mobile" name="mobile"
                                value="{{ old('mobile') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form-group">
                            <label class="icon" for="subject"><i class="fas fa-pen"></i></label>
                            <input type="text" placeholder="Subject" id="subject" name="subject"
                                value="{{ old('subject') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form-group">
                            <label class="icon" for="message"><i class="far fa-envelope"></i></label>
                            <textarea name="message" id="message" placeholder="Message"
                                name="content">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="contact-form-group">
                            <div class="contact-form-group-select">
                                <select class="select-bar">
                                    <option value="j0">How did you hear about us?</option>
                                    <option value="j1">Facebook</option>
                                    <option value="j2">Twitter</option>
                                    <option value="j3">Instagram</option>
                                    <option value="j4">Friend</option>
                                    <option value="j5">Teacher</option>
                                    <option value="j6">Students</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <div class="contact-form-group-select">
                                <select class="select-bar">
                                    <option value="l0">Preferred Contact</option>
                                    <option value="l1">Facebook</option>
                                    <option value="l2">Mail</option>
                                    <option value="l3">Phone</option>
                                    <option value="l4">Direct</option>
                                    <option value="l5">Anything Else</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 text-center mt-4">
                        <div class="contact-form-group mb-0">
                            <button type="submit">Send Message <i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ~~~ Contact Section ~~~ -->
    @push('scripts')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCo_pcAdFNbTDCAvMwAD19oRTuEmb9M50c"></script>
    @endpush
</x-app-layout>
