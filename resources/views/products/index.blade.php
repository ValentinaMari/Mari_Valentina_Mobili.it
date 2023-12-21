<x-layout>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid header ">
        <div class="row justify-content-center vh-100">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <h1 class=" display-2 text-white text-center">Ecco tutti i prodotti</h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row my-5">
            @foreach ($products as $product)
                <x-card :product="$product" />
            @endforeach
        </div>
    </div>




</x-layout>
