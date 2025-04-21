@extends('layouts.theme')

@section('title', 'My Grades')

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
                                        <li class="breadcrumb-item"><a href="{{ route('my-grades') }}">My Grades</a></li>
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
        <h2 class="text-center mb-4">My Grades</h2>
        @if ($grades->isEmpty())
            <p class="text-center text-muted">No grades available yet.</p>
        @else
            <div class="table-responsive">
                <table id="gradesTable" class="table mb-5 table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr>
                                <td>{{ $grade->subject->title }}</td>
                                <td>{{ $grade->grade }}</td>
                                <td>{{ $grade->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
