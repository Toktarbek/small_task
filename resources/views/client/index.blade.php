@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title">Заявка</h5>
                        </div>
                        <div class="col-md-2 float-right">
                            <div class="card-tools">
                                <a class="btn btn-tool btn-sm" data-toggle="dropdown" href="#">
                                    <i class="far fa-bell"></i>
                                    <span class="badge badge-warning navbar-badge">1</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <span class="dropdown-item dropdown-header">test</span>
                                    <div class="dropdown-divider"></div>
                                    <a href="" class="dropdown-item">
                                        <i class="fas fa-users mr-2"></i> test2
                                        <span class="float-right text-muted text-sm">2021-08-16</span>
                                    </a>
                                    
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

                    @if($check)
                    <div class="alert alert-Light">
                        <form action="{{url('send')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Тема</span>
                                </div>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="form-group">
                            <label for="messages">Сообщение:</label>
                            <textarea class="form-control" rows="5" name="message" required></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Файл</span>
                                </div>
                                <input type="file" class="form-control" name="files" required>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="alert alert-success" role="alert">
                        Ваша заявка успешно отправлена следующее будеть завтра.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
