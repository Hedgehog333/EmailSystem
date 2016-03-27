<?php
class Controller_Login extends Controller
{
	function action_index()
	{
		$log = new LOGIN();
		$log->user = 'root';
		$log->pass = '';
		$log->DBC();
		$res = $log->login_($_POST['name'],$_POST['pass']);
		$log->DBC_close();
		$data = $res;
		$this->view->generate('messages_view.php', 'template_view.php', $data);
	}
}
