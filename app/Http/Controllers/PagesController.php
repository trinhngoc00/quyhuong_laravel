<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class PagesController extends Controller
{
    public function getHome() {
		$product = Product::all();
		$newestProduct = Product::orderBy('created_at', 'desc')->get();
        $random1 = Product::inRandomOrder()->limit(1)->get();
        $random2 = Product::inRandomOrder()->limit(1)->get();
        $random3 = Product::inRandomOrder()->limit(1)->get();
        $result_2cake = Product::inRandomOrder()->limit(2)->get();
		$type = ProductType::where('id','>','0')->take(3)->get();
		//$handbook = Handbook::where('id','>','0')->take(3)->get();
		return view('pages.index', compact('product','newestProduct', 'random1', 'random2', 'random3', 'result_2cake'));
	}

	public function getProduct() {
		$all = Product::all();
		$num = count($all);
		$product = Product::where('id','>','0')->paginate(8);
		
		$sortproduct = Product::orderBy('price', 'asc')->paginate(8);
		return view('pages.product', compact('product', 'all', 'sortproduct', 'num'));
	}

	public function getProductDetail($id){
		$product = Product::find($id);
		$sp_tuongtu = Product::where('id_type', $product->id_type)->paginate(4);
		return view('pages.product_detail', ['product' => $product], ['sp_tuongtu' => $sp_tuongtu]);
	}

	public function postSearch(Request $request){
		$keyword = $request->keyword;
		$ketqua = Product::where('name','like',"%$keyword%")->orWhere('price', $keyword)->paginate(4);
		return view('pages.search', ['keyword' => $keyword, 'ketqua' => $ketqua]);
	}
	public function postLogin(Request $request){
		$username = $request->username;
		return view('pages.home',['username' => $username]);
	}

	// public function getShoppingcart() {
	// 	$product = ShoppingCart::all();
	// 	return view('pages.shopping-cart');
	// }

	// public function getVegetable() {
	// 	$product = Vegetable::where('id','>','0')->paginate(4);
	// 	return view('pages.vegetable', ['product' => $product]);
	// }

	// public function getMeat() {
	// 	$all = Product::where('type',"meat")->get();
	// 	$product = Product::where('type',"meat")->paginate(4);
	// 	// dd(count($product));
	// 	return view('pages.meat', ['product' => $product], ['all' => $all]);
	// }

	// public function getLoaiSp($type) {
	// 	$sp_theoloai = Product::where('id_type', $type)->get();
	// 	$sp_khac = Product::where('id_type', '<>', $type)->paginate(8);
	// 	$loai = ProductType::all();
	// 	$tenloai = ProductType::where('id', $type)->first();
	// 	return view('pages.loai-san-pham', compact('sp_theoloai', 'sp_khac', 'loai', 'tenloai'));
	// }

	

	// public function getHandbook(){
	// 	$handbook = Handbook::where('id','>','0')->paginate(5);
	// 	return view('pages.handbook',['handbook' => $handbook]);
	// }
	// public function postSearch(Request $request){
	// 	$keyword = $request->keyword;
	// 	$ketqua = Product::where('name','like',"%$keyword%")->orWhere('price', $keyword)->paginate(4);
	// 	return view('pages.search', ['keyword' => $keyword, 'ketqua' => $ketqua]);
	// }
	// public function postLogin(Request $request){
	// 	$username = $request->username;
	// 	return view('pages.home',['username' => $username]);
	// }
	// public function postPrice(Request $req) {
	// 	$sortproduct = Product::orderBy('price', 'asc')->paginate(8);
	// 	return view('pages.list-product', compact('sortproduct'));
	// }
}
