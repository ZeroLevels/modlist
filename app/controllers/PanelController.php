<?php

use Modlist\Controller;

class PanelController extends Controller\Twig {

	public function getIndex()
	{
		$authenticated = false;
		
		if($authenticated) {
			return $this->make('panel/home.twig');
                }
		return $this->make('panel/login.twig');
	}

	public function getSubmissionList()
	{
		return $this->make('panel/submissionlist.twig');
	}

	public function getSubmission($id)
	{
		//$submission = Submission::find($id);
		$submission = array('id' => $id); //placeholder
		return $this->make('panel/submission.twig', compact('submission'));
	}

}