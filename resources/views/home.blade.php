<x-master>

    @section('content')
    
    @if(session('message'))
    <p class="alert alert-primary">{{session('message')}}</p>
    @endif

 <!-- HAVE TO ADD ONLY AUTHENTICATED USER PRODUCTS -->
    <!-- @foreach($categories as $category)
    <h1>{{$category->name}}</h1>
    @foreach( as $product)
        <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>
@endforeach
@endforeach -->
    
    @endsection
    
   

</x-master>