@props([
    'testimonials' => [],
])
{{-- {{dd($testimonials)}} --}}
<div class="container-fluid bg-image py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">{{__('Testimonial')}}</h6>
                    <h1 class="display-4">{{__('What Say Our Students')}}</h1>
                </div>
                <p class="m-0">{{__('Dolor est dolores et nonumy sit labore dolores est sed rebum amet, justo duo ipsum
                    sanctus dolore magna rebum sit et. Diam lorem ea sea at. Nonumy et at at sed justo est nonumy
                    tempor. Vero sea ea eirmod, elitr ea amet diam ipsum at amet. Erat sed stet eos ipsum diam')}}</p>
            </div>
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($testimonials as $testimonial)
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>{{ $testimonial->content }}</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <img class="img-fluid mr-4"
                                    src="{{ asset('storage/' . $testimonial->student->information->avatar) }}"
                                    alt="">
                                <div>
                                    <h5>{{ $testimonial->student->name }}</h5>
                                    <span>{{ $testimonial->student->information->field_title }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
