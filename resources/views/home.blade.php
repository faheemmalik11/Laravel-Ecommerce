<x-master>

    @section('content')
    
    @if(session('message'))
    <p class="alert alert-primary">{{session('message')}}</p>
    @endif

    
    
    @endsection
    
   

</x-master>