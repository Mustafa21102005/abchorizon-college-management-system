@extends('layouts.theme')

@section('title')
    {{ $program->title }} Courses
@endsection

@section('content')
    <main>
        <!--? Slider Area Start -->
        <section class="slider-area slider-area2">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">{{ $program->title }}</h1>
                                    <!-- Breadcrumb Start -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('program') }}">Programs</a></li>
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
        <!-- Courses Area Start -->
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Courses Under {{ $program->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($program->subPrograms->isEmpty())
                        <div class="col-12">
                            <p class="text-center text-gray-500 dark:text-gray-400">No courses available for this
                                program.</p>
                        </div>
                    @else
                        @foreach ($program->subPrograms as $subProgram)
                            <div class="col-lg-4">
                                <div class="properties properties2 mb-30">
                                    <div class="properties__card">
                                        <div class="properties__caption">
                                            <h3>
                                                {{ $subProgram->title }}
                                            </h3>
                                            <div
                                                class="properties__footer d-flex justify-content-between align-items-center">
                                                <div class="details">
                                                    <span>Language: {{ $subProgram->language ?? 'N/A' }}</span>
                                                    <br>
                                                    <span>Level: {{ $subProgram->level ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('course.show', $subProgram->id) }}"
                                                class="border-btn border-btn2">Find out more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- Courses Area End -->
    </main>
@endsection
