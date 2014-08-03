<?php

use Modlist\Controller;

class PanelController extends Controller\Twig {
	
	public function before()
	{
		$authenticated = true;
		
		$login = (strpos($this->request->uri(), '/panel/login') === 0);
		
		if( ! $authenticated && ! $login ) {
			$this->response->redirect('/panel/login');
		}
		
		if( $authenticated && $login ) {
			$this->response->redirect('/panel');
		}
	}

	public function getIndex()
	{
		return $this->make('panel/home.twig');
	}

	public function getLogin()
	{
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