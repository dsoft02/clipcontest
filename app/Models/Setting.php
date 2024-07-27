<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public static function getValue($key, $default = null)
    {
        return Cache::remember("setting_{$key}", 60, function() use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    // Convert settings to an object with logos parsed
    public static function getSettingsObject()
    {
        $settings = Cache::remember('general_settings', 60, function() {
            return self::all()->pluck('value', 'key')->toArray();
        });

        // Create a new instance of stdClass
        $settingsObject = new \stdClass();

        // Convert the settings array to an object
        foreach ($settings as $key => $value) {
            if (in_array($key, ['light_logo', 'dark_logo', 'light_icon', 'dark_icon', 'favicon'])) {
                // Use getLogo to retrieve the URL for logo-related settings
                $settingsObject->$key = self::getLogo($key);
            } else {
                // Directly set the value for other settings
                $settingsObject->$key = $value;
            }
        }

        return $settingsObject;
    }

    public static function getLogo($type)
    {
        $defaultPaths = [
            'light_logo' => 'assets/images/brand-logos/light_logo.png',
            'dark_logo' => 'assets/images/brand-logos/dark_logo.png',
            'light_icon' => 'assets/images/brand-logos/light_icon.png',
            'dark_icon' => 'assets/images/brand-logos/dark_icon.png',
            'favicon' => 'assets/images/brand-logos/favicon.ico',
        ];

        $logoPath = self::getValue($type);
        return $logoPath ? asset('storage/' . $logoPath) : asset($defaultPaths[$type]);
    }

    public static function isVotingEnabled()
    {
        return self::where('key', 'enable_voting')->value('value') == 1;
    }

    // Method to check if declaring winner is enabled
    public static function isDeclareWinnerEnabled()
    {
        return self::where('key', 'declare_winner')->value('value') == 1;
    }

    // Clear the cache when settings are updated
    public static function clearCache($key)
    {
        Cache::forget("setting_{$key}");
        Cache::forget('general_settings');
    }

    // Override the save method to clear cache automatically
    public function save(array $options = [])
    {
        parent::save($options);
        self::clearCache($this->key);
    }

    // Override the delete method to clear cache automatically
    public function delete()
    {
        self::clearCache($this->key);
        parent::delete();
    }
}
