<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('landingPage.index', compact('produk'));
    }

    public function mobil()
    {
        $produk = Produk::all();
        return view('landingPage.mobil', compact('produk'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('landingPage.profile', compact('user'));
    }

    public function order()
    {
        return view('landingPage.order');
    }

    public function kontak()
    {
        return view('landingPage.kontak');
    }

    public function detail_mobil($id)
    {
        $decryptedId = Crypt::decryptString($id);
        $produk =  Produk::find($decryptedId);
        return view('landingPage.detail_mobil', compact('produk'));
    }

    public function invoice()
    {
        return view('landingPage.invoice');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
