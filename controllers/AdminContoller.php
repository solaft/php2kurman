<?php


namespace app\controllers;
use app\base\Request;
use app\models\repositories\ProductRepository;
use app\base\Session;

class AdminController extends Controller
{
    public function actionIndex()
    {
        session_start();

        if(!isset($_SESSION['user_id'])) {
            redirect('/LoginController.php');
        }
        
        $products = (new ProductRepository())->getByIds($productIds);
    }
    public function actionAddImage()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $productId = $request->post('id')) {
            $filename = $_FILES['image']['name'];
            if(uploadFile('image', IMG_DIR)) {
                $originalName = IMG_DIR . $filename;
                $smallPath = IMG_DIR . 'small/' . $filename;
                img_resize($originalName, $smallPath, 200, 150);
                addProductImage($filename, $filename, $productId);
            }
    }
    redirect($_SERVER['HTTP_REFERER']);
    }
    public function actionEdit() 
    {
    $request = new Request();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product = $request->post('product');
        if (isset($product['id'])) {
            $id = $product['id'];
            unset($product['id']);
            updateProduct($id, $product);
        }else {
            createProduct($product);
        }
        redirect($_SERVER['REQUEST_URI']);
    }
    
    $product = null;
    if ($id = get('id')){
        $product = getProductById($id);
        $product['images'] = getProductImages($id) ?: [];
    }
    
    include VIEWS_DIR . 'admin/products/edit.php';
    }
}