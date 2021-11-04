@extends("layouts.app")

@section("css_header")

@endsection

@section("content")
<div class="container category">
	<h2 align="center" style="margin-top: 20px;">Kết quả tìm kiếm</h2>
	<p align="center">Tìm thấy <?php echo $num; ?> sản phẩm phù hợp</p>

	<div class="row justify-content-center">
	@foreach($ketqua as $row)
	<div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
		<div class="card">
			<div class="box-img">
				<a href="{{url('product', $row->id)}}">
					<img src='img/<?php echo $row["image"]; ?>' class="card-img-top" alt="xa_lach">
				</a>
				<?php if ($row['price_sale'] != 0) : ?>
					<div class="btn-sale">Sale</div>
				<?php endif; ?>
			</div>
			<div class="card-body">
				<a class="card-title" href="{{url('product', $row->id)}}">
					<h5 class="card-title"><?php echo $row['name']; ?></h5>
				</a>
				<?php if ($row['price_sale'] != 0) : ?>
					<p class="card-text" style="text-decoration: line-through; display: inline-block;"> <?php echo $row['price']; ?>VNĐ</p>
					<p class="card-text" style="display: inline-block;"><?php echo $row['price_sale']; ?> VNĐ</p>
				<?php else : ?>
					<p class="card-text"><?php echo $row['price']; ?> VNĐ</p>
				<?php endif; ?>
				<div style="padding-top: 10px;">
					<a class="btn btn-success add_to_cart" href="cart.php?id=<?php echo $row['id']; ?>">Thêm vào giỏ hàng</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach	
	</div>
	<div align="center">{{ $ketqua->links('pagination::bootstrap-4') }}</div>
</div>
@endsection

@section("script")

@endsection