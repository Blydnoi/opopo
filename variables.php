<?
$link = mysqli_connect('localhost', 'u765100_user', 'vbnmmnbv123', 'u765100_user');
mysqli_select_db ($link, "u765100_user");
$query_setti = "SELECT * FROM setting WHERE id = '1'";
$setti = mysqli_query($link, $query_setti);
foreach ($setti as $setti) {
$name = $setti['site_name'];
$title = $setti['site_title'];
$desc = $setti['site_desc'];
$keywords = $setti['site_key'];
$logo = $setti['logo'];
$seller = $setti['digi_id'];
}

?>