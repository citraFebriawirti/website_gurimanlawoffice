@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Address</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('address.index')}}">Data address</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Address</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('address.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data Address</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('address.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="title_address">Title</label>
                        </div>
                        <div class="col-lg-9">
                             <!-- TinyMCE Editor -->
                             <textarea class="tinymce-editor @error('title_address') is-invalid @enderror" name="title_address" id="title_address"
                             cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                             name="title_address"></textarea><!-- End TinyMCE Editor -->
            
                            @error('title_address')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_address">Link Gmap</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea class="tinymce-editor @error('link_gmap_address') is-invalid @enderror" name="link_gmap_address" id="link_gmap_address"
                                            cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                                            name="link_gmap_address"></textarea><!-- End TinyMCE Editor -->
            
                            @error('image_address')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_address">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_address" id="status_address" 
                            class="form-control @error('status_address') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_address', $status_address ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_address', $status_address ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_address')
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