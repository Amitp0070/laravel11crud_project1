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
    <div class="container">
    <div class="row justify-content-center mt-3">
            <div class="col-md-10 d-flex justify-content-end" style="width: 725px;">
                <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-2" style="width: 700px; margin: 0 auto;">
                    <div class="card-header bg-dark text-white text-center">
                        <h3>Create Product</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="" class="form-label fw-bold">Name</label>
                                <input value="{{old('name')}}" type="text" class="@error('name') is-invalid @enderror form-control" placeholder="Name" name="name">
                                @error('name')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label fw-bold">Sku</label>
                                <input value="{{old('sku')}}" type="text" class="form-control @error('sku') is-invalid @enderror" placeholder="Sku" name="sku">
                                @error('sku')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label fw-bold">Price</label>
                                <input value="{{old('price')}}" type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price">
                                @error('price')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" name="description" placeholder="Desciption" cols="30" rows="5">{{old('description')}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Image</label>
                                <input type="file" class="form-control" placeholder="Image" name="image" value="{{old('image')}}">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>