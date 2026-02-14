@extends('layouts.master')
@section('content')
    <style>
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem 0 2rem;
            margin-bottom: 3rem;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }

        .hero-section h1 {
            color: white;
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero-section p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1rem;
        }

        /* Search Bar */
        .search-wrapper {
            max-width: 500px;
            margin: 1rem auto 0;
        }

        .search-input {
            border-radius: 50px;
            padding: 0.8rem 1.5rem;
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            font-size: 1rem;
        }

        .search-input:focus {
            box-shadow: 0 5px 30px rgba(102, 126, 234, 0.4);
            outline: none;
        }

        .search-btn {
            border-radius: 50px;
            padding: 0.8rem 2rem;
            border: none;
            background: white;
            color: #667eea;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Post Cards */
        .post-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            height: 100%;
            background: white;
        }

        .post-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .post-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .post-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .post-card:hover .post-image {
            transform: scale(1.1);
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.95);
            color: #667eea;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .post-card-body {
            padding: 1.8rem;
        }

        .post-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-excerpt {
            color: #718096;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .read-more-btn {
            display: inline-flex;
            align-items: center;
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .read-more-btn:hover {
            color: #764ba2;
            transform: translateX(5px);
        }

        .read-more-btn i {
            margin-left: 0.5rem;
            transition: margin-left 0.3s ease;
        }

        .read-more-btn:hover i {
            margin-left: 1rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
        }

        .empty-state-icon {
            font-size: 5rem;
            color: #cbd5e0;
            margin-bottom: 1.5rem;
        }

        .empty-state h3 {
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #718096;
        }

        /* Pagination */
        .pagination {
            margin-top: 3rem;
            justify-content: center;
        }

        .page-link {
            border: none;
            color: #667eea;
            font-weight: 600;
            margin: 0 0.25rem;
            border-radius: 10px;
            padding: 0.6rem 1rem;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }

            .post-card {
                margin-bottom: 2rem;
            }

            .search-wrapper {
                padding: 0 1rem;
            }
        }

        /* Loading Animation */
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

        .post-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .post-card:nth-child(1) { animation-delay: 0.1s; }
        .post-card:nth-child(2) { animation-delay: 0.2s; }
        .post-card:nth-child(3) { animation-delay: 0.3s; }
        .post-card:nth-child(4) { animation-delay: 0.4s; }
        .post-card:nth-child(5) { animation-delay: 0.5s; }
        .post-card:nth-child(6) { animation-delay: 0.6s; }
    </style>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <div class="text-center">
                <h1>Discover Amazing Stories</h1>
                <p>Explore our latest posts and stay updated with trending topics</p>
                
                <!-- Search Bar -->
                <div class="search-wrapper">
                    <form method="GET" action="{{route('post.index')}}">
                        <div class="input-group">
                            <input type="text" 
                                   name="search" 
                                   class="form-control search-input" 
                                   placeholder="Search articles, topics, authors..." 
                                   value="{{ request('search') }}"
                                   aria-label="Search">
                            <button class="btn search-btn" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="container">
        <div class="row g-4">
            @if ($posts && $posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card post-card">
                            <!-- Post Image -->
                            <div class="post-image-wrapper">
                                <img src="{{$post->img_url}}" class="post-image" alt="{{$post->title}}">
                                <span class="category-badge">{{$post->category->name}}</span>
                            </div>

                            <!-- Post Content -->
                            <div class="post-card-body">
                                <h5 class="post-title">{{$post->title}}</h5>
                                <p class="post-excerpt">{{Str::limit($post->content, 100)}}</p>
                                <a href="{{route('post.detail',['slug'=>$post->slug])}}" class="read-more-btn">
                                    Read More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Empty State -->
                <div class="col-12">
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="bi bi-inbox"></i>
                        </div>
                        <h3>No Posts Found</h3>
                        <p>{{ request('search') ? 'Try adjusting your search terms' : 'No posts are available at the moment' }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if ($posts && $posts->count() > 0)
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        {{$posts->links('pagination::bootstrap-5')}}
                    </nav>
                </div>
            </div>
        @endif
    </div>

    <div style="margin-bottom: 4rem;"></div>

@endsection