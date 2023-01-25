<nav class="navbar navbar-expand-lg navigationbar">
    <div class="container-fluid">
        <a class="navbar-brand foody" href="{{ route('cms.dashboard.index') }}">FOODY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(auth('cms')->user()->type == 'Admin' && auth('cms')->user()->status=='Active')
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('cms.staff.index') }}">Staff</a>
                    </li>
                @endif
                @if(auth('cms')->user()->status=='Active')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.category.index') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.brand.index') }}">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.product.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cms.order.index') }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            @if(auth('cms')->user()->type=='Admin')
                                <a class="nav-link" href="{{ route('cms.query.index') }}">Reviews</a>
                            @endif
                        </li>
                    </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth('cms')->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('cms.profile.index') }}">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('cms.password.index') }}">Update Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @endif
                        <li>
                            <form action="{{ route('cms.logout') }}" method="post">
                                @csrf
                                <button type="submit" class=" btn dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
