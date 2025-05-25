@extends('layouts.theme')

@section('title', 'Programs')

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
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Our Programs</h1>
                                    <!-- breadcrumb Start-->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('program') }}">Programs</a></li>
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
                            <h2>Our Featured Programs</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($programs as $program)
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card"
                                    style="
                    background-image: url('{{ $program->image ? (filter_var($program->image->path, FILTER_VALIDATE_URL) ? $program->image->path : asset('storage/' . $program->image->path)) : 'path/to/default/image.jpg' }}'); 
                    background-size: cover; 
                    background-position: center; 
                    height: 250px; 
                    border-radius: 8px;">
                                    <div class="properties__caption"
                                        style="background-color: rgba(0, 0, 0, 0.5); padding: 15px;">
                                        <h3 style="color: #fff;">
                                            <a href="{{ route('program.courses', $program->id) }}"
                                                style="color: inherit;">{{ $program->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">No programs available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Courses area End -->
    </main>
@endsection
