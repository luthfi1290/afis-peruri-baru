@extends('login-template')

@push('link-image')
{{route('afis.login')}}
@endpush

@push('page.style')
    <style>
    .error {
        color: #a94442;
    }
    </style>
@endpush

@section('form-login')
<form class="login-form" action="{{route('afis.login.post')}}" name="loginAfis" method="post">
    {{ csrf_field() }}
    <div class="form-title text-center">
        <span class="form-title">A F I S</span><br>
        <span class="form-subtitle">Automated Fingerprint Identification System</span>
    </div>
    @if (session()->has('error.message') )
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span> {!! session()->get('error.message') !!} </span>
        </div>
    @endif
    {{-- <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>Nama user dan password tidak boleh kosong </span>
    </div> --}}
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Nama user</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Nama user" name="email" /> </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
    <div class="form-actions">
        <button type="submit" class="btn proses btn-block fn16 uppercase"><i class="fa fa-unlock"> </i> L o g i n</button>
    </div>
    <div class="form-actions">
        <div class="pull-left">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" /> Ingat saya
                <span></span>
            </label>
        </div>
    </div>
</form>
@endsection

@push('page.js')
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script>
  $("form[name='loginAfis']").validate({
    
    rules: {
     
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        // minlength: 5
      }
    },
    
    messages: {      
      password: {
        required: "Password tidak boleh kosong !!!",
        // minlength: "Your password must be at least 5 characters long"
      },
      email: {
        email: "Tidak sesuai format email",
        required: 'Nama user tidak boleh kosong !!!'
      }
    },
    errorElement: "div",
    errorPlacement: function ( error, element ) {
        // Add the `help-block` class to the error element
        error.addClass( "alert alert-danger" );
        error.attr('style','margin:10px auto');

        error.insertAfter( element );
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
    },

    submitHandler: function(form) {
      form.submit();
    }
  });
	
</script>
@endpush