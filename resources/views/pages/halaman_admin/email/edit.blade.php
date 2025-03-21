@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data email</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('email.index')}}">Data email</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data email</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('email.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data email</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('email.update', $dataById->id_email) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
                    <!-- Input Title -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="name_email">No email</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('name_email') is-invalid @enderror"
                            value="{{ old('name_email') ?? $dataById->name_email }}" name="name_email"
                            id="inputNanme4">
            
                            @error('name_email')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                 
                    <!-- Input Status -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_email">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_email" id="status_email"
                            class="form-control" @error('status_email') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_email === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_email === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_email')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                   
            
                    <!-- Tombol Simpan -->
                    <div class="row mt-5">
                        <div class="col-lg-11 text-end">
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
            
            
        </div>
      </div>


  </div>
    
@endsection