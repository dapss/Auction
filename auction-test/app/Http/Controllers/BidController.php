<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //
        $searchTerm = $request->input('search');
        $data = Bid::with([
            'barang' => function ($query) use ($searchTerm) {
                // $query->where('nama_barang', 'LIKE', '%' . $searchTerm . '%');
            }
        ])
            ->orWhere('harga_akhir', '=', $searchTerm)
            ->orWhere('id_barang', '=', $searchTerm)
            ->orWhere('user_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('nama_barang', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('auctioneer', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('tanggal_lelang', 'LIKE', $searchTerm)
            ->paginate(5);

        $data->appends(array('search' => $searchTerm));
        $list = Bid::orderBy('id_barang', 'desc')->paginate(5);
        // $list = $data;

        if ($data->isEmpty()) {
            return view('auction.bid_history', ['list' => $data], compact('list'))->with('error', 'No results found for "' . $searchTerm . '"');
        } else {
            return view('auction.bid_history', ['list' => $data], compact('list'))->with('data', $data)->with('searchTerm', $searchTerm);
        }
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
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}