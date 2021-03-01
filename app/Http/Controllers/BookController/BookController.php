<?php


namespace App\Http\Controllers\BookController;


use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.add_book');
    }

    public function saveBook(Request $request )
    {
        $book = new Book($request->all());

        $book->save();

        return redirect()->route('admin.dashboard');
    }

    public function allBook()
    {
        $allBookInfo = DB::table('books')
            ->get()
            ->where('section_id', 2);
        $menageBook = view('admin.all_books')
            ->with('allBookInfo', $allBookInfo);

        return view('admin.admin_layout')
            ->with('admin.all_books', $menageBook);
    }

    public function unactiveBook(int $id)
    {
        DB::table('books')
            ->where('id', $id)
            ->update(['publication_status'=>0]);
        Session::put('message','Содржината е успешно деактивирана!');

        return redirect::to('all-book');
    }

    public function deleteBook(int $id)
    {
        $book = Book::findOrFail($id);

        $book->delete();
    }

    public function activeBook(int $id)
    {
        DB::table('content')
            ->where('id', $id)
            ->update(['publication_status'=>1]);
        Session::put('message','Содржината е успешно активирана !');

        return redirect::to('all-about');
    }

    public function editBook(int $id)
    {
        $bookInfo=DB::table('books')
            ->where('id', $id)
            ->first();
        $bookInfo=view('admin.edit_book')
            ->with('bookInfo',$bookInfo);
        return view('admin.admin_layout')
            ->with('admin.edit_book',$bookInfo);
    }

    public function updateBook(Request $request, int $id)
    {
        $data = array();
        $data['title'] = $request->get('title');
        $data['short_description'] = $request->get('short_description');
        $data['category_id'] = $request->get('category_id');
        $data['year'] = $request->get('year');
        $data['price'] = $request->get('price');
        $data['quantity'] = $request->get('quantity');
        $data['origin_id'] = $request->get('origin_id');
        $data['author_id'] = $request->get('author_id');
        $data['translator'] = $request->get('translator');
        $data['file'] =  $request->get('file');

//        dd($data);

        DB::table('books')
            ->where('id', $id)
            ->update($data);
        Session::put('message', 'Содржината е успешно ажурирана !');

        return redirect::to('all-book');
    }
}
