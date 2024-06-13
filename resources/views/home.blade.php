@extends('layout.app')
@push('css')
@endpush
@section('content')
    <div class="container">

        <h1 class="mt-5">Welcome {{ auth()->user()->name }} to the example app</h1>
        <h3 style="padding-top:50px;">Add Students</h3>

        <div class="card-body">
            <form id="add-student-new">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter your name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Email</label>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter your email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Department</label>
                    </div>

                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="department" id="department"
                            placeholder="Enter your department">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <button class="btn btn-primary" id="add-student">Add Student</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (sizeof($students) > 0)
                <div class="form-row">
                    <div class="form-group col-md-2">Sl No</div>
                    <div class="form-group col-md-2">Name</div>
                    <div class="form-group col-md-2">Email</div>
                    <div class="form-group col-md-2">Department</div>
                </div>
            @endif
            <div id="student-list">
                @foreach ($students as $student)
                    <div class="form-row">
                        <div class="form-group col-md-2">{{ $loop->iteration }}</div>
                        <div class="form-group col-md-2">{{ $student->name }}</div>
                        <div class="form-group col-md-2">{{ $student->email }}</div>
                        <div class="form-group col-md-2">{{ $student->department }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-student').click(function(e) {
                // var name = $('#name').val();
                // var email = $('#email').val();
                // var department = $('#department').val();
                var data = $('#add-student-new').serialize();
                console.log(data);
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    url: "{{ route('student.add') }}",
                    success: function(response) {
                        $('#add-student-new')[0].reset();
                        alert(response.message);
                        var todo =
                            '<div class="form-row" id="todo"> <div class = "form-group col-md-2" > ' +
                            response.data.id + ' </div> <div class = "form-group col-md-2" > ' +
                            response.data.name +
                            ' </div> <div class = "form-group col-md-2" > ' +
                            response.data.email +
                            ' </div> <div class = "form-group col-md-2" > ' +
                            response.data.department + ' </div> </div>';
                        $('#student-list').append(todo);
                    }
                });
            })
        })
    </script>
@endpush
