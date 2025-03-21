@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Job Intership</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('jobintership.index')}}">Data Job Intership</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Job Intership</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('jobintership.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data Job Intership</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('jobintership.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="requirenments_jobintership">Requirements</label>
                        </div>
                        <div class="col-lg-9">
                             <!-- TinyMCE Editor -->
                             <textarea class="tinymce-editor @error('requirenments_jobintership') is-invalid @enderror" name="requirenments_jobintership" id="requirenments_jobintership"
                             cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                             name="requirenments_jobintership"></textarea><!-- End TinyMCE Editor -->
            
                            @error('requirenments_jobintership')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="job_descriptions_jobintership">Description</label>
                        </div>
                        <div class="col-lg-9">
                             <!-- TinyMCE Editor -->
                             <textarea class="tinymce-editor @error('job_descriptions_jobintership') is-invalid @enderror" name="job_descriptions_jobintership" id="job_descriptions_jobintership"
                             cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                             name="job_descriptions_jobintership"></textarea><!-- End TinyMCE Editor -->
            
                            @error('job_descriptions_jobintership')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                 
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_jobintership">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_jobintership" id="status_jobintership" 
                            class="form-control @error('status_jobintership') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_jobintership', $status_jobintership ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_jobintership', $status_jobintership ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_jobintership')
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