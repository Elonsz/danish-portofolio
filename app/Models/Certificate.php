<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'issuer', 'date', 'credential_id', 'image_url', 'image_path', 'badge', 'description'])]
class Certificate extends Model {}
