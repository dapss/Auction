<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                  <a href="{{ url('/start-auction') }}" style="color: #007bff">Start Auction</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Best Deals!") }}
                </div>
                {{-- <div class="action">
                  <div class="action-content">
                    <a href="">Add</a>
                  </div>
                </div> --}}
                <div class="card-row">
                    @foreach ($list as $item)
                    {{-- {{ dd($item) }} --}}
                    <a href="">
                      <div class="card">
                        <img src="https://res3.grays.com/handlers/imagehandler.ashx?t=sh&id=37044205&s=fl&index=0&ts=638061691700000000" alt="Image">
                        <div class="card-content">
                            <h3>2014 Yamaho Eclipse</h3>
                            <p class="price">$1.000</p>
                            
                            <a href="/detail/{{ $item->id }}">Bid Now!</a>
                            <a href="">Bid Now!</a>
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
  $('.anywhere').text('€ ' + moneyDots);
  </script>
@endforeach --}}