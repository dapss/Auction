<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="/fontawesome-free-6.3.0-web/css/all.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                  {{-- <a href="{{ url('/start-auction') }}" style="color: #007bff">Start Auction</a> --}}
                  <a>Auction History</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="history-action">
                    <div class="text-left p-6 text-gray-900" style="font-weight: bold">
                        {{ __("History") }}
                    </div>
                    <button class="btn">Generate PDF</button>
                    <form action="{{ route('history') }}" method="GET">
                        <input type="text" name="search" value="{{ old('search') }}" placeholder="Search...">
                        <button type="submit">Search</button>
                    </form>
                </div> --}}

                <form action="{{ route('history') }}" method="GET">
                    <div class="action-row">
                      <div class="title">
                        {{-- <button type="submit">GENERATE PDF</button> --}}
                        <div class="history-action">
                            <button class="btn">Generate PDF</button>
                        </div>
                        </div> 
                      <div class="actions">
                            {{-- <input type="text" name="search" value="{{ old('search') }}" placeholder="Search...">
                            <button type="submit">Search</button> --}}
                            {{-- <div class="generate">
                                <button type="submit">GENERATE PDF</button>
                            </div>
                            <div class="reset">
                                <button type="submit">RESET</button>
                            </div> --}}
                            <div class="search">
                                <input type="text" name="search" placeholder="Search..." value="{{ old('search') }}">
                                <button type="submit">Search</button>
                            </div>
                      </div>
                    </div>
                  </form>
                
                <div>
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
                    
                    <div class="pagination">
                        {{ $list->links() }}
                    </div>                    
                    
                </div>
                </div>      
            </div>
        </div>
    </div>
</x-app-layout>