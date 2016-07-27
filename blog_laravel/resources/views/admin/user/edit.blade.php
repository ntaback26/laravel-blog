@extends('admin.layouts.master')

@section('content')
@include('admin.layouts.nav')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">User Manager</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editing user: <strong>{{$user->name}}</strong>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-lg-7">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{route('admin.user.update', ['id' => $user->id])}}" method="POST">
                            <div class="form-group">
                                <label>Name <span class="required">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Change Password</label>
                                <input type="password" class="form-control" name="password" disabled />
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password2" disabled />
                            </div>
                            <div class="form-group">
                                <label>Role</label><br>
                                <label class="radio-inline">
                                    <input name="role" value="admin" type="radio" 
                                    @if($user->role == 'admin') 
                                        checked
                                    @endif> Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="admin" type="radio" 
                                    @if($user->role == 'member') 
                                        checked
                                    @endif> Member
                                </label>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('scripts')
<!-- Change Password -->
<script>
$(document).ready(function() {
    $('#changePassword').change(function() {
        if ($(this).is(':checked')) {
            $("input[type='password']").removeAttr('disabled');
        } else {
            $("input[type='password']").attr('disabled', '');
        }
    });
});
</script>
@endsection