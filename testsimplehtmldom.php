<?php
    // example of how to use basic selector to retrieve HTML contents
require('simple_html_dom.php');

// get DOM from URL or file
$html = file_get_html('test.html'); 

echo 'hello';
$html->clear();
// find all link
// $content = $html->find('.cnbeta-article-body');
// foreach ($content[0]->find('#cb_share') as $e) {
//     $e->outertext = '';
// }

// foreach ($content[0]->find('.share-box') as $e) {
//     $e->outertext = '';
// }
// echo $content[0]->outertext;
?>