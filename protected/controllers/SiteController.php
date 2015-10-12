<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    
        //public $layout='//layouts/column2';
        public $layout = 'application.views.layouts.admin_layout';
    
	
        
       public function beforeAction($action) {
           #this action will be called before every action
           #i have used basic authentication here. but can use advanced yii authentication with access rules
           if(Yii::app()->controller->action->id != 'login'){
               if(AuthUser::is_authenticated()){
                   #redirect to login if not a valid user;
                   Yii::app()->user->setFlash('error', "You are not authorised. Please login!");
                   $this->redirect(array('site/login'));
               }
               
           }
           return parent::beforeAction($action);
       }

       /**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                #fetch user login data
		$data = json_decode(Yii::app()->session['ssn_user_info']);
                
                #render landing page
		$this->render('index',['data'=>$data]);
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
            $this->layout='//layouts/column2';
            
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
        
        public function actionErrorFE()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	
	# Displays the login page
	
	public function actionLogin()
	{
            
            #set login theme and layout template 
            $this->layout = 'application.views.layouts.login_layout';
            
                $model=new LoginForm();
                              
                #session variable to identify if he user is logged in
                Yii::app()->session['isLoggedIn'] = false;
            
		

		# collect user input data
		if(isset($_POST['LoginForm']))
		{
                        #set attributes of LoginFrom class
			$model->attributes=$_POST['LoginForm'];
                        
			# validate user input, Authenticate and redirect to landing page
                        
                        //var_dump($model->validate());
			if($model->validate()){
                            # user is valid and authenticated
                            
                            Yii::app()->user->setFlash('success', "You have successfully logged in");
//                            var_dump($model->getUserinfo());
//                            
//                            echo '<hr>';
//                            
//                            echo Yii::app()->session['ssn_user_info'];
//                            echo '<hr>';
//                            var_dump(Yii::app()->request->cookies['cookie_user_info']->value);
                            
                            $this->redirect(array('site/index'));
                          
                        }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
                Yii::app()->session->clear();
                Yii::app()->session->destroy();
		Yii::app()->user->logout();
		
                $this->redirect(yii::app()->baseUrl.'/index.php/site/login');
	}
        
        
        
        
        

}