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
               ->where('nama_barang', 'LIKE', '%'.$searchTerm.'%')
               ->orWhere('penawaran_harga', '=', $searchTerm)
               ->orWhere('user_name', 'LIKE', '%'.$searchTerm.'%')
               ->orWhere('auctioneer', 'LIKE', '%'.$searchTerm.'%')
               ->orWhere('tanggal_lelang', 'LIKE', '%'.$searchTerm.'%')
            //    ->orderBy('id_history', 'asc')
               ->paginate(7);
        $list = History::orderBy('id_history', 'desc')->paginate(7);

        // return view('auction.history', ['list' => $data], compact('list'));
        if($data->isEmpty()) {
            return view('auction.history', ['list' => $data], compact('list'))->with('error', 'No results found for "'.$searchTerm.'"');
        } else {
            return view('auction.history', ['list' => $data], compact('list'))->with('data', $data)->with('searchTerm', $searchTerm);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function index2($id) {
        $listHistory = Lelang::where('id_barang', $id)->get();
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
            'item-name'=>'required',
            'bidder'=>'required',
            'date'=>'required',
            'bid'=>'required',
            'auctioneer'=>'required',
        ]);

        $query = DB::table('tb_history_lelang')->insert([
            'nama_barang'=>$request->input('item-name'),
            'user_name'=>$request->input('bidder'),
            'tanggal_lelang'=>$request->input('date'),
            'penawaran_harga'=>$request->input('bid'),
            'auctioneer'=>$request->input('auctioneer'),
        ]);

        // if($query) {
        //     return back()->with('success', 'Data have been successfuly inserted');
        // } else {
        //     return back()->with('fail', 'Something went wrong');
        // }

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
        $list = History::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.export', compact('list')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream('History.pdf');

        // return view('pdf.export', compact('list'));
    }
}
