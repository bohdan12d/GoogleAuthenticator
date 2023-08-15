class PHPGangsta_GoogleAuthenticator
{
    protected $_codeLength = 6;
   /**
     * Create new secret.
     * 16 characters, randomly chosen from the allowed base32 characters.
     *
     * @param int $secretLength
    *
     * @return string
     */
    public function createSecret($secretLength = 16)
 {
        $validChars = $this->_getBase32LookupTable();

        // Valid secret lengths are 80 to 640 bits
        if ($secretLength < 16 || $secretLength > 128) {
 throw new Exception('Bad secret length');
        }
 $secret = '';
        $rnd = false;
  if (function_exists('random_bytes')) {
            $rnd = random_bytes($secretLength);
 throw new Exception('Bad secret length');
        }
  $secret = '';
 $rnd = false;
    if (function_exists('random_bytes')) {
            $rnd = random_bytes($secretLength);
} elseif (function_exists('mcrypt_create_iv')) {
  $rnd = mcrypt_create_iv($secretLength, MCRYPT_DEV_URANDOM);
 } elseif (function_exists('openssl_random_pseudo_bytes')) {
  $rnd = openssl_random_pseudo_bytes($secretLength, $cryptoStrong);
  if (!$cryptoStrong) {
                $rnd = false;
 if (function_exists('random_bytes')) {
   $rnd = random_bytes($secretLength);
        } elseif (function_exists('mcrypt_create_iv')) {
            $rnd = mcrypt_create_iv($secretLength, MCRYPT_DEV_URANDOM);
  } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $rnd = openssl_random_pseudo_bytes($secretLength, $cryptoStrong);
 if (!$cryptoStrong) {
                $rnd = false;
  }
        }
 if ($rnd !== false) {
            for ($i = 0; $i < $secretLength; ++$i) {
 $secret .= $validChars[ord($rnd[$i]) & 31];
            }
 } else {
    throw new Exception('No source of secure random');
        }

        return $secret;
    }
  /**
     * Calculate the code, with given secret and point in time.
     *
     * @param string   $secret
     * @param int|null $timeSlice
 *
     * @return string
     */
   public function createSecret($secretLength = 16)
    {
     $validChars = $this->_getBase32LookupTable();

        // Valid secret lengths are 80 to 640 bits
