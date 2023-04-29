<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogPost::with('category')->get();
        $categories = Category::categorySelect();
    
        return view('blog.index', [
            'blogs' => $blogs,
            'categories' => $categories
        ]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = new Category;
        //$categories = $categories->categorySelect();

        $categories = Category::categorySelect();

        //return $categories;

        return view('blog.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang = session('locale');
    
        $blogPost = new BlogPost([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'categories_id' => $request->categories_id
        ]);
    
        if ($lang == 'fr') {
            $blogPost->body_fr = $request->body;
        } else {
            $blogPost->body = $request->body;
        }
    
        $blogPost->save();
    
        return redirect(route('blog.index', $blogPost->id))->withSuccess('Post inserted');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
      
        return view('blog.show', ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        $categories = Category::categorySelect();

        return view('blog.edit', ['blogPost' => $blogPost, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body,
            'categories_id' => $request->categories_id
        ]);

        return redirect(route('blog.show', $blogPost->id))->withSuccess('Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('blog.index'))->withSuccess('Post Deleted');
    }

    public function query(){

      

      
      
        return $blog;
    }

    public function page(){
        $blogs = BlogPost::select()
        ->paginate(5);

        return view('blog.page', ['blogs' => $blogs ]);

    }

    public function showPdf(BlogPost $blogPost){
        $pdf = PDF::loadView('blog.show-pdf', ['blogPost' => $blogPost]);
        return $pdf->download('blog.pdf');
        //return $pdf->stream('blog.pdf');

    }


    public function downloadZip($id)
    {
        $blog = BlogPost::findOrFail($id);
    
        // create a new zip archive
        $zip = new ZipArchive;
        $fileName = $blog->title . '.zip';
        $zipFilePath = storage_path('app/public/' . $fileName);
        if ($zip->open($zipFilePath, ZipArchive::CREATE) !== true) {
            return response()->json(['message' => 'Error creating zip file'], 500);
        }
    
        // add the blog post file to the zip archive
        $filePath = storage_path('app/public/' . $blog->file_path);
        $zip->addFile($filePath, $blog->title);
    
        $zip->close();
    
        // return the zip file as a download response
        return response()->download($zipFilePath, $fileName);
    }
    

}

