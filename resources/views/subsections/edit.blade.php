@extends('layouts.app')

@section("title",'تعديل القسم الفرعي')

@section('content')
<div class="container">
    <h1>تعديل القسم الفرعي</h1>
    <form action="{{ route('subsections.update', $subsection->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group mb-4">
            <label for="name">اسم القسم الفرعي</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $subsection->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="img">رابط الصورة</label>
            <input type="url" class="form-control" id="img" name="img" value="{{ old('img', $subsection->img) }}" required>
            @error('img')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="section_id">القسم</label>
            <select class="form-control" id="section_id" name="section_id" required>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ old('section_id', $subsection->section_id) == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
            @error('section_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
</div>
@endsection
