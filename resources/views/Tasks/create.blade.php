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
        <h1 class="main-title">タスク登録</h1>
        @if (session('success'))
            <div class="message">{{ session('success' )}}</div>
        @endif
        @error("contents.*")
            <div class="error create-error">{{ $message }}</div>
        @enderror
        @error("contents")
            <div class="error create-error">{{ $message }}</div>
        @enderror
        <div class="form-wrapper">
            <form class="task-form" method="post" action="{{ route('task.store') }}">
                @csrf
                <ul>
                        <li>
                            <input type="text" name="contents[]" placeholder="25文字以内で入れてください">
                        </li>
                    @for($i = 0; $i < 4; $i++)
                        <li>
                            <input type="text" name="contents[]">
                        </li>
                    @endfor
                </ul>
                <div class="button-area">
                    <button type="submit" class="create-button">新規登録</button>
                    <a class="button back-button" href="{{ route('task.index') }}">戻る</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>