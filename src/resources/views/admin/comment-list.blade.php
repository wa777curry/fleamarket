@extends('layouts.app')

@section('css')
@endsection

@include('admin.layouts.header')

@section('main')
<div class="panel__content">
    <div class="panel__main">
        <div class="panel__menu">
            <span class="content__menu"><a href="{{ route('viewAdmin') }}">登録ユーザー一覧</a></span>
            <span class="content__menu active">コメント一覧</span>
        </div>
        <hr>
        <div class="list__content">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>投稿ユーザー名</th>
                        <th>コメント内容</th>
                        <th>投稿日</th>
                        <th><i class="fa fa-trash-o fa-fg"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ optional($comment->user->profile)->username ?? 'ユーザー名未設定' }}</td>
                        <td>{!! nl2br(e($comment->comment)) !!}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
                            <form action="{{ route('deleteUserComment', ['id' => $comment->id]) }}" method="post">
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
            {{ $comments->links() }}
        </div>
    </div>
</div>

@endsection