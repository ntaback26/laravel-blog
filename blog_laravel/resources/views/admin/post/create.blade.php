@extends('admin.layouts.master')

@section('content')
@include('admin.layouts.nav')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Post Manager</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create new post
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-lg-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title <span class="required">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" />
                            </div>
                            <div class="form-group">
                                <label>Summary <span class="required">*</span></label>
                                <textarea class="form-control" name="summary" rows="3">{{old('summary')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Content <span class="required">*</span></label>
                                <textarea class="form-control" name="content" rows="6">{{old('content')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo">
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-success">Add</button>
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
<!-- CKeditor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection