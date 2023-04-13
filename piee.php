<?php
// 데이터베이스 연결
$conn = mysqli_connect("localhost", "root", "", "pizza");

// 데이터베이스로부터 데이터를 가져오기 위한 쿼리문 실행
$sql = "SELECT * FROM pizza";
$result = mysqli_query($conn, $sql);

// 데이터를 담을 배열 생성
$data = array();

// 데이터베이스에서 가져온 데이터를 배열에 저장
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['name']] = $row['quantity'];
}

// 그래프 표시
echo "<html>";
echo "<head>";
echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
echo "<script type='text/javascript'>";
echo "google.charts.load('current', {'packages':['corechart']});";
echo "google.charts.setOnLoadCallback(drawChart);";
echo "function drawChart() {";
echo "var data = google.visualization.arrayToDataTable([";
echo "['Name', 'Quantity'],";

// 배열에 저장된 데이터를 그래프에 추가
foreach ($data as $name => $quantity) {
    echo "['" . $name . "', " . $quantity . "],";
}

echo "]);";
echo "var options = {'title':'Pizza Quantities', 'width':400, 'height':300};";
echo "var chart = new google.visualization.PieChart(document.getElementById('chart_div'));";
echo "chart.draw(data, options);";
echo "}";
echo "</script>";
echo "</head>";
echo "<body>";
echo "<div id='chart_div'></div>";
echo "</body>";
echo "</html>";
?>
