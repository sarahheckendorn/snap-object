<?php

class gunky {

	private $gunkyId;

	private $gunkyShiny;

	public function getGunkyId() : Uuid {
		return ($this->gunkyId);
	}

	public function setGunkyId($newGunkyId) : void {
		try {
			$uuid = self::validateUuid($newGunkyId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
	}
	$this->gunkyId = $uuid;
	}

	public function getGunkyShiny() : string {
		return ($this->gunkyShiny);
	}

	public function setGunkyShiny(string $newGunkyShiny) : void {
		$newGunkyShiny = trim($newGunkyShiny);
		$newGunkyShiny = filter_var($newGunkyShiny, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newGunkyShiny) === true)
			throw(new \InvalidArgumentException("Gunky Shiny cannot be empty"));
	}
		if(strlen($newGunkyShiny) > 100) {
			throw(new \RangeException("Characters Exceed Limit"));
			}
		$this->gunkyShiny = $newGunkyShiny;
}