<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landingPage.index');
    }

    public function mobil()
    {
        return view('landingPage.mobil');
    }

    public function profile()
    {
        return view('landingPage.profile');
    }

    public function order()
    {
        return view('landingPage.order');
    }

    public function kontak()
    {
        return view('landingPage.kontak');
    }

    public function detailMobil()
    {
        return view('landingPage.detailMobil');
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