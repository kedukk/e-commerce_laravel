<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart | MakeUpBeauty</title>
<link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset ('assets/User/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset ('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset ('assets/User/styles/cart.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset ('assets/User/styles/cart_responsive.css')}}">
</head>
<body>

<div class="super_container">

    @extends('layouts.navbar')
@php
	$total = 0;
@endphp    
<!-- Home -->
<div class="home">
    <div class="home_container">
        <div class="home_background" style="background-image:url(assets/User/images/cart.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                	<div class="home_title" style="font-size: 30px; color:#e95a5a;">{{ Auth::user()->name }}'s Cart</div>
                                    <li><a href="/" style="font-size: 25px">Home</a></li>
                                    <li><a style="font-size: 25px">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<!-- Cart Info -->
	<div class="cart_info ganti">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Product</div>
						<div class="cart_info_col cart_info_col_price">Price</div>
						<div class="cart_info_col cart_info_col_quantity">Quantity</div>
						<div class="cart_info_col cart_info_col_total">Sub-Total</div>
					</div>
				</div>
			</div>
			@forelse ($cart as $isi)
			<div class="row cart_items_row">
				<div class="col">
					<!-- Cart Item -->
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<input type="hidden" class="id_cart{{$loop->iteration-1}}" value="{{$isi->id}}">
                  			<input type="hidden" id="user_id" value="{{$isi->user_id}}">
                  			<input type="hidden" class="stock{{$loop->iteration-1}}" value="{{$isi->product->stock}}">
							@foreach ($isi->product->product_image as $image)
							<div class="cart_item_image">
								<div><img src="/uploads/product_images/{{$image->image_name}}" alt=""></div>
							</div>
							@break
							@endforeach
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="/product/{{$image->product_id}}">{{$isi->product->product_name}}</a></div>
								<p style="color:black;">{{$isi->product->stock}} left</p>
							</div>
						</div>
						<!-- Price -->
						@php
                    		$home = new Home;
                    		$harga = $home->diskon($isi->product->discount,$isi->product->price);
						@endphp
						@if ($harga != 0)
						<div class="cart_item_price">
							Rp.<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$harga}}</li>
							Rp.<span class="float-lef grey-text"><small><s>{{$isi->product->price}}</s></small></span>
						</div>
						@else
							<div class="cart_item_price">
								Rp.<span class="float-lef grey-text price{{$loop->iteration-1}}">{{$isi->product->price}}</li>
							</div>
						@endif
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<p class="text-danger" style="display:none" id="notif{{$loop->iteration-1}}"></p>
							<span class="qty{{$loop->iteration-1}}">{{$isi->qty}} </span>
							<div class="btn-group radio-group ml-2" data-toggle="buttons">
								<button type="button" class="fa fa-minus btn btn-sm btn-secondary tombol-kurang" data-toggle="tooltip" data-placement="top" title="Kurangi item">
			
								<button type="button" class="fa fa-plus btn btn-sm btn-primary tombol-tambah" data-toggle="tooltip" data-placement="top" title="Tambah item">

								<button type="button" class="fa fa-trash btn btn-sm btn-danger tombolhapus" data-toggle="tooltip" data-placement="top" title="Hapus item">
							</div>
						</div>
						<!-- Total -->
						@if ($harga != 0)
                        	<strong class="cart_item_total sub-total{{$loop->iteration-1}}">{{$harga*$isi->qty}}</strong>
                        	@php
                            	$total = $total + ($harga*$isi->qty);
                        	@endphp
                    	@else
                        	<strong class="cart_item_total sub-total{{$loop->iteration-1}}">{{$isi->product->price*$isi->qty}}</strong>
                        	@php
                            	$total = $total + ($isi->product->price*$isi->qty);
                        	@endphp
                    	@endif
					</div>

				</div>
			</div>
			@empty
				<br><br><br><p class="fa fa-shopping-cart" style="font-size:50px;margin-left:495px;" align="center"><br><br>Cart Kosong!</p>
			@endforelse

			
			<div class="row row_cart_buttons">
				<div class="col">
					<br><br>
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="/home">Continue shopping</a></div>
					</div>
				</div>
			</div><br>
				@if ($total != 0)
				<div class="row row_extra">
					<div class="col-lg-4"></div>
					<div class="col-lg-6 offset-lg-2">
						<div class="cart_total">
							<div class="section_title">Cart total</div>
							<div class="section_subtitle">Final info</div>
							<div class="cart_total_container">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Total</div>
										<div class="cart_total_value ml-auto total">{{$total}}</div>
									</li>
								</ul>
							</div>
							<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
							<br>
		                <div align="center">
		                  <form action="/checkout" method="POST">
		                		@csrf
		                    	<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
		                    	<input type="hidden" name="sub_total" value="{{$total}}">
	                    	
		                    	
								
	                			<button type="submit" class="btn btn-dark">Complete purchase
								<i class="fa fa-angle-right right"></i></button>
		                  </form>
		                </div>

						</div>
					</div>
				</div>
				@else
				<div></div>
				@endif
		</div>		
	</div>
