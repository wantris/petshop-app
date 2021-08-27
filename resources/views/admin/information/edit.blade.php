@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.information.update', $info->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" value="{{$info->title}}" class="form-control phone-number">  
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea name="konten"  class="form-control">{{$info->content}}</textarea>
                        @if ($errors->has('konten'))
                        <span class="text-danger">{{ $errors->first('konten') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control phone-number" value="{{$info->location}}" required>
                        @if ($errors->has('lokasi'))
                            <span class="text-danger">{{ $errors->first('lokasi') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="hidden" value="{{$info->photo}}" name="old_photo">
                        <input type="file" name="photo" class="form-control" id="">
                        @if ($errors->has('photo'))
                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                        @endif
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary" style="width: 100%">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
  CKEDITOR.replace('konten',{
      language:'en-gb'
    });
</script>
@endpush

