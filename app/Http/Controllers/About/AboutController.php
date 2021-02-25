<?php


namespace App\Http\Controllers\About;


use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
        public function index()
        {
            return view('admin.add_about');
        }

//    public function saveAbout(Request $request)
//    {
//        $data = array();
//        $data['id'] = $request->get('id');
//        $data['title'] = $request->get('title');
//        $data['description'] = $request->get('description');
//        $data['publication_status'] = $request->get('publication_status');
//        $data['section_id'] = $request->get('section_id');
//
//        DB::table('content')->insert($data);
//        Session::put('message', 'Содржината е успешно додадена !');
//
//        return redirect::to('dashboard');
//    }

       public function saveAbout(Request $request)
       {
           $about = new About($request->all());

           $about->save();

           return redirect()->route('admin.dashboard');
       }

        public function allAbout()
        {
            $allContent = DB::table('content')
                ->get()
                ->where('section_id', 1);
            $menageContent = view('admin.all_about')
                ->with('allContentInfo', $allContent);

            return view('admin.admin_layout')
                ->with('admin.all_about', $menageContent);
        }

        public function unactiveAbout(int $id)
        {
            DB::table('content')
                ->where('id', $id)
                ->update(['publication_status'=>0]);
            Session::put('message','Содржината е успешно деактивирана!');

            return redirect::to('all-about');
        }

        public function activeAbout(int $id)
        {
            DB::table('content')
                ->where('id', $id)
                ->update(['publication_status'=>1]);
            Session::put('message','Содржината е успешно активирана !');

            return redirect::to('all-about');
        }

        public function deleteAbout(int $id)
        {
            DB::table('content')
                ->where('id',$id)
                ->delete();
            Session::get('message', 'Содржината е успешно избришана !');

            return redirect::to('all-about');
        }

        public function editAbout(int $id)
        {
            $aboutInfo=DB::table('content')
                ->where('id', $id)
                ->first();
            $aboutInfo=view('admin.edit_about')
                ->with('aboutInfo',$aboutInfo);
            return view('admin.admin_layout')
                ->with('admin.edit_about',$aboutInfo);
        }

        public function updateAbout(Request $request, int $id)
        {
            $data = array();
            $data['title'] = $request->get('title');
            $data['description'] = $request->get('description');

            DB::table('content')
                ->where('id', $id)
                ->update($data);
            Session::put('message', 'Содржината е успешно ажурирана !');

            return redirect::to('all-about');
        }

//
//    public function updateAbout(Request $request, About $about)
//        {
//
//        $about->title = $request->title;
//        $about->description = $request->description;
//
//        $about->update();
//
//        return redirect::to('all_about')->with('message', 'Содржината е успешно ажурирана ! ! ! ');
//        }

}
