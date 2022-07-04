<?php
	/* Template name: Test Page */

    $client = getClient();
    // var_dump($client);
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = '1Nks3FIz1eXX0GayTGkQ5aXtur_ea-TV67TLgfcZJSEY';
    $range = "Sheet1!A2:B";
    $values = [
        ["a", "b"]
    ];
    $valueRange= new Google_Service_Sheets_ValueRange([
            'values' => $values
    ]);
    $conf = ["valueInputOption" => "RAW"];
    $service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $conf);
    