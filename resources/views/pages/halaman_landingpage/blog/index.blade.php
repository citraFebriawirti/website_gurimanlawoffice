@extends('layouts.landingpage.layouts')
@section('content')

  <!-- Page Banner Area Start-->
  <div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
      <div class="row">
        <div class="page-banner-content col-12 text-center">
          <h2>Blogs</h2>
          <p>Gumiran Law is a law firm that prioritizes professionalism and the best solutions for clients, with transparent and trusted litigation, business and legal consulting services.</p>
          <ul class="breadcrumb-pagination">
            <li><a href="{{route('/')}}">Home</a></li>
            <li>Blogs</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner Area End-->
      <!-- Blog Area Start-->
      <div class="blog-area pt-120">
        <div class="container">
          <div class="row">
            <!--Single Blog Start-->
            @foreach ($artikel as $dataartikel )
                  
      


            <div class="col-md-6 col-lg-4">
                <div class="single-blog mb-30">
                  <div class="blog-img">
                    <a href="single-blog.html"><img src="{{ asset($dataartikel->image_artikel) }}" alt="" /></a>
                  </div>
                  <div class="blog-content">
                    <ul class="blog-meta">
                      <li>{{ Carbon\Carbon::parse($dataartikel->created_at)->format('d M Y') }} </li>
                      <li><a href="#"> {{$dataartikel->author_artikel}}</a></li>
                    
                    </ul>
                    <h3><a href="single-blog.html">{!! $dataartikel->title_artikel !!}</a></h3>
                    <p>{!! Illuminate\Support\Str::limit($dataartikel->description_artikel, 220) !!}</p>
                    <a href="{{ route('bloglandingpage.show', $dataartikel->id_artikel) }}">
                      <span>Continue Reading</span> <i class="icofont icofont-long-arrow-right"></i>
                  </a>
                  
                  
                  
                  </div>
                </div>
              </div>
           @endforeach
           
            <!--Single Blog End-->
       
          </div>
          <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        {{-- Tombol Previous --}}
                        <li class="page-item {{ $artikel->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $artikel->previousPageUrl() ?? '#' }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>
        
                        {{-- Nomor Halaman --}}
                        @for ($page = 1; $page <= max(1, $artikel->lastPage()); $page++)
                            <li class="page-item {{ $artikel->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $artikel->url($page) }}">{{ $page }}</a>
                            </li>
                        @endfor
        
                        {{-- Tombol Next --}}
                        <li class="page-item {{ $artikel->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $artikel->nextPageUrl() ?? '#' }}" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        
        
        
        </div>
      </div>
      <!-- Blog Area End-->

  @endsection
