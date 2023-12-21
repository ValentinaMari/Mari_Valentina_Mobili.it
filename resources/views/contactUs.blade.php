<x-layout>
    <div class="container-fluid bg-secondary mb-5 ">
        <div class="row justify-content-center vh-100">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <h1 class=" display-2 text-white text-center">Contattaci</h1>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6"></div>
            <form action="{{route('submit')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Nome</label>
                    <input type="text"  name="username" class="form-control" id="text">
                    
                  </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" name= "description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Descrizione della richiesta</label>
                      </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

        </div>
    </div>


</x-layout>