<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            List of producos
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">New product</a>
          </div>
          <div class="card-body">
            @if(session('info'))
              <div class="alert alert-success">{{ session('info') }}</div>
            @endif
            <table class="table table-hover table-sm">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $p)
                  <tr>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->price }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>