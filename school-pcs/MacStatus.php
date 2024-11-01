<!-- MacStatus.php -->
<!-- MACアドレスを元に状態を確認するファイル
scripts/network_scan.pyが呼び出される -->
<?php
class MacStatus {
    public static function getStatuses($macAddresses) {
        $command = 'python scripts/network_scan.py ' . implode(' ', $macAddresses);
        $output = shell_exec($command);
        return json_decode($output, true);
    }
}
?>
