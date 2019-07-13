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
                <li class="breadcrumb-item"><a href="#">Calendar</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
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
            <div class="card">
              <div class="card-body">
                <!--== Search Form Start ==-->
                <form action="{{ url('/admin/calendar') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="date" class="form-control" name="event_date" placeholder="Event Date">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-success">Search</button>
                    </div>
                  </div>
                </form>
                <!--== Search Form End ==-->
              </div>
            </div>

            <!--== Data table Start ==-->
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped">
                <caption>List of Event Calendars</caption>
                <thead>
                  <tr>
                    <th scope="col">Event Date</th>
                    <th scope="col">Event Type Name</th>
                    <th scope="col">Class Status</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $calendars as $calendar )
                  <tr>
                    <td>{{ $calendar->EVENT_DATE }}</td>
                    <td>{{ $calendar->TYPE_NAME }}</td>
                    <td>
                      @if( $calendar->CLASS_OFF == '1' )
                        On
                      @else
                        Off
                      @endif
                    </td>
                    <td>
                      @if( $calendar->ACTIVE_STATUS == '1' )
                        <a href="{{ url('/admin/calendar/status/'.$calendar->CALENDAR_ID) }}" class="active_status">Active</a>
                      @else
                        <a href="{{ url('/admin/calendar/status/'.$calendar->CALENDAR_ID) }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('/admin/calendar/show/'.$calendar->CALENDAR_ID) }}" class="btn btn-success">View</a>
                      <a href="{{ url('/admin/calendar/edit/'.$calendar->CALENDAR_ID) }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $calendars->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection