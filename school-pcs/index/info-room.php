<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>secret-room</title>
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <header class="flex">教室の利用状況</header>
    <?php
    require_once './../config/database.php';

    // 教室のリスト
    $classrooms = ['301A', '302B', '303A', '404A'];
    $usageData = [];

    foreach ($classrooms as $classroom) {
        $sql = "SELECT MAX(number) AS max_number FROM `mac-address` WHERE classroom = :classroom;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['classroom' => $classroom]);
        $usageData[$classroom] = $stmt->fetchColumn();
    }
    ?>
    <main>
        <?php foreach ($usageData as $classroom => $maxNumber): ?>
            <a href="../room_status.php">
                <div class="flex usage-block">
                    <p><?= htmlspecialchars($classroom) ?></p>
                    <p>xx/<?= htmlspecialchars((string)$maxNumber) ?>のPCが使用中</p>
                </div>
            </a>
        <?php endforeach; ?>
    </main>
    <footer class="flex">
        <p><small>&copy oca2024 制作展</small></p>
    </footer>
</body>
</html>
