<x-master>
    @section('content')
    <h1>Update Product</h1>
<form class="form-inline" method="post" action="{{route('product.update',['product'=>$product])}}" >
        @csrf
        <label>Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$product->name}}" placeholder="product Name">
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <label>Price</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{$product->price}}" placeholder="product price">
        @error('price')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <label>Description</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{$product->description}}" placeholder="product description">
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
                        <th>Select Category</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                        <th>Name</th>
                        <th>Select Category</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                            <td>
                            <input class="form-check-input" name= "category[]" type="checkbox" value="{{$category->id}}" id="flexCheckChecked"
                            @if($product->categories->contains($category)) 
                            checked
                            @endif
                            >
                          </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <button type="submit" class="btn btn-primary my-4">Update product</button>
    </form >
    @endsection
</x-master>