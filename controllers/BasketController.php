<?php


namespace app\controllers;


class BasketController extends Controller
{
    public function actionIndex()
    {
    $basket = [];
    if (!empty($_SESSION['basket'])) {
        $productIds = array_filter(
            array_keys($_SESSION['basket']),
            function ($element) {
                return is_int($element);
        }
    );

    $products = (new ProductRepository())->($productIds);
    foreach ($products as $product) {
        $basket[] = [
            'product' => $product,
            'qty' => $_SESSION['basket'][$product['id']]
        ];
    }
}

echo $this->render('basket', ['basket' => $basket]);
    }

    public function actionAdd()
    {
        $request = new Request();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $request->post('product_id');
            $productQty = $request->post('qty');
        
            if(isset($_SESSION['basket'][$productId])) {
                $_SESSION['basket'][$productId] += $productQty;
            } else {
                $_SESSION['basket'][$productId] = $productQty;
            }
        }
        echo json_encode(['status' => 'success', 'message' => 'товар успешно добавлен в корзину']);
    }
}