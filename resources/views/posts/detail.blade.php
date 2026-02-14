@extends('layouts.master')
@section('content')
    <style>
        /* Post Detail Page Styles */
        .post-detail-wrapper {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        /* Main Post Content */
        .post-content-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .post-header {
            margin-bottom: 2rem;
        }

        .post-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d3748;
            line-height: 1.3;
            margin-bottom: 1rem;
        }

        .post-category-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-left: 0.5rem;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            color: #718096;
            font-size: 0.95rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .post-meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .post-meta-item i {
            color: #667eea;
            font-size: 1rem;
        }

        .post-featured-image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
            border-radius: 15px;
            margin: 2rem 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4a5568;
            text-align: justify;
        }

        .post-content p {
            margin-bottom: 1.5rem;
        }

        /* Sidebar */
        .sidebar-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            position: sticky;
            top: 100px;
        }

        .sidebar-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #667eea;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-title i {
            color: #667eea;
        }

        .related-posts-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .related-post-item {
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .related-post-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .related-post-link {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            text-decoration: none;
            color: #2d3748;
            transition: all 0.3s ease;
            padding: 0.5rem;
            border-radius: 10px;
        }

        .related-post-link:hover {
            background: #f7fafc;
            color: #667eea;
            transform: translateX(5px);
        }

        .related-post-icon {
            color: #667eea;
            font-size: 1rem;
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .related-post-title {
            font-weight: 600;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        /* Share Section */
        .share-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 2rem;
            margin-top: 3rem;
            text-align: center;
        }

        .share-title {
            color: white;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .share-btn:hover {
            background: white;
            color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Tags */
        .tags-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #e2e8f0;
        }

        .tags-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tags-title i {
            color: #667eea;
        }

        .tag-badge {
            display: inline-block;
            background: #f7fafc;
            color: #667eea;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tag-badge:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
            transform: translateY(-2px);
        }

        /* Author Box */
        .author-box {
            background: #f7fafc;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 3rem;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid #667eea;
            object-fit: cover;
        }

        .author-info h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.3rem;
        }

        .author-info p {
            color: #718096;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Back Button */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 2rem;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .back-button:hover {
            background: #667eea;
            color: white;
            transform: translateX(-5px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .post-detail-wrapper {
                padding: 0 1rem;
            }

            .post-content-card {
                padding: 2rem;
            }

            .post-title {
                font-size: 2rem;
            }

            .sidebar-card {
                position: static;
                margin-top: 2rem;
            }

            .author-box {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .post-content-card {
                padding: 1.5rem;
            }

            .post-title {
                font-size: 1.6rem;
            }

            .post-category-badge {
                display: block;
                margin-left: 0;
                margin-top: 0.5rem;
                width: fit-content;
            }

            .post-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
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

        .post-content-card,
        .sidebar-card {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>

    <div class="post-detail-wrapper">
        <!-- Back Button -->
        <a href="{{ route('post.index') }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
            Back to Posts
        </a>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="post-content-card">
                    <!-- Post Header -->
                    <div class="post-header">
                        <h1 class="post-title">
                            {{$post->title}}
                            <span class="post-category-badge">{{$post->category->name}}</span>
                        </h1>
                        
                        <div class="post-meta">
                            <div class="post-meta-item">
                                <i class="bi bi-calendar3"></i>
                                <span>{{$post->created_at->format('M d, Y')}}</span>
                            </div>
                            <div class="post-meta-item">
                                <i class="bi bi-clock"></i>
                                <span>{{ ceil(str_word_count($post->content) / 200) }} min read</span>
                            </div>
                            <div class="post-meta-item">
                                <i class="bi bi-eye"></i>
                                <span>1.2k views</span>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <img src="{{$post->img_url}}" class="post-featured-image" alt="{{$post->title}}">

                    <!-- Post Content -->
                    <div class="post-content">
                        <p>{{$post->content}}</p>
                    </div>

                    <!-- Tags Section -->
                    <div class="tags-section">
                        <div class="tags-title">
                            <i class="bi bi-tags"></i>
                            Tags
                        </div>
                        <span class="tag-badge">{{$post->category->name}}</span>
                        <span class="tag-badge">Featured</span>
                        <span class="tag-badge">Trending</span>
                    </div>

                    <!-- Author Box -->
                    <div class="author-box">
                        <img src="https://picsum.photos/200/200?random=author" alt="Author" class="author-avatar">
                        <div class="author-info">
                            <h4>John Doe</h4>
                            <p>Content Writer & Editor | Passionate about storytelling and sharing insights with the world.</p>
                        </div>
                    </div>

                    <!-- Share Section -->
                    <div class="share-section">
                        <h3 class="share-title">Share This Post</h3>
                        <div class="share-buttons">
                            <a href="#" class="share-btn" aria-label="Share on Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="share-btn" aria-label="Share on Twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="share-btn" aria-label="Share on LinkedIn">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="share-btn" aria-label="Share on WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="#" class="share-btn" aria-label="Copy Link">
                                <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-card">
                    <h5 class="sidebar-title">
                        <i class="bi bi-grid"></i>
                        Related Posts
                    </h5>
                    <ul class="related-posts-list">
                        @foreach ($related_posts as $related_post)
                            <li class="related-post-item">
                                <a href="{{route('post.detail',['slug'=>$related_post->slug])}}" class="related-post-link">
                                    <i class="bi bi-arrow-right-circle-fill related-post-icon"></i>
                                    <span class="related-post-title">{{$related_post->title}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </div>
    </div>

    <div style="margin-bottom: 3rem;"></div>

@endsection