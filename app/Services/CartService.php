<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartService 
{
    public function handleAddToCart($request)
    {
        DB::beginTransaction();

        try {
            $product = Product::find($request->productId);

            if (!$product) {
                return response()->json(['error' => 'Sản phẩm không có']);
            }
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();

            // check cart exists
            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }

            $productAvaliable = Product::where('id', $product->id)
                ->where('quantity', '>', 0)
                ->first();

            if (!$productAvaliable) {
                return response()->json(['error' => 'San pham này đã hết hàng']);
            }

            $existingCartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->first();

            $newQuantity = intval($request->quantity);

            if ($existingCartItem) {
                if ($existingCartItem->quantity + $newQuantity > $product->quantity) {
                    return response()->json(['error' => 'Số lượng sản phẩm trong giỏ hàng của bạn vượt quá số lượng trong kho. Xin lỗi vì sự bất tiện này']);
                }
                $existingCartItem->quantity += $newQuantity;
                $existingCartItem->save();
            } else {
                if ($newQuantity > $product->quantity) {
                    return response()->json(['error' => 'Số lượng sản phẩm trong giỏ hàng của bạn vượt quá số lượng trong kho. Xin lỗi vì sự bất tiện này']);
                }

                $cartItem = new CartItem();
                $cartItem->cart_id = $cart->id;
                $cartItem->product_id = $product->id;
                $cartItem->quantity = $newQuantity;
                $cartItem->save();
            }

            DB::commit();

            return response()->json(['success' => 'Đã thêm sản phẩm thành công']);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json($e, 500);
        }
    }

    /**
     * Show cart 
     * @return Array data cart
     */
    public function showCart()
    {
        try {
            $user  = Auth::user();
            // return 1;
            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }
            $cartItems = CartItem::where('cart_id', $cart->id)
                ->join('products', 'cart_items.product_id', '=', 'products.id')
                ->select(
                    'cart_items.cart_id',
                    'cart_items.quantity',
                    'products.id as productId',
                    'products.name as productName',
                    'products.price as productPrice',
                    'products.image as productImage',
                    'products.quantity as productQuantity',
                )
                ->selectRaw('SUM(cart_items.quantity * products.price) as total')
                ->groupBy('cart_items.cart_id', 'cart_items.quantity', 'products.quantity', 'products.id', 'products.name', 'products.price', 'products.image')
                // ->orderBy('cart_items.created_at', 'desc')
                ->get();    
            $totalCarts = 0;
                foreach ($cartItems as $item) {
                    if ($item->quantity <= $item->productQuantity) {
                        $totalCarts += $item->total;
                    }
                }
            return [
                'cartItems' => $cartItems,
                'totalCarts' => $totalCarts
            ];
        } catch (Exception $e) {
            Log::error($e);
            return response()->json($e, 500);
        }
    }
    /**
     * Show cart list limit
     * @return Array data cart
     */
    public function showCartLimit()
    {
        try {
            $user  = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }
            $countCart = CartItem::where('cart_id', $cart->id)->count();
            return $countCart;
        } catch (Exception $e) {
            Log::error($e);
            return response()->json($e, 500);
        }
    }

    public function showCartCheckout()
    {
        try {
            $user  = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }

            $cartItemsInCheckout = CartItem::where('cart_id', $cart->id)
                ->join('products', 'cart_items.product_id', '=', 'products.id')
                ->select(
                    'cart_items.cart_id',
                    'cart_items.quantity',
                    'products.id as productId',
                    'products.name as productName',
                    'products.price as productPrice',
                    'products.image as productImage',
                    'products.quantity as productQuantity',
                )
                ->selectRaw('SUM(cart_items.quantity * products.price) as total')
                ->groupBy('cart_items.cart_id', 'cart_items.quantity', 'products.quantity', 'products.id', 'products.name', 'products.price', 'products.image')
               
                ->get();
            foreach ($cartItemsInCheckout as $key => $item) {
                if ($item->quantity > $item->productQuantity) {
                    CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $item->productId)
                        ->delete();

                    unset($cartItemsInCheckout[$key]);
                }
            }
            $totalCarts = 0;
            foreach ($cartItemsInCheckout as $item) {
                $totalCarts += $item->total;
            }
            return [
                'cartItemsInCheckout' => $cartItemsInCheckout,
                'totalCarts' => $totalCarts
            ];
        } catch (Exception $e) {
            Log::error($e);
            return response()->json($e, 500);
        }
    }

/**
     * Get total product in cart
     * @return Number total product in cart
     */
    public function getTotalProductInCart()
    {
        try {
            $user  = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }

            $totalProductInCart = CartItem::where('cart_id', $cart->id)->count();
            return $totalProductInCart;
        } catch (Exception $e) {
            Log::error($e);
            return response()->json($e, 500);
        }
    }
    /**
     * Remove products from cart
     * @param @request
     * @return response message 
     */
    public function removeProductFromCart($request)
    {
        DB::beginTransaction();

        try {
            $user  = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();

            // cart item delete
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $request->productId)
                ->first();

            if (!$cartItem) {
                return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng']);
            }

            // delete cart item
            $cartItem->delete();

            DB::commit();

            return response()->json(['success' => 'Đã xóa thành công sản phẩm khỏi giỏ hàng']);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json($e, 500);
        }
    }

    /**
     * Update cart
     * @param @request
     * @return response message
     */
    public function updateCart($request)
    {
        DB::beginTransaction();

        try {
            $newQuantity = $request->quantity;
            $user  = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                return response()->json(['error' => 'Không tìm thấy giỏ hàng']);
            }
            // cart item update
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $request->productId)
                ->first();

            if ($cartItem) {
                $product = Product::where('id', $request->productId)
                    ->first();
                if ($newQuantity <= $product->quantity) {
                    // Update size and quantity for cart
                    $cartItem->quantity = $newQuantity;
                    $cartItem->save();
                    DB::commit();
                    return response()->json(['success' => 'Giỏ hàng được cập nhật thành công']);
                } else {
                    return response()->json(['error' => 'Số lượng mới vượt quá số lượng sản phẩm trong kho. Vui lòng chọn lại']);
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json($e, 500);
        }
    }
}
