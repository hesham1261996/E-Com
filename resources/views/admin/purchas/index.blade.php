
@extends('theme.default')
@section('head')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet')}}">
@endsection

@section('heading')
{{__(' المشتريات')}}
@endsection

@section('content')

    <div class="rew">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing=0>
                <thead>
                    <tr>
                        <th>{{__('الاسم')}}</th>
                        <th>{{__('العنوان')}}</th>
                        <th>{{__('رقم التواصل')}}</th>
                        <th>{{__('الحاله')}}</th>
                        <th>{{__('عدد المنتجات')}}</th>
                        <th>{{__('خيارات')}}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($customers as $customer)
                        <tr>

                            <td><a href="#">{{$customer->name}}</td>
                            <td>{{$customer->country . ' / ' . $customer->city }}</td>
                            <td>{{$customer->phone_number}}
                            </td>
                            <td></td>
                            <td>
                                {{count($customer->purchas)}}
                            </td>
                            <td>
                                <a href="{{route('purchas.details' , $customer->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>{{__('عرض الطلب')}}</a>
                                    <form action="#" method="post" class="d-inline-block">
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
