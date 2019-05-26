@extends('maseter')
@section('main_content')
<div class="maincontent clear">
    <div class="samepost clear">
        @foreach($published_post as $value)
        <h2><a href="{{URL::to('/post-details/'.$value->post_id)}}">{{$value->post_title}}</a></h2>
        <h4>{{$value->created_at}}<a href="#"> , {{$value->author_name}}</a></h4>
        <a href="#"><img src="{{asset($value->post_image)}}" alt="post image"/></a>
        <p>
         {{$value->post_short_description}}  
        </p>
        <br/>
        @endforeach
        <div class="readmore clear">
            <a href="post.php">Read More</a>
        </div>
    </div>
</div>
@endsection