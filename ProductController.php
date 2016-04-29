<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller {

    protected $auth;
    public function __construct(Guard $auth){
        $this->middleware('auth');
        $this->auth = $auth;

    }

    public function index()
	{
        $products = DB::table('products')
            ->join( 'categories' , 'products.category_id', '=' ,'categories.id' )
            ->select( 'products.*' , 'categories.name as categories')
            ->orderBy('products.category_id', 'asc')
            ->orderBy('products.part_number', 'desc')
            ->paginate(20);

        $products->setPath(url('/admin/products'));

        $user = $this->auth->user();

        return view('admin.product.list')
            ->with('products', $products)
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
        $categories = Category::all();
		return view('admin.product.create')
            ->with('categories', $categories)
            ->with('user', $user);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(Request $request)
	{
        $code = $request->get('code');
        $mark = $request->get('mark');
        $part_number = $request->get('part_number');
        $description = $request->get('description');
        $category_id = $request->get('category');
        $file = $request->file('main_image');

        $rules = array(

            'mark' => 'required',
            'part_number' => 'required',
            'category' => 'required',


        );

        $messages = array(

            'mark.required' => 'El campo marca no puede quedar en blanco',
            'part_number.required' => 'El campo numero de parte no puede quedar en blanco',
            'category.required' => 'Debe de seleccionar una categoria de la lista',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes())
        {
            $prod = new Product();
            $prod->mark = $mark;
            $prod->code = $code;
            $prod->part_number = $part_number;
            $prod->description = $description;
            $prod->category_id = $category_id;
            $prod->visit_count = 0;
            $prod->save();



            $rules = array(
                'file' => 'mimes:png,gif,jpeg,jpg|max:80000'
            );

            $messages = array(
                'mimes' => 'Las imagenes solo pueden ser archivos gif, png o jpg.'
            );

            $validator_1 = Validator::make(['file' => $file], $rules, $messages);

            if($validator_1->passes())
            {
                if (!empty($file))
                {
                    $image = \Image::make($file);
                    $path = public_path().'/catalog/images/';
                    $extension = $file->getClientOriginalExtension();

                   /* $prod_1 = DB::table('products')
                               ->where('part_number', '=', $part_number )
                               ->get();
*/
                    $img_name = $prod->id .'.'.$extension;

                     $image->resize(395, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    }); 

                    $image->save($path.$img_name);

                    $prod->image =  $img_name;
                    $prod->save();

                }
            }

            else
                return Redirect::back()->withInput()->withErrors($validator_1);

            Session::flash('flash_message', 'Se ha insertado correctamente el producto con número de parte: '. $prod->part_number);
            return Redirect::back();
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
		 $product = Product::find($id);

         $category = $product->category;
         $categories = Category::all();
         $user = $this->auth->user();

        return view('admin.product.update')
            ->with('categories', $categories)
            ->with('product', $product)
            ->with('category', $category)
            ->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id, Request $request)
    {
        $code = $request->get('code');
        $mark = $request->get('mark');
        $part_number = $request->get('part_number');
        $description = $request->get('description');
        $category_id = $request->get('category');

        $rules = array(
            'mark' => 'required',
            'part_number' => 'required',
            'category' => 'required',


        );

        $messages = array(

            'mark.required' => 'El campo marca no puede quedar en blanco',
            'part_number.required' => 'El campo numero de parte no puede quedar en blanco',
            'category.required' => 'Debe de seleccionar una categoria de la lista',


        );

        $validator = Validator::make($request->all(), $rules, $messages);


        $prod = Product::find($id);
       /* \Storage::delete(public_path() . '\\catalog\\images\\'. $prod->image);*/

        if ($validator->passes())
        {
            $prod->mark = $mark;
            $prod->code = $code;
            $prod->part_number = $part_number;
            $prod->description = $description;
            $prod->category_id = $category_id;
            $prod->save();

            $file = $request->file('main_image');

            $rules = array(
                'file' => 'mimes:png,gif,jpeg,jpg|max:80000'
            );

            $messages = array(
                'mimes' => 'Las imagenes solo pueden ser archivos gif, png o jpg.'
            );

            $validator_1 = Validator::make(['file' => $file], $rules, $messages);

            if ($request->hasFile('main_image'))
            {
                if ($validator_1->passes())
                {
                    if (!empty($file))
                    {
                        $image = \Image::make($file);
                        $path = public_path() . '/catalog/images/';
                        $extension = $file->getClientOriginalExtension();


                        $img_name = $id . '.' . $extension;

                        $image->resize(395, 400, function ($constraint)
                        {
                            $constraint->aspectRatio();
                        });
 
                        $image->save($path . $img_name);

                        $prod->image = $img_name;
                        $prod->save();
                    }
                }
                else
                    return Redirect::back()->withInput()->withErrors($validator_1);
            }


            Session::flash('flash_message', 'Se han actualizado correctamente los datos del producto con número de parte: '. $prod->part_number);
            return Redirect::back();

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
        $prod = Product::find($id);
        Session::flash('flash_message', 'Se ha eliminado correctamente el producto con número de parte: '. $prod->part_number);
        Product::destroy($id);
       // $products = Product::all();

        return Redirect::back();
	}

    public function search(Request $request)
    {
        $data = $request->get('search');
        if ($data != "")
        {
            $products = DB::table('products')
                ->distinct()
                ->join( 'categories' , 'products.category_id', '=' ,'categories.id' )
                ->select( 'products.*' , 'categories.name as categories')
                ->where('products.part_number','like', '%'.$data.'%')
                /*->orWhere('products.mark','like', '%'.$data.'%')
                ->orWhere('products.code','like', '%'.$data.'%')
                ->orWhere('categories.name','like', '%'.$data.'%')
                ->orWhere('products.description','like', '%'.$data.'%')*/
                ->orderBy('products.category_id')
                ->orderBy('products.id')
                ->paginate(20);

            $products->setPath(url('admin/product/search'));

            $user = $this->auth->user();

            return view('admin.product.list')
                ->with('products', $products)
                ->with('user', $user);
        }

        else return redirect('admin/products');
    }



}
