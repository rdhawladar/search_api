<?php

return [
	'constant' => 'myConstant',
	'limit' => 10,
	'related_movie_limit' => 3,
	'list_item_per_req' => 9,
	'messages' => [
		'inputError' => 'Please provide a valid start date and end date',
		'emptyData' => 'You have no data in this page. Please check if you have provided a valid start date, end date and page number. Date format should be: YYYY-MM-dd.'
	],
	'numbers' => [
		'zero' => 0,
		'one' => 1
	],
	'status' => [
		'ok' => 200,
		'bad_request' => 400
	],
	'poster_path' => '/assets/images/poster/',
	'cover_path' => '/assets/images/cover/'
];
