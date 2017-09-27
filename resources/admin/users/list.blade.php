@extends('Admin::index')

@section('content')
    @include('Admin::alerts')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="sub-header">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary pull-right">Назад</a>
                Пользователи</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <form action="{{ route('admin-users-list-search') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="hidden" name="val" value="{{ $val }}">
                        <th><input type="text" name="id" class="form-control" value="{{ isset($search['id']) ? $search['id'] : "" }}"></th>
                        <th><input type="text" name="email" class="form-control" value="{{ isset($search['email']) ? $search['email'] : "" }}"></th>
                        <th><input type="text" name="login" class="form-control" value="{{ isset($search['login']) ? $search['login'] : "" }}"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <a href="{{ route('admin-users-list', ['type' => $type, 'val' => $val]) }}" class="btn btn-default">Сбросить</a>
                            <button class="btn btn-primary" type="submit">Найти</button></th>
                    </form>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Логин</th>
                    <th>Баланс</th>
                    <th>Количество рефералов</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('admin.users.info', ['user_id' => $user->id, 'type' => $type, 'val' => $val]) }}">{{ $user->id }}</a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->login}}</td>
                        <td>{{$user->balance}}₽</td>
                        <td>{{$user->ref_count}}</td>
                        <td>{{$user->is_confirm == 0 ? "Не подтвержден" : "Подтвержден"}}</td>
                        <td>
                            @if(!$user->is_confirm && isset($user->confirmed) && $user->confirmed->first())
                                <a title="Confirm" href="{{route('admin-users-confirm', [
                                    'id'=>$user->id,
                                    'type' => $type,
                                    'val' => $val
                                ])}}"><i
                                            class="fa fa-newspaper-o"></i></a>
                            @endif
                            <a title="Редактировать" href="{{route('admin.users.edit', ['id'=>$user->id, 'type' => $type, 'val' => $val] )}}"><i
                                        class="fa fa-edit"></i></a>
                            <a title="Забанить или розбанить"
                               href="{{route('admin-users-ban', [
                               'id'=>$user->id,
                               'type'=>$user->is_banned==0?1:0,
                               'list_type' => $type,
                               'val' => $val
                           ])}}"><i
                                        class="fa {{ $user->is_banned == 1?'fa-unlock green':'fa-lock red'}} "></i></a>
                            <a title="Удалить" href="{{route('admin-users-delete', ['id'=>$user->id])}}"><i
                                        class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-center">
            {{ $users->links() }}
        </div>
    </div>




@endsection
@section('css')
    <style>
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
@stop