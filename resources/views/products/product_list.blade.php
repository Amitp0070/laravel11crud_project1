<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD Operation </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel CRUD Operation</h3>
    </div>
    <div class="container" >
        <div class="row justify-content-center mt-3">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.create')}}" class="btn btn-dark">Create Product</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(Session::has('success'))
            <div class="col-md-10 mt-2">
                <div class="alert alert-success">{{Session::get('success')}}</div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-2" >
                    <div class="card-header bg-dark text-white text-center">
                        <h3>Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Create_at</th>
                                <th>Action</th>
                            </tr>
                            @if($products->isNotEmpty())
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if($product->image != "")
                                    <img width="50" src="{{asset('uploads/products/'.$product->image)}}" alt="" style="width: 50px; height: 50px;">
                                    @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->sku}}</td>
                                <td>${{$product->price}}</td>
                                <td>{{\Carbon\Carbon::parse($product->create_at)->format('d M, Y')}}</td>
                                <td>
                                    <a href="" class="btn btn-dark">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>