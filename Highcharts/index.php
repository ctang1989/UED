<?php
header('Content-Type: text/html; charset=UTF-8');
//引入数据库操作类
require_once 'includes/MysqliDb.class.php';
//实例化
$mysqli = new MysqliDb();
$result = $mysqli->_query("SELECT exchange_date,count(*) AS total FROM tbl_gift_email_detail GROUP BY exchange_date ORDER BY exchange_date DESC LIMIT 10");
while($row = $mysqli->_fetch_array_list($result)){
	$date_list[] = $row['exchange_date'];
	$exchange_number[] = intval($row['total']);
}
//反转数组
$date_list = array_reverse($date_list);
$exchange_number = array_reverse($exchange_number);
//生成json
$date_list = json_encode($date_list);
$exchange_number = json_encode($exchange_number);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Highcharts Design</title>

	<link rel="stylesheet" type="text/css" href="css/basic.css">

	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/highcharts.js"></script>
	<!-- 图表导出功能 -->
	<script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>
	<!-- 图表主题 -->
	<!--<script type="text/javascript" src="js/themes/grid-light.js"></script>-->
	<script type="text/javascript">
		Highcharts.setOptions({
		    lang:{
		       contextButtonTitle:"图表导出菜单",
		       decimalPoint:".",
		       downloadJPEG:"下载JPEG图片",
		       downloadPDF:"下载PDF文件",
		       downloadPNG:"下载PNG文件",
		       downloadSVG:"下载SVG文件",
		       drillUpText:"返回 {series.name}",
		       loading:"加载中",
		       months:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
		       noData:"没有数据",
		       numericSymbols: [ "千" , "兆" , "G" , "T" , "P" , "E"],
		       printChart:"打印图表",
		       resetZoom:"恢复缩放",
		       resetZoomTitle:"恢复图表",
		       shortMonths: [ "Jan" , "Feb" , "Mar" , "Apr" , "May" , "Jun" , "Jul" , "Aug" , "Sep" , "Oct" , "Nov" , "Dec"],
		       thousandsSep:",",
		       weekdays: ["星期一", "星期二", "星期三", "星期三", "星期四", "星期五", "星期六","星期天"]
		    }
		});
		$(function () {
			$('#container').highcharts({
				chart: {
					type: 'column'
				},
				title: {
					text: '礼品兑换情况'
				},
				credits: {
					//enabled: false
					text: 'www.thinkpark.com',
					href: 'http://www.thinkpark.com'
				},
				xAxis: {
					categories: <?php echo $date_list;?>
				},
				yAxis: {
					title: {
						text: '兑换数（人）'
					}
				},
				plotOptions: {
					line: { 
						dataLabels: { 
							enabled: true 
						}, 
						enableMouseTracking: false
					},
					column: { 
						dataLabels: { 
							enabled: true 
						}, 
						enableMouseTracking: false
					}
				},
				series: [{
					showInLegend: false,
					name: '兑换人数',
					data: <?php echo $exchange_number;?>
				}]
			})
		})
	</script>
</head>
<body>
	<div id="container"></div>
</body>
</html>