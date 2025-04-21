@extends('layouts.theme')

@section('title', 'Contact Us')

@section('content')
    <style>
        .contact-section .form-group {
            position: relative;
        }

        .contact-section .form-group small {
            display: block;
            margin-top: 50px;
            color: #6c757d;
            text-align: left;
            position: absolute;
            left: 0;
            width: 100%;
        }

        .contact-section .form-group select {
            margin-bottom: 30px;
        }
    </style>

    <main>
        <!--? slider Area Start-->
        <section class="slider-area slider-area2">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Contact us</h1>
                                    <!-- breadcrumb Start-->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('contact') }}">Contact</a></li>
                                        </ol>
                                    </nav>
                                    <!-- breadcrumb End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--?  Contact Area start  -->
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                        <p>If you're interested in joining one of our programs or have questions about grades or any other
                            details please reach out to us.</p>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <div class="form-group">
                                        <select class="form-control" name="program" id="program">
                                            <option value="" disabled selected>Select a Program</option>
                                            @if ($programs->isEmpty())
                                                <option class="text-black" disabled>No programs available</option>
                                            @else
                                                @foreach ($programs as $program)
                                                    <option class="text-black" value="{{ $program->id }}">
                                                        {{ $program->title }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="form-text text-muted">You can leave this empty if you're not sure
                                            about the program.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Buttonwood, California.</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End -->
    </main>
@endsection
