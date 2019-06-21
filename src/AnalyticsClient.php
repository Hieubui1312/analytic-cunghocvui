<?php

namespace CungHocVui\Analytics;

class AnalyticsClient{

    protected $keyFileLocation;
    protected $applicationName;
    protected $scope;

    public function __construct($keyFileLocation, $applicationName, $scope)
    {
        $this->keyFileLocation = $keyFileLocation;
        $this->applicationName = $applicationName;
        $this->scope = $scope;
    }

    public function create(){
        $client = new \Google_Client();
        $client->setApplicationName($this->applicationName);
        $client->setAuthConfig($this->keyFileLocation);
        $client->setScopes($this->scope);

        return new \Google_Service_Analytics($client);
    }
}