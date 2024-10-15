@extends('layouts.app')

@section("title",'الاقسام الفرعية')


@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css') }}">

@endpush
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <a href="{{ route('subsections.create') }}" class="btn btn-primary">اضافة قسم فرعي جديد</a>
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>اسم القسم الفرعي</th>
                                <th>الصورة</th>
                                <th>القسم التابع له </th>
                                <th>تاريخ الانشاء</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subsections as $subsection)
                            <tr>
                                <td>{{ $subsection->name }}</td>
                                <td><img src=" {{ $subsection->img }}" style="width: 50px  "/></td>
                                <td>{{ $subsection->section->name }}</td>
                                <td>{{ $subsection->created_at }}</td>
                                <td>
                                    <a href="{{ route('subsections.show', $subsection->id) }}" class="btn btn-info">عرض</a>
                                    <a href="{{ route('subsections.edit', $subsection->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('subsections.destroy', $subsection->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>اسم القسم الفرعي</th>
                                <th>الصورة</th>
                                <th>القسم التابع له </th>
                                <th>تاريخ الانشاء</th>
                                <th class="no-content"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/plugins/table/datatable/datatables.js ')}}"></script>

<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>
@endpush
