@extends('layouts.landingpage.layouts')
@section('content')

	<!-- Page Banner Area Start-->
    <div class="page-banner-area bg-img-3 pt-95 pb-90">
        <div class="container">
            <div class="row">
                <div class="page-banner-content col-12 text-center">
                    <h2>Join Us</h2>
                    <p>Gumiran Law is a law firm that prioritizes professionalism and the best solutions for clients, with transparent and trusted litigation, business and legal consulting services.</p>
                    <ul class="breadcrumb-pagination">
                        <li><a href="index.html">Home</a></li>
                     
                        <li>Join Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner Area End-->
 
    <!--Pricing Table Area Start-->
    <div class="pricing-table-area mt-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title Start-->
                    <div class="section-title text-center mb-70">
                       <img src="{{asset('landingpage/assets/img/icon/icon1.png')}}" alt="">
                        <h4>Job </h4>
                        <h2>Job Associate</h2>
                        <p>Gumiran Law is a law firm that prioritizes professionalism and the best solutions for clients, with transparent and trusted litigation, business and legal consulting services.</p>
                    </div>
                    <!--Section Title End-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-12 ml-auto mr-auto">
                    @foreach ($jobassociate as $datajobassociate)
                    <div class="row row-25">
                        <!--Single Pricing Table Start-->
                        <div class="col-lg-6 col-md-6 mb-30 pricing-table-wrap"> 
                            <div class="single-pricing-table text-center">
                                <div class="pricing-head">
                                  
                                    <h4>Requirement</h4>
                                </div>
                                <div class="pricing-body">
                                    
                                    <ul>
                                        <li class="text-left">{!!$datajobassociate->requirenments_jobassociate !!}</li>
                                        
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                        <!--Single Pricing Table End-->
                        <!--Single Pricing Table Start-->
                        <div class="col-lg-6 col-md-6 mb-30 pricing-table-wrap"> 
                            <div class="single-pricing-table pricing-active text-center">
                                <div class="pricing-head">
                                   
                                    <h4>Description</h4>
                                </div>
                                <div class="pricing-body">
                                    <ul>
                                        <li class="text-left">{!!$datajobassociate->job_descriptions_jobassociate !!}</li>
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                        <!--Single Pricing Table End-->
                    
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
    <!--Pricing Table Area End-->
    <!--Pricing Table Area Start-->
    <div class="pricing-table-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title Start-->
                    <div class="section-title text-center mb-70">
                       <img src="{{asset('landingpage/assets/img/icon/icon1.png')}}" alt="">
                        <h4>Job</h4>
                        <h2>Job Intership</h2>
                        <p>Gumiran Law is a law firm that prioritizes professionalism and the best solutions for clients, with transparent and trusted litigation, business and legal consulting services.</p>
                    </div>
                    <!--Section Title End-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-12 ml-auto mr-auto">
                    <div class="row row-25">
                        @foreach ($jobintership as $datajobintership)
                        <!--Single Pricing Table Style-2 Start-->
                        <div class="col-lg-6 col-md-6 mb-50 pricing-table-wrap">
                            <div class="single-pricing-table style-2">
                                <div class="pricing-table-content">   
                                    <div class="pricing-head">
                                        
                                        <h4>Requirement</h4>
                                    </div>
                                    <div class="pricing-body">
                                        <ul>
                                            <li>{!!$datajobintership->requirenments_jobintership !!}</li>
                                           
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <!--Single Pricing Table Style-2 End-->
                        <!--Single Pricing Table Style-2 Start-->
                        <div class="col-lg-6 col-md-6 mb-50 pricing-table-wrap">
                            <div class="single-pricing-table style-2">
                                <div class="pricing-table-content">   
                                    <div class="pricing-head">
                                       
                                        <h4>Description</h4>
                                    </div>
                                    <div class="pricing-body">
                                        <ul>
                                            <li>{!!$datajobintership->job_descriptions_jobintership !!}</li>
                                           
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <!--Single Pricing Table Style-2 End-->
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pricing Table Area End-->


    	<!--Call To Action Area Start-->
		<div class="call-to-action-area bg-img ptb-100">
		    <div class="container">
		        <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
                        <div class="calltoaction text-center">
                            <h3>Join now for complete info!</h3>
                           
                            @foreach ($joinus as $datajoinus)
                            <p> {!! $datajoinus->title_joinus !!} </p>
                            @endforeach

                         
                            
                        </div>
                    </div>
		        </div>
		    </div>
		</div>
		<!--Call To Action Area End-->

  @endsection
