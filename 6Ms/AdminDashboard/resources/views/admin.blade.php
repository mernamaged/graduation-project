<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>6Ms Dashboard</title>
    <link rel="icon" type="x-icon" href="{{ asset('assets/img/shirt-solid.svg') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminstyle/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{asset('adminstyle/admin.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li>
                    <div class="ico pe-2">
                        <form action="{{route('logout')}}" method="post" role="search">
                            @method('DELETE')
                            @csrf
                            <button type="submit" title="logout" class="out"><i class="fa-solid fa-right-from-bracket custom-smaller-icon"></i></button>
                        </form>
                    </div>
                </li>
            </ul>

            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link" style="pointer-events:none">
                <img src=" {{ asset('assets/img/shirt-solid.svg') }}" alt="AdminLTE Logo" class="brand-image">
                <span class="brand-text ">6Ms</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                        <img src=" {{asset('adminimg/'.$admin->admin_img)}}" class="img-circle elevation-2" alt="User Image">

                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{Auth::user()->UserName}}</a>
                    </div>
                </div>
                <!-- SidebarSearch Form -->
                <div class="form-inline">
    <form action="{{route('dashboard.index')}}" method="get" class="d-flex">
        @csrf
        <input type="search" name="search" placeholder="Search" aria-label="Search" class="form-control form-control-sidebar custom-input-width">
        <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
        </button>
    </form>
</div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="statistic-link">
                                <p>
                                    Statistic
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="user-link">
                                <p>
                                    users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="admin-link">
                                <p>
                                    admins
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="customer-link">
                                <p>
                                    customers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="supplier-link">
                                <p>
                                    suppliers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="investor-link">
                                <p>
                                    Local Investors
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="product-link">
                                <p>
                                    products
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="payment-link">
                                <p>
                                    payment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="order-link">
                                <p>
                                    order
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="feedback-link">
                                <p>
                                    feedback
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="contract-link">
                                <p>
                                    contract
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="material-link">
                                <p>
                                    Raw Material
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="endproduct-link">
                                <p>
                                    end products
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="package-link">
                                <p>
                                    packages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="contact-link">
                                <p>
                                    contacts
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="card-body">
                <!-- CRUD => [CREATE , READ , UPDATE , DELETE ] -->
                @if(Session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session()->get('success') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                    @endif
                </div>

                <!-- Main content -->
                <section class="content" id="content-wrapper">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $order->count() }}</h3>
                                        <p>Orders</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $product->count() }}</h3>
                                        <p>products</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $usero->count() }}</h3>
                                        <p>User </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $contract->count() }}</h3>
                                        <p>factory</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </section>
               <!-- User -->
