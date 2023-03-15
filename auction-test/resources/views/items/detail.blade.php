<link rel="stylesheet" href="{{ asset('css/detail.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach ($list as $item)
            
                
            <div class="action">
                
                <div class="action-content">
                  <a href="/edit/{{ $item->id_barang }}" style="color: #007bff">Edit Auction</a>
                </div>

                <a href="/delete/{{ $item->id_barang }}" type="submit" style="color: red">Delete Auction</a>
                {{-- <form action="{{ route('destroy', $item->id_barang) }}" method="POST">
                <div class="action-content">
                    @csrf
                    @method('DELETE')
                    <button class="action-content" type="submit">Delete</button>
                  </div>
                </form> --}}
                
            </div>
            
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

                        <a href="/start-auction/{{ $item->id_barang }}">
                            {{-- <button @if($item->status == 'CLOSED') disabled @endif>Start Bid!</button> --}}
                            @if($item->status == 'CLOSED')
                                <button style="background-color: red" hidden>BID CLOSED</button>
                            @else
                                <button style="background-color: lime">START BID</button>
                            @endif
                        </a>
                        
                    <a href="/bid/{{ $item->id_barang }}">
                        {{-- <button @if($item->status == 'CLOSED') disabled @endif>Start Bid!</button> --}}
                        @if($item->status == 'CLOSED')
                            <button style="background-color: red" disabled>BID CLOSED</button>
                        @else
                            <button style="background-color: lime">PLACE BID</button>
                        @endif
                    </a>

                    
                    <a href="/close/{{ $item->id_barang }}">
                        {{-- <button @if($item->status == 'CLOSED') disabled @endif>Start Bid!</button> --}}
                            <button style="background-image: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%); color: white">CLOSE BID</button>
                    </a>
                    {{-- </div> --}}
                  </div>     
                @endforeach
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
