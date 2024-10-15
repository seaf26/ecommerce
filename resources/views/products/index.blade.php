@extends('layouts.app')
@section('title', 'المنتجات')

@section('content')
<div class="container">
    <h1>المنتجات</h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $product->image }}" style="width: 50px;"/>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>السعر:</strong> ${{ $product->price }}</p>
                        <p class="card-text"><strong>القسم الفرعي:</strong> {{ $product->subsection->name }}</p>
                        <p class="card-text"><small class="text-muted">تاريخ الإنشاء: {{ $product->created_at }}</small></p>
                        <p class="card-text"><small class="text-muted">تاريخ التعديل: {{ $product->updated_at }}</small></p>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">تعديل</a>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">عرض</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

