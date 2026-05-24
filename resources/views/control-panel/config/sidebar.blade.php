    <!-- ===== Sidebar ===== -->
    <div class="sidebar">

        <div class="text-center fw-bold fs-5 user_heading">
            <span class="fs-5">Welcome</span> {{ substr(Auth::user()->name,0,10) }}
        </div>

        <div class="text-center pt-3 pb-3 text-white fw-bold fs-5">
            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="me-2" style="max-width:50px;">
            {{ Auth::user()->role }}
        </div>

        <a href="/dashboard" class="active">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>


        <!-- Dropdown Menu -->
        <a data-bs-toggle="collapse" href="#manageadmin" role="button">
            <i class="bi bi-people me-2"></i>Admin
            <i class="bi bi-chevron-down float-end"></i>
        </a>
        <div class="collapse ps-3" id="manageadmin">
            <a href="/admin/users">Manage Admin</a>
        </div>

        <!-- Dropdown Menu -->
        <a data-bs-toggle="collapse" href="#manageWebsite" role="button">
            <i class="bi bi-globe me-2"></i> Manage Website
            <i class="bi bi-chevron-down float-end"></i>
        </a>
        <div class="collapse ps-3" id="manageWebsite">
            <a href="/static/pages">Static Pages</a>
            <a href="/slider">Slider</a>
            <a href="/gallery">Gallery</a>
            <a href="#">SEO Settings</a>
        </div>

        <a href="#">
            <i class="bi bi-people me-2"></i> Users
        </a>

        <a href="#">
            <i class="bi bi-gear me-2"></i> Settings
        </a>
    </div>