@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col-12 text-center">
                <h2>Kontak</h2>

                <p>
                    Gumiran Law merupakan firma hukum yang mengutamakan profesionalisme
                    dan solusi terbaik bagi klien, dengan layanan litigasi, konsultasi hukum,
                    dan bisnis yang transparan serta terpercaya.
                </p>

                <ul class="breadcrumb-pagination">
                    <li><a href="{{route('/')}}">Beranda</a></li>
                    <li>Kontak</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Area End-->

<!--Contact Us Area Start-->
<div class="contact-us-area pt-120">
    <div class="container">
        <div class="row">

            <!--Contact Information Start-->
            <div class="col-md-5 contact-address">
                <div class="contact-information">
                    <ul>

                        <li>
                            <h5>Alamat</h5>

                            @foreach ($address as $dataaddress)
                            <p>{!! $dataaddress->title_address !!}</p>
                            @endforeach
                        </li>

                        <li>
                            <h5>Telepon</h5>

                            @foreach ($phone as $dataPhone)
                            <p>
                                <a href="tel:+62{{ $dataPhone->no_phone }}">
                                    {{ $dataPhone->no_phone }}
                                </a>
                            </p>
                            @endforeach
                        </li>

                        <li>
                            <h5>Email</h5>

                            @foreach ($email as $dataemail)
                            <p>
                                <a href="#">
                                    {{ $dataemail->name_email }}
                                </a>
                            </p>
                            @endforeach
                        </li>

                    </ul>
                </div>
            </div>
            <!--Contact Information End-->

            <!--Contact Form Start-->
            <div class="col-md-7">
                <div class="contact-form">

                    <div class="contact-form-title">
                        <h3>Hubungi Kami</h3>
                    </div>

                    @foreach ($address as $dataaddress)

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.096448866431!2d106.8268465!3d-6.251021000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3d1a64cc99f%3A0x6e4aed833818918b!2sJl.%20Mampang%20Prpt.%20Raya%20No.88%2C%20RT.8%2FRW.6%2C%20Tegal%20Parang%2C%20Kec.%20Mampang%20Prpt.%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012790!5e0!3m2!1sid!2sid!4v1742080429408!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                    @endforeach

                    <p class="form-messege"></p>

                </div>
            </div>
            <!--Contact Form End-->

        </div>
    </div>
</div>
<!--Contact Us Area End-->

@endsection