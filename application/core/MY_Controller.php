<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'Jappadog Assignment 2';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
		// get the user role
		$this->data['userrole'] = $this->session->userdata('userrole');
		if ($this->data['userrole'] == NULL) $this->data['userrole'] = '?';
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
				// get the user role
		$this->data['userrole'] = $this->session->userdata('userrole');
		if ($this->data['userrole'] == NULL) $this->data['userrole'] = '?';
		$this->data['menubar'] = $this->parser->parse('_menubar', $this->data,true);
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['caboose_styles'] = $this->caboose->styles();
        $this->data['caboose_scripts'] = $this->caboose->scripts();
        $this->data['caboose_trailings'] = $this->caboose->trailings();


		$this->parser->parse('template', $this->data);
	}

}
