<x-layout>

    <div class="container-fluid header bg-secondary">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <h1 class=" display-2 text-white text-center">Inserisci i tuoi articoli</h1>
            </div>
        </div>
    </div>

    @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
     @endif



    <div class="container ">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-4 d-flex justify-content-center ">
                <form class="shadow border-4 rounded-3 w-100 p-3 mt-5" action="{{route('products.store')}}" method="POST"enctype='multipart/form-data'>
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nome Articolo:</label>
                      <input type="text" name="name" class="form-control" id="name" >
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo:</label>
                        <input type="number" step="0.5" name='price' class="form-control" id="price" >
                      </div>
                      <div class="mb-3">
                      <select class="form-select" name="category" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                        <option class="text-danger" value="{{$category->id}}">{{$category->name}} </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description:</label>
                      <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Immagine dell'articolo:</label>
                        <input type="file" name="img"class="form-control" id="img">
                      </div>

                       <div class="mb-3">

                        @foreach($tags as $tag)
                      <div class="form-check">
                        <input  class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          {{$tag->name}}
                        </label>

                      </div> 
                      @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Carica il tuo prodotto</button>
                  </form>
            </div>
        </div>
    </div>

  

</x-layout>