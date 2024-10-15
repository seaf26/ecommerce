@extends('layouts.app')

@section("title",'اضافة قسم جديد')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <form action="{{ route('sections.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">اسم القسم</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="section_img">الصورة </label>
                        <input type="text" class="form-control" id="section_img" name="img" required>
                    </div>

                    <button type="submit" class="btn btn-primary">اضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



