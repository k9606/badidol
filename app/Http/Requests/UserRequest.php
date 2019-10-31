<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|between:3,25|regex:/^[\x7f-\xffA-Za-z0-9\s]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|string|email|max:100|unique:users,email,' . Auth::id(),
            'introduction' => 'max:100',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' => '头像必须是 jpeg, bmp, png, gif 格式的图片',
            'avatar.dimensions' => '图片的清晰度不够，宽和高需要 100px 及以上',
            'name.unique' => '用户名已被占用，请重新填写',
            'name.regex' => '用户名只支持中文、英文和数字。',
            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
            'name.required' => '用户名不能为空。',
        ];
    }
}
