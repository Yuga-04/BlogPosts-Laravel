@extends('layouts.master')
@section('content')
    <style>
        /* Contact Page Styles */
        .contact-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 0;
            margin-bottom: 3rem;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }

        .contact-hero h1 {
            color: white;
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            text-align: center;
        }

        .contact-hero p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.1rem;
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Contact Content */
        .contact-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .contact-container {
            display: flex;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        /* Contact Info Card */
        .contact-info-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            flex: 1;
        }

        .contact-info-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .contact-info-subtitle {
            color: #718096;
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .contact-info-item:hover {
            background: #f7fafc;
            transform: translateX(5px);
        }

        .contact-info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            flex-shrink: 0;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .contact-info-content h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.3rem;
        }

        .contact-info-content p {
            color: #718096;
            margin: 0;
            font-size: 0.95rem;
        }

        /* Form Card */
        .contact-form-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            flex: 1.5;
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: #718096;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        /* Success Alert */
        .success-alert {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 5px 15px rgba(72, 187, 120, 0.3);
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-alert i {
            font-size: 1.5rem;
        }

        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control:hover {
            border-color: #cbd5e0;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Error Messages */
        .error-message {
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .error-message i {
            font-size: 0.9rem;
        }

        .form-control.is-invalid {
            border-color: #e53e3e;
        }

        /* Submit Button */
        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 0.9rem 2.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Map Section */
        .map-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            margin-bottom: 3rem;
        }

        .map-placeholder {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .contact-container {
                flex-direction: column;
            }

            .contact-hero h1 {
                font-size: 2rem;
            }

            .contact-form-card,
            .contact-info-card {
                padding: 2rem;
            }

            .contact-wrapper {
                padding: 0 1rem;
            }
        }

        @media (max-width: 576px) {
            .contact-form-card,
            .contact-info-card {
                padding: 1.5rem;
            }

            .form-title,
            .contact-info-title {
                font-size: 1.5rem;
            }

            .submit-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-form-card,
        .contact-info-card,
        .map-section {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>

    <!-- Hero Section -->
    <div class="contact-hero">
        <div class="container">
            <h1>Get In Touch</h1>
            <p>Have a question or want to work together? We'd love to hear from you!</p>
        </div>
    </div>

    <!-- Contact Content -->
    <div class="contact-wrapper">
        <div class="contact-container">
            <!-- Contact Information -->
            <div class="contact-info-card">
                <h2 class="contact-info-title">Contact Information</h2>
                <p class="contact-info-subtitle">
                    Feel free to reach out to us through any of these channels. We're here to help!
                </p>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4>Address</h4>
                        <p>123 Business Street, Suite 100<br>City, State 12345</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4>Phone</h4>
                        <p>+1 (555) 123-4567<br>Mon-Fri, 9AM-6PM</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4>Email</h4>
                        <p>info@example.com<br>support@example.com</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div class="contact-info-content">
                        <h4>Business Hours</h4>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday - Sunday: Closed</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-card">
                <h2 class="form-title">Send Us a Message</h2>
                <p class="form-subtitle">Fill out the form below and we'll get back to you as soon as possible.</p>

                @if (session('status'))
                    <div class="success-alert">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>{{session('status')}}</span>
                    </div>
                @endif

                <form method="POST" action="{{route('contact.store')}}" class="row g-3">
                    @csrf
                    
                    <div class="col-md-6">
                        <label for="name" class="form-label">Full Name</label>
                        <input 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            id="name" 
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="John Doe">
                        @error('name')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="email" 
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="john@example.com">
                        @error('email')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea 
                            class="form-control @error('message') is-invalid @enderror" 
                            id="message" 
                            name="message" 
                            rows="6"
                            placeholder="Tell us what you need help with...">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="error-message">
                                <i class="bi bi-exclamation-circle"></i>
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="submit-btn">
                            <i class="bi bi-send-fill"></i>
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 3rem;"></div>

@endsection