@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            Моя заявка <a href="{{url('requisition')}}">создать заявку</a>
                        </div>
                        <div class="col-md-2 float-right">
                            <div class="card-tools">
                                <a class="btn btn-tool btn-sm" data-toggle="dropdown" href="#">
                                    <i class="far fa-bell"></i>
                                    <span class="badge badge-warning navbar-badge">{{count($requisition_unread)}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <span class="dropdown-item dropdown-header">
                                    {{(count($requisition_unread)>0)?count($requisition_unread).' ответ':'ответ нет'}}
                                    </span>
                                    @foreach($requisition_unread as $requisition)
                                        <div class="dropdown-divider"></div>
                                        <a href="{{url('confirm',[$requisition->id])}}" class="dropdown-item">
                                            <i class="far fa-envelope mr-2"></i> {{$requisition->answers->answer}}
                                            <span class="float-right text-muted text-sm">{{$requisition->answers->created_at}}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-Light table-responsive">
                        @if(count($requisition_read)>0)
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <th>#</th>
                                <th>Тема</th>
                                <th>Сообщение</th>
                                <th>Ответы</th>
                                <th>Менеджер</th>
                                <th>Дата ответа</th>
                            </thead>
                            <tbody>
                                @foreach($requisition_read as $requisition)
                                <tr>
                                    <td>{{$requisition->id}}</td>
                                    <td>{{$requisition->subject}}</td>
                                    <td>{{$requisition->message}}</td>
                                    <td>
                                        {{(!empty($requisition->answers))?$requisition->answers->answer:''}}
                                    </td>
                                    <td>{{$requisition->user->name}}</td>
                                    <td>{{(!empty($requisition->answers))?$requisition->answers->created_at:''}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Ответных заявок нету
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
