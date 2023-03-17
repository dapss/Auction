<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<style>
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
table th, table td {
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
</style>

<div>
    <h1 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">PDF Document</h1>
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
                <td>{{ $item->nama_barang }}</td>
                <td>@money($item->penawaran_harga)</td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->auctioneer }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_lelang)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>