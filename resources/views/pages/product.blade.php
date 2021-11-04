@extends("layouts.app")

@section("css_header")

@endsection

@section("content")
<div class="container category">
	<h2 style="text-align: center;">Tất cả sản phẩm</h2>
	<p style="text-align: center;">Hiển thị <?php echo $num; ?> sản phẩm</p>
	<div class="row justify-content-center" id="card_box">

		<?php foreach ($product as $row) : ?>
			<form method="post" action="{{url('product', $row->id)}}" class="col-lg-3 col-md-4 col-sm-6 col-12 ">
				<div class="card">
					<input type="text" name="id_pr" hidden="true" value="<?php echo $row['id']; ?>">
					<div class="box-img">
						<a href="{{url('product', $row->id)}}">
							<img src="img/<?php echo $row['image']; ?>" class="card-img-top" alt="xa_lach">
						</a>
						<?php if ($row['price_sale'] != 0) : ?>
							<div class="btn-sale">Sale</div>
						<?php endif; ?>
					</div>

					<div class="card-body">
						<a href="{{url('product', $row->id)}}" class="card-name">
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
			</form>
		<?php endforeach; ?>
		
	</div>
	<div align="center">{{ $product->links('pagination::bootstrap-4') }}</div>
	
	
	<br>
</div>
@endsection

@section("script")

@endsection