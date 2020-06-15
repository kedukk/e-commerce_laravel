@extends('layouts.transaksi')
@section('content')
     <!-- Main Layout -->
  <main>
    <div style="margin-top:120px;">

      <!-- Grid row -->
      <div class="row" style="margin-top: -140px;">

        <!-- Grid column -->
        <div class="col-md-12">

            <div class="card-body">

                <!-- Section: Contact v.3 -->
                <section class="contact-section my-5">
                  <!-- Form with header -->
                  <div class="card">

                    <!-- Grid row -->
                    <div class="row">

                      <!-- Grid column -->
                      <div class="col-lg-8">

                        <div class="card-body form">

                          <!-- Header -->
                          <h3 class="mt-4">Detail Transaksi</h3>
                          <br>
                          <!-- Grid row -->
                          <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-name" class="">Nama Penerima</label>
                                <input type="text" id="nama" class="form-control" value="{{$transaksi->user->name}}" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-email" class="">Email</label>
                                <input type="email" id="email" class="form-control" value="{{$transaksi->user->email}}" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                          </div>
                          <!-- Grid row -->

                          <!-- Grid row -->
                          <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-phone" class="">Nomor Telepon</label>
                                <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->telp}}" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-province" class="">Provinsi</label>
                                <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->province}}" disabled>
                              </div>

                            </div>
                            <div class="col-md-12">

                                <div class="md-form mb-0">
                                    <label for="form-regecy" class="">Kota</label>    
                                    <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->regency}}" disabled>
                                </div>
  
                            </div>
                            <div class="col-md-12">

                                <div class="md-form mb-0">
                                    <label for="form-contact-company" class="">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" value="{{$transaksi->address}}" disabled>
                                </div>
  
                            </div>
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="form-contact-company" class="">Kurir</label>
                                  <input type="text" id="alamat" class="form-control" value="{{$transaksi->courier->courier}}" disabled>
  
                                </div>
                            </div>

                            <!-- Grid column -->

                          </div>
                          <!-- Grid row -->

                          <!-- Grid row -->


                        </div>

                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col-lg-4">

                        <div class="card-body">
                          
                          <br>
                          <label>Summary</label>
                          <ul>

                            <li>
                              <h5>Status : 
                                @if ($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment))
                                <span class="label label-warning">
                                    Menunggu Verifikasi</span>
                                @elseif ($transaksi->status == "unverified")
                                <span class="label label-warning">
                                    unverified</span>
                                @elseif ($transaksi->status == "delivered")
                                <span class="label label-primary">
                                    Sedang dikirim</span>
                                @elseif ($transaksi->status == "canceled")
                                <span class="label label-danger">
                                    canceled</span>
                                @else
                                <span class="label label-success">
                                {{$transaksi->status}}</span>
                                @endif
                              </h5>
                            </li>
                            <li>
                                <h5>Sub Biaya : Rp. {{number_format($transaksi->sub_total)}}</h5>
                            </li>
                            <li>
                                <h5 id="biaya-ongkir">Biaya Pengiriman : Rp. {{number_format($transaksi->shipping_cost)}}</h5>
                            </li>
                            <li>
                                <h5>Total Biaya : Rp. {{number_format($transaksi->total)}}</h5>
                            </li>
                            <li>
                            <h5>Bukti Pembayaran: 
                                @if (is_null($transaksi->proof_of_payment))
                                <span class="label label-warning">Belum Diupload</span>
                                @else
                                <span class="label label-success">Sudah Diupload</span>
                                @endif
                            </h5>
                          </li>
                            <br>
                            
                                    @if ($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment))
                                        <br>
                                        <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/admin/transaksi/detail/status" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{$transaksi->id}}">
                                              <input type="hidden" name="status" value="3">
                                              <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin untuk verifikasi pesanan ini?')">Verify</button>
                                            </form>
                                        </div>  
                                    @endif

                                    @if ($transaksi->status === 'verified')
                                            <div style="margin-top:10px;">
                                            <form action="/admin/transaksi/detail/status" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$transaksi->id}}">
                                                <input type="hidden" name="status" value="4">
                                                <button type="submit" class="btn btn-success btn-sm">Deliver Products</button>
                                            </form>
                                        </div>  
                                    @endif
                                    
                                        @if (is_null($transaksi->proof_of_payment))
                                       
                                        @else
                                            <div style="margin-top:10px;">
                                                <button id="tombol" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalContactForm">Proof Of Payment</button>
                                            </div>
                                        @endif

                                        <div style="margin-top:10px;">
                                          <a href="/admin/transaksi"><button class="btn btn-warning btn-rounded">Back</button></a>
                                        </div>

                          </ul>
                        </div>
                      </div>
                      <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                  </div>
                  <!-- Form with header -->
                </section>
                <!-- Section: Contact v.3 -->

              </div>
              <!-- Main Layout -->
      <!-- Main Container -->
      
      <div class="card-body">
      <div style="width:1000px;" class="container">
  
          <!-- Shopping Cart table -->
          <div class="table-responsive">

                      <!-- Grid column -->
                      <div class="col-lg-12">

                        <div class="card-body form">
            <h1 align="center">Rincian Produk</h1>
            <br>
            <table class="table">
  
              <!-- Table head -->
              <thead>
  
                <tr>
  
                  <th></th>
  
                  <th class="font-weight-bold">
  
                    <strong>Product</strong>
  
                  </th>
  
                  <th></th>

                  <th class="font-weight-bold">
                    <strong>Diskon</strong>
                  </th>
  
                  <th class="font-weight-bold">
  
                    <strong>Price</strong>
  
                  </th>

  
                  <th class="font-weight-bold">
  
                    <strong>QTY</strong>
  
                  </th>  

                </tr>
  
              </thead>
              <!-- Table head -->
  
              <!-- Table body -->
              <tbody>
  
                <!-- First row -->
                @foreach ($transaksi->transaction_detail as $item)
                    
                
                <tr>
  
                  <th scope="row">
                      @foreach ($item->product->product_image as $image)
                      
                          <img style="width:100px;height:100px;" src="{{asset('/uploads/product_images/'.$image->image_name)}}" alt=""class="img-fluid z-depth-0">
                          @break
                      @endforeach
                  </th>
  
                  <td>
                    <h5 class="mt-3">
                      <input type="hidden" name="id" id="product_id{{$loop->iteration-1}}" value="{{$item->product->id}}">
                      <strong>{{$item->product->product_name}}</strong>
                    </h5>
                  </td>
                  <td></td>
                  <td>{{$item->discount}}%</td>
                  <td>Rp. {{number_format($item->selling_price)}}</td>
                  <td class="text-center text-md-left">
  
                    <span>{{$item->qty}} </span>
  
                  </td>

                </tr>
                @endforeach
  
              </tbody>
              <!-- Table body -->
  
            </table>
  
          </div>
          <!-- Shopping Cart table -->
  
        </section>
        
      </div>
      <!-- Main Container -->
      <div class="modal" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div class="modal-content">
      
          <!-- Header -->
          <div class="modal-header light-blue darken-3 white-text">
            <h4>Bukti Pembayaran</h4>
          </div>
      
          <!-- Body -->
          <div class="modal-body mb-0">
            <div align="center" class="d-flex justify-content-center">
                <img style="width:300px;height:300px;" src="{{url('proof_payment/'.$transaksi->proof_of_payment)}}"  id="output_image" onload="preview_image(event)" class="mb-2 mw-50 w-50 h-50 rounded">
              </div>
          </div>
        </div>
        <!-- Content -->
      </div>
      </div>

            </div>

          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>

  </main>
  
@endsection
