<x-master>
    @section('content')
    @if(session('product-del'))
        <p class= 'alert alert-danger'>{{session('product-del')}}</p>
    @endif
    @if(session('product-create'))
        <p class= 'alert alert-success'>{{session('product-create')}}</p>
    @endif

    @if(session('product-update'))
        <p class= 'alert alert-success'>{{session('product-update')}}</p>
    @endif
    <h1>product</h1>


    <form class="form-inline" method="post" action="{{route('product.create')}}"  enctype="multipart/form-data">
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
        <label>Brand</label>
        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="product brand">
        @error('brand')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <label>Description</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="product description">
        @error('description')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <label>Category</label>
        <br>
        @foreach ($categories as $category)
                    <tr>
                           <td>
                            <input class="form-check-input" name= "category[]" type="checkbox" value="{{$category->id}}" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                               {{$category->name}}
                              </label>
                            <br>
                          </td>
                    </tr>
                    @endforeach
            <div class="form-group">
                <label >Product Image</label>
                <input type="file" class="form-control-file" name = "product_image"  >
            </div>

        <button type="submit" class="btn btn-primary my-4">Add product</button>
    </form >


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
                        <th>Brand</th>
                        <th>Product Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Product Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(auth()->user()->isSuperAdmin())
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><a href="{{route('product.show',['product'=>$product])}}">{{$product->name}}</a></td>
                        <td>${{$product->price}}</td>
                        <td>{{$product->brand}}</td>
                        <td><img src = '{{asset($product->product_image)}}' width= '100px' height=100px></img></td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td>{{$product->updated_at->diffForHumans()}}</td>
                        <form method='post' action="{{route('product.delete',['product'=>$product])}}">
                            @csrf
                            <td><button type='submit' class='btn btn-danger btn-sm'  >Delete</button></td>
                        </form>
                    </tr>
                    @endforeach
                    @else
                    @foreach ($userProducts as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><a href="{{route('product.show',['product'=>$product])}}">{{$product->name}}</a></td>
                        <td>${{$product->price}}</td>
                        <td>{{$product->brand}}</td>
                        <td><img src = '{{asset($product->product_image)}}' width= '100px' height=100px></img></td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td>{{$product->updated_at->diffForHumans()}}</td>
                        <form method='post' action="{{route('product.delete',['product'=>$product])}}">
                            @csrf
                            <td><button type='submit' class='btn btn-danger btn-sm'  >Delete</button></td>
                        </form>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    @endsection


    @section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts --> 
         <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-master>