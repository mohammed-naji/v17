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

        table th, table td {
            vertical-align: middle
        }
    </style>
  </head>
  <body>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Trashed Products</h1>
            <a class="btn btn-info" href="{{ route('products.index') }}">All Products</a>
        </div>

        @if (session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-bordered table-hover text-center table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Deleted At</th>
                <th>Actions</th>
            </tr>
            @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->deleted_at->diffForHumans() }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('products.restore', $product->id) }}"><i class="fas fa-undo"></i></a>
                    <form class="d-inline" action="{{ route('products.forcedelete', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No Data Found</td>
            </tr>
            @endforelse

        </table>

        <div class="pages">
            {{ $products->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>
