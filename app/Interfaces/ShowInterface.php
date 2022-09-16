<?php

namespace App\Interfaces;

interface ShowInterface{

	public function get($id);
	public function getByCategory($category);
	public function getActiveByCategory($category);
}