@extends('layouts.app')

@section("title",'تعديل القسم')


@section('content')
<div class="container">
    <h1>Edit Subsection</h1>
    <form action="{{ route('subsections.update', $subsection->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="product_name">اسم المنتج</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $subsection->product_name }}" required>
        </div>
        <div class="form-group mb-4">
            <label for="product_category">فئة المنتج</label>
            <input type="text" class="form-control" id="product_category" name="product_category" value="{{ $subsection->product_category }}" required>
        </div>
        <div class="form-group mb-4">
            <label for="price">السعر</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $subsection->price }}" required>
        </div>
        <div class="form-group mb-4">
            <label for="date_of_creation">تاريخ الانشاء</label>
            <input type="date" class="form-control" id="date_of_creation" name="date_of_creation" value="{{ $subsection->date_of_creation }}" required>
        </div>
        <div class="form-group mb-4">
            <label for="date_of_sell">تاريخ البيع</label>
            <input type="date" class="form-control" id="date_of_sell" name="date_of_sell" value="{{ $subsection->date_of_sell }}" required>
        </div>
        <div class="form-group mb-4">
            <label for="status">المتوفر</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $subsection->status ? 'selected' : '' }}>متوفر</option>
                <option value="0" {{ !$subsection->status ? 'selected' : '' }}>غير متوفر</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
