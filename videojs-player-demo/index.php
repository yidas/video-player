<?php

# Video List
$video_list = array(
	array(
		'title'=>'Big Buck Bunny',
		'src'=>'http://www.w3schools.com/html/mov_bbb.mp4'
		),
	array(
		'title'=>'Sintel Trailer',
		'src'=>'http://media.w3.org/2010/05/sintel/trailer.mp4'
		),
	
	);


# Get Video
$video_id = (isset($_GET['vid'])) ? $_GET['vid'] : vid_rand();

$video = $video_list[$video_id];

function vid_rand() {

	global $video_list;

	global $video_id;

	$key_list = array_keys($video_list);

	$key = rand(0, count($key_list)-1);

	if (isset($video_id) && $video_id == $key_list[$key]) {
		
		if (isset($key_list[$key+1])) {
			
			$key += 1;
		} 
		else if (isset($key_list[$key-1])) {

			$key -= 1;
		}
	}

	return $key_list[$key];
}

?>
<html>
<head>
	<title>Streaming Service Demo</title>
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Video JS -->
	<link href="video-js/video-js.css" rel="stylesheet">
	<script src="video-js/video.js"></script>
	<script>
	  videojs.options.flash.swf = "video-js/video-js.swf"
	</script>
	<!-- /Video JS -->

	<style type="text/css">

	/* Nav */
	body {
	  padding-top: 70px;
	}

	canvas {
		cursor: url('heart_cursor.png') 15 15,crosshair;
	}

	</style>
</head>

<body onload="content_block();">

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Video.js Demo</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
     <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> &nbsp; Video List <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          	
          	<?php foreach ($video_list as $key => $data):
          		
          		echo "<li";
          		if ($key==$video_id) echo ' class="disabled"';
          		echo "><a href=\"?vid={$key}\">{$data['title']}</a></li>";
          	
          		endforeach;
          	?>

          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>




<div class="container">

	<center><p id="loading">Loading...</p></center>

	<div id="content_block" class="panel panel-default" style="width: 100%;">
		<script type="text/javascript">document.getElementById('content_block').style.display='none';</script>
	  <div class="panel-body" style="text-align:center;">

	    <div class="embed-responsive embed-responsive-16by9" style="text-align:center;">

		<video id="example_video_1" class="video-js vjs-default-skin embed-responsive-item"
		  controls preload="auto" width="100%" height="100%" style=""
		  poster=""
		  data-setup='{"example_option":true}'>
		 <source src="<?=$video['src']?>" type='video/mp4' />
		 <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
		</video>

		</div>
		
	  </div>
	</div>

	
	<center>
		<font color="#666666"><b><?=$video['title']?></b></font>
		<br/><br/>
		<a class="btn btn-danger" href="?vid=<?=vid_rand()?>" style="width:250px;">See if is there another video</a>
		<input type="button" class="btn btn-success" value="Reload this video" onclick="location.reload()" style="width:250px;">
	</center>

	<br>
	<div style="text-align:center;color:#555566">
		Designed by <a href="http://www.yidas.com" target="_blank">YIDAS</a>
	</div>


</div>


<script src="http://code.jquery.com/jquery-1.11.2.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">

function content_block() {

	$("#loading").fadeOut(function(){
		
		$("#content_block").fadeIn('slow');
	});
	
}


</script>
</body>
</html>