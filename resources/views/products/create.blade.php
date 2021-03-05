<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store app</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Create product
          </div>
          <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Enter the description">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Enter the price">
              </div>
              <button class="btn btn-primary btn-sm">Save</button>
              <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>