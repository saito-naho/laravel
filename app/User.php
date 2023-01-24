<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function scopeSearchUsers($query,$name=null,$tel=null){

            if($name){
                // 全角スペースを半角に変換
                $spaceConversion = mb_convert_kana($name, 's');
    
                // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
                $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
    
                // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
                foreach($wordArraySearched as $value) {
                    $query->where('users.name', 'like', '%'.$value.'%');
                }
            }

            if($tel){
                $tel = str_replace('-', '', $tel);
                $query->where('user_info.tel', 'like', '%'.$tel.'%');
            }
            return $query;
    }
}
