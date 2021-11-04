@extends("layouts.app")

@section("css_header")

@endsection

@section("content")
<div class="container" id="product" style="margin-top: 40px;">
	<div class="row">
		<div class="col-12 row_box">
			<div class="card mb-3">
				<div class="row no-gutters">
					 
						<div class="col-sm-6">
							<img src="img/{{ $product->image }}" class="card-img" alt="ca_hoi">
						</div>
						<div class="col-sm-6">
							<div class="card-body">
								<h4 class="card-title">{{ $product->name }}</h4>
								<p class="card-text">Mã sản phẩm: {{ $product->id }}</p>

								<p class="card-text">Số lượng: {{ $product->amount }}</p>
								@if( $product->amount == 0)
									<p class="card-text">Sản phẩm cần đặt trước.</p>
								@endif

								@if ( $product->price_sale != 0)
									<p class="card-text alert alert-success" style="display: inline-block; ">
										<span style="text-decoration: line-through;">
										{{ $product->price}}VNĐ
										</span>
										{{ $product->price_sale }} VNĐ
									</p>
								@else
									<p class="card-text alert alert-success">{{ $product->price }} VNĐ</p>
								@endif
								<br>
								<p class="card-text card-text-box">
									<span style="font-weight: bold;">Mô tả:</span> <br>
									{{ $product->description }}
								</p>
								<br>
								<button class="btn btn-success">THÊM VÀO GIỎ HÀNG</button>

							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section("script")

@endsection