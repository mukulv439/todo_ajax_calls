<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResearchStatic;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReseachStaticController extends Controller
{
    public function index()
    {
        $results  = ResearchStatic::all();
        return view('Master.Research.view',compact('results'));

    }
    public function create()
    {
        return view('Master.Research.create');

    }
    public function store(Request $request)
    {

        $insert_questionoption =  ResearchStatic::create([
            'res_article_heading' =>   $request->res_article_heading,
            'res_article_desc'     =>   $request->res_article_desc,
            'res_article_subheading_1'      =>   $request->res_article_subheading_1,
            'res_article_subdesc_1'      =>   $request->res_article_subdesc_1,
            'res_article_subheading_2'      =>   $request->res_article_subheading_2,
            'res_article_subdesc_2'      =>   $request->res_article_subdesc_2,
            'res_article_subheading_3'      =>   $request->res_article_subheading_3,
            'res_article_subdesc_3'      =>   $request->res_article_subdesc_3,
            'created_by'=> Auth::user()->id,

        ]);

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
        $data=ResearchStatic::where('id','=',$id)->get()->first();
        return view('Master.Research.edit',compact('data'));


    }

    public function update(Request $request)
    {


                $status=ResearchStatic::where('id',$request->id)->update([
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
