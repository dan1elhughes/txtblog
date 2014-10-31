<?php include "./includes/header.php";
if (isset($_GET['post'])) {
	echo "\n\t<div id=\"blogentry\">";
	$post = htmlspecialchars($_GET["post"]);
	if (file_exists("blog/images/$post.jpg")) {
		echo "\n\t\t"
?>
<img id="blogfocus" src="<?php echo $rootpath;?>blog/images/<?php echo $post;?>.jpg" alt="Blog image for <?php echo $post;?>">
<?php
	}
	$myfile="blog/entries/$post.txt";
	$line=file($myfile);
	$count=count($line);
	echo "\t\t<h2>" .trim($line[0]). "</h2>";
	echo "\n\t\t<p class=\"tinytext additional\">".date_format(date_create_from_format('Y-m-d', $post), 'j M, Y')."</p>";
	for ($i = 1; $i < $count; $i++) {
		echo "\n\t\t<p>";
		echo trim($line[$i]);
		echo "</p>";
		}
	echo "\n</div>";
}
else {
?>
<div id="content">
<?php
//get the files and sort them into reverse order
$originalFiles = glob("blog/entries/*.txt");
rsort($originalFiles);

//if page is set, use that - otherwise assume first page
if (isset($_GET['page'])) {
	$page = htmlspecialchars($_GET["page"]);
} else {$page = 1;}

//if not first page, show previous button
if ($page<=1) {$previous=false;} else {$previous = true;}

//take ten items from the array, starting from the page number * 10
$firstpost=($page*10)-10;
$files = array_slice($originalFiles, $firstpost, 10, true);

//if there are more files to show, show the next button
if (count($originalFiles) > $page*10) {$next = true;} else {$next = false;}

foreach($files as $file){
	$file=str_replace("blog/entries/", "", "$file");
	$file=str_replace(".txt", "", "$file");
	$myfile="blog/entries/$file.txt";
	$line=file($myfile);
	$title=trim($line[0]);?>
	<a class="nohover" href="<?php echo $rootpath;?>?post=<?php echo $file;?>">
		<div class="item">
			<h2><?php echo $title;?></h2>
			<p class="tinytext additional"><?php echo date_format(date_create_from_format('Y-m-d', $file), 'j M, Y');?></p>
			<?php if (file_exists("blog/images/$file.jpg")) {
			echo "<img src='$rootpath"."blog/images/$file.jpg'>";}?>
			<p><?php unset($line[0]); //don't print the title again
			$line = preg_replace('/<a[^>]*>/', '', $line); //strip <a [anything here]>
			$line = str_replace('</a>', '', $line); //strip </a>
			$line = implode("</p><p>", $line); //put the array elements together with paragraphs in between
			$line = explode(" ", $line); //split into an array of words
			$line = array_splice($line, 0, 50); // take the first 50 elements(words)
			$line = implode(' ', $line); //concatenate those words together with spaces
			echo $line;?>..</p>
			<p class="additional tinytext">Continue reading</p>
		</div>
	</a>
<?php }?>
	<?php if ($previous){?><a class="left nohover" href="<?php echo $rootpath; echo '?page=', $page-1;?>"><i class="fa fa-long-arrow-left"></i> Newer</a><?php }?>
	<?php if ($next){?><a class="right nohover" href="<?php echo $rootpath; echo '?page=', $page+1;?>">Older <i class="fa fa-long-arrow-right"></i></a><?php }?>
</div>
<?php }
include "./includes/footer.php"; ?>