<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title> AWS opdatering til OSM </title>
</head>
<body>
<script type="text/javascript">
	window.onload = function(){blah();};
	function blah(){
	            echo "Loading..."
        }
</script>

<?php
start:
set_time_limit(60000000);
ini_set('memory_limit', '2048M');
$timeout = stream_context_create(array('http'=>
    array(
        'timeout' => 1200,  //1200 Seconds is 20 Minutes
    )
)); 
$postnummer = $_GET['postnummer'];
$postnrarray = array(1050,1051,1052,1053,1054,1055,1055,1056,1057,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1100,1101,1102,1103,1104,1105,1106,1107,1110,1111,1112,1113,1114,1115,1116,1117,1118,1119,1120,1121,1122,1123,1124,1125,1126,1127,1128,1129,1130,1131,1150,1151,1152,1153,1154,1155,1156,1157,1158,1159,1160,1161,1164,1165,1165,1166,1167,1168,1169,1170,1171,1172,1173,1174,1175,1200,1201,1202,1203,1204,1205,1206,1207,1208,1209,1210,1211,1212,1213,1214,1215,1216,1218,1219,1220,1221,1240,1250,1251,1253,1254,1255,1256,1257,1259,1259,1260,1261,1263,1263,1264,1265,1266,1267,1268,1270,1271,1300,1301,1302,1303,1304,1306,1307,1307,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317,1318,1319,1320,1321,1322,1323,1324,1325,1326,1327,1328,1329,1350,1352,1353,1354,1355,1356,1357,1358,1359,1359,1360,1361,1361,1362,1363,1364,1365,1366,1367,1368,1369,1370,1371,1400,1400,1401,1402,1402,1402,1402,1402,1403,1406,1407,1408,1409,1410,1411,1411,1412,1413,1414,1415,1416,1417,1418,1419,1420,1421,1422,1423,1424,1425,1426,1427,1428,1429,1430,1432,1433,1434,1435,1436,1437,1438,1439,1440,1441,1450,1451,1452,1453,1454,1455,1456,1457,1458,1459,1460,1461,1462,1463,1464,1465,1466,1467,1468,1470,1471,1472,1473,1533,1550,1550,1551,1552,1553,1553,1554,1555,1556,1557,1558,1559,1560,1561,1561,1562,1563,1564,1567,1568,1569,1570,1570,1571,1572,1573,1574,1575,1576,1577,1577,1577,1600,1601,1602,1603,1604,1605,1606,1607,1608,1609,1610,1611,1612,1613,1614,1615,1616,1617,1618,1619,1620,1620,1621,1622,1623,1624,1631,1632,1633,1634,1635,1650,1651,1652,1653,1654,1655,1656,1657,1658,1659,1660,1660,1661,1662,1663,1664,1665,1666,1667,1668,1669,1670,1671,1671,1672,1673,1674,1675,1676,1677,1699,1700,1701,1702,1703,1704,1705,1706,1707,1708,1709,1710,1711,1711,1712,1714,1715,1716,1717,1718,1719,1720,1721,1722,1723,1724,1725,1726,1727,1728,1729,1730,1731,1732,1733,1734,1735,1736,1737,1738,1739,1749,1750,1751,1752,1753,1754,1755,1756,1757,1758,1759,1760,1761,1762,1763,1764,1765,1766,1770,1771,1772,1773,1774,1775,1777,1799,1800,1801,1802,1803,1804,1805,1806,1807,1808,1809,1810,1811,1812,1813,1814,1815,1816,1817,1818,1819,1820,1822,1823,1824,1825,1826,1827,1828,1829,1850,1851,1852,1853,1854,1855,1856,1857,1860,1861,1862,1863,1864,1865,1866,1867,1868,1870,1871,1872,1873,1874,1875,1876,1877,1878,1879,1900,1901,1902,1903,1904,1905,1906,1908,1909,1910,1911,1912,1913,1914,1915,1916,1917,1920,1921,1922,1923,1924,1925,1926,1927,1928,1950,1951,1952,1953,1954,1955,1956,1957,1958,1959,1960,1961,1962,1963,1964,1965,1966,1967,1970,1971,1972,1973,1974,2000,2100,2150,2200,2300,2400,2450,2500,2600,2605,2610,2620,2625,2630,2635,2640,2650,2660,2665,2670,2680,2690,2700,2720,2730,2740,2750,2760,2765,2770,2791,2800,2820,2830,2840,2850,2860,2870,2880,2900,2920,2930,2942,2950,2960,2970,2980,2990,3000,3050,3060,3070,3080,3100,3120,3140,3150,3200,3210,3220,3230,3250,3300,3310,3320,3330,3360,3370,3390,3400,3450,3460,3480,3490,3500,3520,3540,3550,3600,3630,3650,3660,3670,3700,3720,3730,3740,3751,3760,3770,3782,3790,4000,4030,4040,4050,4060,4070,4100,4130,4140,4160,4171,4173,4174,4180,4190,4200,4220,4230,4241,4242,4243,4250,4261,4262,4270,4281,4291,4293,4295,4296,4300,4320,4330,4340,4350,4360,4370,4390,4400,4420,4440,4450,4460,4470,4480,4490,4500,4520,4532,4534,4540,4550,4560,4571,4572,4573,4581,4583,4591,4592,4593,4600,4621,4622,4623,4632,4640,4652,4653,4654,4660,4671,4672,4673,4681,4682,4683,4684,4690,4700,4720,4733,4735,4736,4750,4760,4771,4772,4773,4780,4791,4792,4793,4800,4840,4850,4862,4863,4871,4872,4873,4874,4880,4891,4892,4894,4895,4900,4912,4913,4920,4930,4941,4943,4944,4951,4952,4953,4960,4970,4983,4990,5000,5200,5210,5220,5230,5240,5250,5260,5270,5290,5300,5320,5330,5350,5370,5380,5390,5400,5450,5462,5463,5464,5466,5471,5474,5485,5491,5492,5500,5540,5550,5560,5580,5591,5592,5600,5610,5620,5631,5642,5672,5683,5690,5700,5750,5762,5771,5772,5792,5800,5853,5854,5856,5863,5871,5874,5881,5882,5883,5884,5892,5900,5932,5935,5953,5960,5970,5985,6000,6040,6051,6052,6064,6070,6091,6092,6093,6094,6100,6200,6230,6240,6261,6270,6280,6300,6310,6320,6330,6340,6360,6372,6392,6400,6430,6440,6470,6500,6510,6520,6534,6535,6541,6560,6580,6600,6621,6622,6623,6630,6640,6650,6660,6670,6682,6683,6690,6700,6705,6710,6715,6720,6731,6740,6752,6753,6760,6771,6780,6792,6800,6818,6823,6830,6840,6851,6852,6853,6854,6855,6857,6862,6870,6880,6893,6900,6920,6933,6940,6950,6960,6971,6973,6980,6990,7000,7080,7100,7120,7130,7140,7150,7160,7171,7173,7182,7183,7184,7190,7200,7250,7260,7270,7280,7300,7321,7323,7330,7361,7362,7400,7430,7441,7442,7451,7470,7480,7490,7500,7540,7550,7560,7570,7600,7620,7650,7660,7673,7680,7700,7730,7741,7742,7752,7755,7760,7770,7790,7800,7830,7840,7850,7860,7870,7884,7900,7950,7960,7970,7980,7990,8000,8200,8210,8220,8230,8240,8250,8260,8270,8300,8305,8310,8320,8330,8340,8350,8355,8361,8362,8370,8380,8381,8382,8400,8410,8420,8444,8450,8462,8464,8471,8472,8500,8520,8530,8541,8543,8544,8550,8560,8570,8581,8585,8586,8592,8600,8620,8632,8641,8643,8653,8654,8660,8670,8680,8700,8721,8722,8723,8732,8740,8751,8752,8762,8763,8765,8766,8781,8783,8800,8830,8831,8832,8840,8850,8860,8870,8881,8882,8883,8900,8920,8930,8940,8950,8960,8961,8963,8970,8981,8983,8990,9000,9200,9210,9220,9230,9240,9260,9270,9280,9293,9300,9310,9320,9330,9340,9352,9362,9370,9380,9381,9382,9400,9430,9440,9460,9480,9490,9492,9493,9500,9510,9520,9530,9541,9550,9560,9574,9575,9600,9610,9620,9631,9632,9640,9670,9681,9690,9700,9740,9750,9760,9800,9830,9850,9870,9881,9900,9940,9970,9981,9982,9990);
$key = (array_search($postnummer, $postnrarray) -1);
echo "Næste postnummer er " . $postnrarray[$key] . "<BR>";
$nextpostnr = $postnrarray[$key] ;

