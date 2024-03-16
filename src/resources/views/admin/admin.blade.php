@extends('layouts.app')

@section('css')
@endsection

@include('admin.layouts.header')

@section('main')
<div class="panel__content">
    <div class="panel__main">
        <div class="panel__menu">
            <span class="content__menu active">登録ユーザー一覧</span>
            <span class="content__menu"><a href="{{ route('commentList') }}">コメント一覧</a></span>
        </div>
        <hr>
        <div class="list__content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>登録ユーザー名</th>
                        <th>登録メールアドレス</th>
                        <th>登録日</th>
                        <th><i class="fa fa-envelope fa-fg"></i></th>
                        <th><i class="fa fa-trash-o fa-fg"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ optional($user->profile)->username ?? 'ユーザー名未設定' }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            <button type="submit"><a href="{{ route('mail', ['id' => $user->id]) }}"><i class="fa fa-envelope fa-fg"></i></a></button>
                        </td>
                        <td>
                            <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"><i class="fa fa-trash-o fa-fg"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="paginate">
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection