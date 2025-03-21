@extends('layouts.admin.layouts')
@section('content')
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Job Associate</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Dasboard</a></li>

        <li class="breadcrumb-item active" aria-current="page">Data Job Associate</li>
      </ol>
    </div>

    <!-- Row -->
    <div class="row">
    
      <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Job Associate</h6>
            <a href="{{route('jobassociate.create')}}" class="btn btn-success btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Add Data</span>
            </a>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr class="text-center">
                  <th style="width: 10px">No</th>
                  <th>Requirenments</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
             
              <tbody>   
                @foreach ($jobassociate as $data)

                <tr class="text-left">
                  <td>{{ $loop->iteration }}</td>
                  <td>{!! $data->requirenments_jobassociate !!}</td>
                  <td>{!! $data->job_descriptions_jobassociate !!}</td>
                 
                  <td>{{ $data->status_jobassociate }}</td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('jobassociate.edit', $data->id_jobassociate) }}"
                            class="btn btn-sm btn-primary m-1"><i class="fas fa-pencil-alt"></i></a>

                        <form action="{{ route('jobassociate.destroy', $data->id_jobassociate) }}" method="post">
                            @csrf
                            @method('delete')
                           
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this data, if you delete this data? data related to this data will also be deleted!')"
                                class="btn btn-danger btn-sm m-1"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
                 
                </tr>
                @endforeach
              
              
              </tbody>
            </table>
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
  <!---Container Fluid-->
@endsection