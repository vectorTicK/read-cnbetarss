<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>cnbeta</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<table class="table">
		<thead>
			<tr>
				<th width="50px">序号</th>
				<th>标题</th>
				<th width = "250px">时间</th>
			</tr>
		</thead>
		<tbody>
			<?php
            $xml=("http://rss.cnbeta.com/");
            $xmlDoc = new DOMDocument();
            $xmlDoc->load($xml);
            //get elements from "<channel>"
            $channel =$xmlDoc->getElementsByTagName('channel')->item(0);
            $channel_title = $channel->getElementsByTagName('title')
            ->item(0)->childNodes->item(0)->nodeValue;
            $channel_link = $channel->getElementsByTagName('link')
            ->item(0)->childNodes->item(0)->nodeValue;
            $channel_desc = $channel->getElementsByTagName('description')
            ->item(0)->childNodes->item(0)->nodeValue;
            $html = "<h1>$channel_title<br><small>$channel_desc</small></h1>";

            for($i = 0; $i< 10; $i++){
                $itemtitle = $channel->getElementsByTagName('item')->item($i)->getElementsByTagName('title')->item(0)->nodeValue;
                $itemtime = $channel->getElementsByTagName('item')->item($i)->getElementsByTagName('pubDate')->item(0)->nodeValue;
                $itemlink = $channel->getElementsByTagName('item')->item($i)->getElementsByTagName('link')->item(0)->nodeValue;
                $index = $i + 1;
                $html .= "<tr><td>$index</td><td><a href = 'content.php?link=$itemlink' target = _blank>$itemtitle</a></td><td>$itemtime</td></tr>";
            }
            echo $html;
            ?>			
        </tbody>
    </table>
    <div></div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.jfeed.pack.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
