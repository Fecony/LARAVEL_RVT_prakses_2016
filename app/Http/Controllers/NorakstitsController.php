<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Norakstits;
use App\inventar;
use App\Product;
use App\User;
use Session;
use Auth;
use DB;

class NorakstitsController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:admin');
	}

	public function index()
	{
		$norakstits = Norakstits::all();
		return view('pages.norakstits.index')->withNorakstits($norakstits);
	}

	public function create()
	{
		//
	}

	public function update($id, Request $request)
	{
		$norakstits = Norakstits::all();
		$this->validate($request, [
			'product_name' => 'required',
			'amount' => 'required',
			'choices' => 'required'
		]);

		$input = $request->all();
		Norakstits::create($input);

		$products = Product::where('id', $id)->update(array('amount' => 0));
		Session::flash('flash_message', 'Prece norakstita!');
		return redirect()->back();
	}

	public function edit($id)
	{

	}

	public function store(Request $request)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
