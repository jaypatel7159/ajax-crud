@extends("include.header")
@section("contain")
<div class="justify-content-center d-flex">
    <div class="card w-50">

        <div class="card-body">
            <h2 class="card-title">Edit Employee</h2>
            <form action="{{route("updateEmployee")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1">
                    <label for="f_name">First name:</label>
                    <input type="text" class="form-control" value="{{ $emp->f_name}}" placeholder="Enter firstname" name="f_name">
                    @error('f_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-1">
                    <label for="l_name">last name:</label>
                    <input type="text" class="form-control" value="{{$emp->l_name}}" placeholder="Enter lastname" name="l_name">
                    @error('l_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-1">
                    <label for="">Email:</label>
                    <input type="email" class="form-control" value="{{$emp->email}}" placeholder="Enter email" name="email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cars">Choose Sub Employee:</label>
                    <select name="sub_emp_id" id="Subemp" class="form-control">

                        @foreach($semp as $semps)
                        <option value="{{$semps->id}}" {{$semps->id == $emp->sub_emp_id  ? 'selected' : ''}}>{{$semps->se_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-1">
                    <label for="gender">Gender:</label><br>

                    <input type="radio" name="gender" value="Male" {{$emp->gender == 'Male' ? 'checked' : ''}}>Male

                    <input type="radio" name="gender" value="Female" {{$emp->gender == 'Female' ? 'checked' : ''}}>Female

                    @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-1">
                    <label for="hobbies">Hobbies:</label><br>
                    <input type="checkbox" name="hobby[]" value="Cricket" {{ in_array("Cricket", $hobby) ? "checked" : '' }}> Cricket
                    <input type="checkbox" name="hobby[]" value="Football" {{ in_array("Football", $hobby) ? "checked" : '' }}> Football
                    <input type="checkbox" name="hobby[]" value="Travelling" {{ in_array("Travelling", $hobby) ? "checked" : '' }}> Travelling
                    <input type="checkbox" name="hobby[]" value="Music" {{ in_array("Music", $hobby) ? "checked" : '' }}> Music

                    @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-1">
                    <label for="">Choose image:</label>

                    <img src="/storage/photos/{{ $emp->image }}" style="width: 50px; height:50px;">

                    <input type="file" class="form-control mt-1" name="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="id" value="{{$emp->id}}">
                <button type="submit" class="btn btn-primary mt-1">Update</button>
            </form>
        </div>
    </div>

</div>

@endsection