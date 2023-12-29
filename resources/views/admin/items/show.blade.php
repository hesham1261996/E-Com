@extends('theme.default')


@section('heading')
    {{ __('عرض تفاصيل العنصر') }}
@endsection

@section('head')
    <style>
        table {
            table-layout: fixed;
        }

        table tr th {
            width: 30%;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card-header">
                    {{ __('تفاصيل ') . $item->title }}
                </div>
                <div class="card-body ">
                    <table class="table table-stribed">
                        <tr>
                            <th>{{ __('العنوان') }}</th>
                            <td class="lead">{{ $item->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('الغلاف') }}</th>
                            <td>
                                <img src="{{ asset("images/$item->image") }}" alt="">
                            </td>
                        </tr>
                        @if ($item->company)
                            <tr>
                                <th>{{ __('الشركه') }}</th>
                                <td>{{ $item->company->name }}</td>
                            </tr>
                        @endif
                        @if ($item->category)
                            <tr>
                                <th>{{ __('التصنيف') }}</th>
                                <td>{{ $item->category->title }}</td>
                            </tr>
                        @endif
                        @if ($item->description)
                            <tr>
                                <th>{{ __('الوصف') }}</th>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endif
                        @if ($item->made_year)
                            <tr>
                                <th>{{ __('سنه الصناعه') }}</th>
                                <td>{{ $item->made_year }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>{{ __('السعر ') }}</th>
                            <td>
                                {{ number_format($item->price) . __(' جنيه') }}
                            </td>
                        </tr>
                        @if ($item->discount != null)
                            <tr>
                                <th>{{ __('السعر بعد الخصم') }}</th>
                                <td>
                                    {{ $item->price - ($item->price * $item->discount) / 100 . __(' جنيه') }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th>{{ __('العدد المتاح') }}</th>
                            <td>{{ $item->number_of_capies }}</td>
                        </tr>
                    </table>
                    @can('edit-item')
                        <a href="{{ route('items.edit', $item) }}" class="btn btn-info btn-sm"><i
                                class="fa fa-edit"></i>{{ __('تعديل') }}</a>
                    @endcan
                    @can('delete-item')
                        <form action="{{ route('items.destroy', $item) }}" method="post" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متاكد؟')"><i
                                    class="fa fa-trash"></i>{{ __('حذف') }}</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
