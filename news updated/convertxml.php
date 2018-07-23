<?php
    require 'config.php';
  
	header('Content-type: text/xml');
    $sql = "select * from test order by id desc";
    $res = mysqli_query($conn, $sql);

    $xml = new XMLWriter();

    $xml->openURI("php://output");
    $xml->startDocument();
    $xml->setIndent(true);

    $xml->startElement('all_news');

    while ($row = mysqli_fetch_assoc($res)) {
      $xml->startElement("news");
      $xml->writeElement("id", $row['id']);
      $xml->writeElement("headline", $row['heading']);
      $xml->writeElement("body", $row['summertext']);
	  $xml->writeElement("creationTime", $row['datetime']);
      $xml->endElement();
    }
    $xml->endElement();

    //header('Content-type: text/xml');
    $xml->flush();

    // Free result set
    mysqli_free_result($res); 
    // Close connections
    mysqli_close($conn);
?>