<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Product edit</title>
</head>

<body>
    <div class="container mt-3" style="margin-top:20px">
        <h2>Update product</h2>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="{{url('product-update')}}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="id">Product ID:</label>
                <input type="text" class="form-control" id="id" name="id"
                       value="{{$pro->productID}}" readonly >
            </div>
            <div class="mb-3 mt-3">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{$pro->productName}}" >
            </div>
            <div class="mb-3 mt-3">
                <label for="price">Product Price:</label>
                <input type="number" class="form-control" id="price" name="price"
                       value="{{$pro->productPrice}}" >
            </div>
            <div class="mb-3 mt-3">
                <label for="image">Product Image:</label>
                <input type="hidden" value="{{$pro->productImage}}" id="old_image" name="old_image"><br>
                <img src="../pro_img/{{$pro->productImage}}" style="height: 100px; width: 100px;"><br>
                <input type="file" class="form-control" id="new_image" name="new_image" >
            </div>
            <div class="mb-3 mt-3">
                <label for="details">Details:</label>
                <textarea class="form-control" rows="5" id="details" name="details">
                    {{$pro->productDetails}}
                </textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($cat as $c)
                        <option value="{{$c->catID}}" {{$c->catID == $pro->catID ? 'selected' : ''}} >{{$c->catName}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url('product-list')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
</body>

</html>
