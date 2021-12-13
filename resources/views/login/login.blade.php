<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap_4.6.1.min.css') }}">
</head>
<body>
    
</body>
</html>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Business Management</h3>
                        <div class="card-text">                   
                            <form method="post" action="{{ url('login') }}">                                 
                                 @csrf 
                                  
                                 @if(Session:: has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session:: get('success') }}
                                    </div>
                                 @endif

                                 @if(Session:: has('failed'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session:: get('failed') }}
                                    </div>
                                 @endif                  
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control form-control-sm">
                                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>                          
                                    <input type="password" name="password" class="form-control form-control-sm">
                                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>  
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>             
    </div>
 



