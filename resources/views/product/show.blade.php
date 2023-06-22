<x-master>
    @section('content')
<form class="form-inline" method="post" action="{{route('product.create')}}" >
        @csrf
        <label>Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="product Name">
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <label>Price</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="product price">
        @error('price')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <label>Description</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="product description">
        @error('description')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <label>Category</label>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">products</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Added By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <form method='post' >
                            @csrf
                            <td><button type='submit' class='btn btn-danger btn-sm'  >Attach</button></td>
                        </form>
                        <form method='post' >
                            @csrf
                            <td><button type='submit' class='btn btn-danger btn-sm'  >Detach</button></td>
                        </form>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <select class="form-select" name="product" aria-label="Default select example">
          <option selected>Select product</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-primary my-4">Add product</button>
    </form >
    @endsection
</x-master>