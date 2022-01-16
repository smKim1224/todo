@extends('layouts.app')

@section('content')
<h1>Create Todo</h1>

<form action="{{ route('todo.store') }}" method="post">
    <div class="form-group">
        <label for="Item">할일</label>
        <input type="text" name="Item" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="Description">내용</label>
        <input type="text" name="Description" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="Item">마감일자</label>
        <input type="text" name="Duedate" value="" class="form-control">
    </div>
    <div>
    <button class="btn btn-primary">새할일 등록</button>
    </div>{{ csrf_field() }}
</form>

@endsection