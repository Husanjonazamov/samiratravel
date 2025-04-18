<?php

namespace App\Casts;


use App\Http\Request;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class TranslatableJson implements CastsAttributes
{

    /**
     * Transform the resource into an array.
     *
     * @param $model
     * @param $key
     * @param $value
     * @param $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        $arr = json_decode($value, true);
        return $arr[app()->getLocale()] ?? $arr['ru'] ?? $arr['uz'] ?? new stdClass();
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param $attributes
     * @return false|string
     */
    public function set($model, string $key, $value, $attributes)
    {
        if (!is_array($value)) {
            if (isset($attributes['name']))
                $attr = json_decode($attributes['name'], true);
            $attr[app()->getLocale()] = $value;
            return json_encode($attr);
        }
        return json_encode($value);
    }

    /**
     * Get the serialized representation of the value.
     *
     * @param $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function serialize($model, string $key, $value, array $attributes)
    {
        return json_decode($attributes[$key], true);
    }
}
