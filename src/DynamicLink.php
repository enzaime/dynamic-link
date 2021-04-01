<?php

namespace Enzaime\DynamicLink;

use Exception;

class DynamicLink
{
    /**
     * Generate firebase dynamic link
     *
     * @param string $link
     * @param string $domainUriPrefix
     * @param string $suffixOption
     * @return string
     */
    public function generate(string $link, ?string $domainUriPrefix = null, $suffixOption = "SHORT")
    {
        $url = $this->getUrl();

        $data = [
            "dynamicLinkInfo" => [
                "domainUriPrefix" => $this->getDomainUriPrefix($domainUriPrefix),
                "link" => $link,
                "androidInfo" => [
                    "androidPackageName" => $this->getAndroidPackageName()
                ],
                "iosInfo" => [
                    "iosBundleId" => $this->getIosBundleId()
                ],
            ],
            "suffix" => ["option" => $suffixOption]
        ];

        $headers = array('Content-Type: application/json');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $data = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($data);

        if (isset($response->error)) {
            throw new LinkGenerationException($response->error->message, $response->error->code);
        } else {
            return $response->shortLink;
        }
    }

    private function getDomainUriPrefix(?string $domainUriPrefix)
    {
        $domainUriPrefix = $domainUriPrefix ?: config('dlink.firebase_domain_uri_prefix');

        if (!$domainUriPrefix) {
            throw new LinkGenerationException('Firebase domain uri prefix can not be null', 400);
        }

        return $domainUriPrefix;
    }
    
    private function getApiKey()
    {
        $apiKey = config('dlink.firebase_api_key');

        if (!$apiKey) {
            throw new LinkGenerationException('Firebase API key is null. Please setup FIREBASE_API_KEY environment variable', 400);
        }

        return $apiKey;
    }

    private function getUrl()
    {
        $url = config('dlink.firebase_url');
        
        if (!$url) {
            throw new LinkGenerationException('Firebase REST API Url is null. Please setup FIREBASE_URL environment variable', 400);
        }

        return "$url?key={$this->getApiKey()}";
    }

    private function getAndroidPackageName()
    {
        return config('dlink.firebase_android_package_name');
    }

    private function getIosBundleId()
    {
        return config('dlink.firebase_ios_bundle_id');
    }
}
