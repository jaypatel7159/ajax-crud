@extends("include.header")
@section("contain")
<header class="container p-5 bg-white shadow">
    <form action="{{route("employeeList")}}" method="post">
        @csrf
        <div class="mb-3 mt-3">
            <label for="" class="form-label">First Name:</label>
            <input type="text" class="form-control" name="f_name" value="{{$user->f_name}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="l_name" value="{{$user->l_name}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pwd" value="{{$user->password}}" name="password">
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>


</header>

@endsection