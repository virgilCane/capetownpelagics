<?php
class report{
    //class properties
    private $id;
    private $date;  
    

    //constructor
    public function __construct(){
        /* Initialize the $id and $name variables to NULL */
		$this->id = NULL;
		$this->name = NULL;
    }

    // Destructor
	public function __destruct(){
		
    } 
    //public methods
    public  function addReport(string $name, string $date, string $description){
        $year = explode('-',$date);
        //Global PDO Object
        global $pdo;
        
        /* Check if an image having the same name already exists. If it does, throw an exception */
       if ($this->fileExists($name))
       {
           throw new Exception('Report already exists');
       }
       
       // Add the new Report
      
       /* Insert query template */
       $query = 'INSERT INTO pelagicsSchema.reports (Year,Name,Date,Description) VALUES (:year,:name,:date,:description)';
       /* Values array for PDO */
       $values = array(':year'=>$year[0],':name'=>$name, ':date'=>$date, ':description'=>$description,);
       /* Execute the query */
       try
       {
           $res = $pdo->prepare($query);
           $res->execute($values);
       }
       catch (PDOException $e)
       {
           die($e->getMessage());
          /* If there is a PDO exception, throw a standard exception */
          throw new Exception($e);
       }
       
       /* Return the new ID */
       return $pdo->lastInsertId();
    }
    
    /* Delete an account (selected by its ID) */
public function deleteReport(int $id)
{
	/* Global $pdo object */
	global $pdo;
	
	/* Check if the ID is valid */
	if (!$this->isIdValid($id))
	{
		throw new Exception('Invalid account ID');
	}
	
	/* Query template */
	$query = 'DELETE FROM pelagicsSchema.reports WHERE id = :id';
	
	/* Values array for PDO */
	$values = array(':id' => $id);
	
	/* Execute the query */
	try
	{
		$res = $pdo->prepare($query);
		$res->execute($values);
	}
	catch (PDOException $e)
	{
	   /* If there is a PDO exception, throw a standard exception */
	   throw new Exception($e);
	}

	
}
    
    
    /* Returns the  $name as name, or NULL if it's not found */
    public function fileExists(string $name): ?bool
    {
       /* Global $pdo object */
       global $pdo;
       
       
       /* Initialize the return value. If no account is found, return NULL */
       $id = NULL;
       
       /* Search the all with the name on the database */
       $query = 'SELECT * FROM pelagicsSchema.reports WHERE (Name = :name)';
       $values = array(':name' => $name);
       
       try
       {
           $res = $pdo->prepare($query);
           $res->execute($values);
       }
       catch (PDOException $e)
       {
          /* If there is a PDO exception, throw a standard exception */
          throw new Exception($e);
       }
       
       $row = $res->fetch(PDO::FETCH_ASSOC);
       
       /* There is a result: get it's name */
      if($row){
          return true;
      }else{
          return false;
      }
       
       
    } 

     /* Returns the  id having $name as name, or NULL if it's not found */
    //  public function getNameFromId(int $id): ?string
    //  {
    //     /* Global $pdo object */
    //     global $pdo;
        
        
    //     /* Initialize the return value. If no name is found, return NULL */
    //     $name = NULL;
        
    //     /* Search the name on the database */
    //     $query = 'SELECT name FROM pelagicsSchema.reports WHERE (id = :id)';
    //     $values = array(':id' => $id);
        
    //     try
    //     {
    //         $res = $pdo->prepare($query);
    //         $res->execute($values);
    //     }
    //     catch (PDOException $e)
    //     {
    //        /* If there is a PDO exception, throw a standard exception */
    //        throw new Exception($e);
    //     }
        
    //     $row = $res->fetch(PDO::FETCH_ASSOC);
        
    //     /* There is a result: get it's name */
    //     if (is_array($row))
    //     {
    //         $name = strval($row['name']);
    //     }
        
    //     return $name;
    //  } 

    /* Returns the  id having $date as date, or NULL if it's not found */
    public function getIdFromDate(string $date): ?int
    {
       /* Global $pdo object */
       global $pdo;
       
       
       /* Initialize the return value. If no account is found, return NULL */
       $id = NULL;
       
       /* Search the ID on the database */
       $query = 'SELECT Id FROM pelagicsSchema.reports WHERE (Date = :date)';
       $values = array(':date' => $date);
       
       try
       {
           $res = $pdo->prepare($query);
           $res->execute($values);
       }
       catch (PDOException $e)
       {
          /* If there is a PDO exception, throw a standard exception */
          throw new Exception('Database query error');
       }
       
       $row = $res->fetch(PDO::FETCH_ASSOC);
       
       /* There is a result: get it's ID */
       if (is_array($row))
       {
           $id = intval($row['Id'], 10);
       }
       
       return $id;
    } 

    /* A sanitization check for the account ID */
public function isIdValid(int $id): bool
{
	/* Initialize the return variable */
	$valid = TRUE;
	
	/* Example check: the ID must be between 1 and 1000000 */
	
	if (($id < 1) || ($id > 1000000))
	{
		$valid = FALSE;
	}
	
	/* You can add more checks here */
	
	return $valid;
}
//for reports.php
public function IterateRange($file){

   

    //Global PDO Object
    global $pdo;
             //insert query template
            $query = 'SELECT * FROM pelagicsSchema.reports where (name = :name)';
            $values = array(':name'=>$file);
            try{
                $res = $pdo->prepare($query);
                $res->execute($values);
            }
            catch(PDOEXCEption $e)
            {
                throw new Exception('This is the exception');
            }
            $row = $res->fetch(PDO::FETCH_ASSOC);
            
            $date = $row['date'];
            $name = $row['name'];
            $description = $row['description'];
            $id = $row['id'];
             //variable variable. named after the id of each record in $row array
            $$id = ['name'=>$name,'date'=>$date,'description'=>$description,'id'=>$id];
            
            return $$id;
            }//EO IterateRange
      
public function OrderReports(){
    //instantiate PDO object
    global $pdo;
    //SQL Query String
    $query = 'SELECT * FROM pelagicsSchema.reports ORDER BY Year DESC';
    $currentYear = NULL;
    try{
        $res = $pdo->prepare($query);
        $res->execute();
    }
    catch (PDOException $e)
    {
        throw new Exception($e);
    }
   
        $years = [];
        while($row = $res->fetch(PDO::FETCH_NAMED)){
          array_push($years,$row);
          
          }
          return $years;
            
        
}



}



    
    

   
    
   


    
    

        