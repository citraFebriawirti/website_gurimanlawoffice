@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data phone</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('phone.index')}}">Data phone</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data phone</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('phone.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data phone</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('phone.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="no_phone">No Phone</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" 
                            class="form-control @error('no_phone') is-invalid @enderror"
                            value="{{ old('no_phone') }}" 
                            name="no_phone" 
                            id="inputNanme4"
                            pattern="08[0-9]{8,11}"
                            maxlength="13"
                            title="Nomor telepon harus dimulai dengan '08' dan memiliki panjang 10-13 digit"
                            placeholder="08xxxxxxxxxx"
                            required>
            
                            @error('no_phone')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    
            
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_phone">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_phone" id="status_phone" 
                            class="form-control @error('status_phone') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_phone', $status_phone ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_phone', $status_phone ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_phone')
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