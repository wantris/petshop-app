@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pengguna</h4>
          </div>
          <div class="card-body">
            {{$user_count}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Feed</h4>
          </div>
          <div class="card-body">
            {{$feed_count}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-cat"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Adopsi</h4>
          </div>
          <div class="card-body">
            {{$adopt_count}}
          </div>
        </div>
      </div>
    </div> 
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Artikel</h4>
          </div>
          <div class="card-body">
            {{$info_count}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="far fa-envelope"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Chat</h4>
          </div>
          <div class="card-body">
            {{$msg_count}}
          </div>
        </div>
      </div>
    </div>                  
  </div>
  
@endsection

@push('script')
<script>

</script>
@endpush