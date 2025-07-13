<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>飲食店ブックマーク - ようこそ</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* 変数でテーマカラーを定義 */
        :root {
            --primary-orange: #E67E22;
            --background-color: #f4f6f9;
            --text-color: #2c3e50;
            --light-text-color: #7f8c8d;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Noto Sans JP', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            color: var(--text-color);
        }

        .welcome-container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.07);
            max-width: 500px;
            width: 90%;
        }

        .logo {
            font-size: 50px;
            margin-bottom: 15px;
            color: var(--primary-orange);
        }

        .service-title {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 8px;
        }

        .service-description {
            color: var(--light-text-color);
            margin-bottom: 35px;
            font-size: 1rem;
        }
        
        /* --- ボタンのスタイルをここに集約 --- */
        .action-buttons .btn {
            margin: 5px;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 6px;
            border: 2px solid var(--primary-orange); /* 枠線を常にオレンジに */
            text-decoration: none;
            transition: all 0.3s ease;
            background-color: transparent; /* 初期状態は透明 */
            color: var(--primary-orange);   /* 初期文字色はオレンジ */
        }

        /* ホバー時のスタイル */
        .action-buttons .btn:hover {
            background-color: var(--primary-orange); /* 背景をオレンジで塗りつぶす */
            color: #fff;                             /* 文字色を白に */
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="welcome-container">
    <div class="logo">🍽️</div>
    <h2 class="service-title">飲食店ブックマーク</h2>
    <p class="service-description">お気に入りのお店を、もっとスマートに管理しよう。</p>
    <div class="action-buttons">
        <a href="login.php" class="btn">ログイン</a>
        <a href="user.php" class="btn">ユーザー登録</a>
    </div>
</div>

</body>
</html>