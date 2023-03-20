<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                  @if (auth()->check())
                    @can('view-admin-dashboard')
                      <a href="{{ url('/add') }}" style="color: #007bff">Start Auction</a>
                    @endcan

                    @can('view-petugas-dashboard')
                      <a href="{{ url('/add') }}" style="color: #007bff">Start Auction</a>
                    @endcan

                    @can('view-user-dashboard')
                      <a>Welcome to Aucify</a>
                    @endcan
                  @endif
                  
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('dashboard') }}" method="GET">
                  <div class="action-row">
                    <div class="title">Items</div>
                    <div class="actions">
                      <select name="status" id="status" onchange="this.form.submit()">
                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>All</option>
                        <option value="open" {{ $status == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ $status == 'closed' ? 'selected' : '' }}>Closed</option>
                      </select>
                      <div class="search">
                        <input type="text" placeholder="Search...">
                        <button>Search</button>
                      </div>
                    </div>
                  </div>
                </form>

                <div class="card-row">
                  @foreach ($list as $item)
                  <a href="{{ route('detail.show' , $item->id_barang) }}">
                    <div class="card">
                      <img src="bids/{{ $item->lots }}" alt="Image">
                      <div class="card-status {{ $item->status == 'OPEN' ? 'OPEN' : 'CLOSED' }}">
                        <h3>{{ $item->status }}</h3>
                    </div>
                      <div class="card-content">
                          <h3>{{ $item->nama_barang }}</h3>
                          <h4>{{ $item->deskripsi_barang }}</h4>
                          <p>@money($item->harga_awal)</p> 
                      </div> 
                    </div>  
                  </a>
                  @endforeach
              </div>      
            </div>
        </div>
    </div>
</x-app-layout>