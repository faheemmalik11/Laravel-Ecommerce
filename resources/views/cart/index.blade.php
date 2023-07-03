<x-master>
    
    @section('content') @if(session('message'))
    <p class="alert alert-primary">{{ session("message") }}</p>
    @endif 
    @php
            $total_sum =0;
    @endphp


  
    <main class ="d-flex flex-row">
    <div
            class="container-fluid bg-trasparent my-4 p-3"
            style="position: relative"
        >

        <div
                class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3"
            >
  
  
    
        @foreach($products as $product)
            @php
            $total_sum += $product->price;
            @endphp
                
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img
                            src="{{asset($product->product_image)}}"
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="label-top shadow-sm">{{$product->brand}}</div>
                        <div class="card-body">
                            <div class="clearfix mb-3">
                                <span
                                    class="float-start badge rounded-pill bg-success"
                                    id="{{$product->id}}"
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

                            <div class="container">
<div class="clearfix mb-3">
    <span class="float-start ">
    <div id="increment-count">
        <input onclick="increment({{$product->price}},{{$product->id}})" type="image" id="up-arrow" src="{{asset('storage/up_arrow.png')}}" height="20px" width="20px" />
    </div>

    <div id="decrement-count">
        <input type="image" onclick="decrement({{$product->price}},{{$product->id}})" id="down-arrow"  src="{{asset('storage/down_arrow.png')}}" height="20px" width="20px"/>
    </div>

</span>

<span class="float-end" >
    <span class = "float-start">Qty: </span>
    <span class= "float-end"> 
<div class=ml-1 id="total-count-for-{{$product->id}}">
    1
  </div>
  </span>
</span>
</div>
</div>
                           
                            
                            
                            <div class="text-center my-4">
                                <a href="{{route('cart.remove',['product'=>$product])}}" class="btn btn-warning"
                                    >Remove From Cart</a
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
     
            @endforeach
        
        

    </div>
    </div>
</main>
<div class="text-center my-4">
                                <a href="#" class="btn btn-warning" 
                                    ><span class="float-start">Total: $</span><span id ="total_price" class= "float-end">{{$total_sum}}</span></a
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

@endsection 

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>


    <script>
      
 

    function increment(product_price , id) {
        var qty = document.getElementById("total-count-for-" + id).innerHTML;
        var total_sum = document.getElementById("total_price").innerHTML;
        total_sum = parseInt(total_sum)+parseInt(product_price);
        qty++;
        product_price =  product_price * qty+ "$";
        
        
        document.getElementById(id).innerHTML = product_price;
        document.getElementById("total-count-for-"+id).innerHTML = qty;
        document.getElementById("total_price").innerHTML = total_sum;
    }

    function decrement(product_price , id) {
        var qty = document.getElementById("total-count-for-" + id).innerHTML;
        if(qty>1){
            var total_sum = document.getElementById("total_price").innerHTML;
            total_sum = parseInt(total_sum)-parseInt(product_price);
            qty--;
            product_price = "$"+product_price * qty;
            document.getElementById(id).innerHTML = product_price;
            document.getElementById("total-count-for-"+id).innerHTML = qty;
            document.getElementById("total_price").innerHTML = total_sum;
    }
    }
    </script>

    @endsection
</x-master>
