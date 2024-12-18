@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <x-backend.breadcrumb page_name="Dashboard"></x-backend.breadcrumb>

    <div class="dashboard">
        <div class="section">
            <div class="row align-items-center">
                <div class="col-7">
                    <div class="row">
                        <div class="col-6">
                            <div class="single-box mb-3">
                                <div class="row align-items-center">
                                    <div class="col-8 col-xl-9">
                                        <p class="title">Total Registered Users</p>
                                        <p class="value">{{ $total_registered_users }} <span>{{ $users_percentage_increase }}</span></p>
                                    </div>
                                    <div class="col-4 col-xl-3">
                                        <div class="image-div">
                                            <img src="{{ asset('storage/backend/common/users.png') }}" alt="Users">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="single-box">
                                <div class="row align-items-center">
                                    <div class="col-8 col-xl-9">
                                        <p class="title">Total Courses</p>
                                        <p class="value">{{ $total_courses }}</p>
                                    </div>
                                    <div class="col-4 col-xl-3">
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
                                    <div class="col-8 col-xl-9">
                                        <p class="title">Total Products</p>
                                        <p class="value">{{ $total_products }}</p>
                                    </div>
                                    <div class="col-4 col-xl-3">
                                        <div class="image-div">
                                            <img src="{{ asset('storage/backend/common/products.png') }}" alt="Users">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-box">
                                <div class="row align-items-center">
                                    <div class="col-8 col-xl-9">
                                        <p class="title">Total Affiliate Products</p>
                                        <p class="value">{{ $total_affiliate_products }}</p>
                                    </div>
                                    <div class="col-4 col-xl-3">
                                        <div class="image-div">
                                            <img src="{{ asset('storage/backend/common/affiliate-products.png') }}" alt="Users">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-5 ps-3 ps-xl-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="single-item mb-5">
                                <a href="{{ route('backend.persons.students.index') }}" class="link">Users</a>
                                <hr class="line">
                            </div>
                            
                            <div class="single-item">
                                <a href="{{ route('backend.persons.admins.index') }}" class="link">Staffs</a>
                                <hr class="line">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="single-item mb-5">
                                <a href="{{ route('backend.persons.nutritionists.index') }}" class="link">Nutritionists</a>
                                <hr class="line">
                            </div>
                            
                            <div class="single-item">
                                <a href="{{ route('backend.persons.advisory-boards.index') }}" class="link">Advisory Board</a>
                                <hr class="line">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="row">
                <div class="col-12 col-xl-6 mb-4 mb-xl-0">
                    <p class="title">Monthly Registered Users</p>
                    <p class="description"><span>({{ $users_year_difference }})</span> in {{ $current_year }}</p>
                    <canvas id="user-year-chart"></canvas>
                </div>

                <div class="col-12 col-xl-6">
                    <p class="title">Monthly Purchased Courses</p>
                    <p class="description"><span>({{ $course_purchases_year_difference }})</span> in {{ $current_year }}</p>
                    <canvas id="course-year-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="row">
                <div class="col-12 col-xl-6 mb-4 mb-xl-0">
                    <p class="title">User Countries</p>
                    <p class="description">in {{ $current_year }}</p>
                    <canvas id="user-country-chart"></canvas>
                </div>

                <div class="col-12 col-xl-6 p-xl-4">
                    @foreach($country_users_percentages as $key => $country_users_percentage)
                        <div class="single-country">
                            <div class="row align-items-center">
                                <div class="col-11 col-xl-10">
                                    <p class="text">{{ $key }}</p>
                                    <div class="progress-bar">
                                        <div class="progress-fill {{ $loop->index % 2 == 0 ? 'yellow-fill' : 'blue-fill' }}" style="width: {{ $country_users_percentage }}%;"></div>
                                    </div>
                                </div>
                                <div class="col-1 col-xl-2">
                                    <p class="percentage-text">{{ $country_users_percentage }}%</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="section">
            <div class="row">
                <div class="col-6">
                    <p class="title mb-3">Top Selling Courses (Last 3 months)</p>

                    <div class="row">
                        <div class="col-9">
                            <p class="top-title">Course</p>
                        </div>
                        <div class="col-3 text-center">
                            <p class="top-title">Frequency</p>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2 mb-3">
                        </div>

                        @foreach($high_sell_courses as $high_sell_course)
                            <div class="col-9">
                                <p class="content">{{ $high_sell_course->course_name }}</p>
                            </div>
                            <div class="col-3 text-center">
                                <p class="content">{{ $high_sell_course->course_count }}</p>
                            </div>
                            <div class="col-12">
                                <hr class="my-3">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-6">
                    <p class="title mb-3">Top Selling Products (Last 3 months)</p>

                    <div class="row">
                        <div class="col-9">
                            <p class="top-title">Product</p>
                        </div>
                        <div class="col-3 text-center">
                            <p class="top-title">Frequency</p>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2 mb-3">
                        </div>

                        @foreach($high_sell_products as $high_sell_product)
                            <div class="col-9">
                                <p class="content">{{ $high_sell_product->product_name }}</p>
                            </div>
                            <div class="col-3 text-center">
                                <p class="content">{{ $high_sell_product->product_count }}</p>
                            </div>
                            <div class="col-12">
                                <hr class="my-3">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="row">
                <div class="col-12">
                    <p class="title">Income/ Revenue</p>
                    <p class="description">in {{ $current_year }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <div class="single-income">
                        <p class="title">Total Revenue (USD)</p>
                        <p class="value">${{ number_format($usd_total_revenue, 2) }}</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-income">
                        <p class="title">This Month Revenue (USD)</p>
                        <p class="value">${{ number_format($usd_this_month_revenue, 2) }}</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-income">
                        <p class="title">Today Revenue (USD)</p>
                        <p class="value">${{ number_format($usd_today_revenue, 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <div class="single-income">
                        <p class="title">Total Revenue (CNY)</p>
                        <p class="value">¥{{ number_format($cny_total_revenue, 2) }}</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-income">
                        <p class="title">This Month Revenue (CNY)</p>
                        <p class="value">¥{{ number_format($cny_this_month_revenue, 2) }}</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-income">
                        <p class="title">Today Revenue (CNY)</p>
                        <p class="value">¥{{ number_format($cny_today_revenue, 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="single-income">
                        <p class="title">Total Revenue (JPY)</p>
                        <p class="value">¥{{ number_format($jpy_total_revenue, 2) }}</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-income">
                        <p class="title">This Month Revenue (JPY)</p>
                        <p class="value">¥{{ number_format($jpy_this_month_revenue, 2) }}</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-income">
                        <p class="title">Today Revenue (JPY)</p>
                        <p class="value">¥{{ number_format($jpy_today_revenue, 2) }}</p>
                    </div>
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
                        data: @json($last_year_user_data),
                        borderColor: '#AFC3EC',
                        backgroundColor: '#EBF0FB',
                        borderWidth: 3,
                        fill: true,
                        // pointRadius: 0,
                        // pointHoverRadius: 0,
                        tension: 0.4
                            
                    },
                    {
                        data: @json($current_year_user_data),
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

    <script>
        const courseYearChart = document.getElementById('course-year-chart');
        new Chart(courseYearChart, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        data: @json($last_year_course_data),
                        borderColor: '#AFC3EC',
                        backgroundColor: '#EBF0FB',
                        borderWidth: 3,
                        fill: true,
                        // pointRadius: 0,
                        // pointHoverRadius: 0,
                        tension: 0.4
                            
                    },
                    {
                        data: @json($current_year_course_data),
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

    <script>
        const userCountryChart = document.getElementById('user-country-chart').getContext('2d');
        const userCountries = @json($current_year_user_countries);
        const countryNames = Object.keys(userCountries);
        const countryCounts = Object.values(userCountries);

        new Chart(userCountryChart, {
            type: 'pie',
            data: {
                labels: countryNames,
                datasets: [
                    {
                        label: 'Users',
                        data: countryCounts,
                        backgroundColor: '#F5F8FF',
                        borderColor: '#87A8EC',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            },
        });
    </script>
@endpush