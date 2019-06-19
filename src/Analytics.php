<?php

namespace CungHocVui\Analytics;

class Analytics {

    protected $client;
    protected $viewId;

    public function __construct(AnalyticsClient $client)
    {
        $this->client = $client->create();
        $this->viewId = ANALYTIC['view_id'];
    }

    public function analysisPagePath(){
        $responses = $this->performQuery(
            '7daysAgo',
            "today",
            'ga:pageViews, ga:uniquePageviews, ga:avgTimeOnPage, ga:entrances, ga:exitRate ,ga:exits, ga:pageValue',
            array(
                'dimensions' => 'ga:pagePath '
            )
        );
        $result = collect($responses['rows'] ?? [])->map(function ($response){
            return [
                'page_path' => $response[0],
                'page_view' => $response[1],
                'unique_page_view' => $response[2],
                'time_page' => $response[3],
                'entrance' => $response[4],
                'exit_rate' => $response[5],
                'exits' => $response[6],
                'page_value' => $response[7]
            ];
        });
        return $result;
    }

    public function searchPagePath($path){
        $responses = $this->performQuery(
            '7daysAgo',
            "today",
            'ga:pageViews, ga:uniquePageviews, ga:avgTimeOnPage, ga:entrances, ga:exitRate ,ga:exits, ga:pageValue',
            array(
                'dimensions' => 'ga:pagePath ',
                'filters' => 'ga:pagePath%3D%3D'.$path
            )
        );
        $result = collect($responses['rows'] ?? [])->map(function ($response){
            return [
                'page_path' => $response[0],
                'page_view' => $response[1],
                'unique_page_view' => $response[2],
                'time_page' => $response[3],
                'entrance' => $response[4],
                'exit_rate' => $response[5],
                'exits' => $response[6],
                'page_value' => $response[7]
            ];
        });
        return $result;
    }

    public function performQuery($startTime, $endTime, $metrics, array $other = []){
        return $this->client->data_ga->get(
            "ga:".$this->viewId,
            $startTime,
            $endTime,
            $metrics,
            $other
        );
    }
}