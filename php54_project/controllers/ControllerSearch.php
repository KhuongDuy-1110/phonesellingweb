<?php
    include "models/ModelSearch.php";
    class ControllerSearch extends Controller{
        use ModelSearch;
        public function ajaxSearch(){
            $data = $this->modelAjaxSearch();
            $strResult = "";
            foreach ($data as $item){
                $strResult = $strResult."<li><img src='assets/upload/products/{$item->photo}'><a href='index.php?controller=products&action=detail&id={$item->id}'>{$item->name}</a> </li>";
            }
            echo $strResult;
        }
        public function index(){
            $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"]: 0;
            $toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"]: 0;
            // quy dinh so ban ghi tren mot trang
            $recordPerPage = 40;
            // tinh so trang
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            // lay du lieu tu model
            $data = $this->modelRead($recordPerPage);
            // goi view, truyen du lieu ra view
            $this->loadView("ViewSearch.php",array("data"=>$data,"numPage"=>$numPage,"fromPrice"=>$fromPrice,"toPrice"=>$toPrice));
        }
    }
?>