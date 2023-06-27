<x-master>
    
    @section('content') @if(session('message'))
    <p class="alert alert-primary">{{ session("message") }}</p>
    @endif 
    


  
    <main class ="d-flex flex-row">
    <div
            class="container-fluid bg-trasparent my-4 p-3"
            style="position: relative"
        >

        <div
                class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3"
            >
                
    @foreach($carts as $cart)
            @if($cart->product_id == $products->id)

                
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img
                            src="{{$product->product_image}}"
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="label-top shadow-sm">{{$product->brand}}</div>
                        <div class="card-body">
                            <div class="clearfix mb-3">
                                <span
                                    class="float-start badge rounded-pill bg-success"
                                    >{{$product->price}}&dollar;</span
                                >
                                <span class="float-end"
                                    ><a href="#" class="small text-muted"
                                        >{{$product->created_at->diffForHumans()}}</a
                                    ></span
                                >
                                
                            </div>
                            
                            <h5 class="card-title">
                                {{$product->name}}
                                
                            </h5>

                            <div class="clearfix mb-3">
                                <span
                                    class="float-start "
                                    >
                                    
                           <a href="{{route('product.show',['product'=>$product])}}" class='btn btn-primary btn-sm'  >Edit</a>
    
                                    </span
                                >
                                <span class="float-end"
                                    >
                                    <form method='post' action="{{route('product.delete',['product'=>$product])}}">
                            @csrf
                            <button type='submit' class='btn btn-danger btn-sm'  >Delete</button>
                        </form>
                                    </span
                                >
                                
                            </div>
                            
                            
                            <div class="text-center my-4">
                                <a href="#" class="btn btn-warning"
                                    >Check offer</a
                                >
                            </div>
                            <div class="clearfix mb-1">
                                <span class="float-start"
                                    ><i class="far fa-question-circle"></i
                                ></span>
                                <span class="float-end"
                                    ><i class="fas fa-plus"></i
                                ></span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            @endif    
            
             @endforeach
        

    </div>
    </div>
</main>

@endsection 

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>

    @endsection
</x-master>