</div>

<script src="{{ asset ('assets/User/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset ('assets/User/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset ('assets/User/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/easing/easing.js')}}"></script>
<script src="{{ asset ('assets/User/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{ asset ('assets/User/js/cart.js')}}"></script>
<script>
	jQuery(document).ready(function(e){
		jQuery('.tombol-tambah').click(function(e){
		  var index = $(".tombol-tambah").index(this);
		  var jumlah = $(".qty"+index).text();
		  var jumlah = parseInt(jumlah)+1
		  $(".qty"+index).text(jumlah);
		  var price = $('.price'+index).text();
		  console.log('price: '+price);
  
		  if(parseInt(jumlah) > parseInt($(".stock"+index).val())){
			  $("#notif"+index).css('display','inline');
			  $("#notif"+index).text('Jumlah pembelian melebihi stock produk');
			  $("#notif"+index).append('<br>');
			  $(".qty"+index).text(jumlah-1);
		  }else{
			var subtotal = parseInt(jumlah)*parseInt(price);
			console.log('subtotal: ', + subtotal)
			$(".sub-total"+index).text(subtotal);
			var total = parseInt($(".total").text());
			total = total + parseInt(price);
			$(".total").text(total);
			$("#notif"+index).css('display','none');
  
			jQuery.ajax({
				url: "{{url('/update_qty')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					qty: 1
				},
				success: function(result){
					console.log(result.success);
				}
			});
		  }
		});
  
		jQuery('.tombol-kurang').click(function(e){
		  var index = $(".tombol-kurang").index(this);
		  var jumlah = $(".qty"+index).text();
		  var jumlah = parseInt(jumlah)-1
		  $(".qty"+index).text(jumlah);
		  var price = $('.price'+index).text();
		  console.log('price: '+price);
  
		  if(parseInt(jumlah) == 0){
			  $("#notif"+index).css('display','inline');
			  $("#notif"+index).text('Stock tidak boleh kosong');
			  $("#notif"+index).append('<br>');
			  $(".qty"+index).text(1);
		  }else{
			var subtotal = parseInt(jumlah)*parseInt(price);
			console.log('subtotal: ', + subtotal)
			$(".sub-total"+index).text(subtotal);   
			var total = parseInt($(".total").text());
			total = total - parseInt(price);
			$(".total").text(total);
			$("#notif"+index).css('display','none');
			jQuery.ajax({
				url: "{{url('/update_qty')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					qty: -1
				},
				success: function(result){
					console.log(result.success);
				}
			});
		  }
		});
  
		jQuery('.tombolhapus').click(function(e){
		  var index = $(".tombolhapus").index(this);
		 var konfirmasi = confirm('Apakah anda yakin ingin menghapus produk dari keranjang?');
		  if(konfirmasi == true){
			jQuery.ajax({
				url: "{{url('/update_qty')}}",
				method: 'post',
				data: {
					_token: $('#signup-token').val(),
					id: $('.id_cart'+index).val(),
					user_id: $('#user_id').val(),
					qty: 0
				},
				success: function(result){
					location.reload();
					// console.log(result.success);
				}
			});
		  }
		});
	});
  </script>
</body>
</html>