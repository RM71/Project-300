<1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function check(Request $request)
    {  
        $user = $request->username;
        $pass  = $request->password;
 
        if (auth()->attempt(array('name' => $user, 'password' => $pass)))
        {
         return view('index');
        } 
        else
         {  
             session()->flash('error', 'Invalid Credentials'); 
             return redirect()->route('student.login');
         }  
    }
 
 
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('student.login');
    }
}