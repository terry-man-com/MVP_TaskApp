<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Tasks</title>
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
        <h1 class="main-title">My Tasks</h1>
        <div class="upper-button-area">
            <a href="{{ route('task.create') }}" class="button create-button">タスク登録</a>
            <a class="button back-button" href="#">編集・削除</a>
        </div>
        <div class="task-wrapper">
            <ul class="task-area">
                @foreach ($tasks as $task)
                    <li class="task-list">
                        <div class="task-body">
                            {{$task->contents}}
                        </div>
                        <div class="judge-button-area">
                            <button class="judge-button">◯</button>
                            <button class="judge-button">×</button>
                        </div>
                    </li>
                @endforeach
            </ul>
            <button id="reset-button" class="reset-button">◯・× リセット</button>
        </div>
    </main>
    <script src="{{ asset('js/main.js')}}"></script>
</body>
</html>