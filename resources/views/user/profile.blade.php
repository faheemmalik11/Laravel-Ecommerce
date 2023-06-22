<x-master>

    

    @section('content')

    @if(session('message-user-updated'))
        <p class= 'alert alert-success'>{{session('message-user-updated')}}</p>
    @endif
    
    <h1>Profile For {{$user->name}}</h1>
    <form method="POST" action="{{route('user.profile.update',['user'=>$user])}}" enctype="multipart/form-data">
            @csrf
            <div>
                <img class="img-profile rounded-circle m-3" width=200px; height=200px; src="{{asset($user->profile_image)}}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Profile Image</label>
                <input type="file" class="form-control-file" name = "profile_image"  >
            </div>

         

            <div class="form-group">
                <label for="PostTile">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  name = "name" value="{{$user->name}}" >
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="PostTile">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror"  name = "email" value="{{$user->email}}"  >
                @error('email')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="PostTile">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"  name = "password"  >
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="PostTile">Confirm Password</label>
                <input type="password" class="form-control @error('confirm-password') is-invalid @enderror"  name = "confirm-password"  >
                @error('confirm-password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            

            <button type="submit" class="btn btn-primary">Submit</button>
    @endsection
</x-master>