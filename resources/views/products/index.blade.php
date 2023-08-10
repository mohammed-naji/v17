<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        .pages nav div div:first-child {
            display: none;
        }

        .pages nav div {
            justify-content: center !important;
        }

        .pages .active>.page-link, .pages .page-link.active {
            background: #20c2d6;
            border-color: #20c2d6;
        }

        .pages a.page-link {
            color: #20c2d6;
        }
    </style>
  </head>
  <body>


    <div class="container my-5">
        <h1 class="text-center">All Products</h1>
        <table class="table table-bordered table-hover text-center table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img width="80" src="{{ $product->image }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}$</td>
                <td>{{ $product->created_at->format('F d, Y') }}</td>
                <td>{{ $product->updated_at->diffForHumans() }}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach


        </table>

        <div class="pages">
            {{ $products->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
