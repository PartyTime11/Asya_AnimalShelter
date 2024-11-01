<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles;

class ArticlesController extends Controller {
    public function index(){
        return view('index');
    }

    public function showArticles() {
        $articles = Articles::all();
        return response()->json($articles);
    }

    public function storearticles(Request $request) {
           $request->validate([
               'title' => 'required|string|unique:articles,title',
               'description' => 'required|string',
               'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           ]);

           if ($request->hasFile('image')) {
               $imagePath = $request->file('image')->store('images', 'public');
           }

           $article = articles::class::create([
            'title' => 'required|string|unique:articles,title',
            'description' => 'required|string',
            'image' => $imagePath ?? null,
           ]);

           return redirect()->back()->with('success', 'Статья успешно опубликована.');
       }

    public function destroy($id) {
        $article = Articles::find($id);
        if ($article) {
            $article->delete();
            //return response()->json(['success' => 'Статья успешно удалена.']);
        }
        //return response()->json(['error' => 'Статья не найдена.'], 404);
        }
}
?>
