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
        dd('nn');

        $order = Book::findOrFail($id);

        $order->delete();
    }
}
