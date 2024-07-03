<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Ms payment</title>
    <link rel="icon" type="x-icon" href="{{asset('assets/img/shirt-solid.svg') }}">
</head>
<body>
   <!-- CRUD => [CREATE , READ , UPDATE , DELETE ] -->
   @if(Session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session()->get('success') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
