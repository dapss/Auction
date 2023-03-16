<link rel="stylesheet" href="{{ asset('css/detail.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach ($list as $item)
            
            @if (auth()->check())
                <div class="action">
                    @can('view-petugas-dashboard')
                        <div class="action-content">
                            <a href="/edit/{{ $item->id_barang }}" style="color: #007bff">Edit Auction</a>
                        </div>
    
                        <a href="/delete/{{ $item->id_barang }}" type="submit" style="color: red">Delete Auction</a>
                    @endcan

                    @can('view-admin-dashboard')
                        <div class="action-content">
                            <a href="/edit/{{ $item->id_barang }}" style="color: #007bff">Edit Auction</a>
                        </div>
    
                        <a href="/delete/{{ $item->id_barang }}" type="submit" style="color: red">Delete Auction</a>
                    @endcan

                    @can('view-user-dashboard')
                        <h5>{{ $item->nama_barang }}</h5>
                    @endcan
                </div>
            @endif

            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                @foreach ($list as $item)
                <div class="container">
                    <div class="align-center">
                        <img src="/bids/{{ $item->lots }}" alt="Image">
                    </div>
                    <h1>{{ $item->nama_barang }}</h1>
                    <p>Starting Price: @money($item->harga_awal)</p>
                    <h3>{{ $item->deskripsi_barang }}</h3>
                    
                    {{-- <div class="card-status {{ $item->status == 'OPEN' ? 'OPEN' : 'CLOSED' }}"> --}}
                    
                    @if (auth()->check())
                        @can('view-user-dashboard')
                        <a href="/bid/{{ $item->id_barang }}">
                            {{-- <button @if($item->status == 'CLOSED') disabled @endif>Start Bid!</button> --}}
                            @if($item->status == 'CLOSED')
                                <button style="background-color: red" disabled>BID CLOSED</button>
                            @else
                                <button style="background-color: lime">PLACE BID</button>
                            @endif
                        </a>
                        @endcan

                        <div style="display: flex;">
                            <div style="width: 50%; margin-right: 1%;">
                                @can('view-petugas-dashboard')
                                <a href="/start-auction/{{ $item->id_barang }}">
                                    {{-- <button @if($item->status == 'CLOSED') disabled @endif>Start Bid!</button> --}}
                                    @if($item->status == 'CLOSED')
                                        <button style="background-color: red" hidden>BID CLOSED</button>
                                    @else
                                        <button style="background-color: lime; letter-spacing: 1px; font-weight: bold; ">START BID</button>
                                    @endif
                                </a>
                                @endcan
                            </div>
                            <div style="width: 50%;">
                                @can('view-petugas-dashboard')
                                <a href="/close/{{ $item->id_barang }}">
                                    @if($item->status == 'CLOSED')
                                        <button style="background-color: red" hidden>BID CLOSED</button>
                                    @else
                                        <button style="background-image: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%); color: white; letter-spacing: 1px; font-weight: bold;">CLOSE BID</button>
                                    @endif  
                                </a>
                                @endcan
                            </div>
                        </div>
                        <div>
                            @can('view-petugas-dashboard')
                            <a href="/close/{{ $item->id_barang }}">
                                @if($item->status == 'CLOSED')
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
