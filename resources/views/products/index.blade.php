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
            <h1>All Products</h1>
            <a class="btn btn-info" href="{{ route('products.create') }}">Add new Product</a>
        </div>

        {{-- @if (session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}


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
            @forelse ($products as $product)
            <tr>
                {{-- <td>{{ $product->id }}</td> --}}
                <td>{{ $loop->iteration }}</td>
                <td><img width="80" src="{{ asset('images/'.$product->image) }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}$</td>
                <td>{{ $product->created_at->format('F d, Y') }}</td>
                <td>{{ $product->updated_at->diffForHumans() }}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        {{-- <input type="hidden" name="_method" value="delete"> --}}

                        {{-- <button onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> --}}
                        <button type="button" onclick="deleteProduct(event)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                    {{-- <a class="btn btn-danger btn-sm" href="{{ route('products.destroy', $product->id) }}"><i class="fas fa-trash"></i></a> --}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No Data Found</td>
            </tr>
            @endforelse

            {{-- @if ($products->count() > 0)
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
            @else
            <tr>
                <td colspan="7">No Data Found</td>
            </tr>
            @endif --}}



        </table>

        <div class="pages">
            {{ $products->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

        @if(session('msg'))
        Toast.fire({
            icon: '{{ session("type") }}',
            title: '{{ session("msg") }}'
        })
        @endif

        function deleteProduct(e) {
            // console.log(e.target.closest('form'));
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                e.target.closest('form').submit()
            }
            })
        }
    </script>

  </body>
</html>
