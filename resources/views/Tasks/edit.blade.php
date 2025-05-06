<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスク登録</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="header-title">
            <a href="{{route('task.index')}}">
                My Tasks
            </a>
        </h1>
    </header>
    <main class="main-wrapper">
        <h1 class="main-title">タスク編集</h1>
        @if (session('update'))
            <div class="message">{{ session('update')}}</div>
        @endif
        @if (session('delete'))
            <div class="message">{{ session('delete')}}</div>
        @endif
        <div class="form-wrapper">
            {{-- 更新用フォーム --}}
            <form id="update-form" method="post" action="{{ route('tasks.update')}}">
                @csrf
                @method('PUT')
            </form>
            {{-- 一覧表示 --}}
            <ul class="edit-list">
                @foreach($tasks as $task)
                    <li class="edit-area">
                        <input form="update-form" type="text" name="contents[{{ $task->id }}]" value="{{ old('contents.' . $task->id, $task->contents) }}">
                        {{-- 削除用フォーム --}}
                        <form method="post" action="{{ route('task.destroy', $task->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="if(!confirm('削除しますか？')){return false};">削除</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            {{-- 更新ボタン（update-formに紐付け） --}}
            <div class="button-area">
                <button type="submit" form="update-form" class="create-button">更新</button>
                <a class="button back-button" href="{{ route('task.index') }}">戻る</a>
            </div>
                {{-- <ul class="edit-list">
                    @foreach($tasks as $task)
                        <li class="edit-area">
                            <input type="text" name="contents[{{ $task->id }}]" value="{{ $task->contents }}">
                        </li>
                    @endforeach
                </ul>
                <div class="button-area">
                    <button type="submit" class="create-button">更新</button>
                    <a class="button back-button" href="{{ route('task.index') }}">戻る</a>
                </div>
            </form>
            <ul>
                @foreach($tasks as $task)
                    <li class="edit-area delete-button-wrapper">
                        <form method="post" class="delete-form" action="{{ route('task.destroy', $task->id) }}">
                            @csrf
                            @method('delete')
                            <button type='submit' class="delete-button">削除</button>
                        </form>
                    </li>
                @endforeach
            </ul> --}}
        </div>
    </main>
</body>
</html>