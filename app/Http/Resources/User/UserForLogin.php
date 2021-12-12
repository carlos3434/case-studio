<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserForLogin extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'name' => $this->name,
            'email' => $this->email,

            'token' => isset( $this->token) ? $this->token : null,
            'token_type' => isset( $this->token_type) ? $this->token_type : null,
            'expires_at' => isset( $this->expires_at) ? $this->expires_at : null,
            'updated_at' => $this->updated_at->toDateTimeString(),
            'created_at' => $this->created_at->toDateTimeString(),
            'roles' => $this->getRoleNames(),
            'permissions' => $this->getAllPermissions()->pluck('name'),
        ];
    }
}
