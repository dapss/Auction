<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DataController extends Controller
{
    public function detail(Request $request): View
    {
        return view('items.detail');
    }

    public function add(Request $request): View
    {
        return view('items.add');
    }

    public function edit(Request $request): View
    {
        return view('edit');
    }

    public function auction(Request $request): View
    {
        return view('auction');
    }

    public function start(Request $request): View
    {
        return view('auction.start');
    }

    public function bid(Request $request): View
    {
        return view('auction.bid');
    }

    public function history(Request $request): View
    {
        return view('auction.history');
    }
}
