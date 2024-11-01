<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller {
    public function index(){
        return view('index');
    }

    public function showNews() {
        $news = News::all();
        return response()->json($news);
    }

    public function storenews(Request $request) {
           $request->validate([
               'title' => 'required|string|unique:news,title',
               'description' => 'required|string',
               'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           ]);

           if ($request->hasFile('image')) {
               $imagePath = $request->file('image')->store('images', 'public');
           }

           $new = news::class::create([
            'title' => 'required|string|unique:news,title',
            'description' => 'required|string',
            'image' => $imagePath ?? null,
           ]);

           return redirect()->back()->with('success', 'Новость успешно опубликована.');
       }

    public function destroy($id) {
        $new = News::find($id);
        if ($new) {
            $new->delete();
            //return response()->json(['success' => 'Новость успешно удалена.']);
        }
        //return response()->json(['error' => 'Новость не найдена.'], 404);
        }
}
?>
