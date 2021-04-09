<?php
namespace Block\Admin\Order;
class Grid extends \Block\Core\Template
{
    protected $order=null;
    function __construct()
    {
        $this->setTemplate('./View/Admin/Order/Grid.php');
    }
    public function setOrder(\Model\Order $order)
    {
        $this->order = $order;
        return $this;
    }

    public function getOrder()
    {
        try {
            if(!$this->order)
            {
                $this->getMessage()->setFailure('order IS EMPTY');
            }
            return $this->order;
        }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
       }
    }
}
