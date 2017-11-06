@extends('layout')
@section("container")
</br>
</br>
<div class="container">
  <h2>Product Table</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($product as $prop)
      <tr>
        <td>{{$prop->name}}</td>
        <td>{{$prop->price}}</td>
        <td>{{$prop->category->name}}</td>
        <td> 
  <button type="button" class="btn btn-danger"><a href="/product-delete/{{$prop->id}}">Delete</a></button>
</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
