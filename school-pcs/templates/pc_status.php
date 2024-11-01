<!-- all_status.phpから受け取った情報を表示するファイル
ほぼデバッグ用だから表示は参考程度に -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCの使用状況</title>
    <link rel="stylesheet" href="static/styles.css"> <!-- 静的ファイルのリンク -->
</head>
<body>

<h1>PCの使用状況</h1>
<table>
    <thead>
        <tr>
            <th>教室</th>
            <th>PC番号</th>
            <th>MACアドレス</th>
            <th>IPアドレス</th>
            <th>ステータス</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pcInfo as $index => $pc): ?>
            <tr>
                <td><?php echo htmlspecialchars($pc['classroom'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($pc['number'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($statuses[$index]['mac_address'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($statuses[$index]['ip_address'] ?? '取得失敗', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($statuses[$index]['status'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
