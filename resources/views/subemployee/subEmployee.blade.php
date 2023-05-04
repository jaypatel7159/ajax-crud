@extends("include.header")
@section("contain")
<div>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
      Add Sub Employee
    </button>
</div>

    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Sub Employee form</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="{{route("addsubEmployee")}}" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" name="se_name">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <h2>Sub Employee form</h2>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($semp as $semps)
        <tr>
          <td>{{$semps->id}}</td>
          <td>{{$semps->se_name}}</td>
          <td><a href="{{route('editsubEmployee',$semps->id)}}" class="btn btn-success">Edit</a> <a href="{{route('deletesubEmployee',$semps->id)}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endsection