
<?php
include('./../../db_conn/db_connection.php');
// Lấy mã lớp chuyên ngành từ biến POST
if (isset($_POST['mlcn']) && !empty($_POST['mlcn'])) {
    $mlcn = $_POST['mlcn'];

    // Truy vấn SQL để lấy thông tin sinh viên theo lớp chuyên ngành
    $sql = "SELECT 
                CONCAT(sv.holot, ' ', sv.ten) as HoTen, hp.tenhocphan, dhp.a, dhp.b, dhp.c, (0.6 * dhp.a + 0.3 * dhp.b + 0.1 * dhp.c) as Diemhocphan
            FROM tbl_diemhocphan dhp
            JOIN tbl_sinhvien sv ON sv.msv = dhp.msv
            JOIN tbl_hocphan hp ON hp.mhp = dhp.mhp
            JOIN tbl_lopchuyennganh lcn ON sv.mlcn = lcn.mlcn
            WHERE lcn.mlcn = '" . $mlcn . "';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Kết quả tra cứu sinh viên theo lớp chuyên ngành</h2>";
        echo "<table>";
        echo "<tr><th>Họ tên</th><th>Tên học phần</th><th>Điểm A</th><th>Điểm B</th><th>Điểm C</th><th>Điểm học phần</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['HoTen'] . "</td>";
            echo "<td>" . $row['tenhocphan'] . "</td>";
            echo "<td>" . $row['a'] . "</td>";
            echo "<td>" . $row['b'] . "</td>";
            echo "<td>" . $row['c'] . "</td>";
            echo "<td>" . $row['Diemhocphan'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Không có sinh viên nào thuộc lớp chuyên ngành này";
    }

}
?>
