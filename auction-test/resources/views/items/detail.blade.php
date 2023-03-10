<link rel="stylesheet" href="{{ asset('css/detail.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach ($list as $item)
            
                
            <div class="action">
                
                <div class="action-content">
                  <a href="/edit/{{ $item->id_barang }}" style="color: #007bff">Edit Auction</a>
                </div>
                <form action="{{ route('destroy', $item->id_barang) }}" method="POST">
                <div class="action-content">
                    @csrf
                    @method('DELETE')
                    {{-- <a href="" type="submit" style="color: red">Delete Auction</a> --}}
                    <button class="action-content" type="submit">Delete</button>
                  </div>
                </form>
                
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
                        <img src="https://res3.grays.com/handlers/imagehandler.ashx?t=sh&id=37044205&s=fl&index=0&ts=638061691700000000" alt="Product Image">
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
                    {{-- </div> --}}
                  </div>     
                @endforeach
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
