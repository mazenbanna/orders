<?php
namespace App\Http\Controllers;

use App\Models\Orders;

use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\Print_;

class DataController extends Controller
{
    public function GetOrdersDataBase()
    {
            $response['status']=false;
            $PageItems=Orders::with("customer","order_item")->select("*")->get();
            $response['status']=true;
            $response['data']=$PageItems;
            header('Content-Type: application/json');
            return json_encode($response);
    }
    public function GetOrdersJson()
    {
        //
       
        //Print_r($ClientId);die;
            $response['status']=false;
            $string = file_get_contents("../app/Json/customer.json");
            $customers =new Collection(json_decode($string, true));

            $string = file_get_contents("../app/Json/orders.json");
            $orders =new Collection(json_decode($string, true));

            $string = file_get_contents("../app/Json/items.json");
            $items = new Collection(json_decode($string, true));
            //$Datefrom = $DateFromTo.str_split('-')[0];
            //$Datefrom=str_split($DateFromTo,2);
            //Print_r($Datefrom);die;
            //$obj = $customer->where("id","a930b084-04ac-3ee1-bc32-877053c69481")->get();
            $OrderList=[];
           // $key=0;
            foreach ($items as $key => $value) {
                $key=0;
                $isFilter=0;
                $order = $orders->where("id",$value["orderId"])->values(); 
                $customer = $customers->where("id",$order[0]["customerId"])->values();
                
                $value["customer"]=$customer[0];
                $value["order"]=$order[0];
                if( isset($_GET["PriceFrom"]) && isset($_GET["PriceTo"]) && !empty($_GET["PriceFrom"]) && !empty($_GET["PriceTo"])) {
                  
                    $isFilter=1;
                    if($value["basePrice"]>=$_GET["PriceFrom"] && $value["basePrice"]<=$_GET["PriceTo"]){
                        $key=1;
                    }else{
                        $key=0;
                    }
                }
                if(isset($_GET["DateFrom"]) && isset($_GET["DateTo"]) && !empty($_GET["DateFrom"]) && !empty($_GET["DateTo"]) 
                && ($key==1 || $isFilter==0) ){// ($key==1 || $isFilter==1)){
                    $isFilter=1;
                    if( $value["order"]["createdAt"]>=$_GET["DateFrom"] && $value["order"]["createdAt"]<=$_GET["DateTo"]){
                        $key=1;
                    }else{
                        $key=0;
                    }
                }
                
                if($key==1 || $isFilter==0){
                    array_push($OrderList,$value);

                }

              
             
            }
            $response['data']=$OrderList;
            // $response['orders']=$orders;
            // $response['customer']=$customer;
            // $response['items']=$items;
            header('Content-Type: application/json');
            return json_encode($response);
    }
    public function GetOrdersJsonOld()
    {
            $response['status']=false;
            $string = file_get_contents("../app/Json/customer.json");
            $customers =new Collection(json_decode($string, true));

            $string = file_get_contents("../app/Json/orders.json");
            $orders =new Collection(json_decode($string, true));

            $string = file_get_contents("../app/Json/items.json");
            $items = new Collection(json_decode($string, true));

            //$obj = $customer->where("id","a930b084-04ac-3ee1-bc32-877053c69481")->get();
            $OrderList=[];
            foreach ($orders as $key => $value) {
                $customer = $customers->where("id",$value["customerId"])->values();
                $item = $items->where("orderId",$value["id"])->values(); 
                $value["customer"]=$customer[0];
                $value["items"]=$item;
                array_push($OrderList,$value);
             
            }
            $response['data']=$OrderList;
            // $response['orders']=$orders;
            // $response['customer']=$customer;
            // $response['items']=$items;
            header('Content-Type: application/json');
            return json_encode($response);
    }


}
