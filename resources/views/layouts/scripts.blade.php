<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{ asset('OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('jquery-mousewheel-master/jquery.mousewheel.min.js') }}"></script>

<script src="{{ asset('script/carousel.js') }}"></script>

<script src="{{ asset('script/jquery.js') }}"></script>
<!-- <script src="promise.js"></script> -->


<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


<script type="text/javascript">
	function AddCart(id) {
		$.ajax({
			url: 'AddCart/'+id,
			type: 'GET',
		}).done(function(response){
			$("#change-item-cart").empty();
			$("#change-item-cart").html(response);
			console.log(response);
			alertify.success('Đã thêm hàng thành công.');
		});
		console.log(id);
	}
</script>