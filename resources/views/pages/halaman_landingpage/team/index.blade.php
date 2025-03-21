@extends('layouts.landingpage.layouts')
@section('content')
 
   <!-- Page Banner Area Start-->
   <div class="page-banner-area bg-img-3 pt-95 pb-90">
    <div class="container">
      <div class="row">
        <div class="page-banner-content col-12 text-center">
          <h2>Our Lawyers</h2>
          <p>Our team consists of experienced legal professionals who are ready to provide the best solutions for all your legal problems with high commitment and integrity.</p>
          <ul class="breadcrumb-pagination">
            <li><a href="{{route('/')}}">Home</a></li>
            <li>Team</li>
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
                <h4>Our Lawyers</h4>
                <h2>Meet My Team</h2>
                <p>Our team consists of experienced legal professionals who are ready to provide the best solutions for all your legal problems with high commitment and integrity.</p>
              </div>
              <!--Section Title End-->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="team-slider-wrap">
                <div class="team-slider owl-carousel">
                  <!--Single Team Start-->
                  @foreach ($team as $dataTeam)
                  <a href="{{ route('teamlandingpage.show', $dataTeam->id_team) }}" class="single-team d-flex align-items-center text-decoration-none">
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


  @endsection
