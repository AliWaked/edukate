<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                    <div class="d-flex align-items-center mb-5">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>{{__('Our Location')}}</h4>
                            <p class="m-0">{{__('123 Street, New York, USA')}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-5">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-phone-alt text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>{{__('Call Us')}}</h4>
                            <p class="m-0">+012 345 6789</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-envelope text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>{{__('Email Us')}}</h4>
                            <p class="m-0">info@example.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">{{__('Need Help?')}}</h6>
                    <h1 class="display-4">{{__('Send Us A Message')}}</h1>
                </div>
                <div class="contact-form">
                    <form action="{{route('send.email.message')}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" name="name" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="{{__('Your Name')}}" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="email" name="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="{{__('Your Email')}}" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="{{__('Subject')}}" required="required">
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="{{__('Message')}}" required="required"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit">{{__('Send Message')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>