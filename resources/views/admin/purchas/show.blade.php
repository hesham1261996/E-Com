@extends('theme.default')
@section('head')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') }}">
@endsection

@section('heading')
    {{ __('تفاصيل الطلب') }}
@endsection

@section('content')
    <table class="table">

        <tbody>
            <tr>
                <td>{{ __('اسم العميل') }}</td>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <td>{{ __('العنوان') }}</td>
                <td>{{ $customer->country . ' / ' . $customer->city}} </td>
            </tr>
            <tr>
                <td>{{ __(' العنوان بالتفصيل') }}</td>
                <td>{{ $customer->details_address }} </td>
            </tr>
            <tr>
                <td>{{ __('رقم التلفون') }}</td>
                <td>{{$customer->phone_number}}</td>
            </tr>
            <tr>
                <td>{{ __('حاله الطلب ') }}</td>
                <td>
                    <form class="ml-4 form-inline" method="POST" action="{{route('purchas_updata' , $customer->id)}}"
                    style="display:inline-block">
                    @method('PUT')
                    @csrf
                    <select class="form-control form-control-sm" name="status_order">
                        <option {{$customer->status_order == 1 ? 'selected': '' }} value="1">جاري المراجعه</option>
                        <option {{$customer->status_order == 2 ? 'selected': '' }} value="2">جاري الشحن</option>
                        <option {{$customer->status_order == 3 ? 'selected': '' }} value="3">تم التوصيل</option>
                        <option {{$customer->status_order == 4 ? 'selected': '' }} value="4">تم الالغاء</option>
                    </select>
                    <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                        تعديل</button>
                </form>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="rew">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing=0>
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('اسم المنتج') }}</th>
                        <th>{{ 'القسم' }}</th>
                        <th>{{ __('سعر المنتج') }}</th>
                        <th>{{ __('العدد') }}</th>
                        <th>{{ __('السعر الكلي') }}</th>
                        <th>{{ __('خيارات') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_price = 0
                    @endphp
                    @foreach ($customer->purchas as $item)
                        <tr>
                            <td>
                                <img src="{{ asset("images/$item->image") }}" class="img-fluid rounded-circle mb-2"
                                    style="width: 80px; height: 80px" alt="profile picture" />
                            </td>
                            <td><a href="{{ route('items.show', $item) }}">{{ $item->title }}</a></td>
                            <td>{{ \App\Models\Item::findOrFail($item->item_id)->category->title }}</td>
                            <td>{{ $item->price }}L.E</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price * $item->quantity }}L.E</td>
                            <td>
                                    <form action="{{ route('delete_item_cart', $item->id) }}" method="post"
                                        class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('هل انت متاكد؟')"><i
                                                class="fa fa-trash"></i>{{ __('حذف') }}</button>
                                    </form>
                            </td>
                        </tr>
                        @php $total_price += $item->price *  $item->quantity @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="btn btn-primary btn-lg btn-block">{{ __(" اجمالي السعر : ". $total_price)}}</div>


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
