<link rel="stylesheet" href="{{ asset('css/add.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                  <a>Edit an Auction</a>
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
                    <form action="{{ route('update') }}" method="post">

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
                        {{-- <label for="id">ID :</label> --}}
                        <input type="hidden" id="id" name="id" value="{{ $Info->id_barang }}">
                        <span style="color : red">@error('id'){{ $message }}@enderror</span>
                        
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $Info->nama_barang }}" readonly>
                        <span style="color : red">@error('name'){{ $message }}@enderror</span>

                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" value="{{ $Info->deskripsi_barang }}">
                        <span style="color : red">@error('description'){{ $message }}@enderror</span>

                        <label for="opening">Opening Price:</label>
                        <input type="text" id="opening" name="opening" value="{{ $Info->harga_awal }}">
                        <span style="color : red">@error('opening'){{ $message }}@enderror</span>

                        <label for="status">Status:</label>
                        <select name="status" id="status">
                            <option disabled selected value="">Please select a status</option>
                            <option value="OPEN" {{ $Info->status == "OPEN" ? 'selected' : '' }}>Open</option>
                            <option value="CLOSED" {{ $Info->status == "CLOSED" ? 'selected' : '' }}>Closed</option>
                        </select>
                        <span style="color : red">@error('status'){{ $message }}@enderror</span>
                    
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" value="{{ $Info->tanggal }}">
                        <span style="color : red">@error('date'){{ $message }}@enderror</span>
                    
                        {{-- <label for="password">Password:</label>
                        <input type="password" id="password" name="password"> --}}
                    
                        <input type="submit" value="Submit">
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
