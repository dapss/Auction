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
                    <form action="addCRUD" method="post">

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


                        @foreach ($list as $Info)
                            
                        
                        <label for="name">Item ID:</label>
                        <input type="text" id="id" name="id" value="{{ $Info->id_barang }}" disabled>
                        <span style="color : red">@error('id'){{ $message }}@enderror</span>

                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}">
                        <span style="color : red">@error('date'){{ $message }}@enderror</span>

                        <label for="description">Bid:</label>
                        <input type="text" id="description" name="description" value="">
                        <span style="color : red">@error('description'){{ $message }}@enderror</span>

                        <label for="opening">User ID:</label>
                        <input type="text" id="opening" name="opening" value="">
                        <span style="color : red">@error('opening'){{ $message }}@enderror</span>

                        <label for="opening">Admin ID:</label>
                        <input type="text" id="opening" name="opening" value="">
                        <span style="color : red">@error('opening'){{ $message }}@enderror</span>
                    
                        
                    
                        {{-- <label for="password">Password:</label>
                        <input type="password" id="password" name="password"> --}}
                    
                        <input type="submit" value="Submit">
                        @endforeach

                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
