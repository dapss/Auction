<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $searchTerm = $request->input('search');
        $data = DB::table('tb_history_lelang')
            ->orWhere('penawaran_harga', '=', $searchTerm)
            ->orWhere('id_history', '=', $searchTerm)
            ->orWhere('user_name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('nama_barang', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('auctioneer', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('tanggal_lelang', '=', $searchTerm)
            ->paginate(5);
        $data->appends(array('search' => $searchTerm));
        $list = History::orderBy('id_history', 'desc')->paginate(5);

        if ($data->isEmpty()) {
            return view('auction.history', ['list' => $data], compact('list'))->with('error', 'No results found for "' . $searchTerm . '"');
        } else {
            return view('auction.history', ['list' => $data], compact('list'))->with('data', $data)->with('searchTerm', $searchTerm);
        }
    }

    // public function index(Request $request)
    // {
    //     $searchTerm = $request->input('search');

    //     $data = History::with([
    //         'barang' => function ($query) use ($searchTerm) {
    //             // $query->where('nama_barang', 'LIKE', '%' . $searchTerm . '%');
    //         }
    //     ])
    //         ->orWhere('penawaran_harga', '=', $searchTerm)
    //         ->orWhere('id_history', '=', $searchTerm)
    //         ->orWhere('user_name', 'LIKE', '%' . $searchTerm . '%')
    //         ->orWhere('auctioneer', 'LIKE', '%' . $searchTerm . '%')
    //         ->orWhere('tanggal_lelang', 'LIKE', $searchTerm)
    //         ->paginate(5);

    //     $list = History::orderBy('id_history', 'desc')->paginate(5);

    //     if ($data->isEmpty()) {
    //         return view('auction.history', ['list' => $data], compact('list'))->with('error', 'No results found for "' . $searchTerm . '"');
    //     } else {
    //         return view('auction.history', ['list' => $data], compact('list'))->with('data', $data)->with('searchTerm', $searchTerm);
    //     }
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index2($id)
    {
        $listHistory = Lelang::where('id_barang', $id)
            ->with('barang')
            ->get();
        return view('auction.close', compact('listHistory'));
    }


    public function create()
    {
        //
        return view('auction.history');
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
        $request->validate([
            'item-id' => 'required',
            'item-name' => 'required',
            'bidder' => 'required',
            'date' => 'required',
            'bid' => 'required',
            'auctioneer' => 'required',
        ]);

        $query = DB::table('tb_history_lelang')->insert([
            'id_barang' => $request->input('item-id'),
            'nama_barang' => $request->input('item-name'),
            'user_name' => $request->input('bidder'),
            'tanggal_lelang' => $request->input('date'),
            'penawaran_harga' => $request->input('bid'),
            'auctioneer' => $request->input('auctioneer'),
        ]);

        DB::table('tb_barang')
            ->where('id_barang', $request->input('item-id'))
            ->update([
                'status' => 'CLOSED'
            ]);

        DB::table('tb_lelang')
            ->where('id_barang', $request->input('item-id'))
            ->update([
                'status' => 'CLOSED'
            ]);

        return redirect('history');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }

    public function exportPDF()
    {
        $list = History::with('barang')->get();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.export', compact('list')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream('Auction History.pdf');

        // return view('pdf.export', compact('list'));
    }
}