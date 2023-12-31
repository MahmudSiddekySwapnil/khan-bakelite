<?php

namespace App\Http\Controllers\adminViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAdditionalImage;
use Illuminate\Support\Facades\Validator;
use App\Services\ImageDeleteService;
use App\Services\ImageUploadService;
use App\Services\MultipleImageUploadService;
class ProductManageController extends Controller
{
    protected $imageDeleteService;
    protected $imageUploadService;
    protected $imagesUploadService;

    public function __construct(ImageDeleteService $imageDeleteService, ImageUploadService $imageUploadService, MultipleImageUploadService $imagesUploadService)
    {
        $this->imageDeleteService = $imageDeleteService;
        $this->imageUploadService = $imageUploadService;
        $this->imagesUploadService = $imagesUploadService;

    }

   public function index(){
       return view('admin_view.pages.product');
   }

   public function manageProduct(){
       return view('admin_view.pages.productManage');
   }

   public function manageProductProcess(Request $request){

       $validationRules = [
           'picture' => 'required|mimes:jpeg,jpg,png',
           'productPrice' => 'required',
           'productName' => 'required',
           'productWarranty' => 'required',
           'productSlug' => 'required',
           'productKey' => 'required',
           'productShortDescription' => 'required',
           'productDescription' => 'required',
           'productQuantity' => 'required',
           'productTechnicalSpecification' => 'required',
       ];
       $validator = Validator::make($request->all(), $validationRules);
       if ($validator->fails()) {
           return response()->json(['message' => 'please check your file extension support only (jpeg,jpg,png)']);
       } else {
           $model = new Product();
           $path = "media/product";
           $path2 = "media/extraImage";
           $result = $this->imageUploadService->imageUploadService($request, 'products', $path);
           if ($result['message'] == "exists") {
               return response()->json(['message' => 'Image already exists']);

           } else {
               $model->image_url = $result['image_url'];
               $model->image = $result['picture'];
               $model->image_hash = $result['image_hash']; // Store the image hash in the database.
               $model->product_price = $request->productPrice;
               $model->product_name = $request->productName;
               $model->warranty = $request->productWarranty;
               $model->product_slug = $request->productSlug;
               $model->product_key = $request->productKey;
               $model->product_short_description = $request->productShortDescription;
               $model->product_description = $request->productDescription;
               $model->product_quantity = $request->productQuantity;
               $model->technical_specification = $request->productTechnicalSpecification;
               $model->status = 1;
               $model->save();
               $model->product_image_id = $model->id; // Update product_image_id with the ID of the main product image
               $model->update();
               if ($request->hasFile('additionalImages')) {
                  $resultImages = $this->imagesUploadService->imagesUploadService($request, 'product_image', $path2,'additionalImages');
                   foreach ($resultImages as $resultImage) {
                       if ($resultImage['message'] === 'exists') {
                           return response()->json(['message' => 'Image already exists']);
                       } else {
                           $extraImage = new ProductAdditionalImage();
                           $extraImage->image_url = $resultImage['image_url'];
                           $extraImage->image_hash = $resultImage['image_hash'];
                           $extraImage->product_id = $model->id;
                           $extraImage->picture = $resultImage['picture']; // customize as needed
                           $extraImage->save();

                       }
                   }

               }
               return response()->json(['message' => 'successful', 'url' => 'products_list']);
           }
       }
   }

    public function showProductData(Request $request)
    {
        $query = Product::all();
        return $returnedJson = array("data" => $query);
    }

    public function mangeProductStatus(Request $request)
    {

        $model = Product::find($request->id);
        $model->status = $request->status;
        $model->save();
        return response()->json(['message' => 'successful', 'url' => '/products_list', 'status' => $request->status]);

    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProduct($id)
    {
        $url = '/products_list';
        $path = 'public/media/product/';
        return $this->imageDeleteService->deleteImage(Product::class, $id, $path, $url);

    }

}
