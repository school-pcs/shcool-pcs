<!-- index.php -->
<!-- PcInfoクラスからDB内容を取得して、
MacStatusクラスでMACアドレスのステータスを取得
templates/pc_status.phpで出力してます
ほぼデバッグ用だから表示は参考程度に -->
<?php
require_once 'config/database.php';
require_once 'PcInfo.php';
require_once 'MacStatus.php';

// PCの情報を取得
$pcInfoManager = new PcInfo($pdo);
$pcInfo = $pcInfoManager->getAllPcInfo();

// MACアドレスを取得
$macAddresses = array_column($pcInfo, 'mac_address');
$statuses = MacStatus::getStatuses($macAddresses);

// 表示を行う
include 'templates/pc_status.php';
?>
