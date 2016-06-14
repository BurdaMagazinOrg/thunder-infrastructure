<?php

namespace Thunder\Robo\Task\Drush;

/**
 * Robo task: Display one-time login URL.
 */
class UserLogin extends DrushTask {

  /**
   * User
   *
   * @var int|string
   */
  protected $user;

  /**
   * Constructor.
   *
   * @param int|string $user
   *   An optional uid, user name, or email address for the user to log in
   *   (defaults to user ID '1').
   */
  public function __construct($user = 1) {
    $this->user = $user;
  }

  /**
   * {@inheritdoc}
   */
  public function run() {
    $this->yell('Login URL', 20);

    return $this->exec()
      ->arg('user-login')
      ->arg($this->user)
      ->option('no-browser')
      ->run();
  }

}
