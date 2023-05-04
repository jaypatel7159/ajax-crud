@extends("include.header")
@section("contain")
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <h2 class="card-header">Register</h2>
                <form action="{{route("storeRegister")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">User name:</label>
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder="" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">email:</label>
                        <input type="email" class="form-control" value="{{old('email')}}" placeholder="" name="email">
                        @error('email')
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
                    <div class="form-group">
                        <label for="">
                            Confirm Password:</label>
                        <input type="password" class="form-control" value="{{old('c_password')}}" placeholder="" name="c_password">
                        @error('c_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-1">submit</button>
                </form>
                    </div>
                </div>

                
            </div>
        </div>

@endsection