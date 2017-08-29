<?php 
  class PageBean{
  	public $psize;
  	public $pnow=1;
  	public $pcount;
  	public $rcount;
	/**
	 * @return the $psize
	 */
	public function getPsize() {
		return $this->psize;
	}
	/**
	 * @return the $pnow
	 */
	public function getPnow() {
		return $this->pnow;
	}

	/**
	 * @return the $rcount
	 */
	public function getRcount() {
		return $this->rcount;
	}

	/**
	 * @return the $pcount
	 */
	public function getPcount() {
		return $this->pcount;
	}

	/**
	 * @param number $psize
	 */
	public function setPsize($psize) {
		$this->psize = $psize;
	}

	/**
	 * @param number $pnow
	 */
	public function setPnow($pnow) {
		$this->pnow = $pnow;
	}

	/**
	 * @param number $rcount
	 */
	public function setRcount($rcount) {
		$this->rcount = $rcount;
	}

	/**
	 * @param number $pcount
	 */
	public function setPcount($pcount) {
		$this->pcount = $pcount;
	}

  	
  }

?>