<?php

// xmlをパースするサンプルコード
$blog_xml = simplexml_load_file('blog.rdf');
$blog_items  = $blog_xml -> channel ;
$blog_pursed_items = array();

foreach ($blog_items -> item as $item) {
	$x = array();
	$x["title"] = (String)$item -> title;
	$x["link"] = (String)$item -> link;
    $x["pubDate"] = (String)$item -> pubDate;
    $node = $item -> children('http://purl.org/dc/elements/1.1/');
    $x["creator"] = (String)$node -> creator;
	$blog_pursed_items[] = $x;
}

/*
この時点で$blog_pursed_itemsの中には、記事の内容が配列で入っている。（[記事1, 記事2, 記事3]）
一つ一つの配列の中身は
["title": "記事のタイトル",
 "link" : "記事のリンク",
 "pubDate" : "公開日時", 
 "creator" : "書いた人"]
になっている（辞書型）

なので、$blog_pursed_itemsから一つずつ記事の内容を取得して、
取得した記事からタイトルなどを表示させる
*/

foreach ($blog_pursed_items as $items) {
    echo $items["title"]."<br>";
    echo $items["link"]."<br>";
    echo $items["pubDate"]."<br>";
    echo $items["creator"]."<br>";
}