<?php
class calendar{
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
    public  function addDate( string $date, string $comment, string $spaces){
        $year = explode('-',$date);
        //Global PDO Object
        global $pdo;
       // Add the new Report
      
       /* Insert query template */
       $query = 'INSERT INTO pelagicsSchema.calendar (Date,Year,Comment,Spaces) VALUES (:date,:year,:comment,:spaces)';
       /* Values array for PDO */
       $values = array(':year'=>$year[0], ':date'=>$date, ':comment'=>$comment,':spaces'=>$spaces);
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
    
    /* Delete trip date(selected by its ID) */
public function deletecomment(int $id)
{
	/* Global $pdo object */
	global $pdo;
	
	/* Check if the ID is valid */
	if (!$this->isIdValid($id))
	{
		throw new Exception('Invalid account ID');
	}
	
	/* Query template */
	$query = 'DELETE FROM pelagicsSchema.calendar WHERE id = :id';
	
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
 /* Returns the  id having $date as date, or NULL if it's not found */
 public function getIdFromDate(string $date): ?int
 {
    /* Global $pdo object */
    global $pdo;
    
    
    /* Initialize the return value. If no account is found, return NULL */
    $id = NULL;
    
    /* Search the ID on the database */
    $query = 'SELECT Id FROM pelagicsSchema.calendar WHERE (Date = :date)';
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
    
 /* Edit an existing trip date */
 public function editDate(string $newDate, string $date, string $comment, string $spaces){
    $year = explode('-',$date);
    $newYear = explode('-',$newDate);
    //Global PDO Object
    global $pdo;
    $id = $this->getIdFromDate($date);
   
    //Insert query template
    $query = 'UPDATE pelagicsSchema.calendar SET date = :date, year = :year, comment = :comment, spaces = :spaces WHERE id = :id';
    $values = array(':date' =>$newDate,':year'=>$newYear[0],':comment'=>$comment,':spaces'=>$spaces,':id'=>$id);
    try{
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception($e);
        die();
    }
    
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

      
public function OrderDates(){
    //instantiate PDO object
    global $pdo;
    //SQL Query String
    $query = 'SELECT * FROM pelagicsSchema.calendar ORDER BY Year DESC';
    
    try{
        $res = $pdo->prepare($query);
        $res->execute();
    }
    catch (PDOException $e)
    {
        throw new Exception($e);
    }
   
        $dates = [];
        while($row = $res->fetch(PDO::FETCH_NAMED)){
          array_push($dates,$row);
          
          }
          return $dates;
            
        
}



}



    
    

   
    
   


    
    

        