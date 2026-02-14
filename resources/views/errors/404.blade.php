@extends('layouts.master')
@section('content')
    <style>
        /* 404 Page Styles */
        .error-page-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Elements */
        .error-page-wrapper::before,
        .error-page-wrapper::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .error-page-wrapper::before {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .error-page-wrapper::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            left: -150px;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-30px) scale(1.05);
            }
        }

        /* Error Content Card */
        .error-content {
            background: white;
            border-radius: 30px;
            padding: 4rem 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 600px;
            position: relative;
            z-index: 1;
            animation: slideUp 0.8s ease forwards;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 404 Number */
        .error-number {
            font-size: 10rem;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        /* Icon */
        .error-icon {
            font-size: 5rem;
            color: #667eea;
            margin-bottom: 1rem;
            animation: shake 1s ease infinite;
        }

        @keyframes shake {
            0%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(-10deg);
            }
            75% {
                transform: rotate(10deg);
            }
        }

        /* Text Content */
        .error-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1.1rem;
            color: #718096;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        /* Home Button */
        .home-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            border: none;
        }

        .home-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
            color: white;
        }

        .home-button:active {
            transform: translateY(-1px);
        }

        .home-button i {
            font-size: 1.3rem;
            transition: transform 0.3s ease;
        }

        .home-button:hover i {
            transform: translateX(-5px);
        }

        /* Search Suggestion */
        .search-suggestion {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #e2e8f0;
        }

        .search-suggestion p {
            color: #718096;
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .quick-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .quick-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            background: #f7fafc;
            transition: all 0.3s ease;
        }

        .quick-link:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        /* Floating Elements */
        .floating-icon {
            position: absolute;
            color: rgba(255, 255, 255, 0.3);
            font-size: 2rem;
            animation: floatRandom 8s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-icon:nth-child(2) {
            top: 20%;
            right: 15%;
            animation-delay: 1s;
        }

        .floating-icon:nth-child(3) {
            bottom: 15%;
            left: 15%;
            animation-delay: 2s;
        }

        .floating-icon:nth-child(4) {
            bottom: 20%;
            right: 10%;
            animation-delay: 3s;
        }

        @keyframes floatRandom {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(10px, -10px) rotate(90deg);
            }
            50% {
                transform: translate(-10px, 10px) rotate(180deg);
            }
            75% {
                transform: translate(10px, 10px) rotate(270deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .error-content {
                padding: 3rem 2rem;
            }

            .error-number {
                font-size: 6rem;
            }

            .error-icon {
                font-size: 3rem;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .error-message {
                font-size: 1rem;
            }

            .home-button {
                padding: 0.9rem 2rem;
                font-size: 1rem;
            }

            .quick-links {
                flex-direction: column;
            }

            .quick-link {
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .error-content {
                padding: 2rem 1.5rem;
            }

            .error-number {
                font-size: 5rem;
            }
        }
    </style>

    <div class="error-page-wrapper">
        <!-- Floating Background Icons -->
        <i class="bi bi-question-circle floating-icon"></i>
        <i class="bi bi-exclamation-triangle floating-icon"></i>
        <i class="bi bi-compass floating-icon"></i>
        <i class="bi bi-search floating-icon"></i>

        <!-- Error Content Card -->
        <div class="error-content">
            <!-- Error Icon -->
            <div class="error-icon">
                <i class="bi bi-compass"></i>
            </div>

            <!-- 404 Number -->
            <h1 class="error-number">404</h1>

            <!-- Error Message -->
            <h2 class="error-title">Oops! Page Not Found</h2>
            <p class="error-message">
                The page you're looking for seems to have wandered off. 
                Don't worry, even the best explorers get lost sometimes!
            </p>

            <!-- Home Button -->
            <a href="/" class="home-button">
                <i class="bi bi-house-door-fill"></i>
                Back to Home
            </a>

            <!-- Quick Links -->
            <div class="search-suggestion">
                <p>Or try these popular pages:</p>
                <div class="quick-links">
                    <a href="/" class="quick-link">Home</a>
                    <a href="{{route('about.show')}}" class="quick-link">About</a>
                    <a href="{{route('contact.show')}}" class="quick-link">Contact</a>
                    <a href="{{route('post.index')}}" class="quick-link">Blog</a>
                </div>
            </div>
        </div>
    </div>

@endsection