<?php

namespace App\Http\Controllers\Main;

use App\Models\Cart;
use Cart as Cartt;
use App\Models\Activity;
use App\Models\Blogpost;
use App\Models\Appdefault;
use App\Models\Foodstuff as FoodStuff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use App\Models\NewShoppingList;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\ContactEmail;

class HomeController extends Controller
{
    public function index(){
        $blogposts = Blogpost::all();
        return view('main.home', compact('blogposts'));
    }

    public function store(){
        $foodStuffs = FoodStuff::cursorPaginate(50);
        $pageItemRangeDisplay = '';
        $totalRelatedFoodStuffItems = '';
        $foodStuffListItemsLength = '';


        return view('main.store', compact('foodStuffs', 'pageItemRangeDisplay', 'totalRelatedFoodStuffItems', 'foodStuffListItemsLength'));
    }

    public function storeFilterByCategory($category){
        $foodStuffs = FoodStuff::where('category', 'like', '%' . strtolower($category) . '%')->cursorPaginate(50);
        if ($foodStuffs->isEmpty()) {
            return redirect()->back();
        }
        $pageItemRangeDisplay = '';
        $totalRelatedFoodStuffItems = '';
        $foodStuffListItemsLength = '';


        return view('main.store', compact('foodStuffs', 'pageItemRangeDisplay', 'totalRelatedFoodStuffItems', 'foodStuffListItemsLength'));
    }


    public function activities(){
        $activities = Activity::paginate(20);
        return view('main.activities', compact('activities'));
    }
    public function affiliate(){
        return view('main.affiliate');
    }

