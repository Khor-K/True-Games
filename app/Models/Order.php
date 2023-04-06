<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'created_at'];
    const STATUS_NEW = 'Новый';
    const STATUS_CONFIRMED = 'Подтвержденный';
    const STATUS_CANCELLED = 'Отмененный';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    public static function getStatuses()
    {
        return [
            'new' => self::STATUS_NEW,
            'confirmed' => self::STATUS_CONFIRMED,
            'cancelled' => self::STATUS_CANCELLED,
        ];
    }
}
