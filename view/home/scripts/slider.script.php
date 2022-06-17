<?php
$random_number_array = range(0, count($comments) - 1);
shuffle($random_number_array );
$random_number_array = array_slice($random_number_array ,0,4);

$sliderComments = array();
for ($i = 0; $i < count($random_number_array); $i++)
{
	$sliderComments[] = $comments[$i];
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/WebStudio/view/home/slider.view.php'; ?>