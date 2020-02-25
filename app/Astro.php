<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Astro extends Model
{
		protected $fillable = ['astro_id', 'astro_name',
			'all_score', 'all_description',
			'love_score', 'love_description',
			'career_score', 'career_description',
			'money_score', 'money_description'];
}
