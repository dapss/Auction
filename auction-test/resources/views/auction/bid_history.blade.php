<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
{{-- <link rel="stylesheet" href="/fontawesome-free-6.3.0-web/css/all.css"> --}}

<style>
    body {
        overflow: hidden;
    }
</style>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                    {{-- <a href="{{ url('/start-auction') }}" style="color: #007bff">Start Auction</a> --}}
                    <a>Bid History</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('bid-history') }}" method="GET">
                    <div class="action-row">
                        <div class="title">Bid History</div>
                        <div class="actions">
                            <div class="search">
                                <input type="text" name="search" placeholder="Search..."
                                    value="{{ old('search') }}">
                                <button type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Item ID</th>
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
                                    <td>{{ $item->id_barang }}</td>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>@money($item->harga_akhir)</td>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->barang->auctioneer }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lelang)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $list->links() }}
                        {{-- {{ $list->onEachSide(1)->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
