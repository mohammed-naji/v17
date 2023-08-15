<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  </head>
  <body>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Product</h1>
            <div>
                <a class="btn btn-warning" href="{{ route('products.index') }}">All Products</a>
            <button onclick="history.back()" class="btn btn-info"><i class="fas fa-arrow-left"></i> Return Back</button>
            </div>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
                <img width="80" src="{{ $product->path }}" alt="">
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" placeholder="Price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" />
                @error('price')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea placeholder="Content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{ old('content', $product->content) }}</textarea>
                @error('content')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
