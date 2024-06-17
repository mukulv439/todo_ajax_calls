<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HomePageController extends Controller
{
    public function index()
    {
        $results  = HomePage::all();
        return view('Master.Home.view',compact('results'));

    }
    public function create()
    {
        return view('Master.Home.create');

    }
    public function store(Request $request)
    {

        $data=new HomePage();
        if ($request->action_image &&  $image = $request->action_image_2) {
            $image = $request->action_image;
            $name = Str::random(8).'.'.'jpeg';
            $destinationPath = public_path('/images/Webimages');
            $image->move($destinationPath, $name);
            $data->banner_1=$name;


            $image = $request->action_image_2;
            $name = Str::random(8).'.'.'jpeg';
            $destinationPath = public_path('/images/Webimages');
            $image->move($destinationPath, $name);
            $data->banner_2=$name;
              }
        $insert_questionoption =  HomePage::create([
            'banner_text' =>   $request->banner_text,
            'action_image'       =>     $data->banner_1,
            'action_image_2'       =>     $data->banner_2,
            'res_article' =>    $request->res_article,
            'res_article_desc'     =>   $request->res_article_desc,
            'pol_brief'      =>   $request->pol_brief,
            'pol_brief_desc'      =>   $request->pol_brief_desc,
            'easy_reads'      =>   $request->easy_reads,
            'vid_gall'      =>   $request->vid_gall,
            'vid_gall_desc'      =>   $request->vid_gall_desc,
            'action_reserch_head'      =>   $request->action_reserch_head,
            'action_reserch_text'      =>   $request->action_reserch_text,
            'action_desc_head'      =>   $request->action_desc_head,
            'action_desc_para'      =>   $request->action_desc_para,
            'action_desc_link'      =>   $request->action_desc_link,
            'created_by'=> Auth::user()->id,

        ]);

    if($insert_questionoption != null)
    {
         Alert::toast('Data Inserted', 'success')->autoClose(2000);
    }
     else{
        Alert::error('Something went wrong', 'Error Message');
     }
     return redirect('/cms')->with('post-add',"");
    }

    public function edit($id)
    {
        $data=HomePage::where('id','=',$id)->get()->first();
        return view('Master.Home.edit',compact('data'));


    }

    public function update(Request $request)
    {



        $data=new HomePage();
        $i = HomePage::findOrFail($request->id);
        $currentPhoto_1 = $i->action_image;
        $currentPhoto_2 = $i->action_image_2;
        if ($request->hasFile('new_action_image'))
         {
            if(\File::exists(public_path('/images/Webimages/').$currentPhoto_1)){
                \File::delete(public_path('/images/Webimages/').$currentPhoto_1);
                }

          $image_1 = $request->file('new_action_image');
          $org = Str::random(8).'.'.'jpeg';
          $destinationPath = public_path('images/Webimages');
          $image_1->move($destinationPath, $org);
          $data->banner_1=$org;
            }
            else{
                $data->banner_1=$request->old_action_image;
            }

            if ($request->hasFile('new_action_image_2'))
            {
               if(\File::exists(public_path('/images/Webimages/').$currentPhoto_2)){
                   \File::delete(public_path('/images/Webimages/').$currentPhoto_2);
                   }

             $image_1 = $request->file('new_action_image_2');
             $org = Str::random(8).'.'.'jpeg';
             $destinationPath = public_path('images/Webimages');
             $image_1->move($destinationPath, $org);
             $data->banner_2=$org;
               }
               else{
                   $data->banner_2=$request->old_action_image_2;
               }


                $status=HomePage::where('id',$request->id)->update([
                    'banner_text' =>   $request->banner_text,
                    'action_image'       =>     $data->banner_1,
                    'action_image_2'       =>     $data->banner_2,
                    'res_article' =>    $request->res_article,
                    'res_article_desc'     =>   $request->res_article_desc,
                    'pol_brief'      =>   $request->pol_brief,
                    'pol_brief_desc'      =>   $request->pol_brief_desc,
                    'easy_reads'      =>   $request->easy_reads,
                    'vid_gall'      =>   $request->vid_gall,
                    'vid_gall_desc'      =>   $request->vid_gall_desc,
                    'action_reserch_head'      =>   $request->action_reserch_head,
                    'action_reserch_text'      =>   $request->action_reserch_text,
                    'action_desc_head'      =>   $request->action_desc_head,
                    'action_desc_para'      =>   $request->action_desc_para,
                    'action_desc_link'      =>   $request->action_desc_link,
                    'updated_by'=> Auth::user()->id,

                 ]);




        if($status != null)
        {
             Alert::toast('Data Updated', 'success')->autoClose(2000);
        }
         else{
            Alert::error('Something went wrong', 'Error Message')->autoClose(2000);
         }
         return redirect('/cms')->with('post-add',"");




    }
}
