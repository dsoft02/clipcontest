<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AllowedEmailDomain implements ValidationRule
{
    protected $allowedDomains;

    public function __construct()
    {
        $settings = getSetting('whitelist_domains', getDefaultDomains());
        $this->allowedDomains = array_map('trim', explode(',', $settings));
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Extract the domain from the email
        $domain = substr(strrchr($value, "@"), 1);

        // Check if the domain is in the allowed list
        if (!in_array($domain, $this->allowedDomains)) {
            $allowedDomainsString = implode(', ', $this->allowedDomains);
            $fail('The ' . $attribute . ' must be a valid email address from an allowed domain. Allowed domains are: ' . $allowedDomainsString);
        }
    }
}
