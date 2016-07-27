@extends('admin.layouts.master')

@section('styles')
<!-- DataTables CSS -->
<link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
@endsection

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
                    List of posts
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    
                    <div class="dataTable_wrapper">
                        <table width="100%" class="table table-bordered table-hover" id="myDataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Summary</th>
                                <th>Comment</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>
                                		<p>{{$post->title}}</p>
                                		<img src="upload/{{$post->photo}}" class="img-responsive">
                                    </td>
                                    <td>{{$post->summary}}</td>
                                    <td align="center">
                                        <i class="fa fa-comments"></i>
                                        <a href="{{route('admin.comment.index', ['pid' => $post->id])}}">Comment</a>
                                    </td>
                                    <td align="center">
                                        <i class="fa fa-pencil"></i>
                                        <a href="{{route('admin.post.edit', ['id' => $post->id])}}">Edit</a>
                                    </td>
                                    <td align="center">
                                        <i class="fa fa-trash-o"></i>
                                        <a href="{{route('admin.post.destroy', ['id' => $post->id])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
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
<!-- DataTables JavaScript -->
<script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#myDataTable').DataTable({
        responsive: true
    });
});
</script>
@endsection