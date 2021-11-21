<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    public function Index()
    {
        return view('Home.Index');
    }
    public function export()
    {
        $string = file_get_contents("../app/Json/customer.json");
        $customers =new Collection(json_decode($string, true));

        $string = file_get_contents("../app/Json/orders.json");
        $orders =new Collection(json_decode($string, true));

        $string = file_get_contents("../app/Json/items.json");
        $items = new Collection(json_decode($string, true));

        //$obj = $customer->where("id","a930b084-04ac-3ee1-bc32-877053c69481")->get();
        $OrderList=[];
        foreach ($items as $key => $value) {
            $order = $orders->where("id",$value["orderId"])->values(); 
            $customer = $customers->where("id",$order[0]["customerId"])->values();
            
            $value["customer"]=$customer[0];
            $value["order"]=$order[0];
            array_push($OrderList,$value);
            
        }
            
        return view('Home.export',compact('OrderList'));
    }

    // public function filter()
    // {
    //     $response['status']=false;
    //     $string = file_get_contents("../app/Json/customer.json");
    //     $customers =new Collection(json_decode($string, true));

    //     $string = file_get_contents("../app/Json/orders.json");
    //     $orders =new Collection(json_decode($string, true));

    //     $string = file_get_contents("../app/Json/items.json");
    //     $items = new Collection(json_decode($string, true));

    //     //$obj = $customer->where("id","a930b084-04ac-3ee1-bc32-877053c69481")->get();
    //     $OrderList=[];
    //     foreach ($items as $key => $value) {
    //         $order = $orders->where("id",$value["orderId"])->values(); 
    //         $customer = $customers->where("id",$order[0]["customerId"])->values();
            
    //         $value["customer"]=$customer[0];
    //         $value["order"]=$order[0];
    //         array_push($OrderList,$value);
         
    //     }
    //     $response['data']=$OrderList;
    //     // $response['orders']=$orders;
    //     // $response['customer']=$customer;
    //     // $response['items']=$items;
    //     header('Content-Type: application/json');
    //     return json_encode($response);
    // }

}
