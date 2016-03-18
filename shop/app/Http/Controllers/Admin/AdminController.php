<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\ContactMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductOpinions;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller {

    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * The registrar implementation.
     *
     * @var \Illuminate\Contracts\Auth\Registrar
     */
    protected $registrar;


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(Guard $auth, Registrar $registrar){
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('auth');
    }

	public function index()
	{
		$categories = Category::all();
        $user = $this->auth->user();
        $prod_count = Product::all()->count();
        $messages = ContactMessage::take(10)->get();
        $brands_count = Brand::all()->count();
		return view('admin.dashboard')
            ->with('categories', $categories)
            ->with('product_count', $prod_count)
            ->with('brands_count', $brands_count)
            ->with('messages', $messages)
            ->with('user', $user);
	}
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegisterUser()
    {
        $user = $this->auth->user();
        return view('admin.users.register')
            ->with('user', $user);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegisterUser(Request $request)
    {
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

         $this->registrar->create($request->all());

        return redirect('/admin/users');

    }


    public function getLogout()
    {
        $this->auth->logout();
        return redirect('/admin/login');

    }

    public function getUsers()
    {
        $users = User::all();
        return view('admin.users.list')
            ->with('users', $users);
    }

    public function getDeleteUser($id)
    {
        User::destroy($id);
        return redirect('admin/users');
    }


    public function getEditUser($id)
    {
        $user = $this->auth->user();
        $updated_user = User::find($id);

        return view('admin.users.update')
            ->with('user', $user)
            ->with('updated_user', $updated_user);
    }

    public function postEditUser($id, Request $request)
    {
        $updated_user = User::find($id);

        $validator = $this->registrar->validate_update($request->all());

        if ($validator->passes())
        {
            $this->registrar->update($request->all(), $updated_user);
            $pass_validator = $this->registrar->validate_password($request->all());
            if($pass_validator->passes())
                $this->registrar->update_password($request->all(), $updated_user);
            else
                $this->throwValidationException(
                    $request, $pass_validator
                );


        }
        else
        {
            $this->throwValidationException(
                $request, $validator
            );
        }




        return redirect('admin/users');

    }


    public function contacts()
    {
        $user = $this->auth->user();
        $contacts = ContactMessage::all();
        return view('admin.contacts')
            ->with('user', $user)
            ->with('contacts', $contacts);
    }

    public function deleteContact($id)
    {
         ContactMessage::destroy($id);
        return redirect('admin/contacts');
    }

}
