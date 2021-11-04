<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class PagesController extends Controller
{
	public function getHome()
	{
		$product = Product::all();
		$newestProduct = Product::orderBy('created_at', 'desc')->get();
		$random1 = Product::inRandomOrder()->limit(1)->get();
		$random2 = Product::inRandomOrder()->limit(1)->get();
		$random3 = Product::inRandomOrder()->limit(1)->get();
		$result_2cake = Product::inRandomOrder()->limit(2)->get();
		$type = ProductType::where('id', '>', '0')->take(3)->get();

		$type1 = Product::where('id_type', '=' , '1')->limit(4)->get();
		$type2 = Product::where('id_type', '=' , '2')->limit(4)->get();
		$type3 = Product::where('id_type', '=' , '4')->limit(4)->get();

		$all_type = ProductType::all();
		return view('pages.index', compact('product','newestProduct', 'random1', 'random2', 'random3', 'result_2cake', 'all_type', 'type1', 'type2', 'type3'));
	}

	public function getProduct() {
		$all_type = ProductType::all();

		$all = Product::all();
		$num = count($all);
		$product = Product::where('id','>','0')->paginate(8);
		
		$sortproduct = Product::orderBy('price', 'asc')->paginate(8);
		
		return view('pages.product', compact('product', 'all', 'sortproduct', 'num', 'all_type'));
	}

	public function getProductDetail($id){
		$all_type = ProductType::all();

		$product = Product::find($id);
		$sp_tuongtu = Product::where('id_type', $product->id_type)->paginate(4);
		return view('pages.product_detail', compact('all_type', 'product', 'sp_tuongtu') );
	}

	public function postSearch(Request $request){
		$all_type = ProductType::all();

		$keyword = $request->keyword;
		$ketqua = Product::where('name','like',"%$keyword%")->orWhere('price', $keyword)->paginate(8);
		$num = Product::where('name','like',"%$keyword%")->orWhere('price', $keyword)->count();
		return view('pages.search', compact('keyword', 'ketqua', 'num', 'all_type'));
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

	public function getTypeProduct($type) {
		$all_type = ProductType::all();

		$sp_theoloai = Product::where('id_type', $type)->get();
		$num = Product::where('id_type', $type)->count();
		$sp_khac = Product::where('id_type', '<>', $type)->paginate(8);
		$loai = ProductType::all();
		$tenloai = ProductType::where('id', $type)->first();
		return view('pages.type_product', compact('all_type', 'sp_theoloai', 'sp_khac', 'loai', 'tenloai', 'num'));
	}

	

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
