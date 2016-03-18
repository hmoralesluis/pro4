<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrandController extends Controller {

    protected $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = Brand::paginate(9);

        $brands->setPath(url('admin/brands'));

        $user = $this->auth->user();

        return view('admin.brand.list')
            ->with('brands', $brands)
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
		 return view('admin.brand.create')
                ->with('user', $user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate(Request $request)
    {
        $file = $request->file('image');

        $brand = new Brand();
        $img_name = str_random('10') . '.'. $file->getClientOriginalExtension();
        $brand->image = $img_name;
        $brand->save();

        $image = \Image::make($file);
        $path = public_path() . '/catalog/images/brands/';


        $image->resize(100, 150, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($path . $img_name);




          return redirect('admin/brands');
    }

    public function getDelete($id)
    {
       /* $path =  public_path('catalog/images/brands/') ;

        Storage::delete($path.'/'. Brand::find($id)->image);*/


        Brand::destroy($id);
        return redirect(url('admin/brands'));
    }
}
