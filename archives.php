<?php
	require("settings.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title><?php echo $blogTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $blogRoot; ?>styles.css" />
</head>

<body class='clog_body'>

<div class='clog_title' >
<h1><?php echo $blogHead; ?></h1>
<a class="clog_toplink" href="<?php echo $blogRoot; ?>">Home</a>
<a class="clog_toplink" href="<?php echo $blogRoot; ?>archives.php">Archives</a>
<a class="clog_toplink" href="<?php echo $blogRoot; ?>post.php">Post</a>
</div>

<?php
	$ls = explode("\n", `ls -1t {$blogPosts}/`);
	foreach($ls as $file) {
		if (preg_match('/^\./', $file)) continue;
		if ($file === "") continue;

		echo "<a class='clog_link' id='$file'>";
		echo "<div class='clog_post_div'>\n";
		echo "<a class='clog_title' href='{$blogRoot}viewpost.php?post=" . urlencode($file) . "'>$file</a>\n";

		$stat = stat("{$blogPosts}$file");
		$date = date('d-m-Y H:i T', $stat['mtime']);
		echo "<span class='clog_date'>$date</span>\n";
		echo "</div>\n</a>\n\n";
	}
?>

</body>

</html>
