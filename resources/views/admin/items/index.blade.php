@extends('theme.default')
@section('head')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet')}}">
@endsection

@section('heading')
{{__('عرض العناصر')}}
@endsection

@section('content')
    @can('add-item')
        <a href="{{route('items.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>{{__('اضافه عنصر جديد')}}</a>
    @endcan
    <div class="rew">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing=0>
                <thead>
                    <tr>
                        <th></th>
                        <th>{{__('العنوان')}}</th>
                        <th>{{__('القسم')}}</th>
                        <th>{{__('الاقسام الفرعيه')}}</th>
                        <th>{{__('عدد النسخ')}}</th>
                        <th>{{__('السعر')}}</th>
                        <th>{{__('خيارات')}}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <img
                                    src="{{asset("images/$item->image")}}"
                                    class="img-fluid rounded-circle mb-2"
                                    style="width: 80px; height: 80px"
                                    alt="profile picture"
                                />
                            </td>
                            <td><a href="{{route('items.show' , $item)}}">{{$item->title}}</a></td>
                            <td>{{$item->category != null ? $item->category->title : ''}}</td>
                            <td>ً{{$item->childCategory->title}}
                            </td>
                            <td>{{$item->number_of_capies }}</td>
                            <td>{{$item->price}}L.E</td>
                            <td>
                                @can('edit-item')
                                    <a href="{{route('items.edit' , $item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>{{__('تعديل')}}</a>
                                @endcan
                                @can('delete-item')
                                    <form action="{{route('items.destroy' , $item->id)}}" method="post" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متاكد؟')"><i class="fa fa-trash"></i>{{__('حذف')}}</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#books-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
        });
    });
</script>
@endsection
