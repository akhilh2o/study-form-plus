<x-app-layout>
    <x-breadcrumb title="Contact Us" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Contact Us']]" />


    <!-- ~~~ Contact Section ~~~ -->
    <section class="contact-section pt-120 pb-50">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-xl-5">
                    <div class="section-header left-style mb-lg-0">
                        <h2 class="title">We look forward <span>to hearing from you!</span></h2>
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
                                    <a href="Mailto:{{ setting('general_settings')?->option_value['support_email'] }}">
                                        <span>{{ setting('general_settings')?->option_value['support_email'] ?? 'info@example.com' }}</span>
                                    </a>
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
                                    <a href="Tel:{{ setting('general_settings')?->option_value['support_phone'] }}">
                                        {{ setting('general_settings')?->option_value['support_phone'] ?? '+91 9876-9876-3214' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ Contact Section ~~~ -->




    <!-- ~~~ Contact Section ~~~ -->
    <section class="contact-section pb-50">
        <div class="container">
            <div class="gradient-bg contact-wrapper">
                <div class="contact-header">
                    <h2 class="title">Get In Touch</h2>
                </div>
                <form class="contact-form row" id="contact_form_submit" action="{{ route('queries.store') }}"
                    method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <label class="icon" for="name"><i class="fas fa-user"></i></label>
                            <input type="text" placeholder="First Name" id="first_name" name="first_name"
                                value="{{ old('first_name') }}" required>
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
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <label class="icon" for="subject"><i class="fas fa-pen"></i></label>
                            <input type="text" placeholder="Subject" id="subject" name="subject"
                                value="{{ old('subject') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form-group">
                            <label class="icon" for="content"><i class="far fa-envelope"></i></label>
                            <textarea name="content" id="content" placeholder="content" name="content">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <input type="hidden" name="title" value="Contact Form">
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
