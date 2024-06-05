<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    //

    public function admin_dashboard()
    {
      return view('admin.index');
    }

    public function category() 
    {
      $categories = Category::orderBy('created_at', 'DESC')->paginate(5); //this line of code will go to our category table and get everything that is there and save it in the categories variable
      return view('admin.category', compact('categories'));
      //as you are returning this view compact (merge) it with categories
    }

    public function add_category(Request $request)
    {
        //validation of inputs
        $validator = $request->validate([
          'category' => 'required|unique:categories,category'
       ],[
        //how to give your own error message
           'category.unique' => 'This category already exists.',
      ]);


     Category::create($validator);

     return redirect()->back()->with('success', 'Category added successfully'); 

  }

  public function deleteCategory($id)
  {
    $data = Category::find($id); //you can call the variable anything. variable to hold /id
    $data->delete();
    return redirect()->back()->with('success', 'Category deleted successfully');
  }

  public function adminLogout(Request $request)
  {

    //logout the current user
    Auth::logout();
    //Invalidate the current session
    $request->session()->invalidate();
    //Regenerate the csrf token to prevent csrf attacks
    $request->session()->regenerateToken();

    //Redirect the admin to the login page
    return redirect('login')->with('message', 'You have successfully logged out');

  }

  public function createProduct() 
  {
    return view('admin.createProduct');
  }

  public function addProduct(Request $request) 
  {
    $request->validate([
      'productName' => 'required|max:225',
      'productCategory' => 'required|max:225',
      'productImage' => ['nullable','file', 'max:10000'],
      'productDescription' => 'required',
      'manufacturerName' => 'required',
      'status' => 'required',
      'productPrice' => 'nullable',
      'discountPrice' => 'nullable',
      'warranty' => 'nullable|max:225',
    ]);

    $product = new Products();
    $product->productName = $request->productName;
    $product->productCategory = $request->productCategory;
    $product->productDescription = $request->productDescription;
    $product->manufacturerName = $request->manufacturerName;
    $product->status = $request->status;
    $product->productPrice = $request->productPrice;
    $product->discountPrice = $request->discountPrice;
    $product->quantity = $request->quantity;
    $product->warranty = $request->warranty;
    $product->featuredProduct = $request->featuredProduct;

    //to add image file to database
    if($request->hasFile('productImage')){
      $image = $request->file('productImage');
      $productImage = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('productFolder'), $productImage);
      $product->productImage = $productImage;
    }

    $product->save();
    return redirect('admin/dashboard')->with('message', 'Product added successfully');

  }

  public function products()
  {
    return view('admin.products');
  }

  public function editProduct($productid)
  {
    $product = Products::findorFail($productid);
    return view('admin.editProduct', compact('product'));
  }

  public function deleteProduct($id)
  {
    $data = Products::find($id);
    $data->delete();
    return redirect()->back()->with('success', 'Product deleted successfully');

  }

  public function updateProduct(Request $request, $id)
  {
    $request->validate([
      'productName' => 'required|max:225',
      'productCategory' => 'required|max:225',
      'productImage' => ['nullable','file', 'max:10000'],
      'productDescription' => 'required',
      'manufacturerName' => 'required',
      'status' => 'required',
      'productPrice' => 'nullable',
      'discountPrice' => 'nullable',
      'warranty' => 'nullable|max:225',
    ]);

    $product = Products::find($id);
    $product->productName = $request->productName;
    $product->productCategory = $request->productCategory;
    $product->productDescription = $request->productDescription;
    $product->manufacturerName = $request->manufacturerName;
    $product->status = $request->status;
    $product->productPrice = $request->productPrice;
    $product->discountPrice = $request->discountPrice;
    $product->quantity = $request->quantity;
    $product->warranty = $request->warranty;
    $product->featuredProduct = $request->featuredProduct;

    //to add image file to database
    if($request->hasFile('productImage')){
      $image = $request->file('productImage');
      $productImage = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('productFolder'), $productImage);
      $product->productImage = $productImage;
    }

    $product->save();

    return redirect()->route('products')->with('message', 'Product updated successfully');


  }
}
