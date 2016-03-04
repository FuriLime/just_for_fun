<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Invite extends Model
{
    protected $fillable = ['email'];


    /**
     *Return invite code only if invite code does`t used
     *
     * @param string $code
     * @return App\Invite
     */
    public static function getInviteByCode($code) {
        return Invite::where('code', $code)->where('claimed', NULL)->first();
    }


    /**
     * Generate randomize code
     */
    protected function generateInviteCode() {
        $this->code = bin2hex(openssl_random_pseudo_bytes(16));
    }


    /**
     * Send invite code to email
     *
     * @param string $message_text - текст сообщения
     */
    public function sendInvitation($message_text) {
        $inviter = User::find($this->inviter_id);
        $params = [
            'inviter' => $inviter->name,
            'message_text' => (!empty($message_text)) ? $message_text : '',
            'code' => $this->code,
        ];
        Mail::send('emails.invite', $params, function ($message) {
            $message->to($this->email)->subject('Invite to site');
        });
    }


    /**
     *
     *Belong unvite model with user`s model
     * @return type
     */
    public function inviter() {
        return $this->belongsTo('App\User', 'inviter_id');
    }


    /**
     *
     *
     * Belong model invite with model user for show who was invited
     *
     * @return type
     */
    public function invitee() {
        return $this->belongsTo('App\User', 'invitee_id');
    }


    /**
     * generate code with boot
     *
     */
    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->generateInviteCode();
        });
    }

}
