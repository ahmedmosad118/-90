<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/">RootDev</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="row">
      <br>
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
        </br>
          </br>  </br>
          <li class="nav-item">
            <a class="nav-link" href="/product-add">Add Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">Product List</a>
          </li>
        </ul>

        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Add Property</a>
          </li>
        </ul>
      </nav>
      <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <?php echo $__env->yieldContent("container"); ?>
</main>
    </div>
  </div>
</body>
</html>
