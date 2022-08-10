<?php
namespace App;

use App\Traits\FilterByUser;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Client
 *
 * @package App
 * @property string $name
 * @property string $created_by
*/
class Client extends Model implements HasMedia
{
    use SoftDeletes,InteractsWithMedia, FilterByUser;

    protected $guarded = [];
    
    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id')->withTrashed();
    }
    public function setFolderIdAttribute($input)
    {
        $this->attributes['folder_id'] = $input ? $input : null; //testing
    }

    public function appForm()
    {
        return $this->belongsTo(Media::class, 'app_form');
    }

    public function kycForm()
    {
        return $this->belongsTo(Media::class, 'kyc_form');
    }
    public function enrollList()
    {
        return $this->belongsTo(Media::class, 'enrollment_list');
    }
    public function signedProposal()
    {
        return $this->belongsTo(Media::class, 'signed_proposal');
    }
    public function secReg()
    {
        return $this->belongsTo(Media::class, 'sec_reg');
    }
    public function articlesIncorp()
    {
        return $this->belongsTo(Media::class, 'articles_incorp');
    }
    public function byLaws()
    {
        return $this->belongsTo(Media::class, 'by_laws');
    }
    public function corpSec()
    {
        return $this->belongsTo(Media::class, 'corp_sec');
    }
    public function certList()
    {
        return $this->belongsTo(Media::class, 'cert_list');
    }
    public function validId()
    {
        return $this->belongsTo(Media::class, 'valid_id');
    }
    public function stateMent()
    {
        return $this->belongsTo(Media::class, 'statement');
    }
}
