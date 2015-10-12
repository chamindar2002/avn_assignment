<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends AuthUser
{
	
        private $logged_in_user_info;

	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			
                                            
			# password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
            
                return array(
			'rememberMe'=>'Remember me next time',
		);
            
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
            
           
                 $er_msg = 'Incorrect username or password';
            
		if(!$this->hasErrors())
		{
                    
                    $user = AuthUser::model()->findByAttributes(
                            array('username'=>$this->username,'password'=>$this->hashPasswrd($this->password)));
                    
                    
                    
                    if(!$user){
                        $this->addError('username', $er_msg);
                    }else{
                        $this->logged_in_user_info = array(
                            'username' => $this->username,
                            'is_logged_in' => true,
                            'user_name' => $user->first_name.' '.$user->last_name,
                        );
                        
                        Yii::app()->session['ssn_user_info'] = $this->getUserInfo();
                        
                       
                         $user_cookie = new CHttpCookie('cookie_user_info', $this->getUserInfo());
                         $user_cookie->expire = time()+60*60; 
                         Yii::app()->request->cookies['cookie_user_info'] = $user_cookie;
                         
                        
                         
                        
                    }
                    
                    
                    
                    
			
		}
	}
        
        private static function hashPasswrd($password){
            return md5($password);
        }
        
        public function getUserInfo(){
            return json_encode($this->logged_in_user_info);
        }

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
        
}
