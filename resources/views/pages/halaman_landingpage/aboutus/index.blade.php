@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-12 text-center">
                <h2>Tentang Kami</h2>
                <p>Gumiran Law adalah firma hukum yang mengutamakan profesionalisme dan solusi terbaik bagi klien,
                    dengan layanan litigasi, bisnis, dan konsultasi hukum yang transparan serta terpercaya.</p>
                <ul class="breadcrumb-pagination">
                    <li><a href="{{route('/')}}">Beranda</a></li>
                    <li>Tentang Kami</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Area End-->
<!-- Servcice Layout Area Start-->
<div class="service-layout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-service-wrapper">
                    <div class="single-service-content">
                        <h3>About Us</h3>

                        @foreach ($aboutus as $dataAboutus )
                        <p>
                            {!! $dataAboutus->description_aboutus !!}
                        </p>
                        @endforeach

                        <h4>Visi dan Misi</h4>
                        <div class="single-service-working d-flex mb-20">
                            <div class="service-working-icon">
                                <img src="{{asset('landingpage/assets/img/icon/icon6.png')}}" alt="" />
                            </div>
                            <div class="service-working-content mb-20">
                                <h5>Visi</h5>
                                <p>Visi dari Gumiran Law Office adalah sebagai berikut :</p>

                                <ul class="check-list ml-20 ">

                                    @foreach ($visi as $dataVisi )
                                    <h4 class="text-bold"><strong>{!! $dataVisi->title_visi !!}</strong></h4>


                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="single-service-working d-flex mb-20">
                            <div class="service-working-icon">
                                <img src="{{asset('landingpage/assets/img/icon/icon6.png')}}" alt="" />
                            </div>
                            <div class="service-working-content mb-20">
                                <h5>Misi</h5>
                                <p>Misi dari Gumiran Law Office adalah sebagai berikut :</p>

                                <ul class="check-list ml-30">

                                    @foreach ($misi as $datamisi )

                                    <li>{!! $datamisi->title_misi !!}</li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Servcice Layout Area End-->
<!-- Related Servcice Area Start-->
<div class="related-service-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Section Title Start-->
                <div class="section-title text-center mb-70">
                    <img src="img/icon/icon1.png" alt="" />

                    <h2>Legalitas</h2>
                    <p>Gumiran Law adalah firma hukum resmi yang beroperasi sesuai dengan peraturan di Indonesia,
                        memiliki legalitas yang jelas, izin praktik yang sah, serta berkomitmen menjunjung
                        profesionalisme dan kode etik advokat dalam memberikan layanan hukum yang terpercaya.</p>
                </div>
                <!--Section Title End-->
            </div>
        </div>
        <div class="row">
            <!--Single Service Start-->
            <div class="col-lg-4 col-md-6">

            </div>
            <!--Single Service End-->
            <!--Single Service Start-->
            <div class="col-lg-4 col-md-6">
                @foreach ($legalitas as $datalegalitas )
                <div class="single-service mb-30">
                    <div class="single-service-img img-full">
                        <a href="{{ asset($datalegalitas->image_legalitas) }}" target="_blank">
                            <iframe src="{{ asset($datalegalitas->image_legalitas) }}" width="100%" height="500px"
                                style="border: none;"></iframe>
                        </a>
                    </div>

                    <div class="single-service-content">
                        <h4><a href="single-service.html">{!! $datalegalitas->title_legalitas !!}</a></h4>
                        <p>{!! $datalegalitas->description_legalitas !!}</p>
                    </div>
                </div>

                @endforeach

            </div>
            <!--Single Service End-->
            <!--Single Service Start-->
            <div class="col-lg-4 col-md-6">

            </div>
            <!--Single Service End-->
        </div>
    </div>
</div>
<!-- Related Servcice Area End-->

@endsection