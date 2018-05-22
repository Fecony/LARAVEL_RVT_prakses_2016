<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Role_user;
use App\inventar;
use App\Product;
use App\User;
use App\Role;
use Session;
use Auth;
use DB;


class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:admin');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::all();

		return view('pages.users.index')->withUsers($users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if(Auth::user()->hasRole('teacher')){
			return redirect()->back();
		}else{
			return view('pages.users.create');
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
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
		]);

		$create = User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => bcrypt($request['password']),
		]);

		$user = User::find($create->id);
		$role = Role::where('name', '=', 'teacher')->firstOrFail();
		$user->roles()->attach($role->id);

		Session::flash('flash_message', 'Lietotajs ir pievienots!');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$users = User::find($id);
		$inventars = inventar::where('user_id', '=', $id)->get();
		$products = Product::all();

		$previous = User::where('id', '<', $users->id)->max('id');
		$next = User::where('id', '>', $users->id)->min('id');

		return view('pages.users.show')->with('previous', $previous)->with('next', $next)
			->withUsers($users)
			->withProducts($products)
			->withInventars($inventars);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$users = User::findOrFail($id);
		$roles = Role::all();
		if(Auth::user()->hasRole('teacher')){
			return redirect()->back();
		}else{
			return view('pages.users.edit')
				->withUsers($users)
				->withRoles($roles);;
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// save lietotaja izmainas
		$user = User::findOrFail($id);
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		if(count($request->get('password')) == 60)
			$user->password = $request->get('password');
		else
			$user->password = bcrypt($request->get('password'));
		$user->save();

		// nonemt un pievienot tiesibas
		$user->detachAllRoles();
		$role = Role::where('id', '=', $request->role)->firstOrFail();
		$user->roles()->attach($role->id);

		// success message
		Session::flash('flash_message', 'Profils redigets!');
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
		$user = User::findOrFail($id);
		$inventars = inventar::where('user_id', '=', $id)->get();
		foreach($inventars as $inventar){
			$inventar->user_id = NULL;
			$inventar->status = 'brivs';

			$inventar->save();
		}

		$user->delete();
		Session::flash('flash_message', 'Lietotajs ir dzests!');
		return redirect()->route('users.index');
	}
}