$awsdata = array('Mangler');
$osmdata = array('Mangler');
$osmdataid = array('Mangler');
$string = file_get_contents('http://overpass-api.de/api/interpreter?data=[out:json];node[%22osak:identifier%22][%22addr:postcode%22=' . $postnummer . '];out;',false, $timeout);
echo "Loading Overpass Turbo - " . $http_response_header[0] ;
$json_osm = json_decode($string, true);
if ($json_osm ) { echo "--OK ". "<BR>";}
else {
echo "--Error " . "<BR>";
goto start; 
}

foreach( $json_osm['elements'] as $key=>$val){

$osmid = $val[id];
$lat = number_format($val[lat], 6, '.', '');
$lon = number_format($val[lon], 6, '.', '');
$addrstreet = iconv('UTF-8', 'ISO-8859-1',$val[tags]['addr:street']);
$addrpostcode = $val[tags]['addr:postcode'];
$addrcity  = iconv('UTF-8', 'ISO-8859-1',$val[tags]['addr:city']);
$addrhousenumber = $val[tags]['addr:housenumber'];
$osakidentifier = $val[tags]['osak:identifier'];
$osakrevision = $val[tags]['osak:revision'];
$osakstreet = $val[tags]['osak:street'];

$fulladdr = $addrstreet . ' ' . $addrhousenumber . ', ' . $addrpostcode . ' ' . $addrcity;
if ($osakstreet){ 
array_push($osmdata,$val[tags]['osak:street'] . " " . $val[tags]['addr:housenumber']);
}
else {
array_push($osmdata,$val[tags]['addr:street'] . " " . $val[tags]['addr:housenumber']);
}
array_push($osmdataid,$val[id]);
}
$testkey = array_search('Ansgarparken 21, 7950 Erslev', $osmdata);

