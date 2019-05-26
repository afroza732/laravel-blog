@extends('admin.admin_master')
@section('main_content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header text-center text-primary">Category Edit</div>
        <h4 class="text-success text-center">
            <?php
            $message = Session::get('message');
            if (isset($message)) {
                echo $message;
                Session::put('message');
            }
            ?> 
        </h4>
        <div class="card-body">
            {!! Form::open(array('url' =>'/update-category','method'=>'post')) !!}
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Category Name:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <input type="text" id="firstName" name="category_name" value="{{$category_info->category_name}}" class="form-control" required="required" autofocus="autofocus">
                            <input type="hidden" id="firstName" name="category_id" value="{{$category_info->category_id}}" class="form-control" required="required" autofocus="autofocus">

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Category Description:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <textarea id="richTextBody" name="category_description" class="form-control">{{$category_info->category_description}}</textarea>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Publication Status:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <select name='publication_status' class="form-control">
                                <option>--select option--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Update">
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

