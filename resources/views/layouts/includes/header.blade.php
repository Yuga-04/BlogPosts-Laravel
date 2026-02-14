<style>
    /* Modern Header Styles */
    .modern-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 1rem 0;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
        position: sticky;
        top: 0;
        z-index: 1000;
        backdrop-filter: blur(10px);
    }

    .header-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Logo/Brand */
    .brand-logo {
        text-decoration: none;
        color: white;
        font-weight: 800;
        font-size: 1.8rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .brand-logo:hover {
        color: white;
        transform: translateY(-2px);
        text-shadow: 2px 4px 8px rgba(0,0,0,0.3);
    }

    .brand-icon {
        font-size: 2rem;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* Navigation */
    .nav-menu {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-link-item {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        padding: 0.5rem 0;
    }

    .nav-link-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 3px;
        background: white;
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .nav-link-item:hover {
        color: white;
        transform: translateY(-2px);
    }

    .nav-link-item:hover::after,
    .nav-link-item.active::after {
        width: 100%;
    }

    .nav-link-item.active {
        color: white;
    }

    /* Mobile Menu Toggle */
    .mobile-menu-toggle {
        display: none;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .mobile-menu-toggle:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    /* Mobile Menu */
    .mobile-nav-menu {
        display: none;
        flex-direction: column;
        gap: 1rem;
        padding: 1.5rem 0 0.5rem;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .mobile-nav-menu.active {
        display: flex;
    }

    .mobile-nav-link {
        text-decoration: none;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        transition: all 0.3s ease;
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
    }

    .mobile-nav-link:hover,
    .mobile-nav-link.active {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        transform: translateX(5px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }

        .mobile-menu-toggle {
            display: block;
        }

        .brand-logo {
            font-size: 1.5rem;
        }

        .brand-icon {
            font-size: 1.6rem;
        }

        .header-container {
            padding: 0 1rem;
        }
    }

    /* Subtle glass effect */
    @supports (backdrop-filter: blur(10px)) {
        .modern-header {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.95) 0%, rgba(118, 75, 162, 0.95) 100%);
            backdrop-filter: blur(10px);
        }
    }
</style>

<header class="modern-header">
    <div class="header-container">
        <div class="row align-items-center">
            <!-- Brand/Logo -->
            <div class="col-6 col-md-4">
                <a class="brand-logo" href="{{url('/')}}">
                    <i class="bi bi-newspaper brand-icon"></i>
                    {{$title ?? 'BlogPost'}}
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="col-md-8 d-none d-md-block">
                <ul class="nav-menu" style="justify-content: flex-end;">
                    <li>
                        <a class="nav-link-item {{ request()->is('/') ? 'active' : '' }}" href="/">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="nav-link-item {{ request()->is('about*') ? 'active' : '' }}" href="{{route('about.show')}}">
                            About
                        </a>
                    </li>
                    <li>
                        <a class="nav-link-item {{ request()->is('contact*') ? 'active' : '' }}" href="{{route('contact.show')}}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="col-6 d-md-none text-end">
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="row d-md-none">
            <div class="col-12">
                <div class="mobile-nav-menu" id="mobileNavMenu">
                    <a class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                    <a class="mobile-nav-link {{ request()->is('about*') ? 'active' : '' }}" href="{{route('about.show')}}">
                        <i class="bi bi-info-circle"></i> About
                    </a>
                    <a class="mobile-nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{route('contact.show')}}">
                        <i class="bi bi-envelope"></i> Contact
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileNavMenu = document.getElementById('mobileNavMenu');

        if (mobileMenuToggle && mobileNavMenu) {
            mobileMenuToggle.addEventListener('click', function() {
                mobileNavMenu.classList.toggle('active');
                
                // Toggle icon
                const icon = this.querySelector('i');
                if (mobileNavMenu.classList.contains('active')) {
                    icon.classList.remove('bi-list');
                    icon.classList.add('bi-x');
                } else {
                    icon.classList.remove('bi-x');
                    icon.classList.add('bi-list');
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuToggle.contains(event.target) && !mobileNavMenu.contains(event.target)) {
                    mobileNavMenu.classList.remove('active');
                    const icon = mobileMenuToggle.querySelector('i');
                    icon.classList.remove('bi-x');
                    icon.classList.add('bi-list');
                }
            });
        }
    });
</script>