    public function blog(){
        $blogPosts = Blogpost::all();
        return view('main.blog', compact('blogPosts'));
    }
    public function buynow(){
        return view('main.buynow');
    }
    public function cart(){
        $cart = Cart::paginate(10);
        $cartItemCount = '';
        $shippingCost = '';
        $cartTotal = '';
        return view('main.cart', compact('cart', 'cartItemCount', 'shippingCost', 'cartTotal'));
    }
    public function checkout(){
        $cart = Cart::paginate(10);
        $appDefault = Appdefault::all();
        $cartItemCount = '';
        $address = Address::where('UUID', auth()->user()->UUID)->first();
        if($address == null){
            $pick_up_address = null;
        } else {
            $pick_up_address = $address->Address;
        }
        // dd($cart);
        return view('main.checkout', compact('cart','cartItemCount', 'appDefault', 'pick_up_address'));
    }
    // save delivery address
    public function saveDeliveryAddress(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'Address' => 'required',
            'UUID' => 'nullable',
        ]);

        $address = Address::firstOrNew(['UUID' => $request->UUID]);
        $address->Address = $request->Address;
        $address->save();

        return redirect()->back()->with('success', 'Address added successfully');
    }

    public function contact(){
        return view('main.contact');
    }
    public function sendContactEmail(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'company' => 'nullable|string',
            'phone' => 'nullable|string',
            'department' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Save the email details to the database
        ContactEmail::create($validatedData);

        // Send email to multiple recipients
        $recipients = ['email1@example.com', 'email2@example.com', 'email3@example.com']; // Add your recipients here
        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new ContactMail($validatedData));
        }

        return back()->with('successMessage', 'Your message has been sent successfully!');
    }
    public function cookie(){
        return view('main.cookie');
    }
    public function edit_profile(){
        return view('main.edit_profile');
    }
    public function error404(){
        return view('main.error404');
    }
    public function eula(){
        return view('main.eula');
    }
    public function help_center(){
        $model = [''];
        return view('main.help_center', compact('model'));
    }
    public function last_purchase(){
        $model = [''];
        return view('main.last_purchase', compact('model'));
    }

    public function logistics(){
        $model = [''];
        return view('main.logistics', compact('model'));
    }
    public function likes(){
        $model = [''];
        return view('main.likes', compact('model'));
    }

    public function manageaddress(){
        return view('main.manage_address');
    }
    public function manageinvoice(){
        $ViewBag = [''];
        return view('main.manage_invoice', compact('ViewBag'));
    }

    public function managerestaurants(){
        return view('main.manage_restaurants');
    }
    public function searchfoodstuff(Request $request){

        $foodStuffs =  FoodStuff::latest()->filter($request(["category", "keyboard"]))->get()::paginate(50);
        $pageItemRangeDisplay = '';
        $totalRelatedFoodStuffItems = '';
        $foodStuffListItemsLength = '';
        return view('main.store', compact('foodStuffs', 'pageItemRangeDisplay', 'totalRelatedFoodStuffItems', 'foodStuffListItemsLength'));
    }
    public function restaurant(){
        return view('main.open_restaurant');
    }
    public function ourapp(){
        return view('main.ourapp');
    }
    public function ourstory(){
        return view('main.ourstory');
    }
    public function privacy(){
        return view('main.privacy');
    }

    public function refund(){
        return view('main.refund');
    }
    public function requestinvoice(){
        $FoodStuffs = FoodStuff::paginate(15);
        $selectedRIProduct = '';
        return view('main.requestinvoice', compact('FoodStuffs', 'selectedRIProduct'));
    }
    public function shippingpolicy(){
        return view('main.shippingpolicy');
    }

    public function signin(){
        return view('auth.login');
    }
    public function signup(){
        return view('auth.register');
    }

    public function statistics(){
        return view('main.statistics');
    }

    public function storedistribution(){
        $isWebView = '';
        return view('main.store_distribution', compact('isWebView'));
    }

    public function storereset(){
        return view('main.store_reset');
    }
    public function success(){
        return view('main.success');
    }

    public function terms(){
        $foodStuffStore = FoodStuff::paginate(15);
        return view('main.terms', compact('foodStuffStore'));
    }
    public function topup(){
        $Model = [''];
        return view('main.topup', compact('Model'));
    }
    
    public function showShoppingPage(Request $request)
    {
        $foodstuffs = FoodStuff::all();
        $item = '';
        if ($request->item) {
            $item = $request->item;
            $foodstuffs = FoodStuff::where(function ($query) use ($item) {
                $query->where('name', 'like', '%' . $item . '%')
                    ->orWhere('category', 'like', '%' . $item . '%');
            })->get();
        }
        $shoppingLists= collect([]);
        if (auth()->check()) {
            $shoppingLists = NewShoppingList::where('UUID', auth()->user()->UUID)->get();
        }
        // dd($shoppingLists);

        return view('main.shopping_list', compact('foodstuffs', 'item', 'shoppingLists'));
    }

    public function getShoppingList()
    {
        $shoppingLists= collect([]);
        if (auth()->check()) {
            $shoppingLists = NewShoppingList::where('UUID', auth()->user()->UUID)->get();
        }
    }
    
    public function manageShoppingList(Request $request)
    {
        $foodstuff = FoodStuff::find($request->foodstuff);

        if (!$foodstuff) {
            return response()->json(['error' => 'Product not found: '. $request->foodstuff], 404);
        }

        // Get the authenticated user's UUID
        $userUUID = auth()->user()->UUID;

        // Find or create a shopping list item with the given product_id and user UUID
        $shoppingListItem = NewShoppingList::updateOrCreate(
            ['product_id' => $foodstuff->ID, 'UUID' => $userUUID],
            [
                'name' => $foodstuff->Name,
                'quantity' => \DB::raw('quantity + 1'), // Increase quantity by 1
                'image' => $foodstuff->Image,
                'price' => $foodstuff->Price,
            ]
        );

        // Return a success response
        return response()->json(['message' => 'Item has been added to your Shopping List']);
    }

    public function deleteShoppingListItem(Request $request, $id)
    {
        // Get the authenticated user's UUID
        $userUUID = auth()->user()->UUID;

        // Find the shopping list item with the given ID and user UUID
        $shoppingListItem = NewShoppingList::where('id', $id)->where('UUID', $userUUID)->first();

        // Check if the item exists
        if ($shoppingListItem) {
            // Delete the item
            $shoppingListItem->delete();

            return redirect()->back()->with('message', 'Item has been removed from your Shopping List!');
        } else {
            return redirect()->back()->with('error', 'Item not found in your Shopping List.');
        }
    }

    public function updateShoppingListItem(Request $request, $id)
    {
        // Get the authenticated user's UUID
        $userUUID = auth()->user()->UUID;

        // Find the shopping list item with the given ID and user UUID
        $shoppingListItem = NewShoppingList::where('id', $id)->where('UUID', $userUUID)->first();
        // Check if the item exists
        if ($shoppingListItem) {
            // update the item
            $shoppingListItem->quantity = $request->quantity;
            $shoppingListItem->price = $request->price;
            $shoppingListItem->save();

            return redirect()->back()->with('message', 'Item has been updated!');
        } else {
            return redirect()->back()->with('error', 'Item not found in your Shopping List.');
        }
    }

}
