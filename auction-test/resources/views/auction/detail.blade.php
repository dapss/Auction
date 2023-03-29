<link rel="stylesheet" href="{{ asset('css/detail.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach ($list as $item)
                @if (auth()->check())
                    <div class="action">
                        <h5>{{ $item->barang->nama_barang }}</h5>
                    </div>
                @endif
            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
            @foreach ($list as $item)
                {{-- @dd($item) --}}
                <div class="container">
                    <div class="align-center">
                        <img src="/bids/{{ $item->lots }}" alt="{{ $item->nama_barang }}">
                    </div>
                    <h1>{{ $item->nama_barang }}</h1>
                    <p style="color: rgb(255, 70, 70);">Current Highest Bid: @money($item->harga_akhir)</p>
                    <p style="color: rgb(255, 70, 70);">Bidder: {{ $item->user_name }}</p>
                    <p style="color: rgb(255, 70, 70);">Auctioneer: {{ $item->barang->auctioneer }}</p>
                    <h3>{{ $item->barang->deskripsi_barang }}</h3>

                    {{-- <div class="card-status {{ $item->status == 'OPEN' ? 'OPEN' : 'CLOSED' }}"> --}}

                    @if (auth()->check())
                        @can('view-user-dashboard')
                            <a href="/bid/{{ $item->id_lelang }}">
                                {{-- <button @if ($item->status == 'CLOSED') disabled @endif>Start Bid!</button> --}}
                                @if ($item->status == 'CLOSED')
                                    <button style="background-color: red" disabled>BID CLOSED</button>
                                @else
                                    <button style="background-color: lime">PLACE BID</button>
                                @endif
                            </a>
                        @endcan

                        <div style="display: flex;">
                            <div style="width: 100%;">
                                @can('view-petugas-dashboard')
                                    <a href="/close/{{ $item->id_barang }}">
                                        @if ($item->status == 'CLOSED')
                                            <button style="background-color: red" hidden>BID CLOSED</button>
                                        @else
                                            <button
                                                style="background-image: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%); color: white; letter-spacing: 1px; font-weight: bold;">CLOSE
                                                {{-- style="background-color: #333; color: white; letter-spacing: 1px; font-weight: bold;">CLOSE --}}
                                                BID</button>
                                        @endif
                                    </a>
                                @endcan
                            </div>
                        </div>
                        <div>
                            @can('view-petugas-dashboard')
                                <a href="/close/{{ $item->id_barang }}">
                                    @if ($item->status == 'CLOSED')
                                        <button style="background-color: red" disabled>BID CLOSED</button>
                                    @endif
                                </a>
                            @endcan
                        </div>
                    @endif


                    {{-- </div> --}}
                </div>
            @endforeach
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
