@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
  <div class="container">
    <div class="row">
      <div class="page-banner-content col-12 text-center">

        <h2>Blog</h2>

        <p>
          Temukan berbagai artikel, informasi, dan wawasan terbaru seputar dunia hukum,
          bisnis, dan layanan profesional yang kami hadirkan untuk memberikan solusi
          serta edukasi terbaik bagi Anda.
        </p>

        <ul class="breadcrumb-pagination">
          <li><a href="{{route('/')}}">Beranda</a></li>
          <li>Blog</li>
        </ul>

      </div>
    </div>
  </div>
</div>
<!-- Page Banner Area End-->

<!-- Blog Area Start-->
<div class="blog-area pt-120 pb-90">
  <div class="container">

    <div class="row">

      @foreach ($artikel as $dataartikel)

      <!--Single Blog Start-->
      <div class="col-md-6 col-lg-4 d-flex">

        <div class="single-blog mb-30" style="
                    width: 100%;
                    border-radius: 12px;
                    overflow: hidden;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
                    background: #fff;
                    transition: 0.3s ease;
                " onmouseover="this.style.transform='translateY(-5px)'"
          onmouseout="this.style.transform='translateY(0px)'">

          <!-- Image -->
          <div class="blog-img" style="
                        width: 100%;
                        height: 250px;
                        overflow: hidden;
                    ">

            <a href="{{ route('bloglandingpage.show', $dataartikel->id_artikel) }}">

              <img src="{{ asset($dataartikel->image_artikel) }}" alt="" style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                " />

            </a>

          </div>

          <!-- Content -->
          <div class="blog-content" style="
                        padding: 25px;
                    ">

            <!-- Meta -->
            <ul class="blog-meta" style="
                            margin-bottom: 15px;
                        ">

              <li>
                {{ Carbon\Carbon::parse($dataartikel->created_at)->format('d M Y') }}
              </li>

              <li>
                <a href="#">
                  {{ $dataartikel->author_artikel }}
                </a>
              </li>

            </ul>

            <!-- Title -->
            <h3 style="
                            min-height: 70px;
                            line-height: 1.5;
                            margin-bottom: 15px;
                        ">

              <a href="{{ route('bloglandingpage.show', $dataartikel->id_artikel) }}" style="
                                    color: #222;
                                    text-decoration: none;
                                ">
                {!! $dataartikel->title_artikel !!}
              </a>

            </h3>

            <!-- Description -->
            <p style="
                            color: #666;
                            line-height: 1.9;
                            text-align: justify;
                            min-height: 140px;
                        ">

              {!! Illuminate\Support\Str::limit(strip_tags($dataartikel->description_artikel), 220) !!}

            </p>

            <!-- Button -->
            <a href="{{ route('bloglandingpage.show', $dataartikel->id_artikel) }}" style="
                                font-weight: 600;
                                text-decoration: none;
                            ">
              <span>Baca Selengkapnya</span>
              <i class="icofont icofont-long-arrow-right"></i>
            </a>

          </div>

        </div>

      </div>
      <!--Single Blog End-->

      @endforeach

    </div>

    <!-- Pagination -->
    <div class="row mt-4">
      <div class="col-12 d-flex justify-content-center">

        <nav>
          <ul class="pagination">

            <!-- Previous -->
            <li class="page-item {{ $artikel->onFirstPage() ? 'disabled' : '' }}">

              <a class="page-link" href="{{ $artikel->previousPageUrl() ?? '#' }}">
                &laquo; Previous
              </a>

            </li>

            <!-- Number -->
            @for ($page = 1; $page <= max(1, $artikel->lastPage()); $page++)

              <li class="page-item {{ $artikel->currentPage() == $page ? 'active' : '' }}">

                <a class="page-link" href="{{ $artikel->url($page) }}">
                  {{ $page }}
                </a>

              </li>

              @endfor

              <!-- Next -->
              <li class="page-item {{ $artikel->hasMorePages() ? '' : 'disabled' }}">

                <a class="page-link" href="{{ $artikel->nextPageUrl() ?? '#' }}">
                  Next &raquo;
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