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

class InventarController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:admin');
	}

	public function create()
	{
		if(Auth::user()->hasRole('teacher')){
			return redirect()->back();
		}else{
			$product = product::all();
			return View('pages.inv.create')->withInventar($product);
		}
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'product_id' => 'required',
			'inventar_nr' => 'required',
			'status' => 'required',
		]);

		$input = $request->all();
		inventar::create($input);
		Session::flash('flash_message', 'Inv.Numurs ir pievienots!');

		return redirect()->back();
	}

	public function update($id, Request $request)
	{

		$this->validate($request, [
			'product_id' => 'required',
			'inventar_nr' => 'required',
			'status' => 'required',
		]);

		$inventar = inventar::findOrFail($id);

		$input = $request->all();
		$inventar->fill($input)->save();
		Session::flash('flash_message', 'Prece ir parcelta!');

		return redirect()->back();
	}

	public function destroy($id)
	{
		$inventars = inventar::findOrFail($id);

		$inventars->delete();
		Session::flash('flash_message', 'Inv.nr ir dzests!');
		return redirect()->back();;
	}
}
