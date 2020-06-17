<?php

namespace App\Http\Controllers;

//use App\Models\Truck\TruckEntryReg;
use Illuminate\Http\Request;
use App\Data;
use Log;
use Response;
use DB;


class MainController extends Controller
{
    public function __construct(Data $data) {
        $this->data = $data;
    }

    public function storeItem(Request $req){
      //  \Log::info("hell ");
     //   \Log::info($req);
      //  return;
        //----way-1
        $data = new Data();
        $data->name = $req->name;
        $data->age = $req->age;
        $data->profession = $req->profession;
        $data->save();
        return $data;

//way-2
//        if(isset($this->data->ownFields)){
//            foreach ($this->data->ownFields as $ownField){
//                if(isset($req->{$ownField})){
//                    $this->data->{$ownField} = $req->{$ownField};
//                }
//            }
//        }
//        if(!empty($this->data)){
//            $save_data = $this->data->save();
//            return $save_data;
//        }else{
//            //return "error";
////            return Response::json(['error' => 'Truck Info Not Found'], 203);
//     }

//        $saveData = DB::table('vuecruddata')
//            ->insert([
//                'vuecruddata.name' => $req->name,
//                'vuecruddata.age' => $req->age,
//                'vuecruddata.profession' => $req->profession
//            ]);
//        if ($saveData == true) {
//            return "Inserted";
//        }

    }

    public function getItems(Request $req){
        \Log::info("in view");
        $data = Data::all();
       // $data = DB::table('vuecruddata')->paginate(15);
        \Log::info($data);
        return $data;

    }

    public function deleteItem(Request $req){
        $data = Data::find($req->id)->delete();
    }

    public function editItem(Request $req, $id){
        \Log::info("hello edit");
        \Log::info($req);
        $data = Data::where('id',$id)->first();
        $data->name = $req->get('val1');
        $data->age = $req->get('val2');
        $data->professtion = $req->get('val3');
        $data->save();
        return $data;

    }

}
