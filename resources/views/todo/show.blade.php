@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go Back</a>
<h1><a href="/todo/{{$todo->id}}">{{$todo->Item}}</a></h1>
<div class="label label-danger">{{$todo->Duedate}}</div>
<hr>
<p>{{$todo->Description}}</p>
<br><br>
<a href="{{ route('todo.edit',$todo->id) }}" class="btn btn-default">수정</a>
<form action="{{ route('todo.destroy', $todo->id) }}" method="post">{{ method_field('delete') }}
    <div>
    <button class="btn btn-danger">삭제</button>
    </div>{{ csrf_field() }}
</form>
@endsection