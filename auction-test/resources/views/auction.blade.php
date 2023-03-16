<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                  {{-- <a href="{{ url('/start-auction') }}" style="color: #007bff">Start Auction</a> --}}
                  <a>Welcome to Aucify</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900" style="font-weight: bold">
                    {{ __("Best Deals!") }}
                </div> --}}
                <div>

                <form action="{{ route('auction') }}" method="GET">
                  <div class="action-row">
                    <div class="title">Auction</div> 
                    
                    <div class="actions">
                          <select name="status" id="status" onchange="this.form.submit()">
                            <option value="all" {{ $status == 'all' ? 'selected' : '' }}>All</option>
                            <option value="open" {{ $status == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="closed" {{ $status == 'closed' ? 'selected' : '' }}>Closed</option>
                          </select>
                      <form action="{{ route('auction') }}" method="GET">
                        <div class="search">
                          <input type="text" name="search" placeholder="Search...">
                          <button>Search</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </form>
                
                
                
                
              </div>

                <div class="card-row">
                  @foreach ($listLelang as $item)
                  <a href="{{ route('detail.show' , $item->id_barang) }}">
                    <div class="card">
                      <img src="/bids/{{ $item->lots }}" alt="Image">
                        <div class="card-status {{ $item->status == 'OPEN' ? 'OPEN' : 'CLOSED' }}">
                          <h3>{{ $item->status }}</h3>
                        </div>   
                      <div class="card-content">
                          <h3>{{ $item->nama_barang }}</h3>
                          <h5>Auctioneer: <span style="color: red">{{ $item->auctioneer }}</span></h5>
                          <h5>Last Bidder: <span style="color: red">{{ $item->user_name }}</span></h5>
                          <h4>Highest Bid: <span style="color: red">@money($item->harga_akhir)</span></h4>
                      </div>
                      
                    </div>  
                  </a>
                  @endforeach

                </div>      
            </div>
        </div>
    </div>
</x-app-layout>