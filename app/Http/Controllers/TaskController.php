<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'asc')->get();
        return view ('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // フォームで一括送信されたデータをひとつひとつ取り出したい
        // inputメソッドを使用し、データを取り出し、$contentに格納
        $contents = $request->input('contents');

        // フォーム全てが空かどうかを確認
        if (collect($contents)->filter()->isEmpty()) {
            return redirect()->back()
                ->withErrors(['contents' => '1つ以上入力してください'])
                ->withInput();
        }

        // 通常のバリデーション
        $request->validate([
            'contents' => 'required|array',
            'contents.*' => 'nullable|string|max:25',
        ]);
        foreach ($contents as $content) {
            if (!empty($content)) {
                Task::create(['contents' => $content]);
            } // タスク登録を繰り返す
        }
        return redirect()->route('task.index')->with('success', 'タスクを登録しました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $tasks = Task::orderBy('id', 'asc')->get();
        return view('tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request)
        {
            // formで送信されたcontent[]を配列としてバリデーション
            $request->validate([
                'contents' => 'required|array', // contentsは配列かどうか
                'contents.*' => 'nullable|string|max:25', // 配列に格納されている値に対してバリデーション
            ]);

            // フォーム送信されたデータを取得し、格納する（元々配列なので、キーと値を名前をつけて格納）
            // 空でなければ、対応したIDをモデルから探し、updateで上書きする
            foreach ($request->input('contents') as $id => $content) {
                if (!empty($content)) {
                    $task = Task::find($id);
                    if($task) {
                        $task->update(['contents' => $content]);
                    }
                }
            }
            return redirect()->route('tasks.edit')->with('update', 'タスクを更新しました！');
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.edit')->with('delete', '削除しました');
    }
}
