<?php

namespace CungHocVui\Analytics;

class AnalyticsClient{

    protected $keyFileLocation;
    protected $applicationName;
    protected $scope;

    public function __construct()
    {
//        $file_location = __DIR__ . "/../analytics/" .API_CLIENT['key_file_location'];
        $file_location = __DIR__ ."/../".API_CLIENT['key_file_location'];
        $this->keyFileLocation = $file_location;
        $this->applicationName = API_CLIENT['application_name'];
        $this->scope = API_CLIENT['scope'];
    }

    public function create(){
        $client = new \Google_Client();
        $client->setApplicationName($this->applicationName);
        $client->setAuthConfig($this->keyFileLocation);
        $client->setScopes($this->scope);

        return new \Google_Service_Analytics($client);
    }
}