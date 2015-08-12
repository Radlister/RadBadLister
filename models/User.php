<?php

require_once 'BaseModel.php';

class User extends Model {

    protected static $table = 'users';

    public static function find($id)
    {
        self::dbConnect();
        $query = 'SELECT * FROM users WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    // Get all rows from the users table.
    public static function all()
    {
        // Start by connecting to the DB.
        self::dbConnect();

        // Get all rows
        $stmt = self::$dbc->query('SELECT * from users');

        // Assign results to a variable
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    public function save()
    {
        // Ensure attributes array containts stuff before saving
        if(isset($this->attributes)) {
            if (isset($this->attributes['id'])) {
                $this->update();
            } else {
                $this->insert();
            }
        }
    }

    public function update()
    {
        $query = 'UPDATE users
                    SET first_name = :first_name,
                    last_name= :last_name
                    WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':first_name', $this->attributes['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->attributes['last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function insert()
    {
        $query = 'INSERT INTO users
            (first_name, last_name, email, password)
            VALUES (:first_name, :last_name, :email, :password);';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':first_name', $this->attributes['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->attributes['last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete()
    {
        $query = 'DELETE * FROM users WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    }

}
