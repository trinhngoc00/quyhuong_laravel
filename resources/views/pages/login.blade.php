@extends("layouts.app")

@section("css_header")

@endsection

@section("content")
	<div class="container">
		<h2 align="center" style="margin-top: 20px;">Đăng nhập tài khoản</h2>
		<div class="formLogin">
			<form method="post" action="{{ url('/login') }}">
			{{ csrf_field() }}
				<table class="" border="0" cellpadding="0" cellspacing="0" style="margin: auto;">
					<tr>
						<td><label>Tên đăng nhập:</label></td>
						<td><input class="input_info" id="user" type="text" name="username" value="admin"></td>
					</tr>
					<tr>
						<td><label>Mật khẩu:</label></td>
						<td><input class="input_info" type="password" name="password" id="pass" value="admin"></td>
					</tr>
					<tr>
						<td colspan="2"><button class="input_btn" type="submit" id="btn">Đăng nhập</button></td>
					</tr>
				</table>
			</form>

			@if ( Session::has('error') )
					<div class="alert alert-danger alert-dismissible" role="alert">
						<strong>{{ Session::get('error') }}</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
					</div>
					@endif
		</div>

	</div>
	@endsection

@section("script")
<script type="text/javascript">
		function checkInput() {
			var get_user = document.getElementById("user").value;
			var get_pass = document.getElementById("pass").value;

			if (get_user=="" || get_pass=="") {
				document.getElementById("mess").innerHTML = "Tên đăng nhập và mật khẩu không thể trống.";
			}
			else{
				<?php echo "hiiiii";?>
			}
		}
	</script>
@endsection
	
