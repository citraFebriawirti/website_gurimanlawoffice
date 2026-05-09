@extends('layouts.landingpage.layouts')
@section('content')

<!-- Page Banner Area Start-->
<div class="page-banner-area bg-img-3 pt-95 pb-90">
  <div class="container">
    <div class="row">
      <div class="page-banner-content col-12 text-center">

        <h2>Bidang Praktik</h2>

        <p>
          Kami menyediakan layanan hukum profesional yang terpercaya,
          mulai dari konsultasi hukum, pendampingan litigasi,
          hingga penyusunan dan peninjauan kontrak.
        </p>

        <ul class="breadcrumb-pagination">
          <li><a href="{{route('/')}}">Beranda</a></li>
          <li>Bidang Praktik</li>
        </ul>

      </div>
    </div>
  </div>
</div>
<!-- Page Banner Area End-->

<!--Service Area Start-->
<div class="service-area pt-120 pb-80">
  <div class="container">

    <div class="row">
      <div class="col-12">

        <!--Section Title Start-->
        <div class="section-title text-center mb-70">

          <img src="img/icon/icon1.png" alt="" />

          <h4>Bidang Praktik</h4>

          <h2>Layanan yang Kami Tawarkan</h2>

          <p>
            Dengan pengalaman dan keahlian di berbagai bidang hukum,
            kami siap membantu memberikan solusi terbaik secara cepat,
            tepat, dan profesional.
          </p>

        </div>
        <!--Section Title End-->

      </div>
    </div>

    <div class="row">

      @foreach ($product as $dataProduct)

      <!--Single Service Start-->
      <div class="col-lg-6 col-md-6 mb-4">

        <div style="
                    height: 100%;
                    background: #fff;
                    border-radius: 12px;
                    padding: 30px;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
                    transition: 0.3s ease;
                " onmouseover="this.style.transform='translateY(-5px)'"
          onmouseout="this.style.transform='translateY(0px)'">

          <div class="d-flex align-items-start">

            <div style="
                            min-width: 70px;
                            margin-right: 20px;
                        ">
              <img src="{{asset('landingpage/assets/img/icon/icon4.png')}}" alt="" style="
                                    width: 60px;
                                " />
            </div>

            <div>

              <h4 style="
                                font-size: 22px;
                                margin-bottom: 15px;
                                line-height: 1.4;
                            ">
                <a href="{{ route('productlandingpage.show', $dataProduct->id_product) }}" style="
                                        color: #222;
                                        text-decoration: none;
                                    ">
                  {!! $dataProduct->title_product !!}
                </a>
              </h4>

              <p style="
                                margin-bottom: 0;
                                color: #666;
                                line-height: 1.8;
                                text-align: justify;
                            ">
                {!! Illuminate\Support\Str::limit(strip_tags($dataProduct->description_product), 200)
                !!}
              </p>

            </div>

          </div>

        </div>

      </div>
      <!--Single Service End-->

      @endforeach

    </div>

  </div>
</div>
<!--Service Area End-->

@endsection