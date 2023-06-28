<x-master-admin>
    @section('content')
    <h1>Update Category</h1>

    <form class="form-inline" method="post" action="{{route('category.update',['category'=>$category])}}" >
        @csrf
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$category->name}}" placeholder="Category Name">
        @error('name')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        <button type="submit" class="btn btn-primary my-2">Update Category</button>
    </form >


    @endsection
</x-master-admin>