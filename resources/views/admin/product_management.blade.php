@extends('admin.layout')

@section('content')
<div class="w-100 m-5">
    <div class="d-flex">
        <div>
            <h2>Manajemen Produk</h2>
        </div>
        <div class="ms-auto">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                TAMBAH Produk
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">Tambah Produk</h1>
                      <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama" name="name">
                              </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga" name="price">
                              </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Gambar</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Gambar" name="image">
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
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                    <td>
                        @if ($product->status == 1)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn badge bg-success text-bg-success" data-bs-toggle="modal" data-bs-target="{{ '#lihat' . $product->id }}">
                            <i class="bi bi-eye"></i>
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="{{ 'lihat' . $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Produk</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div>
                                    Nama : {{ $product->name }}
                                  </div>
                                  <div>
                                    Harga : {{ $product->price }}
                                  </div> 
                                  <div>
                                    Gambar : {{ $product->image }}
                                  </div> 
                                  <div>
                                    Status : {{ $product->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                  </div> 
                                  
                                </div>
                              </div>
                            </div>
                          </div>



                        <!-- Button trigger modal -->
                        <button type="button" class="btn badge bg-warning text-bg-warning" data-bs-toggle="modal" data-bs-target="{{ '#edit' . $product->id }}">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="{{ 'edit' . $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama" name="name" value="{{ $product->name }}">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga" name="price" value="{{ $product->price }}">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Gambar</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Gambar" name="image" value="{{ $product->image }}">
                                          </div>
                                          <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" @if($product->status == 1) checked @endif value="1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  Aktif
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" @if($product->status != 1) checked @endif value="0">
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