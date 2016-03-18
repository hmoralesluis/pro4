<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller {

	protected $auth;
	public function __construct(Guard $auth){
		$this->auth = $auth;
		$this->middleware('auth');
	}


	public function index()
	{

		$user = $this->auth->user();

        $categories = DB::table('categories')
            ->leftJoin( 'products'  , 'products.category_id', '=' ,'categories.id'  )
            ->select( 'categories.*' , DB::raw('COUNT(products.id) as count_products'))
            ->groupBy('categories.name')
            ->get();

		return view('admin.category.list')
			->with('categories', $categories)
			->with('user', $user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$user = $this->auth->user();
		return view('admin.category.create')
			->with('user', $user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(Request $request )
	{

        $rules = array(
            'name' => 'required',
        );

        $messages = array(
            'required' => 'El campo nombre no puede estar vacio'
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes())
        {
            $cat = new Category();
            $cat->name = $request->get('name');
            $cat->save();

            return redirect('admin/categories');
        }

        return Redirect::back()->withInput()->withErrors($validator);


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$user = $this->auth->user();
		$category = Category::find($id);
		return view('admin.category.update')
			->with('user', $user)
			->with('category', $category);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id, Request $request)
	{
		$name = $request->get('name');

		$rules = array(
			'name' => 'required',
		);

		$messages = array(
			'required' => 'El campo nombre no puede estar vacio'
		);

		$validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes())
		{
			$category = Category::find($id);
			$category->name = $name;
			$category->save();

			return redirect('admin/categories');
		}
		return Redirect::back()->withInput()->withErrors($validator);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
        $products =  Category::find($id)->products;


        foreach ( $products as $prod)
        {
            Product::destroy($prod->id);
        }

		Category::destroy($id);


        return redirect('admin/categories');
	}

}
