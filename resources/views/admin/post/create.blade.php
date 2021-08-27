@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.post.save')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label>konten</label>
                        <textarea name="content"  class="form-control"></textarea>

                        @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
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

