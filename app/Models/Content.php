<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ContentMedia;


class Content extends Model
{
    /**
     * Les attributs qui peuvent être remplis en masse.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'type', 'admin_id', 'auteur'];

    /**
     * Relation avec l'administrateur qui a créé le contenu.
     *
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Relation avec les médias associés au contenu.
     *
     * @return HasMany
     */
// app/Models/Content.php
public function media()
{
    return $this->hasMany(ContentMedia::class);
}
}