@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Name Office</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('nameoffice.index')}}">Data nameoffice</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Name Office</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('nameoffice.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data Name Office</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('nameoffice.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="title_nameoffice">Title</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('title_nameoffice') is-invalid @enderror"
                                value="{{ old('title_nameoffice') }}" name="title_nameoffice" id="title_nameoffice">
            
                            @error('title_nameoffice')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_nameoffice">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_nameoffice" id="status_nameoffice" 
                            class="form-control @error('status_nameoffice') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_nameoffice', $status_nameoffice ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_nameoffice', $status_nameoffice ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_nameoffice')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_nameoffice">Image</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="file" name="image_nameoffice" id="image_nameoffice"
                                class="form-control @error('image_nameoffice') is-invalid @enderror">
            
                            @error('image_nameoffice')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                   
                </div>
            
                <div class="d-flex justify-content-end mt-5 gap-3">
                   
                    <button type="submit" class="btn btn-sm btn-success m-2">Simpan</button>
                </div>
            </form>
            
        </div>
      </div>
  </div>
 </section>

    
@endsection