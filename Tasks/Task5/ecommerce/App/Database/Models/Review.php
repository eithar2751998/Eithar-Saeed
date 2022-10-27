<?php
namespace App\Database\Models;

use App\Database\Models\Model;

class Review extends Model{
    private $product_id, $user_id, $comment, $rate, $status;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function create(){
        $query = "INSERT INTO reviews (product_id,user_id,comment,rate) 
        VALUES (? , ? , ? , ? )";

        $stmt = $this->conn->prepare($query);
        if(! $stmt){
            return $stmt; // false
        }
        $stmt->bind_param('iisi',$this->product_id,$this->user_id, $this->comment, $this->rate);
        return $stmt->execute();
    }
}