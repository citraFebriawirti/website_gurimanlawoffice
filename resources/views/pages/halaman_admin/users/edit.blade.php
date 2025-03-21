@extends('layouts.admin.layouts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data user</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{route('users.index')}}">Data user</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data user</li>
      </ol>
    </div>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">Kembali</a>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primaryy">Edit Data user</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $dataById->id_user) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            
                <div class="row-container" data-row="1">
                    <!-- Input Title -->
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="nama_user">Name</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('nama_user') is-invalid @enderror"
                                value="{{ old('nama_user', $dataById->nama_user) }}" name="nama_user"
                                id="nama_user">
            
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
                            <option value="Laki-Laki" @selected($dataById->jenis_kelamin_user == 'Laki-Laki')>Laki-Laki</option>
                            <option value="Perempuan" @selected($dataById->jenis_kelamin_user == 'Perempuan')>Perempuan</option>
                        </select>
            
                            @error('position_user')
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
                            value="{{ old('alamat_user') ?? $dataById->alamat_user }}" name="alamat_user"
                            id="inputNanme4">
            
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
                            value="{{ old('nomor_hp_user') ?? $dataById->nomor_hp_user }}" name="nomor_hp_user"
                            id="inputNanme4">
            
                            @error('nomor_hp_user')
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
                            value="{{ old('email') ?? $dataById->email }}" name="email" id="inputNanme4">
            
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="text-danger">{{ $message }}</i>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="password">Password Baru</label>
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

             


                      <!-- Input Status -->
                      <div class="row mt-4">
                        <div class="col-lg-2">
                            <label for="status_user">Status</label>
                        </div>
                        <div class="col-lg-9">
                            <select name="status_user" id="status_user"
                            class="form-control" @error('status_user') is-invalid bg-danger @enderror>
                                <option value="">pilih jenis status</option>
                                <option value="Aktif" @selected($dataById->status_user === 'Aktif')>Aktif</option>
                                <option value="Tidak Aktif" @selected($dataById->status_user === 'Tidak Aktif')>Tidak Aktif</option>
                            </select>


            
                            @error('status_user')
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