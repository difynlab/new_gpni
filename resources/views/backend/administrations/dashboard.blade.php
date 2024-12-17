@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <x-backend.breadcrumb page_name="Dashboard"></x-backend.breadcrumb>

    <div class="dashboard">
        <div class="section">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="single-box mb-3">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="title">Total Registered Users</p>
                                        <p class="value">1990 <span>+55%</span></p>
                                    </div>
                                    <div class="col-3">
                                        <div class="image-div">
                                            <img src="{{ asset('storage/backend/common/users.png') }}" alt="Users">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="single-box">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="title">Total Courses</p>
                                        <p class="value">07</p>
                                    </div>
                                    <div class="col-3">
                                        <div class="image-div">
                                            <img src="{{ asset('storage/backend/common/courses.png') }}" alt="Users">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="single-box mb-3">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="title">Total Products</p>
                                        <p class="value">30</p>
                                    </div>
                                    <div class="col-3">
                                        <div class="image-div">
                                            <img src="{{ asset('storage/backend/common/products.png') }}" alt="Users">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-box">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="title">Total Affiliate Products</p>
                                        <p class="value">23</p>
                                    </div>
                                    <div class="col-3">
                                        <div class="image-div">
                                            <img src="{{ asset('storage/backend/common/affiliate-products.png') }}" alt="Users">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="row">
                <div class="col-6">
                    <p class="title">Monthly Registered Users</p>
                    <p class="description"><span>({{ $users_year_difference }})</span> in 2024</p>
                    <canvas id="user-year-chart"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('after-scripts')
    <script>
        const userYearChart = document.getElementById('user-year-chart');
        new Chart(userYearChart, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        data: @json($last_year_data),
                        borderColor: '#AFC3EC',
                        backgroundColor: '#EBF0FB',
                        borderWidth: 3,
                        fill: true,
                        // pointRadius: 0,
                        // pointHoverRadius: 0,
                        tension: 0.4
                            
                    },
                    {
                        data: @json($current_year_data),
                        borderColor: '#FDEABA',
                        backgroundColor: '#FFFAEF',
                        borderWidth: 3,
                        fill: true,
                        // pointRadius: 0,
                        // pointHoverRadius: 0,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: false,
                    },
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: true,
                        }
                    },
                    y: {
                        grid: {
                            display: true
                        }
                    }
                }
            }
        });
    </script>
@endpush