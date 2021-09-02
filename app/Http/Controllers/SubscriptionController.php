<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\subscription;
use App\Models\webSite;

class SubscriptionController extends Controller
{

    public function index()
    {
        $webSites = WebSite::all();

        return view('index', [
            'webSites' => $webSites,
        ]);
    }

    /**
     * @param SubscriptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(SubscriptionRequest $request)
    {
        $model = new Subscription();
        $model->user_email = $request->email;
        $model->website_id = $request->id;
        $model->save();

        return redirect()->back()->with('message', 'Success');
    }
}
