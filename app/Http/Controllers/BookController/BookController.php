<?php

namespace App\Http\Controllers\BookController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BookController extends Controller
{
    public function index()
    {
        return view('admin.add_book');
    }

    public function saveBook(Request $request )
    {
        $request->validate([
            'title'=>'string|required',
            'short_description'=>'string|required',
            'year'=>'string|required',
            'quantity'=>'required|string',
//          'file'=>'string|required',
            'price'=>'string|required',
            'translator'=>'string|required',
            'publication_status'=>'string|required',
            'category_id'=>'required|exists:categories,id',
            'origin_id'=>'required|exists:origin,id',
            'section_id'=>'required|exists:sections,id',
            'author_id'=>'required|exists:authors,id',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Book::where('slug', $slug)->count();
        if($count>0){
            $slug=$slug.' - '.date('ymdis'). ' - '.rand(0,999);
        }
        $data['slug']=$slug;

        $request->photo->extension();
        $newImageName = time() . ' - ' .$request->name . ' . ' .

        $request->photo->extension();
        $data['photo']=$newImageName;

        $request->photo->move(public_path('images'), $newImageName);

        $book = Book::create( $data);

        if($book){
        request()->session()->flash('success','Успешно додадовте книга!');
        }
        else{
        request()->session()->flash('error','Ве молиме обидете се повтроно');
        }

        return redirect()->route('all-book')->with('message','Успешно додадовте книга!');





//        $request->validate([
//            'title'=>'string|required',
//            'short_description'=>'string|required',
//            'year'=>'string|required',
//            'quantity'=>'required|string',
////            'file'=>'string|required',
//            'price'=>'string|required',
//            'translator'=>'string|required',
//            'slug'=>'string|required',
//            'publication_status'=>'string|required',
//            'category_id'=>'required|exists:categories,id',
//            'origin_id'=>'required|exists:origin,id',
//            'section_id'=>'required|exists:sections,id',
//            'author_id'=>'required|exists:authors,id',
//            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
//        $newImageName = time() . ' - ' .$request->name . ' . ' .
//            $request->photo->extension();
//
//       $request->photo->move(public_path('images'), $newImageName);
//
//       $book = Book::create([
//           'title' => $request->input('title'),
//           'short_description' => $request->input('short_description'),
//           'year' => $request->input('year'),
//           'quantity' => $request->input('quantity'),
//           //            'file'=>'string|required',
//           'price' => $request->input('price'),
//           'slug' => $request->input('slug'),
//           'translator' => $request->input('translator'),
//           'publication_status' => $request->input('publication_status'),
//           'category_id' => $request->input('category_id'),
//           'origin_id' => $request->input('origin_id'),
//           'section_id' => $request->input('section_id'),
//           'author_id' => $request->input('author_id'),
//           'photo' => $newImageName
//       ]);
//
//        $book->save();
//
//        return redirect()->route('all-book')->with('message','Успешно додадовте книга!');
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
        $book = Book::find($id);

        $book->delete();

        return redirect('all-book')->with('message','Успешно ја избришавте книгата');
    }

    public function activeBook(int $id)
    {
        DB::table('books')
            ->where('id', $id)
            ->update(['publication_status'=>1]);
        Session::put('message','Содржината е успешно активирана !');

        return redirect::to('all-book');
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

        $bookInfo = Book::findOrFail($id);
        $category = Category::where('category')->get();

        return view('admin.edit_book');
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
        $data['photo'] = $request->get('photo');
//        $data['file'] =  $request->get('file');

//        dd($data);

        DB::table('books')
            ->where('id', $id)
            ->update($data);
        Session::put('message', 'Содржината е успешно ажурирана !');

        return redirect::to('all-book');
    }
}
