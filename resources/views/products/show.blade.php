<x-layout>
<div class="col-12 col-md-3 my-3 justify-content-around">
    <div class="card" style="width: 18rem;">
        <img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nome articolo: {{ $product->name }}</h5>
            <p class="card-text">Descrizione: {{ $product->description }}</p>
            <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-primary">Visualizza articolo</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Prezzo: {{$product->price }}</li>
            @if ($product->category)
              <ul>
                
                   
                    <li class="list-group-item">Categoria: {{$product->category->name}}</li>
               
            </ul>
            @else
                <li class="list-group-item">Nessuna categoria</li>
            @endif
            <li class="list-group-item">Utente che ha inserito il prodotto: {{ $product->user->name }}</li>
        
        <div class="card-body">
            <form action="{{ route('products.delete', compact('product')) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn text-danger">Elimina articolo</button>
            </form>
            <a href="{{ route('products.edit', compact('product')) }}" class="card-link">Modifica articolo</a>
        </div>
    </div>
</div>
</x-layout>