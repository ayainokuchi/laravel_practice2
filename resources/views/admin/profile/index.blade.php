@extends('layouts.admin')
@section('title', '登録済みプロフィールの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\NewsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">氏名</th>
                                <th width="10%">性別</th>
                                <th width="10%">趣味</th>
                                <th width="40%">自己紹介欄</th>
                                <th width="20%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ \Str::limit($profile->name, 100) }}</td>
                                    <td>{{ \Str::limit($profile->gender, 250) }}</td>
                                    <td>{{ \Str::limit($profile->hobby, 250) }}</td>
                                    <td>{{ \Str::limit($profile->introduction, 250) }}</td>
                                    
                                    <td>
                                        <div>
                                         <a href="{{ action('Admin\NewsController@edit',['id' => $profile->id ]) }}">編集</a> 
                                        </div>
                                        <div>
                                         <a href="{{ action('Admin\NewsController@delete',['id' => $profile->id ]) }}">削除</a>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection