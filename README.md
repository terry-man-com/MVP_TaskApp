# My Tasks - MVP用タスク管理アプリ

## 概要
自分のタスクを設定し、それができたかをチェックできます。  
ポートフォリオの練習として、タスクの一括登録やタスクの達成状況の判定などを実装しました。  
今後、こちらのMVPにデザイン追加、ユーザー登録、ログイン機能、ユーザー設定（新規追加・編集・削除）、ガチャ機能、景品編集機能、獲得した景品の一覧表示機能、タスク登録・編集時のトランザクション設定によるエラーハンドリングを実装予定です。

## 主な機能
- タスクの新規登録（最大５件まで一括登録）
- タスク編集・削除
- タスク判定ボタン（◯・×）
- 判定リセットボタン

## 使用技術
- Laravel 12
- PostgreSQL
- JavaScript(ES6)
- Docker

## その他（学び）
issueを機能毎に作成し、ローカルの作業はissueに対応したブランチに切り、機能が完成する度にリモートへプッシュする方法で行いました。  
最初に作りたい機能などをissueに書き出すことで、実装する段階ではコードを書くことだけに集中できました。
次回以降も①アプリ完成のためにやるべきタスクをissueに記載する、②ブランチに切ってコーディングする、③リモートにプッシュするという順で行なっていきます。
