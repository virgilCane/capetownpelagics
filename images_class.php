<?php
class Image
{
    // class properties
    private $id;
    private $name;
    //public methods

    // constructor
    public function __construct(){
        /* Initialize the $id and $name variables to NULL */
		$this->id = NULL;
		$this->name = NULL;
    }

    // Destructor
	public function __destruct(){
		
    } 

    // Add a new image data to db and return ID (ID column of pelagicsschema.images)
    public  function addImage(string $name, string $species, string $rarity, string $description){
    //Global PDO Object
    global $pdo;
    //trim strings to remove extra spaces
    $name = trim($name);
    $species = trim($species);
    $rarity = trim($rarity);
    $description = trim($description);

    /* Check if an image having the same name already exists. If it does, throw an exception */
   if (!is_null($this->getIdFromName($name)))
   {
       throw new Exception('Image already exists');
   }
   
   // Add the new Image

   /* Insert query template */
   $query = 'INSERT INTO pelagicsSchema.images (Name,Species,Rarity,Description) VALUES (:name,:species,:rarity,:description)';
   /* Values array for PDO */
   $values = array(':name'=>$name, ':species'=>$species, ':rarity'=>$rarity, ':description'=>$description);
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
      throw new Exception('Database query error');
   }
   
   /* Return the new ID */
   return $pdo->lastInsertId();
}




/* Returns the image id having $name as name, or NULL if it's not found */
public function getIdFromName(string $name): ?int
{
   /* Global $pdo object */
   global $pdo;
   
   
   /* Initialize the return value. If no account is found, return NULL */
   $id = NULL;
   
   /* Search the ID on the database */
   $query = 'SELECT Id FROM pelagicsSchema.images WHERE (Name = :name)';
   $values = array(':name' => $name);
   
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


}
