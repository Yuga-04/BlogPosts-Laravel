@extends('layouts.master')
@section('content')
    <style>
        /* About Page Styles */
        .about-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 0;
            margin-bottom: 3rem;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }

        .about-hero h1 {
            color: white;
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            text-align: center;
        }

        .about-hero p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.1rem;
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        /* About Content Section */
        .about-content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .about-main-section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            margin-bottom: 3rem;
        }

        .about-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
            transition: transform 0.4s ease;
        }

        .about-image-wrapper:hover {
            transform: scale(1.05);
        }

        .about-image {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
        }

        .about-text-content {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #4a5568;
            text-align: justify;
        }

        .about-text-content p {
            margin-bottom: 1.5rem;
        }

        .about-text-content p:last-child {
            margin-bottom: 0;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .stat-item {
            text-align: center;
            color: white;
            padding: 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .stat-label {
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.95;
        }

        /* Values Section */
        .values-section {
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .value-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .value-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .value-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.8rem;
        }

        .value-description {
            color: #718096;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Team Section */
        .team-section {
            background: #f7fafc;
            padding: 3rem;
            border-radius: 20px;
            margin-bottom: 3rem;
        }

        .team-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            border: 4px solid #667eea;
            object-fit: cover;
        }

        .team-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.3rem;
        }

        .team-role {
            color: #667eea;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .team-description {
            color: #718096;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-hero h1 {
                font-size: 2rem;
            }

            .about-main-section {
                padding: 2rem 1.5rem;
            }

            .about-content-wrapper {
                padding: 0 1rem;
            }

            .stats-section {
                padding: 2rem 1rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .value-card, .team-card {
                margin-bottom: 1.5rem;
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

        .about-main-section,
        .stats-section,
        .value-card,
        .team-card {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>

    <!-- Hero Section -->
    <div class="about-hero">
        <div class="container">
            <h1>About Us</h1>
            <p>Learn more about our story, mission, and the passionate team behind our success</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="about-content-wrapper">
        <!-- About Section with Image -->
        <div class="about-main-section">
            <div class="row align-items-center g-4">
                <div class="col-md-5">
                    <div class="about-image-wrapper">
                        <img src="https://picsum.photos/500/500" alt="About Us" class="about-image">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about-text-content">
                        <p>
                            Welcome to our website! We are dedicated to providing high-quality products and excellent customer service. Our team consists of experienced professionals who are passionate about delivering the best solutions to our customers. With a focus on innovation and integrity, we strive to exceed expectations in every aspect of our business.
                        </p>
                        <p>
                            Our company was founded on the principles of honesty, reliability, and transparency. We believe in building strong relationships with our customers and partners based on trust and mutual respect. By listening to our customers' needs and adapting to changing market trends, we continue to evolve and improve our offerings.
                        </p>
                        <p>
                            At our core, we are driven by a commitment to excellence and continuous improvement. We invest in research and development to stay ahead of the curve and bring cutting-edge solutions to our customers. Our dedication to quality ensures that every product we deliver meets the highest standards of performance and reliability.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Team Section -->
        <div class="team-section">
            <h2 class="section-title">Meet Our Team</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://picsum.photos/200/200?random=1" alt="Team Member" class="team-avatar">
                        <h3 class="team-name">John Doe</h3>
                        <p class="team-role">Chief Executive Officer</p>
                        <p class="team-description">
                            Leading our vision with passion and expertise to drive innovation and growth.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://picsum.photos/200/200?random=2" alt="Team Member" class="team-avatar">
                        <h3 class="team-name">Jane Smith</h3>
                        <p class="team-role">Chief Technology Officer</p>
                        <p class="team-description">
                            Spearheading our technical strategy and ensuring cutting-edge solutions.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://picsum.photos/200/200?random=3" alt="Team Member" class="team-avatar">
                        <h3 class="team-name">Mike Johnson</h3>
                        <p class="team-role">Head of Operations</p>
                        <p class="team-description">
                            Managing daily operations to ensure seamless delivery and customer satisfaction.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Closing Statement -->
        <div class="about-main-section">
            <div class="about-text-content" style="text-align: center;">
                <p>
                    We are proud of our track record of success and the positive impact we have made in the industry. But we are not content to rest on our laurels. We are always looking for new opportunities to grow and expand our reach, while staying true to our values and vision.
                </p>
                <p style="margin-bottom: 0;">
                    <strong>Thank you for choosing us as your trusted partner.</strong> We look forward to serving you and exceeding your expectations for many years to come.
                </p>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 3rem;"></div>

@endsection