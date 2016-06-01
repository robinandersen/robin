<?php

/**
 * 
 * Session
 * 
 * Handles all session fiddling
 * 
 * @package   Kirby Toolkit 
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      http://getkirby.com
 * @copyright Bastian Allgeier
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
class S {

<<<<<<< HEAD
  public static $started = false;
  public static $name    = 'kirby_session';
  public static $timeout = 30;
  public static $cookie  = array();

  /**
   * Starts a new session
   *
   * <code>
   * 
   * s::start();
   * // do whatever you want with the session now
   * 
   * </code>
   * 
   */  
  public static function start() {

    if(session_status() === PHP_SESSION_ACTIVE) return true;

    // store the session name
    static::$cookie += array(
      'lifetime' => 0,
      'path'     => ini_get('session.cookie_path'),
      'domain'   => ini_get('session.cookie_domain'),
      'secure'   => r::secure(),
      'httponly' => true      
    );

    // set the custom session name
    session_name(static::$name); 

    // make sure to use cookies only
    ini_set('session.use_cookies', 1);
    ini_set('session.use_only_cookies', 1);

    // try to start the session
    if(!session_start()) return false;

    if(!setcookie(
      static::$name, 
      session_id(), 
      cookie::lifetime(static::$cookie['lifetime']), 
      static::$cookie['path'], 
      static::$cookie['domain'], 
      static::$cookie['secure'], 
      static::$cookie['httponly']
    )) {
      return false;
    }

    // mark it as started
    static::$started = true;      

    // check if the session is still valid
    if(!static::check()) {
      return static::destroy();
    }
      
    return true;

  }

  /**
   * Checks if the session is still valid
   * and not expired
   * 
   * @return boolean
   */
  public static function check() {

    // check for the last activity and compare it with the session timeout
    if(isset($_SESSION['kirby_session_activity']) && time() - $_SESSION['kirby_session_activity'] > static::$timeout * 60) {
      return false;      
    }

    // check for an existing fingerprint and compare it
    if(isset($_SESSION['kirby_session_fingerprint']) and $_SESSION['kirby_session_fingerprint'] !== static::fingerprint()) {
      return false;
    } 
    
    // store a new fingerprint and the last activity
    $_SESSION['kirby_session_fingerprint'] = static::fingerprint();      
    $_SESSION['kirby_session_activity']    = time();

    return true;

  }

  /**
   * Generates a fingerprint from the user agent string
   * 
   * @return string
   */
  public static function fingerprint() {
    if(!r::cli()) {
      return sha1(Visitor::ua() . (ip2long($_SERVER['REMOTE_ADDR']) & ip2long('255.255.0.0')));      
    } else {
      return '';
    }
  }
=======
  static protected $started = false;
>>>>>>> parent of 8fd0d20... Merge pull request #1 from robinandersen/Development

  /**
   * Returns the current session id
   * 
   * @return string
   */  
  static public function id() {
    return session_id();
  }

  /** 
   * Sets a session value by key
   *
   * <code>
   * 
   * s::set('username', 'bastian');
   * // saves the username in the session
   *     
   * s::set(array(
   *     'key1' => 'val1',
   *     'key2' => 'val2',
   *     'key3' => 'val3'
   * ));
   * // setting multiple variables at once
   * 
   * </code>   
   * 
   * @param  mixed   $key The key to define
   * @param  mixed   $value The value for the passed key
   */    
  static public function set($key, $value = false) {
    if(!isset($_SESSION)) return false;
    if(is_array($key)) {
      $_SESSION = array_merge($_SESSION, $key);
    } else {
      $_SESSION[$key] = $value;
    }
  }

  /**
   * Gets a session value by key
   * 
   * <code>
   * 
   * s::get('username', 'bastian');
   * // saves the username in the session
   * 
   * echo s::get('username');
   * // output: 'bastian'
   * 
   * </code>   
   *
   * @param  mixed    $key The key to look for. Pass false or null to return the entire session array. 
   * @param  mixed    $default Optional default value, which should be returned if no element has been found
   * @return mixed
   */  
  static public function get($key = false, $default = null) {
    if(!isset($_SESSION)) return false;
    if(empty($key)) return $_SESSION;
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  /**
   * Removes a value from the session by key
   * 
   * <code>
   * 
   * $_SESSION = array(
   *     'username' => 'bastian',
   *     'id' => 1,
   * );
   * 
   * s::remove('username');
   * // $_SESSION = array(
   * //    'id' => 1
   * // )
   * 
   * </code>      
   *
   * @param  mixed    $key The key to remove by
   * @return array    The session array without the value
   */  
  static public function remove($key) {
    unset($_SESSION[$key]);
    return $_SESSION;
  }

  /**
   * Starts a new session
   *
   * <code>
   * 
   * s::start();
   * // do whatever you want with the session now
   * 
   * </code>
   * 
   */  
  static public function start() {
    if(static::$started) return true;
    session_start();
    static::$started = true;
  }

  /**
   * Destroys a session
   * 
   * <code>
   * 
   * s::start();
   * // do whatever you want with the session now
   * 
   * s::destroy();
   * // everything stored in the session will be deleted
   * 
   * </code>
   *
   */  
  static public function destroy() {
    if(static::$started){
      session_destroy();
      unset($_SESSION);
      static::$started = false;
    }
  }

  /**
   * Alternative for s::destroy()
   */
  static public function stop() {
    s::destroy();
  }

  /**
   * Destroys a session first and then starts it again
   */  
  static public function restart() {
    static::destroy();
    static::start();
  }

}
