@extends('theme.default')

@section('heading')
    {{__(' تعديل القسم :') . $category->title}}
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header text">
                {{__(' تعديل')}}
            </div>
            <div class="card-body">
                <form action="{{route('categories.update' , $category)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label id="title" class="lable col-md-4 col-form text-md-right">{{__('العنوان')}}</label>
                        <div class="col-md-6">
                            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{$category->title}}" autocomplete="title">
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
                        <label  id="description" class="lable col-md-4 col-form text-md-right">{{__('التفاصيل')}}</label>
                        <div class="col-md-6">
                            <textarea type="text"id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$category->description}}" autocomplete="description">
                                {{$category->description}}
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">{{__('تعديل')}}</button>
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