@extends('layouts.landingpage.layouts')
@section('content')

<!--Slider Area Start-->
<div class="slider-area">
    <div class="single-slider"
        style="background-image: url( {{ asset('landingpage/assets/img/slider/slider-bg.jpg') }})">
        <div class="container">
            @foreach ($hero as $dataHero)
            <div class="row align-items-center">
                <div class="col-md-8 col-xl-6">
                    <div class="hero-content">
                        <div class="title">
                            <h1 id="typing-text"> {{ $dataHero->title_hero }}</h1>
                        </div>

                        <div class="description">
                            <p> {!! $dataHero->description_hero !!}</p>
                        </div>
                        {{-- <a href="javascript:void(0);" onclick="window.location.href='{{ $dataHero->link_hero }}'"
                        style="display: inline-block; padding: 10px 20px; font-size: 16px; font-weight: bold; color:
                        white; background-color: #b99044; text-align: center; text-decoration: none; border-radius:
                        5px">
                        See More
                        </a> --}}

                    </div>
                </div>
                <div class="col-md-4 col-xl-6">
                    <div class="hero-img img-full mt-30" data-wow-duration="1.5s"
                        style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp">
                        <img src="{{ asset($dataHero->image_hero) }}" alt="" />

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--Slider Area End-->
<!--Feature Area Start-->
<div class="feature-area pt-95 pb-90">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <!--Section Title Start-->
                <div class="section-title feature-section-title">
                    <h2>
                        Layanan <br />
                        <span>Bidang Praktik</span> Kami
                    </h2>

                    <p>
                        Kami menyediakan layanan profesional yang terpercaya, mulai dari konsultasi hukum,
                        pendampingan litigasi, hingga pembuatan dan peninjauan kontrak. Dengan pengalaman
                        dan keahlian di berbagai bidang, kami siap membantu menyelesaikan permasalahan Anda
                        dengan solusi yang tepat, cepat, dan terpercaya.
                    </p>
                </div>
                <!--Section Title End-->
            </div>
            <div class="col-md-8">
                <div class="row">
                    @foreach ($product as $dataProduct )

                    <div class="col-md-6">
                        <!--Single Feature Start-->
                        <a href="{{ route('productlandingpage.show', $dataProduct->id_product) }}"
                            class="text-decoration-none text-dark">
                            <div class="single-feature">
                                <h2>{!! $dataProduct->title_product !!}</h2>
                                <p>{!! Illuminate\Support\Str::limit($dataProduct->description_product, 195) !!}</p>
                            </div>
                        </a>

                        <!--Single Feature End-->
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
<!--Feature Area End-->
<!--About Area Start-->
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-wrapper black-bg pt-50 pb-50">
                    <div class="row">
                        <!--About Image Area Start-->
                        <div class="col-md-5">
                            <div class="about-img">
                                @foreach ($hero as $dataHero )
                                <img src="{{ asset($dataHero->image_hero) }}" alt="" />

                                @endforeach


                                <!-- <a class="venobox" data-vbtype="video" data-gall="gall-video" data-autoplay="true" href="https://www.youtube.com/watch?v=ffIddFseYXE"><i class="icofont icofont-play-alt-3"></i></a> -->
                            </div>
                        </div>
                        <!--About Image Area End-->
                        <!--About Content Area Start-->
                        <div class="col-md-7">
                            <div class="about-content">
                                @foreach ($hero as $dataHero )
                                <h1>{{ $dataHero->title_hero }}</h1>
                                <h5>{!! $dataHero->description_hero !!}</h5>
                                @endforeach

                                @foreach ($aboutus as $dataAboutus )
                                <p>
                                    {!! $dataAboutus->description_aboutus !!}
                                </p>
                                @endforeach
                            </div>
                        </div>
                        <!--About Content Area End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--About Area End-->
<!--Timeline Area Start-->
<div class="timeline-area bg-img">
    <div class="container"></div>
</div>
<!--Timeline Area End-->


<!--Team Area Start-->
<div class="team-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Section Title Start-->
                <div class="section-title text-center mb-70">
                    <img src="img/icon/icon1.png" alt="" />
                    <h4>Tim Kami</h4>

                    <h2>Kenali Tim Profesional Kami</h2>

                    <p>
                        Kami memiliki tim yang kompeten dan berpengalaman di bidangnya masing-masing.
                        Dengan semangat kerja sama dan profesionalisme, kami selalu berusaha memberikan
                        solusi dan pelayanan terbaik untuk setiap kebutuhan Anda.
                    </p>n law adalah salah legal propfesionalnb who ready besybn dafgahghb hhsdjhd</p>
                </div>
                <!--Section Title End-->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="team-slider-wrap">
                    <div class="team-slider owl-carousel">
                        <!--Single Team Start-->
                        @foreach ($team as $dataTeam )
                        <a href="{{ route('teamlandingpage.show', $dataTeam->id_team) }}"
                            class="single-team d-flex align-items-center text-decoration-none">
                            <div class="team-img">
                                <img src="{{ asset($dataTeam->image_team) }}" alt="" />
                            </div>
                            <div class="team-content">
                                <h2>{{ $dataTeam->title_team }}</h2>

                                <p>
                                    {!! Illuminate\Support\Str::limit($dataTeam->description_team, 200) !!}
                                </p>
                                <ul class="team-social-link">
                                    <!-- Tambahkan ikon sosial jika ada -->

                                </ul>
                            </div>
                        </a>
                        @endforeach
                        <!--Single Team End-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Team Area End-->

<section id="Testimonials mt-120 ">
    <div class="Testimonials_top">
        <div class="section-title text-center mb-50">
            <img src="img/icon/icon1.png" alt="" />
            <h4>Testimoni</h4>

            <h2>Apa Kata Klien Kami</h2>

            <p>
                Tim profesional memberikan pelayanan yang sangat baik dengan penuh dedikasi dan tanggung jawab.
                Pengalaman serta keahlian mereka membantu memberikan solusi terbaik untuk setiap permasalahan
                yang dihadapi dengan komitmen dan integritas tinggi.
            </p>
        </div>
    </div>
    <div class="Testimonials_bottom">
        <div class="owl-carousel testimonials_slider">
            @foreach ($testimoni as $datatestimoni )
            <div class="testimonials_content">
                <div class="testimonials_avatar">
                    <img src="{{ asset($datatestimoni->image_testimoni) }}" alt="">
                </div>
                <div class="testimonials_text_before"><i class="fa fa-quote-right"></i></div>
                <div class="testimonials_text">
                    <p>{!! $datatestimoni->description_testimoni !!}</p>
                    <div class="testimonials_information">
                        <h3>{{ $datatestimoni->name_testimoni }}</h3>
                        <h4>{{ $datatestimoni->position_testimoni }}</h4>
                    </div>
                </div>
                <div class="testimonials_text_after"><i class="fa fa-quote-left"></i></div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection