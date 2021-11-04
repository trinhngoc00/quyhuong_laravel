<!DOCTYPE html>
<html lang="{{App::getLocale()}}">

<head>
	@include("layouts.head")

	@yield("css_header")

	@yield("js_header")
</head>

<body class="nav-md">
    @include("layouts.header")

    @yield("content")

    @include("layouts.footer")

    @include("layouts.scripts")

    @yield("script")

</body>

</html>
