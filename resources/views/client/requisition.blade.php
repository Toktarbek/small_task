@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Заявка
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
