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

  		<!-- Blog Area Start-->
          <div class="blog-area pt-120">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-9 blog-post-item">
		                <div class="blog-wrapper mb-60">
                            <div class="blog-content">
                                <h2 ><a href="single-blog.html">{!! $product->title_product !!} </a></h2>
                                
                                <p class="p-10">{!! $product->description_product !!}</p>
                                
                            </div>
                            
                            
		                </div>
		          
		              
		            </div>
		          
		        </div>
		    </div>
		</div>
		<!-- Blog Area End-->

  @endsection
