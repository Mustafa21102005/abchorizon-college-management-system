@extends('layouts.theme')

@section('title', 'My Courses')

@section('content')

    <!-- Slider Area Start -->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('my-courses') }}">My Courses</a></li>
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

    <div class="container mt-5">
        <h2 class="text-center mb-4">My Courses</h2>

        @if ($programs->isEmpty())
            <p class="text-center text-muted">You are not enrolled in any courses.</p>
        @else
            <div class="table-responsive">
                <table id="coursesTable" class="table mb-5 table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Program Name</th>
                            <th scope="col">Courses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $program->title }}</td>
                                <td>
                                    @foreach ($program->subPrograms as $subprogram)
                                        <span class="badge badge-primary">{{ $subprogram->title }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
