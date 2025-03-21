<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="  {{ asset('admin/assets/img/icon.png') }}" rel="icon">
  <title>{{ env('APP_NAME') }}</title>
  <link href="   {{ asset('admin/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href=" {{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin/assets/css/ruang-admin.min.css') }} " rel="stylesheet">
  <link href=" {{ asset('admin/assets/vendor/datatables/dataTables.bootstrap4.min.css') }} " rel="stylesheet">
</head>

<body id="page-top">
  @include('sweetalert::alert')

 
  <div id="wrapper">

    
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          {{-- <img src="img/logo/logo2.png"> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Guriman Law Office</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
   
 
    
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-building"></i>
          <span>Company Information</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Company Information</h6>
            <a class="collapse-item" href="{{ route('nameoffice.index') }}">Data Name Office</a>
            <a class="collapse-item" href="{{ route('address.index') }}">Data Address</a>
            <a class="collapse-item" href="{{ route('phone.index') }}">Data Phone</a>
            <a class="collapse-item" href="{{ route('email.index') }}">Data Email</a>
            <a class="collapse-item" href="{{route('sosialmedia.index')}}">Data Sosial Media</a>
          
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fa fa-window-restore"></i>
          <span>Visi & Misi</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Visi & Misi
            </h6>
            <a class="collapse-item" href="{{route('visi.index')}}">Data Visi </a>
            <a class="collapse-item" href="{{route('misi.index')}}">Data Misi</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
          <i class="fas fa-fw fa-table"></i>
          <span>Products & Services</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products & Services</h6>
            <a class="collapse-item" href="{{route('product.index')}}">Data Products</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeam" aria-expanded="false" aria-controls="collapseTeam">
          <i class="fas fa-fw fa-users"></i>
          <span>Team & Partners</span>
        </a>
        <div id="collapseTeam" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Team & Partners</h6>
            <a class="collapse-item" href="{{route('team.index')}}">Data Team</a>
            <a class="collapse-item" href="{{route('businespartner.index')}}">Data Busines Partner</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Additional Information</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Additional Information</h6>
            <a class="collapse-item" href="{{route('hero.index')}}">Data Hero</a>
            <a class="collapse-item" href="{{route('aboutus.index')}}">Data About Us</a>
            <a class="collapse-item" href="{{route('gallery.index')}}">Data Gallery </a>
            <a class="collapse-item" href="{{route('legalitas.index')}}">Data Legalitas</a>
            <a class="collapse-item" href="{{route('joinus.index')}}">Data Join Us</a>
            <a class="collapse-item" href="{{route('jobassociate.index')}}">Data Job Associate</a>
            <a class="collapse-item" href="{{route('jobintership.index')}}">Data Job Intership</a>
            <a class="collapse-item" href="{{route('testimoni.index')}}">Data Testimoni</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('artikel.index')}}">
          <i class="fas fa-file-word"></i>
          <span>Data Artikel</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-file-word"></i>
          <span>Data Users</span>
        </a>
      </li>
    
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
           
          
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('admin/assets/img/boy.png') }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{ session('nama_user') }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.index') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
      @yield('content')
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
       

        <div class="container my-auto py-2">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> -
              <b><a href="/" target="_blank">Gumiran Law Office </a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}  "></script>
  <script src="{{ asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js') }} "></script>
  <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }} "></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('admin/assets/js/ruang-admin.min.js') }} "></script>


    <!-- Page level plugins -->
    <script src=" {{ asset('admin/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

     <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

<script>
  tinymce.init({
      selector: '#title_address,#link_gmap_address,#link_tiktok_sosialmedia,#link_instagram_sosialmedia,#link_youtube_sosialmedia,#link_linkedin_sosialmedia,#title_visi,#title_misi,#title_product,#description_product,#description_team,#description_hero,#link_hero,#description_aboutus,#requirenments_jobassociate,#job_descriptions_jobassociate,#requirenments_jobintership,#job_descriptions_jobintership,#description_testimoni,#description_artikel,#description_legalitas,#title_joinus',
      menubar: false, // Hilangkan menu bar
      plugins: 'advlist autolink lists link image charmap preview',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
  });
</script>

</body>

</html>