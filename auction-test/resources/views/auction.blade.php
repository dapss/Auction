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
                <div class="p-6 text-gray-900" style="font-weight: bold">
                    {{ __("Best Deals!") }}
                </div>
                {{-- <div class="action">
                  <div class="action-content">
                    <a href="">Add</a>
                  </div>
                </div> --}}
                <div class="card-row">
                  @foreach ($listLelang as $item)
                  {{-- {{ dd($item) }} --}}
                  <a href="{{ route('detail.show' , $item->id_barang) }}">
                    <div class="card">
                      <img src="images/auction.jpg" alt="Image">
                      
                      {{-- @foreach ($list as $item2)
                        <div class="card-status {{ $item2->status == 'OPEN' ? 'OPEN' : 'CLOSED' }}">
                          <h3>{{ $item2->status }}</h3>
                        </div>
                      @endforeach --}}
                      {{-- @foreach ($list as $item) --}}
                        <div class="card-status {{ $item->status == 'OPEN' ? 'OPEN' : 'CLOSED' }}">
                          <h3>{{ $item->status }}</h3>
                        </div>
                      {{-- @endforeach --}}
                      
                      
                      <div class="card-content">
                          <h3>{{ $item->nama_barang }}</h3>
                          <h5>Auctioneer: <span style="color: red">{{ $item->auctioneer }}</span></h5>
                          <h5>Last Bidder: <span style="color: red">{{ $item->user_name }}</span></h5>
                          <h4>Highest Bid: <span style="color: red">@money($item->harga_akhir)</span></h4>
                          <p></p>
                          
                          {{-- <p>
                            The price is:
                            <x-format-amount :amount="$item->price" />
                          </p> --}}
                        
                          
                          {{-- <a href="/detail/{{ $item->id }}">Bid Now!</a> --}}
                          {{-- <a href="{{ route('detail.show' , $item->id_barang) }}">Bid Now!</a> --}}
                          
                      </div>
                      
                    </div>  
                  </a>
                  @endforeach
                    {{-- <div class="card">
                      <img src="https://res0.grays.com/handlers/imagehandler.ashx?t=sh&id=37607176&s=fl&index=0&ts=638125049590000000" alt="Image">
                      <div class="card-content">
                          <h3>2017 Maserati LEVANTE Diesel M161 Turbo Diesel Automatic - 8 Speed Wagon</h3>
                          <p>$50,500</p>
                          <a href="{{ url('/detail/') }}">Bid Now!</a>
                      </div>
                    </div>  --}}
                </div>      
            </div>
        </div>
    </div>
</x-app-layout>


{{-- @foreach ($list as $item)
  <script>
  // Number
  var price = 366432;

  // Convert to String and add dots every 3 digits
  var priceDots = price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

  // Set in HTML
  $('.anywhere').text('??? ' + moneyDots);
  </script>
@endforeach --}}