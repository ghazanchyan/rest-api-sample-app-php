<?php

/**
 * 
 * Common DB utilities
 */

define('USERS_TABLE', 'ppusers');
define('ORDERS_TABLE', 'orders');

/**
 * Returns a new mysql conncetion
 * @throws Exception
 * @return unknown
 */
function getConnection() {
	$link = @mysql_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD);
	if(!$link) {
		throw new Exception('Could not connect to mysql ' . mysql_error());
	}
	if(!mysql_select_db(MYSQL_DB, $link)) {
		throw new Exception('Could not select database ' . mysql_error());
	}
	return $link;
}