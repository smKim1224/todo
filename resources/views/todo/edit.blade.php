@extends('layouts.app')

@section('content')
<a href="/todo/{{ $todo->id }}" class="btn btn-default">Go Back</a>
<h1>Edit Todo</h1>

<form action="{{ route('todo.update', $todo->id) }}" method="post">{{ method_field('put') }}
    <div class="form-group">
        <label for="Item">할일</label>
    <input type="text" name="Item" value="{{ $todo->Item }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="Description">내용</label>
        <input type="text" name="Description" value="{{ $todo->Description }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="Duedate">마감일자</label>
        <input type="text" name="Duedate" value="{{ $todo->Duedate }}" class="form-control">
    </div>
    <div>
    <button class="btn btn-primary">할일 수정</button>
    </div>{{ csrf_field() }}
</form>

@endsection