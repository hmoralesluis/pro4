<?php namespace App\Http\Controllers\Shop;

use App\Brand;
use App\Category;
use App\ContactMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductOpinions;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // buscar los ultimos productos subidos a la pagina y mostrar minimo 12
        // Mostrar los productos que mas vistas tienen y mostrar minimo 12

        $categories = Category::all();
        $most_visit = $this->mostVisit();
        $lasted = $this->lastedProduct();
        $brands = Brand::all();
        $slide = $this->slideProducts();


		return view('shop.index')
            ->with('most_visit', $most_visit)
            ->with('lasted', $lasted)
            ->with('categories', $categories)
            ->with('slide', $slide)
            ->with('brands', $brands);
	}

    public function slideProducts()
    {
        $products = DB::table('products')
            ->orderBy('created_at')
            ->take(3)
            ->get();

        return $products;
    }
    public function lastedProduct()
    {
        $products = DB::table('products')
            ->orderBy('created_at')
            ->take(8)
            ->get();
        return $products;
    }
    public function mostVisit()
    {
        $products = DB::table('products')
            ->orderBy('visit_count')
            ->take(10)
            ->get();
        return $products;
    }

    public function showProductsCat($id)
    {
        $products = Product::where('category_id', $id)
            ->orderBy('mark', 'desc')
            ->paginate(18);

        $products->setPath(url('/category/'.$id));

        $category = Category::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $lasted = $this->lastedProduct();
        $most_visit = $this->mostVisit();

        return view('shop.products_category')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('category', $category)
            ->with('lasted', $lasted)
            ->with('most_visit', $most_visit)
            ->with('brands', $brands);
    }

    public function productDetails($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $product->visit_count = $product->visit_count + 1;
        $product->save();

        $products = Product::all();
        $similar_products = Product::where('category_id', $product->category_id)
            ->orderBy('mark', 'desc')
            ->take(6)
            ->get();

        $opinions = ProductOpinions::where('product_id', $id)
        ->get();

        $brands = Brand::all();

        return view('shop.product_details')
            ->with('product', $product)
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('similar_products', $similar_products)
            ->with('opinions', $opinions)
            ->with('brands', $brands);
    }


    public function addOpinion($id, Request $request)
    {
        $user_name = $request->get('name');
        $user_email = $request->get('email');
        $opinion_text = $request->get('opinion');

        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'opinion' => 'min:10',
        );

        $message = array(
            'name.required' => 'Debe de especificar su nombre',
            'email.required' => 'Debe de especificar su correo electronico',
            'opinion.min' => 'Su opinion debe de tener al menos 5 caracetres',
        );


        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->passes())
        {
            $opinion = new ProductOpinions();
            $opinion->guest_name = $user_name;
            $opinion->guest_email = $user_email;
            $opinion->opinion = $opinion_text;
            $opinion->product_id = $id;

            $opinion->save();

            return redirect('/product/details/' .$id);
        }

        return Redirect::back()->withInput()->withErrors($validator);


    }


    public function search(Request $request){
        $data = $request->get('search');

        $rulers = array(
            'search' => 'min:3|required'
        );

        $messages = array(
           'min' => 'Debe de escribir como minimo 3 caracteres para realizar una busqueda',
            'required' => 'El criterio de busqueda no puede estar vacio',
        );

        $categories = Category::all();
        $brands = Brand::all();

        $lasted = $this->lastedProduct();
        $most_visit = $this->mostVisit();

        $validator = Validator::make($request->all(), $rulers, $messages);

        if ($validator->passes())
        {
            if ($data != "")
            {
                $products = DB::table('products')
                    ->distinct()
                    /*  ->where('mark','like', '%'.$data.'%' )*/
                    ->where('part_number','like', '%'.$data.'%')
                    /*  ->orWhere('code','like', '%'.$data.'%')*/
                    ->paginate(50);
                //    ->get();

                $products->setPath(url('/search'));



                return view('shop.search')
                    ->with('products', $products)
                    ->with('categories', $categories)
                    ->with('brands', $brands)
                    ->with('lasted', $lasted)
                    ->with('most_visit', $most_visit);
            }
        }

        return view('shop.search')
            ->withErrors($validator)
            ->with('categories', $categories)
            ->with('brands', $brands)
            ->with('lasted', $lasted)
            ->with('most_visit', $most_visit);

    }

    public function about()
    {

        $categories = Category::all();
        $most_visit = $this->mostVisit();
        $lasted = $this->lastedProduct();
        $brands = Brand::all();

        return view('shop.about_us')
            ->with('most_visit', $most_visit)
            ->with('lasted', $lasted)
            ->with('categories', $categories)
            ->with('brands', $brands);
    }

    public function services()
    {
        $categories = Category::all();
        $most_visit = $this->mostVisit();
        $lasted = $this->lastedProduct();
        $brands = Brand::all();

        return view('shop.services')
            ->with('most_visit', $most_visit)
            ->with('lasted', $lasted)
            ->with('categories', $categories)
            ->with('brands', $brands);
    }

    public function contact()
    {
        $categories = Category::all();
        $most_visit = $this->mostVisit();
        $lasted = $this->lastedProduct();
        $brands = Brand::all();

        return view('shop.contact')
            ->with('most_visit', $most_visit)
            ->with('lasted', $lasted)
            ->with('categories', $categories)
            ->with('brands', $brands);
    }

    public function store_message(Request $request)
    {
        $rulers = array(
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        );

        $messages = array(
            'name.required' => 'Debe de especificar su nombre.',
            'email.required' => 'Debe de especificar su correo electronico.',
            'message.required' => 'Su mensaje no puede quedar en blanco.',
        );

        $validator = Validator::make($request->all(), $rulers, $messages);

        if($validator->passes())
        {
            $msg = new ContactMessage();
            $msg->name = $request->get('name');
            $msg->email = $request->get('email');
            $msg->subject = $request->get('subject');
            $msg->message = $request->get('message');

            $msg->save();
            return redirect('contact');
        }
         return Redirect::back()->withInput()->withErrors($validator);
    }

}
