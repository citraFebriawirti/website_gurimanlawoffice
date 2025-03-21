@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Legalitas</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('legalitas.index')}}">Data Legalitas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Legalitas</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('legalitas.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data Legalitas</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('legalitas.update', $dataById->id_legalitas) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
                    <!-- Input Title -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="title_legalitas">Title</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('title_legalitas') is-invalid @enderror"
                                value="{{ old('title_legalitas', $dataById->title_legalitas) }}" name="title_legalitas"
                                id="title_legalitas">
            
                            @error('title_legalitas')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="description_legalitas">Description</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('description_legalitas') is-invalid @enderror" name="description_legalitas" id="description_legalitas"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="description_legalitas">{!! $dataById->description_legalitas !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('description_legalitas')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                        <!-- Input Image -->
                        <div class="row mt-4">
                            <div class="col-lg-2">
                                <label for="image_legalitas">Image</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="file" name="image_legalitas" id="image_legalitas"
                                    class="form-control @error('image_legalitas') is-invalid @enderror">
                
                                @error('image_legalitas')
                                    <div class="invalid-feedback">
                                        <i class="text-danger">{{ $message }}</i>
                                    </div>
                                @enderror
                
                                @if ($dataById->image_legalitas)
                                    <p class="mt-3">Gambar Lama:</p>
                                   

                                        <iframe src="{{ asset($dataById->image_legalitas) }}" alt="Gambar Lama"
                                            class="img-thumbnail" style="width: 200px;"frameborder="0"></iframe>
                                @endif
                            </div>
                        </div>
            
                    <!-- Input Status -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_legalitas">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_legalitas" id="status_legalitas"
                            class="form-control" @error('status_legalitas') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_legalitas === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_legalitas === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_legalitas')
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