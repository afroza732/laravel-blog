@extends('maseter')
@section('main_content')
<div class="maincontent clear">
    <div class="samepost clear">
        <h2><a href="">{{$post_info->post_title}}</a></h2>
        <h4>{{$post_info->created_at}}<a href="#"> , {{$post_info->author_name}}</a></h4>
        <a href="#"><img src="{{asset($post_info->post_image)}}" alt="post image"/></a>
        <p>
            {{$post_info->post_short_description}}  
        </p>
        <br/>
    </div>
    <br/>
    <br/>
    <h3>
        Your comments go here
    </h3>
</div>

@endsection