@extends('layouts.admin.layouts')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>

    <div>
        <div class="row mb-3">
            <!-- Data Name Office -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('nameoffice.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Name Office</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countNameOffice }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
    
            <!-- Data Address -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('address.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Address</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countAddress }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-map-marker-alt fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Data Phone -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('phone.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Phone</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countPhone }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-phone fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Data Email -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('email.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Email</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countEmail }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row mb-3">
            <!-- Data Visi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('visi.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Visi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countVisi }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-eye fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Data Misi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('misi.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Misi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countMisi }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullseye fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Data Products -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('product.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countProduct }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Data Team -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('product.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Team</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countTeam }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                    
                  
                </div>
            </div>
    
            <!-- Data Business Partner -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card"  onclick="window.location.href='{{ route('businespartner.index') }}'">
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Business Partner</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countBusinesPartner }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-success"></i>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
    
            <!-- Data Gallery -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card"  onclick="window.location.href='{{ route('gallery.index') }}'">
                    <div class="card-body">
                      

                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Gallery</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countGallery }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-image fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Data User -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('users.index') }}'">
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countUser }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-warning"></i>
                            </div>
                        </div>
                       
                    </div>
            </div>

         
        </div>
    
            <!-- Data Hero -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('hero.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Hero</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countHero }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-star fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Data About Us -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('aboutus.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">About Us</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countAboutUs }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info-circle fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Data Job Associate -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('jobassociate.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Job Associate</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countJobAssociate }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Data Job Internship -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href='{{ route('jobintership.index') }}'">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Job Internship</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countJobIntership }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-graduate fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Data Artikel -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 hover-card" onclick="window.location.href=''">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Artikel</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countArtikel }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
        
    </div>
    
    <!--Row-->

    

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
