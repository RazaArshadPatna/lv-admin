 <!-- ===== Header ===== -->
    <nav class="navbar navbar-expand-lg shadow-sm" style="padding: 2px;background: #0f5959;">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold text-light">
                <img src="{{ asset('storage/' . Auth::user()->image) }}" class="me-2" style="max-width:50px;">
                @if(Auth::user()->role == 'admin')
                    Admin Panel
                @elseif(Auth::user()->role == 'editor')
                    Editor Panel
                    @elseif(Auth::user()->role == 'user')
                    User Panel
                @endif 
            </span>

            <div class="dropdown ms-auto">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-light"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded-circle me-2" style="max-width:50px;">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="/logout">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
