<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Header extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'keywords', 'image_path', 'status',
    ];


    // Page Title
    static public function header($slug)
    {
   
// $header =   DB::select(DB::raw("SELECT a.`id`, a.`title` , b.id as sub_id, b.title as sub_title ,c.id as sub_c_id, c.title as sub_c_title FROM `headers` a LEFT JOIN `headers` b on a.id = b.parent_header_id LEFT JOIN `headers` c on b.id = c.parent_header_id WHERE  a.`status` = 1
//     "));
    // Db::table('headers as a')->join('headers as b',)
    //     $dt = [];
    //     $subMenuArr = [];
    //     foreach ($header as $key => $obj) {
    //         if (!in_array($obj->id, $subMenuArr)) {
    //             if ($obj->sub_c_id != "") {
    //                 $subMenuArr[] = $obj->sub_id;
    //                 $subMenuArr[] = $obj->sub_c_id;
    //                 $dt[$obj->title][$obj->sub_title][] = $obj->sub_c_title;
    //             } else if ($obj->sub_id != "") {
    //                 $subMenuArr[] = $obj->sub_id;
    //                 $dt[$obj->title][] = $obj->sub_title;
    //             } else {
    //                 $subMenuArr[] = $obj->id;
    //                 $dt[] = $obj->title;
    //             }
    //         }
    //     }
    //     $menu = '';

        // foreach ($dt as $k_1 => $menu_1) {
        //     if (is_array($menu_1)) {
        //         $menu .= '<li><a>'.$k_1.'</a>
        //                         <ul class="'.str_replace(' ', '_', strtolower($k_1)).'">';
        //         foreach ($menu_1 as $k_2 => $menu_2) {
        //             if (is_array($menu_2) && !is_int($k_2)) {
        //                 $menu .= '<li><a href="">'.$k_2.'</a>
        //                                     <ul class="'.str_replace(' ', '_', strtolower($k_2)).'">';
        //                                         foreach ($menu_2 as $k_3 => $menu_3) {
        //                                             $menu .= '<li><a href="">'.$menu_3.'</a></li>';
        //                                         }
        //                         $menu .= '</ul>
        //                                 </li>';
        //             } else {
        //                 if(is_array($menu_2)) {
        //                     foreach($menu_2 as $k_3 => $menu_3) {
        //                         $menu .= '<li><a href="">'.$menu_3.'</a></li>';         
        //                     }
        //                 } else {
        //                     $menu .= '<li><a href="">'.$menu_2.'</a></li>'; 
        //                 }
        //             }
        //         }
        //         $menu .= '</ul>
        //                     </li>';
        //     } else {
        //         $menu .= '<li class="nav-item {{ Request::path() == "/" ? "active" : "" }}">
        //             <a class="nav-link"
        //                 href="">' .  $menu_1 . '</a>
        //         </li>';
        //     }
        // }
        // echo "<pre>";
        // print_r($dt);
        // exit;
        $header = Header::where('slug', $slug)
            ->where('status', 1)
            ->first();
        
        return $header;
    }
}
