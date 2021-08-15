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
                    <div class="alert alert-Light" role="alert">
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
                                    <td><a href="{{url($r->file_name)}}" target="_blank">Файл</a></td>
                                    <td>{{$r->created_at}}</td>
                                    <td><a href="{{url('admin/answer',[$r->id])}}" class="btn btn-primary">Ответить</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection