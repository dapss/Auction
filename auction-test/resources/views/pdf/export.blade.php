{{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}

<style>
    body {
        font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif;
    }

    table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
        text-align: left;
        color: #444;
        background-color: #fff;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    table th,
    table td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        vertical-align: middle;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
        color: #555;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: left;
        /* text-align: center; */
    }

    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tbody tr:hover {
        background-color: #f5f5f5;
    }

    table tbody td:before {
        /* content: attr(data-label); */
        display: inline-block;
        color: #888;
        font-weight: bold;
        margin-right: 5px;
        width: 100px;
    }

    hr {
        width: 100%;
        /* height: 1px; */
        background-color: rgb(73, 73, 73);
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        height: 60px;
    }
</style>

<div>
    <p style="font-size: 14px;">Aucify Co.</p>
    {{-- <hr> --}}
    {{-- <h1 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center;">
        AUCTION SALES HISTORY REPORT</h1> --}}
    <hr>
    <p style="font-weight: bold; text-align:center; font-size: 20px;">Auction Sales History Report</p>
    <hr>
    <p>Properties of Auction Co.</p>
    @if (auth()->check())
        @can('view-admin-dashboard')
            <p>Administrator: {{ Auth::user()->name }}</p>
        @endcan

        @can('view-petugas-dashboard')
            <p>Officer: {{ Auth::user()->name }}</p>
        @endcan
    @endif
    {{-- <p>Officer: {{ Auth::user()->name }}</p> --}}
    <p>Date Exported: {{ date('d-m-Y') }}</p>

    <hr style="margin-bottom: 2%;">
    <table>
        <thead>
            <tr>
                <th>History ID</th>
                <th>Item</th>
                <th>Highest Bid</th>
                <th>Bidder</th>
                <th>Auctioneer</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->id_history }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>@money($item->penawaran_harga)</td>
                    <td>{{ $item->user_name }}</td>
                    <td>{{ $item->auctioneer }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lelang)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
