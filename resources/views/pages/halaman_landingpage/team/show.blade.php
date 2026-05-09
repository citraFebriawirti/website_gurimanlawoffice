@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-12 text-center">
                <h2>Tim Kami</h2>
                <p>
                    Tim kami terdiri dari para profesional yang berpengalaman, berdedikasi,
                    dan siap memberikan pelayanan terbaik dengan penuh tanggung jawab,
                    komitmen, serta integritas tinggi.
                </p>

                <ul class="breadcrumb-pagination">
                    <li><a href="{{route('/')}}">Beranda</a></li>
                    <li>Tim</li>
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
            <div class="col-lg-8 blog-post-item">


                <div class="blog-wrapper mb-60">
                    <!--Single Blog Start-->
                    <div class="single-blog mb-30">
                        <div class="blog-img img-full d-flex justify-content-center align-items-center mb-20">
                            <a href="single-blog.html">
                                <img src="{{ asset($team->image_team) }}" alt=""
                                    style="width: 300px; height: 400px; object-fit: cover; border: 5px solid #000;">
                            </a>
                        </div>



                        <div class="blog-content">

                            <h3><a href="single-blog.html">{!! $team->title_team!!}</a></h3>
                            <p>{!! $team->description_team!!}</p>

                        </div>
                    </div>
                    <!--Single Blog End-->
                </div>


            </div>

        </div>
    </div>
</div>
<!-- Blog Area End-->


@endsection