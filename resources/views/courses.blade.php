@extends('layouts.theme')

@section('title', 'Courses')

@section('content')
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
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
                                    <!-- breadcrumb Start-->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses</a></li>
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
        <!-- Courses area start -->
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Our Featured Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($courses as $course)
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__caption">
                                        <h3><a href="">{{ $course->title }}</a></h3>
                                        <p>Language: {{ $course->language }}</p>
                                        <p>Level: {{ $course->level }}</p>
                                        <div class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="price">
                                                <span>Price: ${{ $course->price }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('course.show', $course->id) }}"
                                            class="border-btn border-btn2">Find out more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">No courses available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Courses area End -->
    </main>
@endsection
