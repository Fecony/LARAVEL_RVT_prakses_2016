<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\inventar;
use App\User;
use Session;
use Auth;
use DB;

class ProductsController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = DB::table('products')->where('amount', '>', 0)->get();

		return view('pages.index')->withProducts($products);
	}

	public function show($id)
	{
		$products = Product::find($id);
		$users = User::all();
		$inventars = DB::table('inventars')->where([
			['product_id','=',$id],
			['status', '=' ,'brivs'],
			])->get();
		return view('pages.show')
			->withProducts($products)
			->withUsers($users)
			->withInventars($inventars);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function create()
	{
		if(Auth::user()->hasRole('teacher'))
		{
			return redirect()->back();
		}else{
			return view('pages.create');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'invoice_nr' => 'required',
			'provider' => 'required',
			'delivered_at' => 'required',
			'product_name' => 'required',
			'amount' => 'required',
			'choices' => 'required'
		]);

		$input = $request->all();

		Product::create($input);

		Session::flash('flash_message', 'Product ir pievienota!');

		return redirect()->back();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$Product = Product::findOrFail($id);
		if(Auth::user()->hasRole('teacher'))
		{
			return redirect()->back();
		}else{
			return view('pages.edit')->withProducts($Product);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, Request $request)
	{
		$products = Product::findOrFail($id);

		$this->validate($request, [
			'delivered_at' => 'required',
			'product_name' => 'required',
			'amount' => 'required',
			'choices' => 'required'
		]);

		$input = $request->all();
		$products->fill($input)->save();

		Session::flash('flash_message', 'Prece redigeta!');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$Product = Product::findOrFail($id);

		$Product->delete();
		Session::flash('flash_message', 'Product ir dzesta!');
		return redirect()->route('products.index');
	}
}
