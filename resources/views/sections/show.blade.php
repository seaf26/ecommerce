@extends('layouts.app')

@section("title", 'تفاصيل القسم')

@section('content')
<div class="container">
    <h1>تفاصيل القسم</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">اسم القسم: {{ $section->name }}</h5>
            <p class="card-text">تاريخ الانشاء: {{ $section->created_at }}</p>
            <div class="d-flex align-items-center">
                <p class="card-text">الصورة:</p>
                <img src="{{ $section->img }}" alt="Section Image" style="width: 50px; margin-right:10px">
            </div>
        </div>
    </div>

    <h2 class="mt-4">التفاصيل الفرعية</h2>
    @if($section->subsections->isEmpty())
        <p>لا توجد تفاصيل فرعية.</p>
    @else
        <div class="list-group">
            @foreach($section->subsections as $subsection)
            <div class="list-group-item">
                <h5 class="mb-1">{{ $subsection->name }}</h5>
                <p class="mb-1">تاريخ الانشاء: {{ $subsection->created_at }}</p>
                <div class="d-flex align-items-center">
                <p class="mb-1">الصورة:</p>
                <img src="{{ $subsection->img }}" alt="Subsection Image" style="width: 50px; margin-right:10px">
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
