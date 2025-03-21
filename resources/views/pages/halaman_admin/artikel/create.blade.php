@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data artikel</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('artikel.index')}}">Data artikel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data artikel</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data artikel</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="title_artikel">Title</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('title_artikel') is-invalid @enderror"
                                value="{{ old('title_artikel') }}" name="title_artikel" id="title_artikel">
            
                            @error('title_artikel')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="author_artikel">Author</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('author_artikel') is-invalid @enderror"
                                value="{{ old('author_artikel') }}" name="author_artikel" id="author_artikel">
            
                            @error('author_artikel')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="description_artikel">Description</label>
                        </div>
                        <div class="col-lg-9">
                             <!-- TinyMCE Editor -->
                             <textarea class="tinymce-editor @error('description_artikel') is-invalid @enderror" name="description_artikel" id="description_artikel"
                             cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                             name="description_artikel"></textarea><!-- End TinyMCE Editor -->
            
                            @error('description_artikel')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                   
            
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_artikel">Image</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="file" name="image_artikel" id="image_artikel"
                                class="form-control @error('image_artikel') is-invalid @enderror">
            
                            @error('image_artikel')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_artikel">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_artikel" id="status_artikel" 
                            class="form-control @error('status_artikel') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_artikel', $status_artikel ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_artikel', $status_artikel ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_artikel')
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