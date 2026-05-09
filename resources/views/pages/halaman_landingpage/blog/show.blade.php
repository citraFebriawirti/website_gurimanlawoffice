@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-12 text-center">
                <h2>Detail Blog</h2>
                <p>Gumiran Law adalah firma hukum yang mengutamakan profesionalisme dan solusi terbaik bagi klien,
                    dengan layanan litigasi, bisnis, dan konsultasi hukum yang transparan serta terpercaya.</p>
                <ul class="breadcrumb-pagination">
                    <li><a href="{{route('/')}}">Beranda</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Blog Area Start-->
<div class="blog-area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 blog-post-item">

                <div class="blog-wrapper blog-details">
                    <div class="blog-img img-full">
                        <img src="{{ asset($artikel->image_artikel) }}" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li>{{ Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }} </li>
                            <li><a href="#">{{$artikel->author_artikel}}{{$artikel->author_artikel}}</a></li>

                        </ul>
                        <h3>{!! $artikel->title_artikel !!}</h3>
                        <p>{!! $artikel->description_artikel !!}</p>

                    </div>
                </div>

            </div>
            <div class="col-lg-4 blog-sidebar right-sidebar">

                <div class="widget mb-60">
                    <div class="widget-title">
                        <h4>Recent Posts</h4>
                    </div>
                    <div class="sidebar-rc-post">
                        <ul>
                            @foreach ($recent_artikel as $recent)
                            <li class="d-flex">
                                <div class="rc-post-thumb">
                                    <a href="{{ route('bloglandingpage.show', $recent->id_artikel) }}">
                                        <img src="{{ asset($recent->image_artikel) }}"
                                            alt="{{ $recent->title_artikel }}"
                                            style="width: 120px; height: 120px; border-radius: 8px; ">
                                    </a>


                                </div>
                                <div class="rc-post-content">
                                    <div class="widget-date">
                                        {{ Carbon\Carbon::parse($recent->created_at)->format('d M Y') }}</div>
                                    <h4>
                                        <a
                                            href="{{ route('bloglandingpage.show', $recent->id_artikel) }}">{{ $recent->title_artikel }}</a>
                                    </h4>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <div class="widget mb-60">
                    <div class="widget-banner img-full">
                        <a href="contact.html"><img src="img/banner/banner.jpg" alt=""></a>
                    </div>
                </div>
                <div class="widget mb-60">
                    <div class="widget-calendar">
                        <div id="my-calendar"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Blog Area End-->

@endsection