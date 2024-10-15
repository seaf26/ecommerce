<!-- resources/views/subsections/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>إنشاء قسم فرعي</h1>
    <form action="{{ route('subsections.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="img">رابط الصورة</label>
            <input type="url" name="img" class="form-control" id="img" required>
        </div>
        <div class="form-group">
            <label for="section_id">القسم</label>
            <select name="section_id" class="form-control" id="section_id" required>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">إنشاء</button>
    </form>
</div>
@endsection
