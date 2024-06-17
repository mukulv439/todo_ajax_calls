<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResourceDynamic;
use Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ResourceDynamicController extends Controller
{
    public function index()
    {
        $results  = ResourceDynamic::all();
        return view('Master.ResearchDynamic.view',compact('results'));

    }
    public function create()
    {
        return view('Master.ResearchDynamic.create');

    }
    public function store(Request $request)
    {

        $data=new ResourceDynamic();

        if ($request->action_image ) {
            $image = $request->action_image;
            $name = Str::random(8).'.'.'jpeg';
            $destinationPath = public_path('/images/Webimages');
            $image->move($destinationPath, $name);
            $data->banner_1=$name;
              }
            foreach ($request->tags as $value) {
                $insert_questionoption =  ResourceDynamic::create([
                    'res_article_tittle' =>   $request->res_article_tittle,
                    'res_article_heading'     =>   $request->res_article_heading,
                    'res_article_para'      =>   $request->newcontent,
                    'extra_1'      =>  $data->banner_1,
                    'res_article_related'      =>  $value,
                    'created_by'=> Auth::user()->id,

                ]);
            }


    if($insert_questionoption != null)
    {
         Alert::toast('Data Inserted', 'success')->autoClose(2000);
    }
     else{
        Alert::error('Something went wrong', 'Error Message');
     }
     return redirect('/cms/res_static')->with('post-add',"");
    }

    public function edit($id)
    {
        $data=ResourceDynamic::where('id','=',$id)->get()->first();
        return view('Master.ResearchDynamic.edit',compact('data'));


    }

    public function update(Request $request)
    {


                $status=ResourceDynamic::where('id',$request->id)->update([
                    'res_article_heading' =>   $request->res_article_heading,
                    'res_article_desc'     =>   $request->res_article_desc,
                    'res_article_subheading_1'      =>   $request->res_article_subheading_1,
                    'res_article_subdesc_1'      =>   $request->res_article_subdesc_1,
                    'res_article_subheading_2'      =>   $request->res_article_subheading_2,
                    'res_article_subdesc_2'      =>   $request->res_article_subdesc_2,
                    'res_article_subheading_3'      =>   $request->res_article_subheading_3,
                    'res_article_subdesc_3'      =>   $request->res_article_subdesc_3,
                    'updated_by'=> Auth::user()->id,

                 ]);




        if($status != null)
        {
             Alert::toast('Data Updated', 'success')->autoClose(2000);
        }
         else{
            Alert::error('Something went wrong', 'Error Message')->autoClose(2000);
         }
         return redirect('/cms/res_static')->with('post-add',"");




    }
}
