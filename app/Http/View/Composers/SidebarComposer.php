<?php
namespace App\Http\View\Composers;

use App\Models\Detail;
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
            $details = Detail::select("details.*")
                            ->join('user_details','details.id','=','user_details.detail_id')
                            ->join('users','user_details.user_id','=','users.id')
                            ->where('details.enabled',1)
                            ->where('users.id','=',Auth::user()->id)->get();
        }else{
            $details = [];
        }
        // $list_temps = [];

        $detail0s = Detail::select("details.*")
                            ->where('details.enabled',0)
                            ->get();
        $view->with([
            'details'=> $details,
            'detail0s'=> $detail0s,
        ]);
    }
}

?>
