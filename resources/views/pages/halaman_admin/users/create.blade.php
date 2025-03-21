@extends('layouts.admin.layouts')

@section('content')
 <section>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data user</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('users.index')}}">Data user</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data user</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Tambah Data user</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row-container" data-row="1">
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="nama_user">Name</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('nama_user') is-invalid @enderror"
                                value="{{ old('nama_user') }}" name="nama_user" id="nama_user">
            
                            @error('nama_user')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="jenis_kelamin_user">Gender</label>
                        </div>
                        <div class="col-lg-9">
                           <select name="jenis_kelamin_user" id="jenis_kelamin_user"
                                        class="form-control @error('jenis_kelamin_user') is-invalid @enderror">
                                        <option value="">Pilih</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
            
                            @error('nama_user')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="alamat_user">Alamat</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('alamat_user') is-invalid @enderror"
                            value="{{ old('alamat_user') }}" name="alamat_user" id="alamat_user">
        
            
                            @error('alamat_user')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="nomor_hp_user">Nomor HP</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('nomor_hp_user') is-invalid @enderror"
                            value="{{ old('nomor_hp_user') }}" name="nomor_hp_user" id="inputNanme4">
        
            
                            @error('alamat_user')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" name="email" id="inputNanme4">
        
            
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}" name="password" id="inputNanme4">
        
            
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

               
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_user">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_user" id="status_user" 
                            class="form-control @error('status_user') is-invalid @enderror">
                        <option value="">Pilih jenis status</option>
                        <option value="Aktif" @selected(old('status_user', $status_user ?? '') === 'Aktif')>Aktif</option>
                        <option value="Tidak Aktif" @selected(old('status_user', $status_user ?? '') === 'Tidak Aktif')>Tidak Aktif</option>
                    </select>
                    
            
                            @error('status_user')
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