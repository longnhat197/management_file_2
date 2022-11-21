<?php
namespace App\Http\View\Composers;

use App\Models\DetailTemp;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
class SidebarComposer{
    protected $users;


    public function __construct()
    {

    }


    public function compose(View $view)
    {
        $isExit = UserDetail::select("*")
        ->where("user_id",Auth::user()->id)->exists();
        if($isExit){
            $detail_id = Auth::user()->userDetails[0]->detail_id;
            $list_temps = DetailTemp::where('detail_id',$detail_id)->get() ?? [];
        }else{
            $list_temps = [];
        }
        // $list_temps = [];


        $view->with([
            'list_temps'=> $list_temps,
            'isExitUser' => $isExit
        ]);
    }
}

?>
