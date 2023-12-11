<x-layout>

    <div class="container-fluid header bg-secondary">
        <div class="row justify-content-center h-100">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <h1 class=" display-2 text-white text-center">Registrati!</h1>
            </div>
        </div>
    </div>



    <div class="container ">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-4 d-flex justify-content-center ">
                <form class="shadow border-4 rounded-3 w-100 p-3 mt-5" action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email:</label>
                      <input type="email" name='email' class="form-control" id="email" >
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" name='name' class="form-control" id="name" >
                      </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password"  class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" name="password_confirmation"class="form-control" id="password_confirmation">
                      </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                  </form>
            </div>
        </div>
    </div>

  

</x-layout>