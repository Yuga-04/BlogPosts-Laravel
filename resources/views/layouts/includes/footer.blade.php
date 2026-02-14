<style>
    /* Modern Footer Styles */
    .modern-footer {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 0 1rem;
        margin-top: 3rem;
        position: relative;
        overflow: hidden;
    }

    .modern-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, 
            rgba(255,255,255,0.3) 0%, 
            rgba(255,255,255,0.8) 50%, 
            rgba(255,255,255,0.3) 100%);
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Footer Brand */
    .footer-brand {
        margin-bottom: 0.5rem;
    }

    .footer-logo {
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.3rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .footer-logo:hover {
        color: white;
        opacity: 0.9;
    }

    .footer-tagline {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
        margin: 0;
    }

    /* Footer Links */
    .footer-section-title {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.7rem;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 0.5rem;
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .footer-link:hover {
        color: white;
        transform: translateX(5px);
    }

    .footer-link i {
        font-size: 0.9rem;
    }

    /* Social Links */
    .social-links {
        display: flex;
        gap: 0.75rem;
        margin-top: 0.7rem;
    }

    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .social-link:hover {
        background: white;
        color: #667eea;
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    /* Newsletter */
    .newsletter-input {
        display: flex;
        gap: 0.5rem;
        margin-top: 0.7rem;
    }

    .newsletter-input input {
        flex: 1;
        padding: 0.6rem 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .newsletter-input input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .newsletter-input input:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.2);
        border-color: white;
    }

    .newsletter-btn {
        padding: 0.6rem 1.2rem;
        background: white;
        color: #667eea;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
        font-size: 0.85rem;
    }

    .newsletter-btn:hover {
        background: rgba(255, 255, 255, 0.9);
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    /* Footer Bottom */
    .footer-bottom {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center;
    }

    .copyright {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.85rem;
        margin: 0;
    }

    .footer-bottom-links {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 0.5rem;
        flex-wrap: wrap;
    }

    .footer-bottom-link {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .footer-bottom-link:hover {
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .modern-footer {
            padding: 1.5rem 0 0.75rem;
            margin-top: 2rem;
        }

        .footer-container {
            padding: 0 1rem;
        }

        .footer-section {
            margin-bottom: 1.5rem;
        }

        .newsletter-input {
            flex-direction: column;
        }

        .newsletter-btn {
            width: 100%;
        }

        .social-links {
            justify-content: center;
        }

        .footer-bottom-links {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>

<footer class="modern-footer">
    <div class="footer-container">
        <div class="row">
            <!-- Brand Section -->
            <div class="col-md-4 footer-section">
                <div class="footer-brand">
                    <a href="{{url('/')}}" class="footer-logo">
                        <i class="bi bi-newspaper"></i>
                        {{$title ?? 'Blog'}}
                    </a>
                    <p class="footer-tagline">
                        Discover amazing stories and stay updated with the latest trends and insights.
                    </p>
                </div>
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 footer-section">
                <h6 class="footer-section-title">Quick Links</h6>
                <ul class="footer-links">
                    <li>
                        <a href="/" class="footer-link">
                            <i class="bi bi-chevron-right"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{route('about.show')}}" class="footer-link">
                            <i class="bi bi-chevron-right"></i> About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact.show')}}" class="footer-link">
                            <i class="bi bi-chevron-right"></i> Contact
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">
                            <i class="bi bi-chevron-right"></i> Blog
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-2 footer-section">
                <h6 class="footer-section-title">Categories</h6>
                <ul class="footer-links">
                    <li>
                        <a href="#" class="footer-link">
                            <i class="bi bi-tag"></i> Technology
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">
                            <i class="bi bi-tag"></i> Lifestyle
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">
                            <i class="bi bi-tag"></i> Business
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">
                            <i class="bi bi-tag"></i> Travel
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="col-md-3 footer-section">
                <h6 class="footer-section-title">Newsletter</h6>
                <p class="footer-tagline" style="margin-bottom: 0;">
                    Subscribe to get the latest updates.
                </p>
                <form class="newsletter-input">
                    <input type="email" placeholder="Your email" required>
                    <button type="submit" class="newsletter-btn">
                        <i class="bi bi-send"></i> Subscribe
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="copyright">
                © {{ date('Y') }} {{$title ?? 'Blog'}}. All rights reserved.
            </p>
            <div class="footer-bottom-links">
                <a href="#" class="footer-bottom-link">Privacy Policy</a>
                <a href="#" class="footer-bottom-link">Terms of Service</a>
                <a href="#" class="footer-bottom-link">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>