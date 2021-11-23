<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Customers;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Helpers\Helpers;


class AfterAuthenticateJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $shopDomain;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shopDomain)
    {
        $this->shopDomain = $shopDomain['name'];
        // $this->shopDomain = Request('shop');

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop = User::where('name', $this->shopDomain)->firstOrFail();
        $shop_name=$shop->name;
           
        $setting_check = Setting::where('store_name',$shop_name)->get()->first();
        // dd($shop);
        if($setting_check===null){
            $setting = new Setting;
            $setting->file_path = '1637219837.svg';
            $setting->top_heading = 'Up to 70% off Must-Have Brandss';
            $setting->list_item = 'New sales every day,Valentino Vince & more,FREE membership';
            $setting->store_name = $shop_name;
            $setting->email = 'customer@gmail.com';
            $setting->button = 'Continue';
            $setting->head_background = ' #FFFFFF';
            $setting->top_heading_color = 'black';
            $setting->top_heading_font = 'Halveta';
            $setting->list_items_color = 'black';
            $setting->list_items_font = 'Halveta';
            $setting->button_colors = 'red';
            $setting->tags_shop = '["home"]';
            $setting->weekday = '7';
            $setting->save();
        }
        //Update User data
        if($setting_check!=null){
            return response('already',200);
        }
          
    }
}
