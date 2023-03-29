<link rel="stylesheet" href="{{ asset('css/add.css') }}">

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var imagePreview = document.getElementById('image-preview');
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        } else {
            var imagePreview = document.getElementById('image-preview');
            imagePreview.src = '';
            imagePreview.style.display = 'none';
        }
    }
</script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                    <a>Add an Item</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="addCRUD" method="post" enctype="multipart/form-data">
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

                    <label for="nama_barang">Name:</label>
                    <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                    <span style="color : red">
                        @error('nama_barang')
                            {{ $message }}
                        @enderror
                    </span>

                    <label for="deskripsi_barang">Description:</label>
                    <textarea rows="6" id="deskripsi_barang" name="deskripsi_barang" value="{{ old('deskripsi_barang') }}"></textarea>
                    <span style="color : red">
                        @error('deskripsi_barang')
                            {{ $message }}
                        @enderror
                    </span>

                    <label for="harga_awal">Opening Price:</label>
                    <input type="text" id="harga_awal" name="harga_awal" value="{{ old('harga_awal') }}">
                    <span style="color : red">
                        @error('harga_awal')
                            {{ $message }}
                        @enderror
                    </span>

                    <label for="auctioneer">Auctioneer:</label>
                    <input type="text" id="auctioneer" name="auctioneer" value="{{ old('auctioneer') }}">
                    <span style="color : red">
                        @error('harga_awal')
                            {{ $message }}
                        @enderror
                    </span>

                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option disabled selected value="">Please select a status</option>
                        <option value="OPEN">Open</option>
                        <option value="CLOSED">Closed</option>
                    </select>
                    <span style="color : red">
                        @error('status')
                            {{ $message }}
                        @enderror
                    </span>

                    {{-- <label for="tanggal">Date:</label> --}}
                    <input type="hidden" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" readonly>
                    <span style="color : red">
                        @error('tanggal')
                            {{ $message }}
                        @enderror
                    </span>

                    <label for="lots">Image:</label>
                    <input type="file" id="lots" name="lots" value="{{ old('lots') }}"
                        onchange="previewImage(event)">
                    <img id="image-preview" src="" alt=""
                        style="width: 30%; margin: 0 auto; display:none; margin-top: 2%; border-radius: 10px;">
                    <span style="color : red">
                        @error('lots')
                            {{ $message }}
                        @enderror
                    </span>

                    {{-- <label for="password">Password:</label>
                        <input type="password" id="password" name="password"> --}}

                    <input type="submit" class="gradient-button" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
