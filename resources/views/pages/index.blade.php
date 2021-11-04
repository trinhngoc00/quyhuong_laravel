@extends("layouts.app")

@section("css_header")

@endsection

@section("content")
<div class="container" style="padding-top: 20px;">
	<div class="row">
		<div class="col-md-8 col-12" style="">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						@foreach ($random1 as $row)
						<a href="{{url('product', $row->id)}}"><img src="img/<?php echo $row['image'] ?>" class="d-block " alt="brand_img1"></a>
						<div class="carousel-caption d-none d-md-block">
							<h5><?php echo $row['name'] ?></h5>
							<p><?php echo $row['price'] ?> VND</p>
						</div>
						@endforeach
					</div>
					<div class="carousel-item">
						@foreach ($random2 as $row)
						<a href="{{url('product', $row->id)}}"><img src="img/<?php echo $row['image'] ?>" class="d-block " alt="brand_img1"></a>
						<div class="carousel-caption d-none d-md-block">
							<h5><?php echo $row['name'] ?></h5>
							<p><?php echo $row['price'] ?> VND</p>
						</div>
						@endforeach
					</div>
					<div class="carousel-item">
						@foreach ($random3 as $row)
						<a href="{{url('product', $row->id)}}"><img src="img/<?php echo $row['image'] ?>" class="d-block " alt="brand_img1"></a>
						<div class="carousel-caption d-none d-md-block">
							<h5><?php echo $row['name'] ?></h5>
							<p><?php echo $row['price'] ?> VND</p>
						</div>
						@endforeach
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-12 img_right">
			@foreach ($result_2cake as $row)
			<div style="padding-bottom: 10px;">
				<a href="{{url('product', $row->id)}}" style="display: block;">
					<img src="img/<?php echo $row['image'] ?>" class="w-100">
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div id="new_good">
	<h3 align="center" style="color: #f1e749;margin-bottom: 20px;">Bánh sinh nhật</h3>
	<div class="container" align="center">
		<div class="owl-carousel owl-theme owl-loaded">
			<div class="owl-stage-outer">
				<div class="owl-stage">
					@foreach ($product as $row)
					<div class="owl-item">
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
			</div>
		</div>
		<div align="right">
			<a href="{{ url('typeProduct/1') }}" class="see-more white">Xem thêm >> </a>
		</div>
	</div>

</div>

<div class="container two-deal">
	<div class="row">
		<div class="col-md-6 col-12">
			<a href="#">
				<img alt='imgdemo' src="img/ngot7.jpg" class="w-100 border-radius-2">
			</a>
		</div>
		<div class="col-md-6 col-12">
			<a href="#">
				<img alt='imgdemo' src="img/ngot10.jpg" class="w-100 border-radius-2">
			</a>
		</div>
	</div>
</div>

<div class="container category">
<h3 align="center" style="margin-bottom: 20px;">Bánh ngọt</h3>
	<div class="row justify-content-center" id="card_box">
	
		@foreach ($type1 as $row)
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
		@endforeach
		
	</div>
	<div align="right">
			<a href="{{ url('typeProduct/1') }}" class="see-more">Xem thêm >> </a>
		</div>
	<br>
</div>

<div class="container category">
<h3 align="center" style="margin-bottom: 20px;">Bánh sinh nhật trẻ em</h3>
	<div class="row justify-content-center" id="card_box">
	
		@foreach ($type2 as $row)
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
		@endforeach
		
	</div>
	<div align="right">
			<a href="{{ url('typeProduct/2') }}" class="see-more">Xem thêm >> </a>
		</div>
	<br>
</div>

<div class="container category">
<h3 align="center" style="margin-bottom: 20px;">Socola</h3>
	<div class="row justify-content-center" id="card_box">
	
		@foreach ($type3 as $row)
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
		@endforeach
		
	</div>
	<div align="right">
			<a href="{{ url('typeProduct/4') }}" class="see-more">Xem thêm >> </a>
		</div>
	<br>
</div>

@endsection

@section("script")

@endsection