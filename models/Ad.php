<?php

require_once 'BaseModel.php';

class Ad extends Model {

    protected static $table = 'ads';

    public static function find($id)
    {
        $id = (int) $id;

        if(isset($id) && is_int($id)) {

            self::dbConnect();

            $query = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
            $stmt = self::$dbc->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $instance = null;
            if ($result) {
                $instance = new static;
                $instance->attributes = $result;
            }
            return $instance;
        }
    }

    public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->query('SELECT * FROM ' . static::$table);
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
        if (isset($this->attributes['id'])) {
            $this->update($this->attributes['id']);
        } else {
            $this->insert();
        }
    }

    protected function insert()
    {
        self::dbConnect();
        $query = 'INSERT INTO ads
                    (title, description, image_url, price, created_at)
                    VALUES (:title, :description, :image_url, :price, :created_at);';

        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':title', $this->attributes['title'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
        $stmt->bindValue(':image_url', $this->attributes['image_url'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $this->attributes['created_at'], PDO::PARAM_STR);
        $stmt->execute();
    }

    protected function update($id)
    {
        self::dbConnect();
        $query = 'UPDATE ' . static::$table . '
                    SET name = :name,
                        title = :title,
                        description = :description,
                        image_url= :image_url,
                        price = :price
                        WHERE id = :id';

        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':title', $this->attributes['title'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
        $stmt->bindValue(':image_url', $this->attributes['image_url'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
