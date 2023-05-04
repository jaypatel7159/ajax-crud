@extends("include.header")
@section("contain")
<div class="row mt-5 justify-content-center d-flex">
  <div class="card w-30">

    <div class="card-body">
      <h2>Edit Sub Employee form</h2>
      <form action="{{route("updatesubEmployee")}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" placeholder="Enter name" value="{{$semp->se_name}}" name="se_name">
        </div>
        <input type="hidden" name="id" value="{{$semp->id}}">

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>

</div>

@endsection