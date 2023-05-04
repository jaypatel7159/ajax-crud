@extends("include.header")
@section("contain")
<div class="row">
    <h2 class="">List Employee</h2>
    <div class="emp-btn float-right">
        <button type="button" id="addEmployee" class="btn btn-primary ml-1">
            Add Employee
        </button>
    </div>
    <!-- <form method="get" action="{{route("employeeList")}}">
        <div class="row mt-5">
            <div class="col-md-2">
                <input type="text" name="search" placeholder="Enter name" class="form-control">
            </div>
            <div class="col-md-2">
                <select name="order" id="" class="form-control">
                    <option value="">Select order</option>
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Dscending</option>
                </select>
            </div>
            <div class="col-md-1">
                <input type="submit" value="Search" class="btn btn-warning">
            </div>
        </div>
    </form> -->
    <div class="w-25">
        @if(Session::has('log'))
        <p class="alert alert-info">{{ Session::get('log') }}</p>
        @endif
        @if(Session::has('msg'))
        <p class="alert alert-info">{{ Session::get('msg') }}</p>
        @endif
        @if(Session::has('del'))
        <p class="alert alert-danger">{{ Session::get('del') }}</p>
        @endif

    </div>
    <!-- //add modal -->
    <div class="modal fade" id="employeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <!-- <button type="button" class="btn-close" data-dismiss="modal" id="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <button type="button" class="btn-close reset_btn" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="form_data" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="f_name">First name:</label>
                            <input type="text" class="form-control name" id="name" placeholder="Enter firstname" name="f_name">
                            @error('f_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_f_name error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="l_name">last name:</label>
                            <input type="text" class="form-control" placeholder="Enter lastname" name="l_name">
                            @error('l_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_l_name error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_email error_hide "></label>
                        </div>
                        <div class="form-group">
                            <label for="sub_emp_id" name="sub employee">Choose Sub Employee:</label>
                            <select name="sub_emp_id" id="Subemp" class="form-control">

                                <option></option>
                                @foreach($semp as $semps)
                                <option value="{{$semps->id}}">{{$semps->se_name}}</option>
                                @endforeach
                            </select>
                            <label class="error_sub_emp_id error_hide "></label>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label><br>
                            <input type="radio" name="gender" value="Male">Male
                            <input type="radio" name="gender" value="Female">Female
                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror<br>
                            <label class="error_gender error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="hobbies">Hobbies:</label><br>
                            <input type="checkbox" name="hobby[]" value="Cricket"> Cricket
                            <input type="checkbox" name="hobby[]" value="Football"> Football
                            <input type="checkbox" name="hobby[]" value="Travelling"> Travelling
                            <input type="checkbox" name="hobby[]" value="Music"> Music

                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_hobby error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="">Choose image:</label>
                            <input type="file" multiple class="form-control" name="image[]">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_image error_hide"></label>
                        </div>
                        <input type="hidden" name="u_id" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- 
//edit modal -->
    <div class="modal fade" id="editEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <!-- <button type="button" class="btn-close" data-dismiss="modal" id="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <button type="button" class="btn-close reset_btn" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="form_update_data" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="f_name">First name:</label>
                            <input type="text" class="form-control f_name" id="name" placeholder="Enter firstname" name="f_name">
                            @error('f_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_f_name error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="l_name">last name:</label>
                            <input type="text" class="form-control l_name" placeholder="Enter lastname" name="l_name">
                            @error('l_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_l_name error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control email" placeholder="Enter email" name="email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_email error_hide "></label>
                        </div>
                        <div class="form-group">
                            <label for="sub_emp_id" name="sub employee">Choose Sub Employee:</label>
                            <select name="sub_emp_id" id="Subemp" class="form-control sub_emp">

                                <option></option>
                                @foreach($semp as $semps)
                                <option value="{{$semps->id}}">{{$semps->se_name}}</option>
                                @endforeach
                            </select>
                            <label class="error_sub_emp_id error_hide "></label>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label><br>
                            <input type="radio" class="male" name="gender" value="Male">Male
                            <input type="radio" name="gender" class="female" value="Female">Female
                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror<br>
                            <label class="error_gender error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="hobbies">Hobbies:</label><br>
                            <input type="checkbox" class="cricket" name="hobby[]" value="Cricket"> Cricket
                            <input type="checkbox" class="football" name="hobby[]" value="Football"> Football
                            <input type="checkbox" class="travelling" name="hobby[]" value="Travelling"> Travelling
                            <input type="checkbox" class="music" name="hobby[]" value="Music"> Music

                            @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_hobby error_hide"></label>
                        </div>
                        <div class="form-group">
                            <label for="">Choose image:</label>
                            <!-- <img name="img" src="" width="50" height="50" style="display: block;"> -->
                            <div id="show_image"></div>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="error_image error_hide"></label>

                        </div>
                        <input type="hidden" name="id" class="id">
                        <button type="submit" class="btn btn-primary update-btn">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <table class="table table-striped" id="employeeDatatbale">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Sub employee</th>
                <th>Gender</th>
                <th>Hobby</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>
<script>
    $(document).ready(function() {
        $(document).on("click", "#addEmployee", function() {
            $("#employeeModal").modal("show");
        })


        $(function() {
            var table = $('#employeeDatatbale').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employeeList') }}",
                columns: [{
                        data: 'f_name',
                        name: 'f_name'
                    },
                    {
                        data: 'l_name',
                        name: 'l_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'sub_emp_id',
                        name: 'sub_emp_id'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'hobby',
                        name: 'hobby'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        // orderable: false,
                        // searchable: false
                    },
                ]
            });



            $(document).on("click", ".delete_btn", function() {

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{route('deleteEmployee')}}",
                                type: 'GET',
                                data: {
                                    emp_id: $(this).attr("data-id"),
                                },
                                success: function(data) {
                                    table.ajax.reload();
                                    sweetAlert("Data Delete successfully");
                                }
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            });


            $("#form_data").on('submit', (function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('storeEmployee') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == "0") {

                            $.each(data.error, function(key, value) {

                                $(".error_" + key).show();
                                $(".error_" + key).html(value);
                                $(".error_" + key).css("color", "red");
                            })
                        } else {
                            table.ajax.reload();
                            sweetAlert("Data inserted successfully");
                            $("#employeeModal").modal("hide");
                        }

                    },
                });
            }));

            $(document).on("click", ".edit_btn", function() {
                var id = $(this).attr("data-id")
                $.ajax({
                    url: "{{route('editEmployee')}}",
                    type: 'get',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#editEmployeeModal").modal("show");
                        $(".f_name").val(data.emp.f_name)
                        $(".l_name").val(data.emp.l_name)
                        $(".email").val(data.emp.email)
                        $(".sub_emp").val(data.emp.sub_emp_id)
                        $(".id").val(data.emp.id)
                        var urls = window.location.origin
                        $("#show_image").html('<img src="' + urls + '/storage/photos/' + data.emp.image + '" width="50" class="img-fluid img-thumbnail">')
                        // $(".gender").val(data.emp.gender)
                        if (data.emp.gender == "Male") {
                            $(".male").prop("checked", true)
                        } else {
                            $(".female").prop("checked", true)
                        }

                        $(".cricket").prop("checked", false);
                        $(".football").prop("checked", false);
                        $(".travelling").prop("checked", false);
                        $(".music").prop("checked", false);

                        if ($.inArray("Cricket", data.hobby) != -1) {

                            $(".cricket").prop("checked", true);
                        }
                        if ($.inArray("Football", data.hobby) != -1) {

                            $(".football").prop("checked", true);
                        }
                        if ($.inArray("Travelling", data.hobby) != -1) {

                            $(".travelling").prop("checked", true);
                        }
                        if ($.inArray("Music", data.hobby) != -1) {

                            $(".music").prop("checked", true);
                        }
                    }
                })
            })


            // Update record

            $("#form_update_data").on('submit', (function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateEmployee') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == "0") {

                            $.each(data.error, function(key, value) {

                                $(".error_" + key).show();
                                $(".error_" + key).html(value);
                                $(".error_" + key).css("color", "red");
                            })
                        } else {
                            table.ajax.reload();
                            sweetAlert("Data update successfully");
                            $("#editEmployeeModal").modal("hide");
                        }
                    },
                });
            }));
        });
    })


    $(".reset_btn").click(function() {
        // $('#form_data')[0].reset();
        $("#form_data").trigger('reset');
        $(".error_hide").hide();
    })
</script>
@endsection