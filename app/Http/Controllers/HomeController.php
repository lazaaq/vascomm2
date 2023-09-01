<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\rs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $search = null;
        if($request->search) {
            $products = Product::where('name', 'like', '%'.$request->search.'%')->get();            
            $search = $request->search;
        }
        return view('welcome', compact('products', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rs  $rs
     * @return \Illuminate\Http\Response
     */
    public function show(rs $rs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rs  $rs
     * @return \Illuminate\Http\Response
     */
    public function edit(rs $rs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rs  $rs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rs $rs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rs  $rs
     * @return \Illuminate\Http\Response
     */
    public function destroy(rs $rs)
    {
        //
    }

    public function admin_login() {
        return view('admin.login');
    }

    public function admin_dashboard() {
        $users = Customer::all();
        $usersCount = $users->count();
        $usersActiveCount = $users->where('status', '1')->count();
        $products = Product::all();
        $productsCount = $products->count();
        $productsActiveCount = $products->where('status', '1')->count();

        return view('admin.dashboard', compact('usersCount', 'usersActiveCount', 'productsCount', 'productsActiveCount', 'products'));
    }

    public function user_management() {
        $customers = Customer::with('user')->get();
        return view('admin.user_management', compact('customers'));
    }
    
    public function product_management() {
        $products = Product::all();
        return view('admin.product_management', compact('products'));
    }
}
