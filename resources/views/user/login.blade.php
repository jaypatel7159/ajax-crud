@extends("include.header")
@section("contain")

    <div class="row justify-content-center">
        <div class="col-3">
        <div class="card" style="width: 20rem;">
            @if(Session::has('pass'))
            <p class="alert alert-danger">{{ Session::get('pass') }}</p>
            @endif
            @if(Session::has('uname'))
            <p class="alert alert-danger">{{ Session::get('uname') }}</p>
            @endif
            <div class="card-body">
                <h2 class="card-header">Login</h2>
                <form action="{{route("checkLogin")}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">username:</label>
                        <input type="text" class="form-control" value="{{old('uname')}}" placeholder="" name="uname">
                        @error('uname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">
                            Password:</label>
                        <input type="password" class="form-control" value="{{old('password')}}" placeholder="" name="password">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary justfy-center mt-1">submit</button>
                </form>
            </div>
        </div>

    </div>
    </div>
        </div>
    </div>
        
    @endsection