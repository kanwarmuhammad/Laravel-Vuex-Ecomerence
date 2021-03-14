<?php
namespace App\Http\Controllers;
use App\categoery;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function registerUser(Request $request) {
    //     return User::create([
    //         'name' => $request->name,
    //         'password' => $request->password,
    //         'email' => $request->email
    //     ]);
    // }
    public function postCategoery(Request $request) {
        return categoery::create([
            'name' => $request->name
        ]);
    }
    public function getCategoery(Request $request) {
        // $cars = name::all();
        // return $cars;
        $user = categoery::get();
        // dd($user);
        return $user;
    }
    public  function updateCategoery(Request $request, $id){
        $page = categoery::find($id);
        // dd($page);
        $page->name = $request->name;
        $page->save();
        // $name->where('id', $request->id)->update(['name' => $request->name]);
    }
    public function deleteCategoery(Request $request){
        $car = categoery::find($request->id)->delete();
    }
}
