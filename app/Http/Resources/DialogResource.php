<?php

namespace App\Http\Resources;

use App\Models\Company;
use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class DialogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $message = Message::where([
            'company_id' => $this->company_id,
            'user_id' => Auth::id(),
        ])->orderBy('created_at', 'desc')->first();

        return [
            'id' => $this->company_id,
            'name' => Company::find($this->company_id)->name,
            'last_message' => new MessageResource($message)
        ];
    }
}
