<?php


namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    public function index()
    {
        return view('admin.add_author');
    }

    public function allAuthor()
    {
        $authors = Author::all();

        return view('admin.all_authors',['authors'=>$authors]);

//        $allAuthor = DB::table('authors')
//            ->get();
//        $menageContent = view('admin.all_authors')
//            ->with('allAuthor', $allAuthor);
//
//        return view('admin.admin_layout')
//            ->with('admin.all_authors', $menageContent);
    }

//    public function saveAuthor(Request $request)
//    {
//        $author = new Author($request->all());
////        dd($author);
//        $author->save();
//
//        return redirect()->route('admin.dashboard');
//    }

    public function saveAuthor(Request $request )
    {

        $data=array();
        $data['id']=$request->get('id');
        $data['name']=$request->get('name');
        $data['surname']=$request->get('surname');

        DB::table('authors')->insert($data);
        Session::put('message', 'Успешно додадовте автор !');

        return redirect::to('/all-author');
    }

    public function editAuthor(int $id)
    {
        $authorInfo=DB::table('authors')
            ->where('id', $id)
            ->first();
        $authorInfo=view('admin.edit_author')
            ->with('authorInfo',$authorInfo);
        return view('admin.admin_layout')
            ->with('admin.edit_author',$authorInfo);
    }

    public function updateAuthor(Request $request, int $id)
    {
        $data = array();
        $data['name'] = $request->get('name');
        $data['surname'] = $request->get('surname');

        DB::table('authors')
            ->where('id', $id)
            ->update($data);
        Session::put('message', 'Успешно го ажуриравте авторот !');

        return redirect::to('all-author');
    }

    public function deleteAuthor(int $id)
    {
        $author = Author::find($id);

        $author->delete();

        return redirect('all-author')->with('message','Успешно го избришавте авторот');
    }

}
