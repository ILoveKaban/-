<?php
	
	require_once "fcc.php";
	
	function gbooksAPI($atts) {
		extract(
			shortcode_atts(
				[
					"isbn" => ""
				], $atts
			)
		);
		$data = json_decode(file_cget_contents("https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}"));
		$results = $data->items[0]->volumeInfo;
		$bookTitle = $results->title;
		$bookAuthor = implode("、", $results->authors);
		$bookMoreLink = $results->infoLink;
		$bookThumbnailLink = $results->imageLinks->thumbnail;
		$bookPublished = $results->publishedDate;
		
		$blogcard = do_shortcode("[blogcard url=\"${bookMoreLink}\"]");
		
		$return = <<<EOM
<div class="books" align="center">
	<span class="box-title">Book Information</span>
	<img src="${bookThumbnailLink}" title="${bookTitle}">
	<p>
		タイトル: ${bookTitle}<br>
		作者: ${bookAuthor}<br>
		ISBN: ${isbn}<br>
		$blogcard
		<small align="right">by Google Book APIs</small>
	</p>
</div>
EOM;
		return $return;
	}
	
	add_shortcode("books", "gbooksAPI");