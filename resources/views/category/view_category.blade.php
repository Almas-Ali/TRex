<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories - Admin@CNPI BLOG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"
        defer></script>
</head>

<body>

    @include('layouts.navbar')

    <div class="container">

        <div class="my-3">
            <form class="row g-3" method="get" action="{{ route('add_category') }}">
                @if(isset($message))
				    <p class="alert alert-success">{{ $message }}</p>
                @endif
                
                <div class="col-auto">
                    <label for="add_category" class="visually-hidden">Add Category</label>
                    <input type="text" class="form-control" id="add_category" name="add_category"
                        placeholder="Add Category" required>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Add</button>
                </div>
            </form>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($categories as $category)    
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $category->name }}</td>
                        <td class="text-light">
                            <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-primary btn-sm">Delete</a>
                        </td>
                    </tr>
                    @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>