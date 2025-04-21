@extends('layouts.theme')

@section('title', $course->title)

@section('content')
    <main>
        <!-- Slider Area Start -->
        <section class="slider-area slider-area2">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">{{ ucfirst($course->title) }}</h1>
                                    <!-- Breadcrumb Start -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><a
                                                    href="">{{ $course->title }}</a></li>
                                        </ol>
                                    </nav>
                                    <!-- Breadcrumb End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider Area End -->

        <!-- Course Details Area Start -->
        <div class="course-details-area section-padding40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="properties__card">
                            <div class="properties__caption">
                                <h2>{{ ucfirst($course->title) }}</h2>
                                <p><strong>Code:</strong> ${{ $course->code }}</p>
                                <p><strong>Language:</strong> {{ $course->language }}</p>
                                <p><strong>Level:</strong> {{ $course->level }}</p>
                                <p><strong>Price:</strong> ${{ $course->price }}</p>
                                <a href="{{ route('home') }}" class="border-btn border-btn2 mt-3">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Course Details Area End -->

    </main>
@endsection
