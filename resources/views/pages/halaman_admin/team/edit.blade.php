@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Team</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('team.index')}}">Data Team</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Team</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('team.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data Team</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('team.update', $dataById->id_team) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
                    <!-- Input Title -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="title_team">Title</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('title_team') is-invalid @enderror"
                                value="{{ old('title_team', $dataById->title_team) }}" name="title_team"
                                id="title_team">
            
                            @error('title_team')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="description_team">Title</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('description_team') is-invalid @enderror" name="description_team" id="description_team"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="description_team">{!! $dataById->description_team !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('description_team')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                  
            
                    <!-- Input Image -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_team">Image <span style="color: red;font-size:12px">Size 200x476</span></label>
                        </div>
                        <div class="col-lg-9">
                            <input type="file" name="image_team" id="image_team"
                                class="form-control @error('image_team') is-invalid @enderror">
            
                            @error('image_team')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
            
                            @if ($dataById->image_team)
                                <p class="mt-3">Gambar Lama:</p>
                                <img src="{{ asset($dataById->image_team) }}" alt="Gambar Lama"
                                    class="img-thumbnail" style="width: 200px;">
                            @endif
                        </div>
                    </div>

                      <!-- Input Status -->
                      <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_team">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_team" id="status_team"
                            class="form-control" @error('status_team') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_team === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_team === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_team')
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