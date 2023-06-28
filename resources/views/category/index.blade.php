<x-master-admin>
    @section('content')
    @if(session('cat-del'))
        <p class= 'alert alert-danger'>{{session('cat-del')}}</p>
    @endif
    @if(session('cat-create'))
        <p class= 'alert alert-success'>{{session('cat-create')}}</p>
    @endif

    @if(session('cat-update'))
        <p class= 'alert alert-success'>{{session('cat-update')}}</p>
    @endif
    <h1>Category</h1>


    <form class="form-inline" method="post" action="{{route('category.create')}}" >
        @csrf
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Name">
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <button type="submit" class="btn btn-primary my-2">Add Category</button>
    </form >


    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">categories</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('category.show',['category'=>$category])}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <form method='post' action="{{route('category.delete',['category'=>$category])}}">
                            @csrf
                            <td><button type='submit' class='btn btn-danger btn-sm'  >Delete</button></td>
                        </form>
                    </tr>
                    @endforeach
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
</x-master-admin>