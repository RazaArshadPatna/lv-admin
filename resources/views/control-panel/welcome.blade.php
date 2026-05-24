<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    @include('control-panel/config.header')

</head>

<body>

    @include('control-panel/config.sidebar')

    @include('control-panel/config/head')
    
    <!-- ===== Main Content ===== -->
    <div class="content p-4 dashboard_bg">
        <h3 class="heading_color">Welcome to Dashboard</h3>
        <p>This is your admin dashboard content area.</p>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">

                        <div class="stat-header">
                            <div class="stat-icon users">
                                <!-- Users Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>

                            <div>
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h3 class="fw-bold mb-0">120</h3>
                            </div>
                        </div>

                        <a href="#" class="read-more-btn mt-3">
                            Read More
                            <svg viewBox="0 0 24 24">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

            <!-- PAGES -->
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">

                        <div class="stat-header">
                            <div class="stat-icon pages">
                                <!-- Pages Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                    <polyline points="14 2 14 8 20 8" />
                                </svg>
                            </div>

                            <div>
                                <h6 class="text-muted mb-1">Total Pages</h6>
                                <h3 class="fw-bold mb-0">18</h3>
                            </div>
                        </div>

                        <a href="#" class="read-more-btn mt-3">Read More
                            <svg viewBox="0 0 24 24">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

            <!-- SLIDERS -->
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">

                        <div class="stat-header">
                            <div class="stat-icon sliders">
                                <!-- Slider Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="4" y1="21" x2="4" y2="14" />
                                    <line x1="4" y1="10" x2="4" y2="3" />
                                    <line x1="12" y1="21" x2="12" y2="12" />
                                    <line x1="12" y1="8" x2="12" y2="3" />
                                    <line x1="20" y1="21" x2="20" y2="16" />
                                    <line x1="20" y1="12" x2="20" y2="3" />
                                    <line x1="1" y1="14" x2="7" y2="14" />
                                    <line x1="9" y1="8" x2="15" y2="8" />
                                    <line x1="17" y1="16" x2="23" y2="16" />
                                </svg>
                            </div>

                            <div>
                                <h6 class="text-muted mb-1">Sliders</h6>
                                <h3 class="fw-bold mb-0">6</h3>
                            </div>
                        </div>

                        <a href="#" class="read-more-btn mt-3">Read More
                            <svg viewBox="0 0 24 24">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

            <!-- REVENUE -->
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">

                        <div class="stat-header">
                            <div class="stat-icon revenue">
                                <!-- Revenue Icon -->
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="1" x2="12" y2="23" />
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                </svg>
                            </div>

                            <div>
                                <h6 class="text-muted mb-1">Revenue</h6>
                                <h3 class="fw-bold mb-0">₹45,000</h3>
                            </div>
                        </div>

                        <a href="#" class="read-more-btn mt-3">Read More
                            <svg viewBox="0 0 24 24">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>


        </div>
    </div>

@include('control-panel/config/footer')