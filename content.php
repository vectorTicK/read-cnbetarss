<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>cnbeta</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .article-summary {
            position: relative;
    border: 1px solid #eee;
    font-size: 16px;
    padding: 15px 20px 10px 31px;
    overflow: auto;
        }
        .article-summary img, .article-content img {
    display: block;
    margin: 0 auto;
    max-width: 100%;
}
.article-content p {
    text-indent: 2em;
    margin: 8px auto 0;
}
.topic {
    float: right;
}

    </style>
</head>

<body>
    <div class = "content" style="width:56%; margin:0 auto">
    <?php
    // example of how to use basic selector to retrieve HTML contents
    include('./simple_html_dom.php');
    $url = $_GET['link'];
// get DOM from URL or file
    $html = file_get_html($url);
    $title = $html->find('.title h1');
    $content = $html->find('.cnbeta-article-body');
    foreach ($content[0]->find('#cb_share') as $e) {
        $e->outertext = '';
    }

    foreach ($content[0]->find('.share-box') as $e) {
        $e->outertext = '';
    }
    echo $title[0]->outertext;
    echo $content[0]->outertext;
    $html->clear();
?>
    </div>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
</body>

</html>
