<?php

namespace App\Models;

use App\Models\Scopes\NewsScope;
use App\Untils\UploadBase64;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * @property string|UploadedFile $thumbnail
 * @property string $title
 * @property string $body
 * @property string $description
 * @property int $type_id
 * @property int $draft
 * @property int $pin
 */
class News extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected static function boot(): void
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }

    protected $table = 'news';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setSlugAttribute(): void
    {
        $this->attributes["slug"] = Str::slug($this->title);
    }

    public function setThumbnailAttribute(UploadedFile|string $value): void
    {
        $attribute_name = "thumbnail";
        $disk = "uploads";
        $destination_path = "news";
        if ($value instanceof UploadedFile) {
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = $value->getClientOriginalName());
            $this->attributes["thumbnail"] = "/uploads/news/" . $value->getClientOriginalName();
        } else {
            if (str_contains($value, "base")) {
                $this->attributes["thumbnail"] = "uploads/news/" . UploadBase64::run($value, "/news/", $this->title ?? null);
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "author_id", "id");
    }

    public function Tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, "news_tag", "news_id", "tag_id");
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
