@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data sosialmedia</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('sosialmedia.index')}}">Data sosialmedia</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data sosialmedia</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('sosialmedia.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data sosialmedia</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('sosialmedia.update', $dataById->id_sosialmedia) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
                    <!-- Input Title -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="link_tiktok_sosialmedia">Link Tiktok</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('link_tiktok_sosialmedia') is-invalid @enderror" name="link_tiktok_sosialmedia" id="link_tiktok_sosialmedia"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="link_tiktok_sosialmedia">{!! $dataById->link_tiktok_sosialmedia !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('link_tiktok_sosialmedia')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="link_instagram_sosialmedia">Link instagram</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('link_instagram_sosialmedia') is-invalid @enderror" name="link_instagram_sosialmedia" id="link_instagram_sosialmedia"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="link_instagram_sosialmedia">{!! $dataById->link_instagram_sosialmedia !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('link_instagram_sosialmedia')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="link_youtube_sosialmedia">Link youtube</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('link_youtube_sosialmedia') is-invalid @enderror" name="link_youtube_sosialmedia" id="link_youtube_sosialmedia"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="link_youtube_sosialmedia">{!! $dataById->link_youtube_sosialmedia !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('link_youtube_sosialmedia')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="link_linkedin_sosialmedia">Link linkedin</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('link_linkedin_sosialmedia') is-invalid @enderror" name="link_linkedin_sosialmedia" id="link_linkedin_sosialmedia"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="link_linkedin_sosialmedia">{!! $dataById->link_linkedin_sosialmedia !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('link_linkedin_sosialmedia')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
                 


                    <!-- Input Status -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_sosialmedia">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_sosialmedia" id="status_sosialmedia"
                            class="form-control" @error('status_sosialmedia') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_sosialmedia === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_sosialmedia === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_sosialmedia')
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