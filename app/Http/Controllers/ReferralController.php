<?php

namespace App\Http\Controllers;

use App\Models\User;

use Auth;
class ReferralController extends Controller
{
    public function index()
    {
        $referrals = $this->getReferrals(Auth::id(), User::all());
        $data = [
            'contacts' =>[
                'social' => [
                    'vk' => [
                        'img' => 'img/vk', 'link' => 'http://google.com.ua'
                    ],
                    'instagram' => [
                        'img' => 'img/instagram', 'link' => 'http://google.com.ua'
                    ]
                ]
            ]
        ];

        return view('cabinet.referrals.index', [
            'referrals' => $referrals,
            'data' => $data
        ]);
    }

    private function getReferrals($ref_id, $users)
    {
        $referrals = [];

        foreach ($users as $user) {
            if ($user->referral_id == $ref_id) {
                $referrals[] = [
                    'id'            => $user->id,
                    'login'         => $user->login,
                    'referral_id'   => $user->referral_id,
                    'last_activity' => $user->last_activity,
                ];
                foreach ($this->getReferrals($user->id, $users) as $item) {
                    $referrals[] = $item;
                }
            }
        }

        return $referrals;
    }
}