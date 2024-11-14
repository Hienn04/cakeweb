<?php

namespace App\Http\Controllers\Website;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;

    /**
     * This is the constructor declaration.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Show cart page in website
     * @return view cart page
     */
    public function index()
    {   
        $user  = Auth::user();
        
        $user_Cart = Cart::where('user_id', $user->id)->first();
        
        
        return view('website.cart.index');
    }

    /**
     * Show cart table in website
     * @param Request $request
     * @return view cart table
     */
    public function search()
    {
        $data = $this->cartService->showCart();
       
        return view('website.cart.table', [
            'cartItems' => $data['cartItems'],
            'totalCarts' => $data['totalCarts'],
        ]);
    }
    public function searchLimit()
    {
        $data = $this->cartService->showCartLimit();
        return response()->json(['data' => $data]);
    }

    /**
     * Add product to cart
     * @param CartRequest $request
     * @return response data message status
     */
    public function addToCart(CartRequest $request)
    {
        $data = $this->cartService->handleAddToCart($request);
        return response()->json(['data' => $data]);
    }

    /**
     * Remove product from cart
     * @param Request $request
     * @return response data message status
     */
    public function removeProduct(Request $request)
    {
        $data = $this->cartService->removeProductFromCart($request);
        return response()->json(['data' => $data]);
    }

    /**
     * Update cart
     * @param Request $request
     * @return response data message status
     */
    public function updateCart(CartRequest $request)
    {
        $data = $this->cartService->updateCart($request);
        return response()->json(['data' => $data]);
    }

    public function getTotalProductInCart()
    {
        $data = $this->cartService->getTotalProductInCart();
        return response()->json(['data' => $data]);
    }
}