@extends('admin.layout')

@section('content')
<div class="w-100 m-5">
    <div class="d-flex">
        <div>
            <h2>Manajemen User</h2>
        </div>
        <div class="ms-auto">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                TAMBAH USER
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">Tambah User</h1>
                      <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama" name="name">
                          </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nomor Telepon" name="telp">
                          </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email" name="email">
                          </div>

                          <div>
                            <button type="submit" class="w-100 bg-primary text-white border-0 rounded">
                                SIMPAN
                            </button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">No. Telepon</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->user->name }}</td>
                    <td>{{ $customer->user->email }}</td>
                    <td>{{ $customer->telp }}</td>
                    <td>
                        @if ($customer->status == 1)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn badge bg-success text-bg-success" data-bs-toggle="modal" data-bs-target="{{ '#lihat' . $customer->id }}">
                            <i class="bi bi-eye"></i>
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="{{ 'lihat' . $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat User</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div>
                                    Nama : {{ $customer->user->name }}
                                  </div>
                                  <div>
                                    Email : {{ $customer->user->email }}
                                  </div> 
                                  <div>
                                    No. Telepon : {{ $customer->telp }}
                                  </div> 
                                  <div>
                                    Status : {{ $customer->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                  </div> 
                                  
                                </div>
                              </div>
                            </div>
                          </div>



                        <!-- Button trigger modal -->
                        <button type="button" class="btn badge bg-warning text-bg-warning" data-bs-toggle="modal" data-bs-target="{{ '#edit' . $customer->id }}">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="{{ 'edit' . $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user.update', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama" name="name" value="{{ $customer->user->name }}">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nomor Telepon" name="telp" value="{{ $customer->telp }}">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Email" name="email" value="{{ $customer->user->email }}">
                                          </div>
                                          <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" @if($customer->status == 1) checked @endif value="1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  Aktif
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" @if($customer->status != 1) checked @endif value="0">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                  Tidak Aktif
                                                </label>
                                              </div>
                                          </div>

                
                                          <div>
                                            <button type="submit" class="w-100 bg-primary text-white border-0 rounded">
                                                SIMPAN
                                            </button>
                                          </div>
                                        </form>
                                </div>
                              </div>
                            </div>
                          </div>                    
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection