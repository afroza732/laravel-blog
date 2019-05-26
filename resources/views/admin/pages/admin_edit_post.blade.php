@extends('admin.admin_master')
@section('main_content')
<div class="container-fluid">
    <div class="card  mb-3">
        <div class="card-header text-center text-primary">Add New Post</div>
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
            {!! Form::open(array('url' =>'/update-post','method'=>'post','enctype'=>'multipart/form-data','name'=>'edit_post')) !!}
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Post title:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <input type="text" id="firstName" value="{{$post_info->post_title}}" name="post_title" class="form-control" required="required" autofocus="autofocus">
                            <input type="hidden" id="firstName" value="{{$post_info->post_id}}" name="post_id" class="form-control" required="required" autofocus="autofocus">
                            <input type="hidden" id="firstName" value="{{$post_info->post_image}}" name="post_image" class="form-control" required="required" autofocus="autofocus">

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Category Name:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <select name='category_id' class="form-control">
                                <option>--select option--</option>
                                @foreach($all_category as $result)
                                <option value="{{$result->category_id}}">{{$result->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Short Description:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <textarea id="richTextBody" name="post_short_description" class="form-control">{{$post_info->post_short_description}}</textarea>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Long Description:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <textarea id="richTextBody1" name="post_long_description" class="form-control">{{$post_info->post_long_description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Post Image:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <input type="file" id="firstName" name="post_image" class="form-control"  autofocus="autofocus">
                            <span><img src="{{asset($post_info->post_image)}}" height="50" width="50" alt="image"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-label-group">
                            <label for="firstName">Author Name:</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-label-group">
                            <input type="text"  value="{{$post_info->author_name}}" id="firstName" name="author_name" class="form-control" required="required" autofocus="autofocus">
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
            <input type="submit" class="btn btn-primary btn-block" value="Save">
            <script type='text/javascript'>
                document.forms['edit_post'].elements['category_id'].value = "<?php echo $post_info->category_id ?>";
                document.forms['edit_post'].elements['publication_status'].value = "<?php echo $post_info->publication_status ?>";
            </script>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection