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
                    <form action="addCRUD" method="post" enctype="multipart/form-data">
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
                        {{-- <label for="id">ID :</label>
                        <input type="text" id="id" name="id" value="{{ old('id') }}">
                        <span style="color : red">@error('id'){{ $message }}@enderror</span> --}}
                        
                        <label for="nama_barang">Name:</label>
                        <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                        <span style="color : red">@error('nama_barang'){{ $message }}@enderror</span>

                        <label for="deskripsi_barang">Description:</label>
                        <input type="text" id="deskripsi_barang" name="deskripsi_barang" value="{{ old('deskripsi_barang') }}">
                        <span style="color : red">@error('deskripsi_barang'){{ $message }}@enderror</span>

                        <label for="harga_awal">Opening Price:</label>
                        <input type="text" id="harga_awal" name="harga_awal" value="{{ old('harga_awal') }}">
                        <span style="color : red">@error('harga_awal'){{ $message }}@enderror</span>

                        <label for="status">Status:</label>
                        <select name="status" id="status">
                            <option disabled selected value="">Please select a status</option>
                            <option value="OPEN">Open</option>
                            <option value="CLOSED">Closed</option>
                        </select>
                        <span style="color : red">@error('status'){{ $message }}@enderror</span>
                    
                        {{-- <label for="tanggal">Date:</label> --}}
                        <input type="hidden" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" readonly>
                        <span style="color : red">@error('tanggal'){{ $message }}@enderror</span>

                        <label for="lots">Image:</label>
                        <input type="file" id="lots" name="lots" value="{{ old('lots') }}">
                        <span style="color : red">@error('lots'){{ $message }}@enderror</span>

                        
                    
                        {{-- <label for="password">Password:</label>
                        <input type="password" id="password" name="password"> --}}
                    
                        <input type="submit" class="gradient-button" value="Submit">
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
