<nav class="navbar navbar-expand-lg navbar-dark" style="background: #14161a">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('read-transaction') }}">Chen Buffet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-chen-buffet" aria-controls="navbar-chen-buffet" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-chen-buffet">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown-chen-buffet" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown-chen-buffet">
                        <li><a class="dropdown-item" href="{{ route('read-food') }}">Foods</a></li>
                        <li><a class="dropdown-item" href="{{ route('read-category') }}">Food Categories</a></li>
                        <li><a class="dropdown-item" href="{{ route('read-cashier') }}">Cashiers</a></li>
                        <li><a class="dropdown-item" href="{{ route('read-payment-type') }}">Payment Types</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
