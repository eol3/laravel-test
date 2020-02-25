<?php

namespace App\Http\Controllers;
use App\Services\CrawlerServiece;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	  public function index()
	  {
		  	// echo "hello";
	      return view('login');
	  }
	  
	  public function register()
	  {
	  	return view('register');
	  }
	  
	  public function show($id)
	  {
		  	echo $id;
	  }
	  
	  public function login(Request $request)
    {
		$email = $request->input('email');
		$password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            echo "login success";
        } else {
        	return redirect('/user/register');
        }
    }
    
    public function store(Request $request)
    {
    		$data = array(
    			'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => $request->input('email')
    		);
    		$validate = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        if (!$validate) echo "feild validate fail";
        
        $result = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        if ($result) echo "register success";
        else echo "fail";
    }
    
    public function crawler()
    {
        
        $crawler = new CrawlerServiece();
        $crawler->get_all_astros();
    }
}
