@extends('theme.default')
@section('head')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet')}}">
@endsection

@section('heading')
{{__('عرض الاقسام')}}
@endsection

@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>{{__('اضافه قسم جديد')}}</a>
    <div class="rew">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing=0>
                <thead>
                    <tr>
                        <th>{{__('العنوان')}}</th>
                        <th>{{__('التفاصيل')}}</th>
                        <th>{{__('الاقسام الفرعيه')}}</th>
                        <th>{{__('خيارات')}}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><a href="{{route('categories.show' , $category)}}">{{$category->title}}</a></td>
                            <td>{{\Str::limit( $category->description, 50, '...')}}</td>
                            <th>
                                <select class="form-control form-control-sm" name="adminstration_level">
                                    @foreach($category->children as $children)
                                        <option>ً{{$children->title}}</option>
                                    @endforeach
                                </select>
                                <form name="POST" action="{{route('children.create')}}">
                                        <input type="hidden" name="category_id" value="{{$category->id}}" >
                                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-add"></i>{{__('اضافه فرع جديد')}}</button>
                                </form>
                            </th>
                            <td>
                                <a href="{{route('categories.edit' , $category->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>{{__('تعديل')}}</a>
                                <form action="{{route('categories.destroy' , $category->id)}}" method="post" class="d-inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متاكد؟')"><i class="fa fa-trash"></i>{{__('حذف')}}</button>
                                </form>
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
