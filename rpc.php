<?php 
require_once("inc/rpc.inc");

$rpc = new rpc;

$host = simplexml_load_file("php://input");

if ($rpc->auth($host))
{
    if (!$rpc->exist_host())
    {
        $id = $rpc->add_host();
        if ($id != False)
        {
            $rpc->xmlSigningKey();
        }
        else
            printf ("Error, no se ha añadido el host");
    }
    else
    {
            $rpc->xmlSigningKey();
    }

    $rpc->xmlRepeat_sec();
    $rpc->xmlPreferences();
    $rpc->xmlOpaqueID();
    $projects = $rpc->projects();
    foreach ($projects as $project)
    {
        $rpc->xmlProject($project);
    }
    echo $rpc->dom->saveXML();
}
?>
