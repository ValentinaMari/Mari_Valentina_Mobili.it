<x-layout>

  <div class="container-fluid header bg-secondary">
    <div class="row justify-content-center h-100">
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
            <h1 class=" display-2 text-white text-center">Accedi</h1>
        </div>
    </div>
</div>



<div class="container ">
    <div class="row justify-content-center my-5">
        <div class="col-12 col-md-4 d-flex justify-content-center ">
            <form class="shadow border-4 rounded-3 w-100 p-3 mt-5" action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" name='email' class="form-control" id="email" >
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password"  class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Registrati</button>
              </form>
        </div>
    </div>
</div>

    
</x-layout>