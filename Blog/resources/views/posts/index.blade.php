@extends('layouts.app')


@section('content')



<a  class="btn btn-danger" href="posts/create">Create Post</a>
<hr/>


<table class="table table-striped">
    <tbody>
@foreach ($posts as $post)
<tr>

<td>{{$post->title }}   </td>
<td><a class="btn btn-info" href="/posts/{{$post->id}}">View</a></td>

<td><form method="GET" action="/posts/{{$post->id}}/edit" >
    <button  class="btn btn-primary" > Edit </button>
</form></td>

<td><form method="post" action="/posts/{{$post->id}}" >
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button onclick="return confirm('are you sure')" type="submit" class="btn btn-danger" > Delete </button>
</form></td>
</tr>
@endforeach


</tbody>
  </table>
  


@endsection