@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
    اضافه  مستخدم جديد
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            @can('add-user')

                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="الاسم">
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="البريد الإلكتروني">
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="كلمة المرور">
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <select name="role_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"> {{ $role->role }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-dark">حفظ </button>
                        </div>
                    </div>
                </form>
            @endcan
            <i class="fa fa-table"></i>
            <table id="books-table" class="table table-stribed text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>نوع المستخدم</th>
                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->role }}</td>
                            <td>
                                @can('edit-user')
                                    <form class="ml-4 form-inline" method="POST" action="{{ route('users.update', $user) }}"
                                        style="display:inline-block">
                                        @method('patch')
                                        @csrf
                                        <select class="form-control form-control-sm" name="role_id">
                                            <option selected disabled>اختر نوعًا</option>
                                            <option value="1">مدير</option>
                                            <option value="2">مشرف</option>
                                            <option value="3">مستخدم</option>
                                        </select>
                                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                            تعديل</button>
                                    </form>
                                @endcan
                                @can('delete-user')
                                    <form method="POST" action="{{ route('users.destroy', $user) }}"
                                        style="display:inline-block">
                                        @method('delete')
                                        @csrf
                                        @if (auth()->user()->id == $user->id)
                                            <div class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> حذف </div>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i>
                                                حذف</button>
                                        @endif
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
