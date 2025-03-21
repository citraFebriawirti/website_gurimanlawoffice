@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data testimoni</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('testimoni.index')}}">Data testimoni</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data testimoni</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('testimoni.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data testimoni</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('testimoni.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="name_testimoni">Name</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('name_testimoni') is-invalid @enderror"
                                value="{{ old('name_testimoni') }}" name="name_testimoni" id="name_testimoni">
            
                            @error('name_testimoni')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="position_testimoni">Position</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('position_testimoni') is-invalid @enderror"
                                value="{{ old('position_testimoni') }}" name="position_testimoni" id="position_testimoni">
            
                            @error('position_testimoni')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="description_testimoni">Description</label>
                        </div>
                        <div class="col-lg-9">
                             <!-- TinyMCE Editor -->
                             <textarea class="tinymce-editor @error('description_testimoni') is-invalid @enderror" name="description_testimoni" id="description_testimoni"
                             cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                             name="description_testimoni"></textarea><!-- End TinyMCE Editor -->
            
                            @error('description_testimoni')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                 
            
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_testimoni">Image</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="file" name="image_testimoni" id="image_testimoni"
                                class="form-control @error('image_testimoni') is-invalid @enderror">
            
                            @error('image_testimoni')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_testimoni">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_testimoni" id="status_testimoni" 
                            class="form-control @error('status_testimoni') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_testimoni', $status_testimoni ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_testimoni', $status_testimoni ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_testimoni')
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