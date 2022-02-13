
## Muscle Share

このアプリケーションは、トレーニングを頑張る人に向けた、モチベーション維持のためのアプリです。<br>
ユーザは、「筋トレ掲示板」「コミュニティ」「ランキング」「体重管理グラフ」の4機能を使うことができます。<br>

## 作成の背景や目的

製作者は日々トレーニングを行なっており、周りの友人もよく筋トレをします。<br>
しかし、筋トレのモチベが上がらず、なかなか継続できないと言う友人が多い状況にあります。<br>
そこで、ランキング機能やコミュニティ機能を加え、「当事者意識を持って気軽に使用できる」アプリを作ることを目的として作成しました。<br>

## 開発環境

### インフラ

AWS cloud9(EC2)

### フロントエンド

bootstrap v4.6.1<br>
jquery v3.6.0<br>
Chart.js

### バックエンド

PHP 7.2.24
Laravel Framework 6.20.43

### データベース

MariaDB Server 0.2.38

### デプロイ

heroku (https://blooming-brook-25294.herokuapp.com)

## デモページ（工夫した点）
<img src="https://user-images.githubusercontent.com/66857971/153733305-846fd6d1-9bce-49cc-8513-47021a51879a.jpg" width="30%">
LINE BOTを作り、1ヶ月に1度自動でランキングが友達追加している人に送られるように連携しました。
<img width="500" alt="スクリーンショット 2022-02-13 9 33 46" src="https://user-images.githubusercontent.com/66857971/153733388-45ca1903-9955-46aa-91b9-a7f0878a5606.png">
自分の体重管理表です。体重を入力するだけで、面倒な作業をなくすために最終の体重をformに保存するなど工夫しました。
<img width="500" alt="スクリーンショット 2022-02-13 9 34 26" src="https://user-images.githubusercontent.com/66857971/153733393-e3eea6db-68a3-4c2d-a3e3-8f6459f4b807.png">
筋トレ掲示板の画面のデモです。
