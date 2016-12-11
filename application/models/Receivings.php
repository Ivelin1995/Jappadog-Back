<?php

/**
 * This is a "CMS" model for supplies.
 *
 * @author Derek Larson
 */
class Receivings extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	public function get($name)
	{
		$query = $this->db->get("receiving");
		// iterate over the data until we find the one we want
		foreach ($query->result() as $record)
			if ($record->name == $name)
				return $record;
		return null;
	}

	public function all()
	{
		$query = $this->db->get("receiving");
		return $query->result();
	}

	public function  update($id)
	{
		// update the instock amount of the ordered ingredient
		$this->db->set('instock', 'receiving*measurement+instock', FALSE);
		$this->db->where('id', $id);
		$this->db->update('receiving');
	}

}
