<link rel="stylesheet" href="{{ asset('css/add.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                    <a>Start an Auction</a>
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
                <form action="/start" method="post">

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf
                    {{-- <label for="id">ID :</label>
                        <input type="text" id="id" name="id" value="{{ old('id') }}">
                        <span style="color : red">@error('id'){{ $message }}@enderror</span> --}}


                    @foreach ($listLelang as $Info)
                        {{-- <label for="item-id">Item ID:</label> --}}
                        <input type="hidden" id="item-id" name="item-id" value="{{ $Info->id_barang }}" readonly>
                        <span style="color : red">
                            @error('item-id')
                                {{ $message }}
                            @enderror
                        </span>

                        <label for="item-name">Item Name:</label>
                        <input type="text" id="item-name" name="item-name" value="{{ $Info->nama_barang }}" readonly>
                        <span style="color : red">
                            @error('item-id')
                                {{ $message }}
                            @enderror
                        </span>

                        {{-- <label for="name">Full Name:</label> --}}
                        <input type="hidden" id="name" name="name" value="{{ auth()->user()->name }}">
                        <span style="color : red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>

                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" readonly>
                        <span style="color : red">
                            @error('date')
                                {{ $message }}
                            @enderror
                        </span>

                        {{-- <label for="status">Status:</label> --}}
                        {{-- <select name="status" id="status"> --}}
                        <select name="status" id="status" style="display:none;">
                            <option disabled selected value="">Please select a status</option>
                            <option value="OPEN" {{ $Info->status == 'OPEN' ? 'selected' : '' }}>Open</option>
                            <option value="CLOSED" {{ $Info->status == 'CLOSED' ? 'selected' : '' }}>Closed</option>
                        </select>
                        <span style="color : red">
                            @error('status')
                                {{ $message }}
                            @enderror
                        </span>

                        <label for="bid">Starting Price:</label>
                        <input type="hidden" id="bid" name="bid" value="{{ $Info->harga_awal }}" readonly>
                        <input type="text" value="@money($Info->harga_awal)" readonly>
                        <span style="color : red">
                            @error('bid')
                                {{ $message }}
                            @enderror
                        </span>

                        <label for="auctioneer">Auctioneer:</label>
                        <input type="text" id="auctioneer" name="auctioneer" value="{{ $Info->auctioneer }}" readonly
                            placeholder="Please insert auctioneer">
                        <span style="color : red">
                            @error('auctioneer')
                                {{ $message }}
                            @enderror
                        </span>

                        <input type="hidden" id="lots" name="lots" value="{{ $Info->lots }}">
                        <span style="color : red">
                            @error('lots')
                                {{ $message }}
                            @enderror
                        </span>





                        {{-- <label for="password">Password:</label>
                        <input type="password" id="password" name="password"> --}}

                        <input type="submit" value="START AUCTION">
                    @endforeach

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
