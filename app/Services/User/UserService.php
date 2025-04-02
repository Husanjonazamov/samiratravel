<?php
/**
 * Created by Maxamadjonov Jaxongir.
 * User: Php
 * Date: 02.01.2021
 * Time: 19:37
 */

namespace App\Services\User;



use App\Models\Expert;
use App\Models\Image;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService
{
    /**
     * @var Image
     */
    private $image;
    public $data;
    public function __construct()
    {
        $this->image = new Image();
    }

    public function getUserList($role_id = false)
    {
        $this->data =User::query()
            ->orderBy('id', 'desc')
            ->get();
    }

    public function all($role_id = false)
    {
        return User::with('role')
            ->latest('id')
            ->roleId($role_id)
            ->get();
    }

    public function create(array $attributes)
    {
        if (array_key_exists('password', $attributes))
            $attributes['password']=Hash::make($attributes['password']);
        if (array_key_exists('phone', $attributes) && empty($attributes['login']))
            $attributes['login'] = $attributes['phone'];
        $user = User::create($attributes);
        if (array_key_exists('role_id', $attributes))
            switch ($attributes['role_id']){
                case 2:
                    Expert::create([
                        'user_id' => $user->id,
                       'science_ids'=>[$attributes['science']]
                    ]);break;
                case 3:
                    Teacher::create([
                        'user_id' => $user->id,
                        'science_ids'=>[$attributes['science']]
                    ]);break;
            }
        if (array_key_exists('avatar', $attributes)) {
            $file = $this->image->uploadFile($attributes['avatar'], 'users');

            $user->avatar()->create([
                'url' => '/' . $file
            ]);
        }


        return $user;
    }

    public function update(array $attributes, User $user)
    {
        $user->update($attributes);
        if (array_key_exists('avatar', $attributes)) {
            if ($user->avatar()->exists()) {
                $user->avatar->removeFile();
                $user->avatar()->delete();
            }

            $file = $this->image->uploadFile($attributes['avatar'], User::Teacher);
            $user->avatar()->create([
                'url' => '/' . $file
            ]);
            $user->load('avatar');
        }
        return $user;
    }



    /**
     * @param string $phone
     * @return User
     * @throws UserNotFoundException
     */
    public function generateToken(string $phone)
    {
        /**
         * @var User $user
         */
        $user = User::query()->where(['phone' => $phone])->get()->first();
        if ($user === null) {
            throw new UserNotFoundException(__('messages.not_found'));
        }
        $this->confirmPhoneUser($user);
        $token = $user->createToken($phone);
        $user->auth_token = $token->plainTextToken;
        return $user;
    }

    /**
     * @param User $user
     */
    private function confirmPhoneUser(User $user)
    {
        $user->phone_verified_at = now();
        if (!in_array($user->status, [UserStatusEnum::ACTIVE, UserStatusEnum::BLOCKED], true)) {
            //todo bu yerda birinchi registratsiyadagi cupon beriladi
            $user->status = UserStatusEnum::ACTIVE;
            $user->update();
        }
    }

    public function delete(User $user)
    {
        return $user->delete();
    }

}