<section class="content" id="content-user">
    <div class="container-fluid">
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <a href="{{route('users.create')}} " class="btn btn-primary">Add New user</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>password</th>
                                <th>user phone</th>
                                <th>user address</th>
                                <th>group id</th>
                                <th>created at</th>
                                <th>updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->UserID}}</td>
                                <td>{{$user->UserName}}</td>
                                <td>{{$user->Email}}</td>
                                <td>{{$user->password}}</td>
                                <td>{{$user->user_phone}}</td>
                                <td>{{$user->user_address}}</td>
                                <td>{{$user->GroupID}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <a class="btn btn-primary btn-sm" href="{{route('users.edit',$user->UserID)}}">edit</a>
                                        <form action="{{route('users.destroy',$user->UserID)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm del">delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

                <!-- supplier -->
                <section class="content" id="content-supplier">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                <a href="{{route('suppliers.create')}}" class="btn btn-primary">Add New supplier</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>material_type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($suppliers as $supplier)
                                            <tr>
                                                <td>{{$supplier->supplier_id}}</td>
                                                <td>{{$supplier->material_type}}</td>
                                                <td>
                                                    <div style="display: flex; gap: 5px;">
                                                        <a class="btn btn-primary btn-sm" href="{{route('suppliers.edit',$supplier->supplier_id)}}">edit</a>
                                                        <form action="{{route('suppliers.destroy',$supplier->supplier_id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm del">delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$suppliers->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- customer -->
                <section class="content" id="content-customer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customers as $customer)
                                            <tr>
                                                <td>{{$customer->customer_id}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$customers->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Local investor -->
                <section class="content" id="content-investor">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($investors as $investor)
                                            <tr>
                                                <td>{{$investor->investor_id}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$investors->links()}}
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- admin -->
                <section class="content" id="content-admin">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                    <a href="{{route('admins.create')}}" class="btn btn-primary">Add New admin</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>admin image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($admins as $admin)
                                            <tr>
                                                <td>{{$admin->admin_id}}</td>
                                                <td><img src="{{asset('adminimg/'.$admin->admin_img)}}" alt="" style="max-width: 100px; max-height: 100px;"></td>
                                                <td>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a class="btn btn-primary btn-sm mb-2 mb-md-0 me-md-2" href="{{route('admins.edit',$admin->admin_id)}}">Edit</a>
                                                        <form action="{{route('admins.destroy',$admin->admin_id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm del">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$admins->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Product -->
                <section class="content" id="content-product">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                    <a href="{{route('products.create')}}" class="btn btn-primary">Add New PRODUCT</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>image</th>
                                                <th>product type</th>
                                                <th>admin id</th>
                                                <th>Create Date</th>
                                                <th>Update Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->prod_id}}</td>
                                                <td>{{$product->p_name}}</td>
                                                <td>{{$product->p_price}}</td>
                                                <td><img src="{{asset('adminimg/'.$product->endPro_image)}}" alt="" style="max-width: 100px; max-height: 100px;"></td>
                                                <td>{{$product->product_type}}</td>
                                                <td>{{$product->admin_id}}</td>
                                                <td>{{$product->created_at}}</td>
                                                <td>{{$product->updated_at}}</td>
                                                <td>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a class="btn btn-primary btn-sm mb-2 mb-md-0 me-md-2" href="{{route('products.edit',$product->prod_id)}}">Edit</a>
                                                        <form action="{{route('products.destroy',$product->prod_id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm del">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end product -->
                <section class="content" id="content-endproduct">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                    <a href="{{route('endProducts.create')}}" class="btn btn-primary">Add New end product</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>brand name</th>
                                                <th>stock</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($endProducts as $endProduct)
                                            <tr>
                                                <td>{{$endProduct->endPro_id}}</td>
                                                <td>{{$endProduct->brand_name}}</td>
                                                <td>{{$endProduct->stock}}</td>

                                                <td>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a class="btn btn-primary btn-sm mb-2 mb-md-0 me-md-2" href="{{route('endProducts.edit',$endProduct->endPro_id)}}">Edit</a>
                                                        <form action="{{route('endProducts.destroy',$endProduct->endPro_id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm del">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$endProducts->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Package -->
                <section class="content" id="content-package">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                    <a href="{{route('packages.create')}}" class="btn btn-primary">Add New package</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>package_type</th>
                                                <th>description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($packages as $package)
                                            <tr>
                                                <td>{{$package->package_id}}</td>
                                                <td>{{$package->package_type}}</td>
                                                <td>{{$package->describe}}</td>

                                                <td>
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <a class="btn btn-primary btn-sm mb-2 mb-md-0 me-md-2" href="{{route('packages.edit',$package->package_id)}}">Edit</a>
                                                        <form action="{{route('packages.destroy',$package->package_id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm del">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$packages->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- contract -->

                <section class="content" id="content-contract">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                    <a href="{{route('contracts.create')}} " class="btn btn-primary">Add New contract</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>contract_budget</th>
                                                <th>contract_duration</th>
                                                <th>supplier id</th>
                                                <th>created_at</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contracts as $contract)
                                            <tr>
                                                <td>{{$contract->contract_id}}</td>
                                                <td>{{$contract->contract_budget}}</td>
                                                <td>{{$contract->contract_duration}}</td>
                                                <td>{{$contract->supplier_id}}</td>
                                                <td>{{$contract->created_at}}</td>
                                                <td>
                                                    <div style="display: flex; gap: 5px;">
                                                        <a class="btn btn-primary btn-sm" href="{{route('contracts.edit',$contract->contract_id)}}">edit</a>
                                                        <form action="{{route('contracts.destroy',$contract->contract_id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm del">delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$contracts->links()}}
                                   </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- raw material -->
                <section class="content" id="content-material">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                    <a href="{{route('rawMaterials.create')}}" class="btn btn-primary">Add New raw material</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>material_type</th>
                                                <th>material price</th>
                                                <th>package_id</th>
                                                <th>raw_image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rawMaterials as $raw)
                                            <tr>
                                                <td>{{$raw->raw_id}}</td>
                                                <td>{{$raw->material_type}}</td>
                                                <td>{{$raw->price_raw}}</td>
                                                <td>{{$raw->package_id}}</td>

                                                <td><img src="{{asset('adminimg/'.$raw->raw_image)}}" alt="" style="max-width: 100px; max-height: 100px;"></td>

                                                <td>
                                                    <div style="display: flex; gap: 5px;">
                                                        <a class="btn btn-primary btn-sm" href="{{route('rawMaterials.edit',$raw->raw_id)}}">edit</a>
                                                        <form action="{{route('rawMaterials.destroy',$raw->raw_id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm del">delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$rawMaterials->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- payment -->
                <section class="content" id="content-payment">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>payment_amount</th>
                                                <th>payment_method</th>
                                                <th>created_at</th>
                                                <th>order_id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payments as $payment)
                                            <tr>
                                                <td>{{$payment->payment_id}}</td>
                                                <td>{{$payment->payment_amount}}</td>
                                                <td>{{$payment->payment_method}}</td>
                                                <td>{{$payment->created_at}}</td>
                                                <td>{{$payment->order_id}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$payments->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- order -->
                <section class="content" id="content-order">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>#</th>
                                                <th>p_name</th>
                                                <th>size</th>
                                                <th>ord_price</th>
                                                <th>order_quanitity</th>
                                                <th>space_price</th>
                                                <th>total_price</th>
                                                <th>design_img</th>
                                                <th>product type</th>
                                                <th>UserID</th>
                                                <th>created_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{$order->p_name}}</td>
                                                <td>{{$order->size}}</td>
                                                <td>{{$order->ord_price}}</td>
                                                <td>{{$order->order_quanitity}}</td>
                                                <td>{{$order->space_price}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>{{$order->design_img}}</td>
                                                <td>{{$order->product_type}}</td>
                                                <td>{{$order->UserID}}</td>
                                                <td>{{$order->created_at}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$orders->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- contact -->

                <section class="content" id="content-contact">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>message</th>
                                                <th>phone</th>
                                                <th>created_at</th>
                                                <th>user id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contacts as $contact)
                                            <tr>
                                                <td>{{$contact->contact_id}}</td>
                                                <td>{{$contact->contactName}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->message}}</td>
                                                <td>{{$contact->phone}}</td>
                                                <td>{{$contact->created_at}}</td>
                                                <td>{{$contact->UserID}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    {{$contacts->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- feedback -->
                <section class="content" id="content-feedback">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-header">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>comment</th>
                                                <th>rate</th>
                                                <th>date</th>
                                                <th>order_id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($feedbacks as $feedback)
                                            <tr>
                                                <td>{{$feedback->feed_id}}</td>
                                                <td>{{$feedback->comment}}</td>
                                                <td>{{$feedback->rate}}</td>
                                                <td>{{$feedback->created_at}}</td>
                                                <td>{{$feedback->order_id}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">

                                    {{$feedbacks->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer>
                <strong>6Ms Admin</strong>
            </footer>
            <!-- jQuery -->
            <script src="{{ asset('assets/js/jquery.js') }}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/js/all.min.js') }}"></script>

            <!-- AdminLTE App -->
            <script src="{{ asset('adminstyle/adminlte.min.js') }}"></script>

            <script src="{{ asset('adminstyle/adminmain.js') }}"></script>
</body>

</html>
