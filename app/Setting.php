<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $fillable = [
		'website_title', 'logo', 'favicon', 'about_us', 'copyright', 'email', 'phone', 'mobile', 'fax', 'address_line_one', 'address_line_two', 'state', 'city', 'zip', 'country', 'map_iframe', 'facebook', 'twitter', 'google_plus', 'linkedin', 'home_page_content', 'featured_image', 'meta_title', 'meta_keywords', 'meta_description', 'gallery_meta_title', 'gallery_meta_keywords', 'gallery_meta_description',
	];
}
