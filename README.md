# お問い合わせ管理システム
顧客からのお問い合わせを受け付け、管理者側はお問合せ内容を管理・閲覧・検索できるシステム。
- お問い合わせページ<br>
ユーザーが個人情報とお問い合わせ内容を入力し管理者側に送信（送信前に内容確認ページあり）。
- 管理システムページ<br>
お問合せ内容を一括管理・閲覧。顧客名・性別・登録日（＝お問合せ日）・メールアドレスで絞り込み検索可能。
![contact](https://user-images.githubusercontent.com/103875473/179128662-36e36cb7-8cdb-4645-9838-f363250ee871.png)
![admin](https://user-images.githubusercontent.com/103875473/179128681-2473b0ed-f58a-410b-afcd-eed7b0869421.png)

## 作成目的
- coachtechでのStandard Termを終え、Advanced Termへ移行するにあたり実力チェックのために、作成したもの。
- システムそのものの意義としては、顧客からの声を集め、管理者は同内容を一元的に管理し、要望に応えていくための一助としたいもの。

## アプリケーションURL
- 未デプロイの為、本GitHubのURLを下添する。
https://github.com/im-yonggi/coachtech-checktest.git

## 機能一覧
- お問合せページ
	- 郵便番号<br>
    郵便番号を全角で入力したまま内容確認に遷移しようとすると、住所が自動で半角に変わった状態でエラーを通知。
    - 住所<br>
    郵便番号を入力すると、住所が自動入力
- 内容確認ページ<br>
	- 修正を選択すると、入力内容が保持されたまま、お問合せページに遷移。
- 管理システムページ<br>
	- 検索<br>
	顧客名・性別・登録日・メールアドレスで絞り込み検索が可能。また検索結果表示後は、検索内容を検索フォームに保持
	- お問合せ内容一覧
	Pagination機能を利用。検索機能と同居させるため、検索フォームの送信methodはgetを使用。
	- お問合せ内容<br>
	お問合せ内容が長文の場合（MAX120文字）、マウスオーバーすることで、全文表示。
	- 削除
	各お問合せ内容右欄にある削除ボタンをクリックで、DBから該当のお問合せ内容を削除

## 使用技術
- Laravel Framework 8.83.18

## テーブル設計
- 教材のInstruction（下図）を基に設計。
- 実際のmigration fileの画面キャプチャも併せて添付する。
![スクリーンショット 2022-07-15 10 58 27](https://user-images.githubusercontent.com/103875473/179131958-198745ab-cbe5-48eb-969c-bc1933b9465a.png)
<img width="542" alt="スクリーンショット 2022-07-15 11 00 38" src="https://user-images.githubusercontent.com/103875473/179131979-302234e9-3de8-4d82-be4c-7635a6f97593.png">
<img width="672" alt="スクリーンショット 2022-07-15 11 00 51" src="https://user-images.githubusercontent.com/103875473/179131988-f8fcdffb-8527-4ef4-99ef-92a060dd8d87.png">

## ER図
- 単一のテーブルのみで設計されているため、ER図は未作成。

## ダミーデータ
- seederを利用し1件、ファクトリを使用し、Fakerでダミーデータを生成するよう設計し、34件追加。


	
	
	
