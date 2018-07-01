<?php

namespace Noir;

/**
 * Controller class for the Login page
 */
class LoginController extends Controller {

	/**
	 * LoginController constructor.
	 * @param Site $site Site object
	 * @param array $post $_POST
	 * @param array $session $_SESSION
	 * @param array $extra Additional login to add (for testing purposes)
	 */
	public function __construct(Site $site, $post, &$session, $extra = null) {
		parent::__construct($site);

		/*
		 * Login information generated by the Salted Passwords page
		 * https://facweb.cse.msu.edu/cbowen/cse477/salt/
		 */
		$logins = array(
			array('user' => 'staff', 'salt' => 'iUegMlXtoppDSJlV',
				'hash' => 'b1448efc80355a2fdfc81d4ba15864cbf9784a91c76da24b69df5bf4573170f8'),
			array('user' => 'cbowen', 'salt' => 'k%ekyCt^3o@@4B6q',
				'hash' => '236da508ec5a641366086267d5fa900453ed3bceab14aa6085ad1ec7806fa66e'),
			array('user' => 'schaf170', 'salt' => 'ATxZw*1J~UnkjR_R',
				'hash' => '68034665b00380a6b8c38ce9c98580a6e17febac0560614d62198a7904072aa0')
		);

		// This allows us to add an extra login for testing purposes
		if($extra !== null) {
			$logins[] = $extra;
		}

		unset($session[LOGIN_SESSION]);

		$user = strip_tags($post['user']);
		$password = strip_tags($post['password']);

		/*
		 * Find the user
		 */
		$login = null;
		foreach($logins as $row) {
			if($user === $row['user']) {
				$login = $row;
				break;
			}
		}

		$root = $site->getRoot();
		if($login === null) {
			// Invalid user ID
			$this->result = json_encode(array('ok' => false, 'message' => 'Invalid user ID'));
			return;
		}

		/*
		 * Check the password
		 */
		$hash = hash("sha256", $password . $login['salt']);

		if($hash !== $login['hash']) {
			// Invalid password
			$this->result = json_encode(array('ok' => false, 'message' => 'Invalid password'));
			return;
		}

		$session[LOGIN_SESSION] = array("user" => $user);
		$site->startup($user);

		// Success
        $this->result = json_encode(array('ok' => true));
	}
}