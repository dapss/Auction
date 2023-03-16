<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="/fontawesome-free-6.3.0-web/css/all.css">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="action">
                <div class="action-content">
                  {{-- <a href="{{ url('/start-auction') }}" style="color: #007bff">Start Auction</a> --}}
                  <a>Auction History</a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="history-action">
                    {{-- <div class="text-left p-6 text-gray-900" style="font-weight: bold">
                        {{ __("History") }}
                    </div> --}}
                    <button class="btn">Generate PDF</button>
                </div>
                
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>History ID</th>
                                <th>Item</th>
                                <th>Highest Bid</th>
                                <th>Bidder</th>
                                <th>Auctioneer</th>
                                <th>Date</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        @foreach ($list as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->id_history }}</td>
                                <td >{{ $item->nama_barang}}</td>
                                <td >@money($item->penawaran_harga)</td>
                                <td >{{ $item->user_name }}</td>
                                <td >{{ $item->auctioneer }}</td>
                                <td >{{ \Carbon\Carbon::parse($item->tanggal_lelang)->format('d-m-Y') }}</td>
                                {{-- <td ><i class="far fa-file-pdf"></i></td> --}}
                            </tr>
                            {{-- <tr>
                                <td data-label="First Name">Jane</td>
                                <td data-label="Last Name">Smith</td>
                                <td data-label="Email Address">janesmith@example.com</td>
                                <td data-label="Phone Number">(555) 555-5555</td>
                            </tr>
                            <tr>
                                <td data-label="First Name">Bob</td>
                                <td data-label="Last Name">Johnson</td>
                                <td data-label="Email Address">bjohnson@example.com</td>
                                <td data-label="Phone Number">(999) 999-9999</td>
                            </tr>
                            <tr>
                                <td data-label="First Name">Samantha</td>
                                <td data-label="Last Name">Lee</td>
                                <td data-label="Email Address">samanthalee@example.com</td>
                                <td data-label="Phone Number">(555) 123-4567</td>
                            </tr> --}}
                            </tbody>
                        @endforeach
                        
                        </table>
                </div>
                </div>      
            </div>
        </div>
    </div>
</x-app-layout>