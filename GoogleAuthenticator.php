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
 
