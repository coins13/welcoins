# Welcoins (simple register form)

**新歓合宿および懇親会の出欠確認、出欠統計が行える簡易登録フォーム**

来年度以降も使われることを想定して開発した。

## 機能一覧

* 新入生の登録

* JSON フォーマットをベースとした簡易データベース

* 入力値のバリデーション

* 管理画面

* 出欠統計

## 今後追加する予定の機能

* 統計データをCSVでダウンロード

* アクセスログとエラーログの収集

## インストレーション

1.GitHub からソースコードをダウンロードする。

`git clone https://github.com/coins13/welcoins.git`

2.Welcoins のファイル群を所定の場所に配置する。例えば `/var/welcoins` に配置する場合:

`mv ./welcoins /var/welcoins`

3.Web サーバ側で公開するルートディレクトリを `/var/welcoins/public` に設定する。

4.(オプション) welcoins/data/login.json のユーザ名を変更する。

5.http://localhost/admin/password で管理者のパスワードを設定する。

6.完了

## システム要件

* This system requires `>= PHP 5.4`

## License

Copyright (c) 2014 University of Tsukuba, Collge of Information Science

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
