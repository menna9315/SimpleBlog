@extends('layouts.app')
    @section('content')
        <div>
            Post Info
        </div><br/>
        <div>
           <h3>Title: </h3> <span>{{$post->title}} </span><br/>
           <h3>Description: </h3> <span>{{$post->desc}} </span><br/>
        </div>
        <br/>
        ----------------------------------------------------------------------------------------------

@foreach ($post->comments as $comment)
<article>
<h3>{{$comment->body}}</h3>
<h5>{{$comment->created_at}}</h5>
<br />

</article>
@endforeach



<form method="POST" action="/posts/{{$post->id}}/comments">
{{csrf_field()}}

<div class="form-group">
<textarea name="body" placeholder="write your comment here" class="form-control"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Add a Comment</button>

</div>

</form>      
       

@endsection