@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Job Associate</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('jobassociate.index')}}">Data Job Associate</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Job Associate</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('jobassociate.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data Job Associate</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('jobassociate.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="requirenments_jobassociate">Requirements</label>
                        </div>
                        <div class="col-lg-9">
                             <!-- TinyMCE Editor -->
                             <textarea class="tinymce-editor @error('requirenments_jobassociate') is-invalid @enderror" name="requirenments_jobassociate" id="requirenments_jobassociate"
                             cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                             name="requirenments_jobassociate"></textarea><!-- End TinyMCE Editor -->
            
                            @error('requirenments_jobassociate')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="job_descriptions_jobassociate">Description</label>
                        </div>
                        <div class="col-lg-9">
                             <!-- TinyMCE Editor -->
                             <textarea class="tinymce-editor @error('job_descriptions_jobassociate') is-invalid @enderror" name="job_descriptions_jobassociate" id="job_descriptions_jobassociate"
                             cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                             name="job_descriptions_jobassociate"></textarea><!-- End TinyMCE Editor -->
            
                            @error('job_descriptions_jobassociate')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                 
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_jobassociate">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_jobassociate" id="status_jobassociate" 
                            class="form-control @error('status_jobassociate') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_jobassociate', $status_jobassociate ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_jobassociate', $status_jobassociate ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_jobassociate')
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