@extends('theme.default')

@section('heading')
    {{__('اضافة عنصر جديد')}}
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header text">
                {{__('اضف عنصرا جديدا')}}
            </div>
            <div class="card-body">
                <form action="{{route('items.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label id="title" class="lable col-md-4 col-form text-md-right">{{__('العنوان')}}</label>
                        <div class="col-md-6">
                            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" autocomplete="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label id="cover_image" class="lable col-md-4 col-form text-md-right">{{__('اختر صوره')}}</label>
                        <div class="col-md-6">
                            <input type="file" onchange="readCoverImage(this)" accept="image/*" id="cover_image" name="image" class="form-control @error('cover_image') is-invalid @enderror" value="{{old('cover_image')}}" autocomplete="cover_image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                            <img src="" alt="" id="cover-image-thumb" class="img-fluid img-thumbnail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label id="company" class="lable col-md-4 col-form text-md-right">{{__('القسم الفرعي')}}</label>
                        <div class="col-md-6">
                            <select name="child_id" id="company" class="form-control">
                                <option disabled selected>{{__('اختر قسم فرعي')}}</option>
                                @foreach (App\Models\Child::all() as $child)
                                    <option name='child_id' value="{{$child->id}}">{{$child->title}}</option>
                                @endforeach
                            </select>
                            @error('child_id')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label id="category" class="lable col-md-4 col-form text-md-right">{{__('التصنيف')}}</label>
                        <div class="col-md-6">
                            <select name="category_id" id="category" class="form-control">
                                <option disabled selected>{{__('اختر تصنيف')}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  id="description" class="lable col-md-4 col-form text-md-right">{{__('التفاصيل')}}</label>
                        <div class="col-md-6">
                            <textarea type="text"id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" autocomplete="description">
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label id="made_year" class="lable col-md-4 col-form text-md-right">{{__('سنه الصناعه')}}</label>
                        <div class="col-md-6">
                            <input id="made_year" name="made_year" type="number" class="form-control @error('made_year') is-invalid @enderror" value="{{old('made_year')}}" autocomplete="made_year">
                            @error('made_year')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label id="number_of_copies" class="lable col-md-4 col-form text-md-right">{{__('العدد المتاح ')}}</label>
                        <div class="col-md-6">
                            <input id="number_of_capies" name="number_of_copies" type="number" class="form-control @error('number_of_capies') is-invalid @enderror" value="{{old('number_of_capies')}}" autocomplete="number_of_capies">
                            @error('number_of_capies')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label id="price" class="lable col-md-4 col-form text-md-right">{{__('السعر ')}}</label>
                        <div class="col-md-6">
                            <input type="number"id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" autocomplete="price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label id="discount" class="lable col-md-4 col-form text-md-right">{{__('التخفيض %')}}</label>
                        <div class="col-md-6">
                            <input id="discount" name="discount" type="number" class="form-control @error('discount') is-invalid @enderror" value="{{old('discount')}}" autocomplete="discount">
                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">{{__('اضافه')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#cover-image-thumb')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
