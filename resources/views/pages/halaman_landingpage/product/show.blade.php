@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
  <div class="container">
    <div class="row">
      <div class="page-banner-content col-12 text-center">
        <h2>Bidang Praktik</h2>
        <p>Kami menyediakan layanan hukum profesional dan terpercaya, mulai dari konsultasi hukum, pendampingan
          litigasi, hingga pembuatan dan peninjauan kontrak. Dengan pengalaman dan keahlian di berbagai bidang
          hukum, kami siap membantu menyelesaikan permasalahan hukum Anda dengan solusi yang tepat, cepat, dan
          terpercaya.</p>
        <ul class="breadcrumb-pagination">
          <li><a href="{{route('/')}}">Beranda</a></li>
          <li>Bidang Praktik</li>
        </ul>
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
      <div class="col-lg-9 blog-post-item">
        <div class="blog-wrapper mb-60">
          <div class="blog-content">
            <h2><a href="single-blog.html">{!! $product->title_product !!} </a></h2>

            <p class="p-10">{!! $product->description_product !!}</p>

          </div>


        </div>


      </div>

    </div>
  </div>
</div>
<!-- Blog Area End-->

@endsection