$textexport1 = "<?xml version='1.0' encoding='UTF-8'?>";
$textexport1 .= "<osm version='0.6' upload='true' generator='PHPscript'>";
$string = file_get_contents('http://dawa.aws.dk/adresser?postnr=' . $postnummer);
echo "Loading Geodatastyrelsens Adresse Web Services (AWS) - " . $http_response_header[0] ;
$json_a = json_decode($string, true);
if ($json_a ) { echo "--OK ". "<BR><BR>";}
else {
echo "--Error " . "<BR><BR>";
goto start;

}
$x = 0;
foreach( $json_a as $key=>$val){
$x = ($x - 1);
$lat = number_format($val[adgangsadresse][adgangspunkt][koordinater][1], 6, '.', '');
$lon = number_format($val[adgangsadresse][adgangspunkt][koordinater][0], 6, '.', '');
$awsid = strtoupper (str_replace('-','',$val[id]));
$osmid = str_replace('-','',$val[id]);
$addrstreet = $val[adgangsadresse][vejstykke][navn];
$addrpostcode =  $val[adgangsadresse][postnummer][nr];
$addrcity  = $val[adgangsadresse][postnummer][navn];
$addrhousenumber = $val[adgangsadresse][husnr];
$osakmunicipalityno = $val[adgangsadresse][kommune][kode];
$osakstreetno = $val[adgangsadresse][vejstykke][kode];
$osakrevision = $val[historik][ændret];
$fulladdr = $addrstreet . ' ' . $addrhousenumber . ', ' . $addrpostcode . ' ' . $addrcity;

$soeg = array_search($val[adgangsadresse][vejstykke][navn] . " " . $val[adgangsadresse][husnr], $osmdata);

if (!$soeg)
{
$soeg2 = array_search($addrstreet . " " . $addrhousenumber, $awsdata);
array_push($awsdata,$addrstreet  . " " . $addrhousenumber);
if (!$soeg2)
{
$textexport2 .=("<node id='" . $x . "' action='new' visible='true' lat='" . $lat . "' lon='" . $lon ."' >");
		$textexport2 .=("<tag k='osak:revision' v='" . $osakrevision . "'/>");
		$textexport2 .=("<tag k='osak:identifier' v='" . $osmid  . "'/> ");
		$textexport2 .=("<tag k='addr:street' v='" . $addrstreet . "'/> ");
		$textexport2 .=("<tag k='addr:housenumber' v='" . $addrhousenumber . "'/> ");
		$textexport2 .=("<tag k='addr:city' v='" . $addrcity . "'/> ");
		$textexport2 .=("<tag k='addr:postcode' v='" . $addrpostcode . "'/> ");
		$textexport2 .=("<tag k='addr:country' v='DK'/> ");
		$textexport2 .=("<tag k='source' v='Geodatastyrelsens Adresse Web Services (AWS)'/> ");
		$textexport2 .=("<tag k='osak:municipality_no' v='" . $osakmunicipalityno . "'/> ");
		$textexport2 .=("<tag k='osak:street' v='" . $addrstreet . "'/> ");
		$textexport2 .=("<tag k='osak:street_no' v='" . $osakstreetno . "'/> ");
		$textexport2 .=("</node> ");



echo $osmdataid[$soeg] . ";" . $fulladdr . ";" . $osakrevision;




echo "---" . "<BR>";
}
}
}
 $textexport3 .=("</osm> ");
$textexport = $textexport1 . $textexport2 . $textexport3;
if ($textexport2){
?>

  <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script type="text/javascript">
var textexport;
 var textexport = <?php echo json_encode($textexport); ?>;
 var postnr = <?php echo json_encode($postnummer); ?>;

	var uri = 'data:text/csv;charset=utf-8,' + textexport;
var downloadLink = document.createElement("a");
downloadLink.href = uri;
downloadLink.download =  postnr + ".osm";

document.body.appendChild(downloadLink);
downloadLink.click();
document.body.removeChild(downloadLink);

</script>
<?php
}
echo "<script>parent.self.location='osmdata-add.php?postnummer=" . $nextpostnr  . "';</script>";

?>
</body>
</html>

