<?php
function formatQueryResult(object $query_result, $dataType){
    $results = array();
    if($query_result->num_rows > 1 || strtoupper($dataType) === 'ARRAY'){
        while($row = mysqli_fetch_assoc($query_result))
        {
            $results[] = $row;
        }
    }else{
        $results = mysqli_fetch_assoc($query_result);
    }
    return $results;
}

function jsonResponse(object $response) : string{
    echo json_encode($response);
    die(http_response_code($response->status_code));
}
