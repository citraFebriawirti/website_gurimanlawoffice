@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data product</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('product.index')}}">Data product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data product</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data product</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $dataById->id_product) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
                    <!-- Input Title -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="title_product">Title</label>
                        </div>
                        <div class="col-lg-9">
                          <!-- TinyMCE Editor -->
                          <textarea class="tinymce-editor @error('title_product') is-invalid @enderror" name="title_product" id="title_product"
                          cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                          name="title_product">{!! $dataById->title_product !!}</textarea><!-- End TinyMCE Editor -->
            
                            @error('title_product')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>
            
                     <!-- Input Image -->
                     <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="image_product">Description</label>
                        </div>
                        <div class="col-lg-9">
                           <!-- TinyMCE Editor -->
                           <textarea class="tinymce-editor @error('description_product') is-invalid @enderror" name="description_product" id="description_product"
                           cols="30" rows="10" placeholder="text" onfocus="focused(this)" onfocusout="defocused(this')"
                           name="description_product">{!! $dataById->description_product !!}</textarea><!-- End TinyMCE Editor -->
                        
                        </div>
                    </div>
                    <!-- Input Status -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_product">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_product" id="status_product"
                            class="form-control" @error('status_product') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_product === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_product === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_product')
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