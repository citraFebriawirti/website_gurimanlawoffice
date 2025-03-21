@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Hero</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('hero.index')}}">Data Hero</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Hero</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('hero.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data Hero</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('hero.update', $dataById->id_hero) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
                    <!-- Input Title -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="title_hero">Title</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('title_hero') is-invalid @enderror"
                                value="{{ old('title_hero', $dataById->title_hero) }}" name="title_hero"
                                id="title_hero">
            
                            @error('title_hero')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="description_hero">Description</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('description_hero') is-invalid @enderror" name="description_hero" id="description_hero"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="description_hero">{!! $dataById->description_hero !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('description_hero')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="link_hero">Link</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('link_hero') is-invalid @enderror" name="link_hero" id="link_hero"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="link_hero">{!! $dataById->link_hero !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('link_hero')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                  
            
                    <!-- Input Image -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_hero">Image <span style="color: red;font-size:12px">Size 537x7990</span></label>
                        </div>
                        <div class="col-lg-9">
                            <input type="file" name="image_hero" id="image_hero"
                                class="form-control @error('image_hero') is-invalid @enderror">
            
                            @error('image_hero')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
            
                            @if ($dataById->image_hero)
                                <p class="mt-3">Gambar Lama:</p>
                                <img src="{{ asset($dataById->image_hero) }}" alt="Gambar Lama"
                                    class="img-thumbnail" style="width: 200px;">
                            @endif
                        </div>
                    </div>


                      <!-- Input Status -->
                      <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_hero">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_hero" id="status_hero"
                            class="form-control" @error('status_hero') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_hero === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_hero === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_hero')
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