<?php

function returnJson($array)
{
	header('Content-type: application/json');

	return json_encode($array);
}