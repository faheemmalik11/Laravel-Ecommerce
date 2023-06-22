<x-master>
    @section('heading')
<h1 class="d-flex align-items-center justify-content-center p-3">Sign In</h1>
@endsection
    @section('content')

    @if(session('error'))
    <p class="alert alert-primary">{{session('error')}}</p>
    @endif

    <form method="post" action="{{route('logPost')}}">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" name="email" class="form-control" />
    <label class="form-label" for="form2Example1" >Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2"  name= "password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>


  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

  
</form>


  @endsection

  @section('script')

  <!-- <script>
  $(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
      email: $("#email").val(),
      password: $("#password").val(),
    };

    $.ajax({
      type: "POST",
      url: "http://127.0.0.1:8000/api/login",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
   
        var token = data.authorisation.token;
 
        localStorage.setItem('token', token);
      $.ajax({
                url: "http://127.0.0.1:8000/home", 
                type:'GET', 
                headers: {"Authorization":"Bearer "+token},
                success: function(result){ 
                          renderedView = result;
                    $('#target-element').html(renderedView);
                },
                error: function(result){ console.log("error "+result);}
        });
    })
    .fail(function (jqXHR, textStatus){
        console.log(jqXHR+textStatus);
    })

    event.preventDefault();
  });
});
</script> -->
@endsection
  </x-master>