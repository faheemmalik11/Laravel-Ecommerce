<x-master-admin>
    @section('content')

    @if(session('message-user-created'))
        <p class= 'alert alert-success'>{{session('message-user-created')}}</p>
    @endif

    <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="{{route('user.create')}}" method="post">
                  @csrf
                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg  @error('name') is-invalid @enderror" />
                  @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                  <label class="form-label"  for="form3Example1cg">User's Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                  @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                  <label class="form-label" for="form3Example3cg">User's Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input name="password" type="password" id="form3Example4cg" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                  @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input name="confirm-password" type="password" id="form3Example4cdg" class="form-control form-control-lg @error('confirm-password') is-invalid @enderror" />
                  @error('confirm-password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                  <label class="form-label" for="form3Example4cdg">Repeat user's password</label>
                </div>

               <input type="hidden" name="role_id" value="1" />

              

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    @endsection
</x-master-admin>