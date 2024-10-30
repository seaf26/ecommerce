@extends('layouts.app')

@section("title",'تعديل القسم')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <form action="{{ route('sections.update', $section->id) }}" method="POST">
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
                        <label for="name">اسم القسم</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $section->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="section_img">الصورة</label>
                        <input type="text" class="form-control" id="section_img" name="img" value="{{ old('img', $section->img) }}" required>
                        @error('img')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
