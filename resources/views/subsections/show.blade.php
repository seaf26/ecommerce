@extends('layouts.app')

@section("title", 'تفاصيل القسم')

@section('content')
<div class="container">
    <h1>تفاصيل القسم</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">اسم المنتج: {{ $subsection->name }}</h5>
            <p class="card-text">فئة المنتج: {{ $subsection->section->name }}</p>
            <p class="card-text">تاريخ الانشاء: {{ $subsection->created_at }}</p>
            <p class="card-text">تاريخ التعديل: {{ $subsection->updated_at }}</p>
            <p class="card-text" style="color: {{ $subsection->status ? 'green' : 'red' }};">
                المتوفر: {{ $subsection->status ? 'متوفر' : 'غير متوفر' }}
            </p>
            <a href="{{ route('subsections.index') }}" class="btn btn-primary">العودة إلى القائمة</a>
        </div>
    </div>
    <h2 class="mt-4">المنتجات التابعة لهذا القسم الفرعي</h2>
    @if($subsection->products->isEmpty())
        <p>لا توجد منتجات تابعة لهذا القسم الفرعي.</p>
    @else
        <div class="list-group">
            @foreach($subsection->products as $product)
            <div class="list-group-item">
                <h5 class="mb-1">{{ $product->name }}</h5>
                <p class="mb-1">تاريخ الانشاء: {{ $product->created_at }}</p>
                <div class="d-flex align-items-center">
                    <p class="mb-1">الصورة:</p>
                    <img src="{{ $product->image }}" alt="Product Image" style="width: 50px; margin-right:10px">
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                <a href="{{ route('sections.index') }}" class="btn btn-primary mt-3 w-25">العودة إلى القائمة</a>
            </div>
        </div>
    @endif
</div>
@endsection
