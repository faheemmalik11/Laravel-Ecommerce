<x-master>
    
    @section('content') @if(session('message'))
    <p class="alert alert-primary">{{ session("message") }}</p>
    @endif 
    
    @if(isset($category))

    <h1 class="bd-title" id="content">{{$category->name}}</h1>
    <main class ="d-flex flex-row">
    <div
            class="container-fluid bg-trasparent my-4 p-3"
            style="position: relative"
        >

        <div
                class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3"
            >
                
    

    @foreach($category->products as $product) 
    @if(auth()->user()->id == $product->user_id )
  
                
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
@else
    @foreach($categories as $category)
    @php
    $count = 0
    @endphp

    <h1 class="bd-title" id="content">{{$category->name}}</h1>
    <main class ="d-flex flex-row">
    <div
            class="container-fluid bg-trasparent my-4 p-3"
            style="position: relative"
        >

        <div
                class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3"
            >
                
    

    @foreach($category->products as $product) 
    @if(auth()->user()->id == $product->user_id && $count<5)
    @php
        $count++
    @endphp
        
                
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
                                <a href="{{route('cart.add',['product'=>$product])}}" class="btn btn-warning"
                                    >ADD TO CART</a
                                >
                            </div>
                            <div class="clearfix mb-1">
                                <span class="float-start"
                                    ><i class="far fa-question-circle"></i
                                ></span>
                                <span class="float-end"
                                    ><i class="fas fa-plus"></i
                                ></span>

                                 <div>
                            <!-- <span class="float-end"
                                    >
                                    <button type="button" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                    </svg>
              
              </button>
                                    </span
                                > -->
                            </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
                
            
             
        
    
    @endif 
    @endforeach 
    </div>
    </div>
</main>
@endforeach 
@endif
@endsection 

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>

    @endsection
</x-master>
