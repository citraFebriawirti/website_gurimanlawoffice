@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Gallery</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('gallery.index')}}">Data Gallery</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Gallery</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data Gallery</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('gallery.update', $dataById->id_gallery) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
              
            
                  
            
                    <!-- Input Image -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_gallery">Image</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="file" name="image_gallery" id="image_gallery"
                                class="form-control @error('image_gallery') is-invalid @enderror">
            
                            @error('image_gallery')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
            
                            @if ($dataById->image_gallery)
                                <p class="mt-3">Gambar Lama:</p>
                                <img src="{{ asset($dataById->image_gallery) }}" alt="Gambar Lama"
                                    class="img-thumbnail" style="width: 200px;">
                            @endif
                        </div>
                    </div>


                      <!-- Input Status -->
                      <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_gallery">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_gallery" id="status_gallery"
                            class="form-control" @error('status_gallery') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_gallery === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_gallery === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_gallery')
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