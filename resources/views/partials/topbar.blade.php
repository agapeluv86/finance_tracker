<style>
/* Ensure proper spacing and alignment */
.topbar a {
    transition: color 0.3s ease-in-out;
}

.topbar a:hover {
    color: #0056b3 !important;
}

/* Improve icon visibility */
.topbar .fa-lg {
    font-size: 1.2rem;
}

.topbar .btn {
    transition: transform 0.3s ease-in-out;
}

.topbar .btn:hover {
    transform: scale(1.2);
}
</style>

<div class="container-fluid topbar bg-light py-2 d-none d-lg-block border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Location & Email -->
            <div class="col-lg-8 text-center text-lg-start">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="border-end border-primary pe-3 me-3">
                        <a href="#" class="text-muted small text-decoration-none">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location
                        </a>
                    </div>
                    <div class="ps-3">
                        <a href="mailto:owainternational@gmail.com" class="text-muted small text-decoration-none">
                            <i class="fas fa-envelope text-primary me-2"></i>owainternational@gmail.com
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Side: Social Media & Language Dropdown -->
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-end align-items-center">
                    <!-- Social Media Icons -->
                    <div class="d-flex align-items-center border-end border-primary pe-3">
                        <a class="btn btn-sm p-0 me-2 text-primary" href="#" title="Facebook"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a class="btn btn-sm p-0 me-2 text-primary" href="#" title="Twitter"><i class="fab fa-twitter fa-lg"></i></a>
                        <a class="btn btn-sm p-0 me-2 text-primary" href="#" title="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
                        <a class="btn btn-sm p-0 me-2 text-primary" href="#" title="LinkedIn"><i class="fab fa-linkedin-in fa-lg"></i></a>
                        <a class="btn btn-sm p-0 me-2 text-primary" href="#" title="YouTube"><i class="fab fa-youtube fa-lg"></i></a>
                        <a class="btn btn-sm p-0 me-2 text-primary" href="#" title="WhatsApp"><i class="fab fa-whatsapp fa-lg"></i></a>
                        <a class="btn btn-sm p-0 text-primary" href="#" title="Telegram"><i class="fab fa-telegram-plane fa-lg"></i></a>
                    </div>

                    <!-- Language Dropdown -->
                    <div class="dropdown ms-3">
                        <a href="#" class="dropdown-toggle text-dark text-decoration-none small" data-bs-toggle="dropdown">
                            <i class="fas fa-globe-europe text-primary me-2"></i> English
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end rounded">
                            <li><a href="#" class="dropdown-item">English</a></li>
                            <li><a href="#" class="dropdown-item">Bangla</a></li>
                            <li><a href="#" class="dropdown-item">French</a></li>
                            <li><a href="#" class="dropdown-item">Spanish</a></li>
                            <li><a href="#" class="dropdown-item">Arabic</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
