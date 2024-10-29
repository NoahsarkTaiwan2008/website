<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>猜數字遊戲</title>
    <style>
        /* 重置樣式 */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* 頁面基本樣式 */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }

        /* 容器樣式 */
        .container {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        /* 標題樣式 */
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* 提示訊息樣式 */
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        /* 表單樣式 */
        form {
            margin-top: 15px;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        input[type="number"] {
            width: 80%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 15px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* 重玩按鈕樣式 */
        .restart-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .restart-link:hover {
            text-decoration: underline;
        }

        /* 嘗試次數樣式 */
        .attempts {
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>猜數字遊戲</h1>
        <?php
            session_start();

            // 初始化遊戲
            if (!isset($_SESSION['target'])) {
                $_SESSION['target'] = rand(1, 100);
                $_SESSION['attempts'] = 0;
                echo "<p>遊戲開始！我想了一個 1 到 100 之間的數字，試著猜猜看！</p>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $guess = intval($_POST['guess']);
                $_SESSION['attempts']++;

                if ($guess > $_SESSION['target']) {
                    echo "<p>太高了！試試更小的數字。</p>";
                } elseif ($guess < $_SESSION['target']) {
                    echo "<p>太低了！試試更大的數字。</p>";
                } else {
                    echo "<p>恭喜你！猜對了！</p>";
                    echo "<p>你用了 <span class='attempts'>" . $_SESSION['attempts'] . "</span> 次猜對。</p>";
                    session_unset();  // 清除遊戲數據
                    echo "<a class='restart-link' href='guess_number_game.php'>再玩一次</a>";
                    exit;
                }
            }
        ?>

        <form method="post" action="">
            <label for="guess">輸入你的猜測：</label>
            <input type="number" name="guess" id="guess" required min="1" max="100">
            <button type="submit">猜測</button>
        </form>

        <p class="attempts">目前猜測次數：<?php echo $_SESSION['attempts']; ?></p>
    </div>
</body>
</html>
