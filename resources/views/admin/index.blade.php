@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Список заявок</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-Light table-responsive" role="alert">
                        @if(count($requisition)>0)
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <th>#</th>
                                <th>Тема</th>
                                <th>Сообщение</th>
                                <th>Имя клиента</th>
                                <th>Почта клиента</th>
                                <th>Файл</th>
                                <th>Время создания</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($requisition as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->subject}}</td>
                                    <td><textarea style="border:none; resize: none; width: 100%">{{$r->message}}</textarea></td>
                                    <td>{{$r->user->name}}</td>
                                    <td>{{$r->user->email}}</td>
                                    <td><a href="{{url($r->file_name)}}" download>Файл</a></td>
                                    <td>{{$r->created_at}}</td>
                                    <td>
                                        @if($r->status==0)
                                            <a href="{{url('admin/answer',[$r->id])}}" class="btn btn-primary">Ответить</a>
                                        @else
                                            Ответил
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-warning" role="alert">
                            Заявка нет.
                        </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection