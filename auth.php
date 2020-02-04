<?php

    require('./header.php');

    $account = new Account();
  

    //Add account
    if(!empty($_POST['register'])){
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['registered'] = FALSE;
        
        
        try
    {
        $newId = $account->addAccount($userName, $password);
    }
    catch (Exception $e)
    {
       
        $_SESSION['registered'] = FALSE;
        $_SESSION['reg-message'] =  $e->getMessage();
        header('Location: register.php',true, 301	);
        // echo $e->getMessage();
        die();
    }

    $_SESSION['registered'] = TRUE;
    $_SESSION['reg-message'] = 'New Account Registered.';
    header('Location: logdoc.php',true, 301	);
    
    // echo 'The new account ID is ' . $newId;
    }
    // Login
   
if(!empty($_POST['login'])){
    $login = FALSE;
    $_SESSION['displayError'] = 'NO';
	$userName = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['UN']= $_POST['username'];
    $_SESSION['PD']= $_POST['password'];
try
{
    $login = $account->login($userName, $password);
    
}
catch (Exception $e)
{
    echo $e->getMessage();
	die();
}

if ($login)
{
    $_SESSION['authenticated']= $account->isAuthenticated();
	$_SESSION['displayError'] = 'NO';
    header('Location: adPanel.php',true, 301	);
}
else
{
    $_SESSION['displayError'] = 'YES';
    $_SESSION['authenticated']= $account->isAuthenticated();
    header('Location: logdoc.php',true, 301	);
}

    
}
//logout
if(isset($_POST['logout'])){
    $_SESSION['authenticated']= $account->isAuthenticated();  
  
 
try
{
	$login = $account->login($_SESSION['UN'], $_SESSION['PD']);
	
	if ($login)
	{
        
		header('Location: logdoc.php',true, 301	);
	}
	else
	{
		echo 'Error logging out. Contact site administrator.<br>';
	}


    $account->logout();
  


}

catch (Exception $e)
{
	echo $e->getMessage();
	die();
}
}

// echo 'Logout successful.';
?>