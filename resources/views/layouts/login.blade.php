<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>dawnSNS</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="js/app.js"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "header">
            <div class="header-block">
                <div class="nav-logo">
                    <a href="/top"><img src="{{ asset("images/main_logo.png") }}"></a>
                </div>
                <div class="menu-trigger">
                    <p>{{$user->username}} さん</p><span></span>
                    <img class="icon" src="{{asset ("images/dawn.png") }}">
                </div>
                <nav class="header-nav">
                    <ul>
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/profile">プロフィール</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{$user->username}}さんの</p>
                <div class="follow">
                <p>フォロー数</p>
                <p>{{$follow_count}}名</p>
                </div>
                <button class="sidebar-btn" onclick="location.href='/follow-list'">フォローリスト</button>
                <div class="follower">
                <p>フォロワー数</p>
                <p>{{$follower_count}}名</p>
                </div>
                <button class="sidebar-btn" onclick="location.href='/follower-list'">フォロワーリスト</button>
            </div>
            <button class="sidebar-btn search-btn" onclick="location.href='/search'">ユーザー検索</button>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
