<link rel="stylesheet" href="{{ asset('css/add.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                  <a>Close an Auction</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("Start an Auction") }}
                </div> --}}
                    <form action="/close" method="post">

                        @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif

                        @csrf

                        @foreach ($listHistory as $item)

                        {{-- <label for="item-name">Item Name:</label>
                        <input type="text" id="item-name" name="item-name" value="{{ $item->id_barang }}" readonly>
                        <span style="color : red">@error('item-id'){{ $message }}@enderror</span> --}}

                        <label for="item-name">Item Name:</label>
                        <input type="text" id="item-name" name="item-name" value="{{ $item->nama_barang }}" readonly>
                        <span style="color : red">@error('item-id'){{ $message }}@enderror</span>

                        <label for="auctioneer">Auctioneer:</label>
                        <input type="text" id="auctioneer" name="auctioneer" value="{{ $item->auctioneer }}" readonly>
                        <span style="color : red">@error('auctioneer'){{ $message }}@enderror</span>

                        <label for="bidder">Bidder:</label>
                        <input type="text" id="bidder" name="bidder" value="{{ $item->user_name }}" readonly>
                        <span style="color : red">@error('bidder'){{ $message }}@enderror</span>

                        <label for="bid">Highest Bid:</label>
                        <input type="text"value="@money($item->harga_akhir)" readonly>
                        <input type="hidden" id="bid" name="bid" value="{{ $item->harga_akhir }}" readonly>
                        <span style="color : red">@error('bid'){{ $message }}@enderror</span>

                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" value="{{ $item->tanggal_lelang }}" readonly>
                        <span style="color : red">@error('date'){{ $message }}@enderror</span>
                    
                        <input type="submit" value="Submit">
                        @endforeach
                        

                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
