<?php
namespace controller;
/**
 * Description of PricingController
 *
 * @author lganne
 */
class PricingController extends DefaultController
{
    protected $rub;
    protected $product;
    protected $view;
    
     public function __construct()
     {
       $this->rub=new \modele\RubriqueManager();
       $this->product=new \modele\ProduitManager();
          parent::__construct($this->rub);
          $this->view= new \view\PricingVue();
     }
    
    public function liste($id)
    {
        $dataRub=$this->rub->all();
        $data=$this->product->findby($id);
      
        $this->view->liste($dataRub,$data);

    }
    public function detail($id)
    {
        $result=$this->product->find($id);
       
       $this->view->detail($result);
        
    }
}
