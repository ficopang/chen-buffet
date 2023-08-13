<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\Categorie;
use App\Models\DetailTransaction;
use App\Models\Foods;
use App\Models\HeaderTransaction;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function showTransaction() {
        $transactions = HeaderTransaction::paginate(10);

        // dd($transactions);
        return view('home', compact('transactions'));
    }

    public function showInsertPage() {
        $cashiers = Cashier::all();
        $paymentTypes = PaymentType::all();
        $foods = Foods::all();

        return view('transaction.insert', compact('cashiers', 'paymentTypes', 'foods'));
    }

    public function insertTransaction(Request $request) {
        $rules = [
            'invoice_number' => 'required',
            'cashier' => 'required',
            'payment_type' => 'required',
            'foods.*' => 'required',
            'quantities.*' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $transaction = new HeaderTransaction();
        $transaction->invoice_number = $request->invoice_number;
        $transaction->payment_type_id = $request->payment_type;
        $transaction->cashier_id = $request->cashier;
        $transaction->save();

        $foods = $request->foods;
        $quantities = $request->quantities;
        foreach($foods as $index => $food) {
            $detail = new DetailTransaction();
            $detail->transaction_id = $transaction->id;
            $detail->food_id = $food;
            $detail->quantity = $quantities[$index];
            $detail->save();
        }

        return redirect('/');
    }

    public function showDetail($id)
    {
        $header = HeaderTransaction::find($id);

        return view('detail', compact('header'));
    }

    public function showFood()
    {
        $foods = Foods::all();
        $categories = Categorie::all();

        return view('manage.foods', compact('foods', 'categories'));
    }

    public function showCategory()
    {
        $categories = Categorie::all();

        return view('manage.categories', compact('categories'));
    }

    public function showCashier()
    {
        $cashiers = Cashier::all();

        return view('manage.cashiers', compact('cashiers'));
    }

    public function showPaymentType()
    {
        $paymentTypes = PaymentType::all();

        return view('manage.payment-types', compact('paymentTypes'));
    }

    public function insertFood(Request $request)
    {
        $rules = [
            'image' => 'required|mimes:jpg,png',
            'name' => 'required|min:3|max:50|unique:foods',
            'price' => 'required|integer|min:1000|max:200000',
            'category' => 'required|exists:categories,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $file = $request->file('image');
        Storage::putFileAs('public/foods', $file, str_replace(" ", "-", $request->name).'.' . $file->getClientOriginalExtension());

        $food = new Foods();
        $food->image = str_replace(" ", "-", $request->name) . '.' . $file->getClientOriginalExtension();
        $food->name = $request->name;
        $food->price = $request->price;
        $food->category_id = $request->category;
        $food->save();

        return back();
    }

    public function insertPaymentType(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:25',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $payment = new PaymentType();
        $payment->name = $request->name;
        $payment->save();

        return back();
    }

    public function insertCashier(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:25',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $cashier = new Cashier();
        $cashier->name = $request->name;
        $cashier->save();

        return back();
    }

    public function insertCategory(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:25',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $category = new Categorie();
        $category->name = $request->name;
        $category->save();

        return back();
    }

    public function deletePaymentType($id)
    {
        $paymentType = PaymentType::find($id);
        $paymentType->delete();

        return back();
    }

    public function deletecashier($id)
    {
        $cashier = Cashier::find($id);
        $cashier->delete();

        return back();
    }

    public function deleteCategory($id)
    {
        $category = Categorie::find($id);
        $category->delete();

        return back();
    }

    public function deletefood($id)
    {
        $food = Foods::find($id);
        $food->delete();

        return back();
    }

    public function showEditFood($id)
    {
        $food = Foods::find($id);
        $categories = Categorie::all();

        return view('manage.edit.food', compact('food', 'categories'));
    }
    public function showEditPaymentType($id)
    {
        $paymentType = PaymentType::find($id);

        return view('manage.edit.payment-type', compact('paymentType'));
    }
    public function showEditCashier($id)
    {
        $cashier = Cashier::find($id);

        return view('manage.edit.cashier', compact('cashier'));
    }
    public function showEditCategory($id)
    {
        $category = Categorie::find($id);

        return view('manage.edit.category', compact('category'));
    }

    public function updateFood(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3|max:50|unique:foods',
            'price' => 'required|integer|min:1000|max:200000',
            'category' => 'required|exists:categories,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $food = Foods::find($id);
        if (isset($request->image)) {
            $file = $request->file('image');
            Storage::putFileAs('public/foods', $file, str_replace(" ", "-", $request->name) . '.' . $file->getClientOriginalExtension());
            $food->image = str_replace(" ", "-", $request->name) . '.' . $file->getClientOriginalExtension();
        }
        $food->name = $request->name;
        $food->price = $request->price;
        $food->category_id = $request->category;
        $food->save();

        return redirect('/manage/foods');
    }
    public function updatePaymentType(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $payment = PaymentType::find($id);
        $payment->name = $request->name;

        $payment->save();

        return redirect('/manage/payment-types');
    }
    public function updateCashier(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $cashier = Cashier::find($id);
        $cashier->name = $request->name;

        $cashier->save();

        return redirect('/manage/cashiers');
    }
    public function updateCategory(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $category = Categorie::find($id);
        $category->name = $request->name;

        $category->save();

        return redirect('/manage/categories');
    }
}
