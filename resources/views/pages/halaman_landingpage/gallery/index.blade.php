@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-12 text-center">
                <h2>Gallery</h2>
                <p>
                    Gallery ini berisi dokumentasi berbagai kegiatan, momen, dan aktivitas yang telah kami lakukan.
                    Setiap foto menggambarkan perjalanan, pengalaman, serta dedikasi kami dalam memberikan pelayanan
                    terbaik dengan penuh profesionalisme dan tanggung jawab.
                </p>
                <ul class="breadcrumb-pagination">
                    <li><a href="{{route('/')}}">Beranda</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Area End-->

<!--Team Area Start-->
<div class="team-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Section Title Start-->
                <div class="section-title text-center mb-70">
                    <img src="img/icon/icon1.png" alt="" />
                    <h4>Gallery Kami</h4>
                    <h2>Kumpulan Dokumentasi Kegiatan</h2>
                    <p>
                        Melalui gallery ini, Anda dapat melihat berbagai dokumentasi kegiatan, acara,
                        dan momen penting yang menjadi bagian dari perjalanan kami. Setiap gambar
                        mencerminkan semangat, kerja sama, dan komitmen kami dalam memberikan hasil terbaik.
                    </p>
                </div>
                <!--Section Title End-->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="team-slider-wrap">
                    <div class="team-slider owl-carousel">

                        <!--Single Team Start-->
                        <!--Single Team Start-->
                        @foreach ($gallery as $dataGallery)
                        <div class="single-team" style="
        display: block;
        padding: 10px;
    ">

                            <div style="
        width: 100%;
        height: 300px;
        overflow: hidden;
        border-radius: 10px;
    ">
                                <img src="{{ asset($dataGallery->image_gallery) }}" alt="Gallery Image" style="
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
                transition: 0.3s ease;
                cursor: pointer;
            " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" />
                            </div>

                        </div>
                        @endforeach
                        <!--Single Team End-->

                        <!--Single Team End-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Team Area End-->

@endsection