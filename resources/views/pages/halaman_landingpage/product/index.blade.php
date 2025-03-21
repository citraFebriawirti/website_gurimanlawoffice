@extends('layouts.landingpage.layouts')
@section('content')

  <!-- Page Banner Area Start-->
  <div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
      <div class="row">
        <div class="page-banner-content col-12 text-center">
          <h2>Pratice Areas</h2>
          <p>We offer reliable professional legal services, from legal consultation, litigation assistance, to contract drafting and review. With experience and expertise in various legal fields, we are ready to help you solve your legal problems with the right, fast, and reliable solutions.</p>
          <ul class="breadcrumb-pagination">
            <li><a href="{{route('/')}}">Home</a></li>
            <li>Pratice Areas</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Banner Area End-->
      <!--Service Area Start-->
      <div class="service-area pt-120 pb-55">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 col-lg-12">
              <div class="row">
                <div class="col-12">
                  <!--Section Title Start-->
                  <div class="section-title mb-60">
                    <img src="img/icon/icon1.png" alt="" />
                    <h4>Pratice Areas</h4>
                    <h2>Pratice Areas that will be offered</h2>
                    <p>We offer reliable professional legal services, from legal consultation, litigation assistance, to contract drafting and review. With experience and expertise in various legal fields, we are ready to help you solve your legal problems with the right, fast, and reliable solutions.</p>
                  </div>
                  <!--Section Title End-->
                </div>
                <div class="col-12">
                  <div class="row">
                    @foreach ($product as $dataProduct )

                     <!--Single Service Start-->
                     <div class="col-md-6">
                        <div class="single-service mb-60 d-flex flex-nowrap">
                          <div class="service-icon">
                            <img src="{{asset('landingpage/assets/img/icon/icon4.png')}}" alt="" />
                          </div>
                          <div class="service-content">
                            <h4><a href="{{ route('productlandingpage.show', $dataProduct->id_product) }}">{!! $dataProduct->title_product !!}</a></h4>
                           


                            <p>{!! Illuminate\Support\Str::limit($dataProduct->description_product, 200) !!}</p>
                          </div>
                        </div>
                      </div>
                      <!--Single Service End-->
            
         
            @endforeach
                   
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Service Area End-->

  @endsection
