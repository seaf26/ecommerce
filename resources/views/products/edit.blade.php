@extends('layouts.app')
@section('title', 'تعديل المنتج')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
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

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="subsection_id">Subsection</label>
            <select name="subsection_id" class="form-control" required>
                @foreach($subsections as $subsection)
                    <option value="{{ $subsection->id }}" {{ old('subsection_id', $product->subsection_id) == $subsection->id ? 'selected' : '' }}>{{ $subsection->name }}</option>
                @endforeach
            </select>
            @error('subsection_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image URL</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $product->image) }}">
            @if($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}" width="100" class="mt-2">
            @endif
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
