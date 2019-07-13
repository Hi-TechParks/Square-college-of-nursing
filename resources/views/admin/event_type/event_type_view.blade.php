@extends('layouts.master')
@section('content')


    <!--== Dashboard Area Start ==-->
    <section class="section mt-50" id="deshboard">
      <div class="container">
        <!--== Dashboard Breadcrumb Start ==-->
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Event</a></li>
                <li class="breadcrumb-item"><a href="#">Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">View</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--== Dashboard Breadcrumb End ==-->

        <div class="row">
          <!--== Dashboard Sidebar Start ==-->
          <aside class="col-md-3">
            @include('admin.inc.sidebar')
          </aside>
          <!--== Dashboard Sidebar End ==-->

          <!--== Dashboard Main Start ==-->
          <main class="col-md-9">

            <!--== Data View Card Start ==-->
            @foreach( $event_types as $event_type )
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $event_type->TYPE_NAME }}</h5>
                <p class="card-text">{!! $event_type->TYPE_DESC !!}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Short Code: {{ $event_type->SHORT_CODE }}</li>
                <li class="list-group-item">Color: <div style="float: right; width: 100px; height: 30px; background: {{ $event_type->COLOR_CODE }}"></div></li>
                <li class="list-group-item">
                  @if( $event_type->ACTIVE_STATUS == '1' )
                    <p class="active_status">Active</p>
                  @else
                    <p class="inactive_status">Inactive</p>
                  @endif
                </li>
              </ul>
              <div class="card-body">
                <a href="{{ url('/admin/event/type/edit/'.$event_type->EVENT_TYPE_ID) }}" class="btn btn-primary">Edit</a>
              </div>
            </div>
            @endforeach
            <!--== Data View Card End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection