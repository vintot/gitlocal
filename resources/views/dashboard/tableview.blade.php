@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">Users
     <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
     
    </div>
        <div class="panel-body">
          <table id="table1" class="table table-striped table-hover table-fw-widget">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>User Level</th>
                <th>Created</th>
                <th>Updated</th>
                @if(Auth::user()->user_level=='Administrator')
                <th>Action</th>
                @endif
                </tr>
            </thead>
            <tbody>
   
              @if(count($users) > 0)
                @foreach($users as $list)
                     @if(Auth::user()->user_level=='Administrator')
                <tr>
                <td>{{$list->lastname}} {{$list->firstname}}</td>
                <td>{{$list->email}}</td>
                <td>{{$list->username}}</td>
                <td>{{$list->user_level}}</td>
                <td>{{$list->created_at}}</td>
                <td>{{$list->updated_at}}</td>
                <td style='width:15%;'>
                    <div class="btn-group btn-space">
                        <button data-modal="form-view" class="btn btn-default mdi mdi-eye md-trigger" title="View"></button>
                        <button data-modal="form-success" class="btn btn-default mdi mdi-edit md-trigger" title="Update"></button>
                        <button class="btn btn-default mdi mdi-delete md-trigger" title="Delete"></button>
                    </div>
                </td>
              </tr>
              @elseif(Auth::user()->user_level=='Supervisor')
              @if(Auth::user()->center==$list->center)
              <tr>
                <td>{{$list->lastname}} {{$list->firstname}}</td>
                <td>{{$list->email}}</td>
                <td>{{$list->username}}</td>
                <td>{{$list->user_level}}</td>
                <td>{{$list->created_at}}</td>
                <td>{{$list->updated_at}}</td>
             </tr>
             @endif
              @endif
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection


