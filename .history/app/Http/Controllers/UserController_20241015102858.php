<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserData::paginate(2);
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $data = new UserData();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = UserData::find($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = UserData::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = UserData::find($id);
        $data->delete();
        return redirect()->route('user');
    }

    /* 
    
1. ########## Selecting Records ##############

    $users = DB::table('users')->get();

2.#################  Adding a Where Clause ###############

    $users = DB::table('users')
            ->where('status', 'active')
            ->get();

3.###################  Using Joins #################

    $users = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'orders.order_date')
            ->get();

4. ############ Aggregates ############
You can use aggregation methods like count(), max(), min(), avg(), and sum().

    $total = DB::table('orders')->count();
    $maxPrice = DB::table('orders')->max('price');

5.############  Inserting Data ############ 

    DB::table('users')->insert([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('password'),
    ]);

6.############  Updating Data ############

    DB::table('users')
        ->where('id', 1)
        ->update(['name' => 'Updated Name']);

7. ############ Deleting Data ############ 

    DB::table('users')
        ->where('id', 1)
        ->delete();

1. ############ Pagination ############

    $users = DB::table('users')->paginate(10);

2.############ Ordering Results ############

    $users = DB::table('users')
                ->orderBy('created_at', 'desc')
                ->get();


3. ############ Grouping Results ############

    $users = DB::table('users')
                ->select(DB::raw('count(*) as user_count, status'))
                ->groupBy('status')
                ->get();

 4. ############ Raw Expressions ############

    $users = DB::table('users')
                ->select(DB::raw('COUNT(*) as total_users'))
                ->whereRaw('age > ?', [25])
                ->get();
    */
}
