@extends('layouts.app')
@section('title', 'إضافة منتج')

@push('styles')
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
@endpush

@section('content')
@section('content')
<div class="container">
    <h1>إضافة منتج جديد</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">اسم المنتج</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">سعر المنتج</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descraption">وصف المنتج</label>
                            <textarea class="form-control" name="descraption" required>{{ old('descraption') }}</textarea>
                            @error('descraption')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">المخزون</label>
                            <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" required>
                            @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">صورة المنتج</label>
                            <input type="text" class="form-control" name="image" value="{{ old('image') }}" placeholder="Enter image URL">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subsection_id">القسم التابع له</label>
                            <select class="form-control basic" name="subsection_id" required>
                                @foreach ($subsections as $subsection)
                                    <option value="{{ $subsection->id }}" {{ old('subsection_id') == $subsection->id ? 'selected' : '' }}>{{ $subsection->name }}</option>
                                @endforeach
                            </select>
                            @error('subsection_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@endsection


