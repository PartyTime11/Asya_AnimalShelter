<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applications;

class ApplicationsController extends Controller {
    public function index(){
        return view('index');
    }

    public function showApplications() {
        $applications = Applications::all();
        return response()->json($applications);
    }

    public function destroy($id) {
        $applicaion = Applications::find($id);
        if ($application) {
            $application->delete();
            //return response()->json(['success' => 'Заяка успешно закрыта.']);
        }
        //return response()->json(['error' => 'Заявка не найдена.'], 404);
        }
}
?>
