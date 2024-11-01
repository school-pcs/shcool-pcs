<!-- PcInfo.php -->
<!-- DBから情報を抜くだけのクラス -->
<?php
class PcInfo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllPcInfo() {
        $sql = "SELECT `classroom`, `number`, `mac-address` FROM `mac-address`";
        $stmt = $this->pdo->query($sql);
        
        $pcInfo = [];
        while ($row = $stmt->fetch()) {
            $pcInfo[] = [
                'classroom' => $row['classroom'],
                'number' => $row['number'],
                'mac_address' => $row['mac-address']
            ];
        }
        
        return $pcInfo;
    }
}
?>
