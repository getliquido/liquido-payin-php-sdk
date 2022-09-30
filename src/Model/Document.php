<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

class Document
{

    private $documentId = null;
    private $type = null;

    public function __construct(
        $documenData = array()
    ) {
        $dataObj = (object) $documenData;

        if (property_exists($dataObj, 'documentId')) {
            $this->documentId = $dataObj->documentId;
        }

        if (property_exists($dataObj, 'type')) {
            $this->type = $dataObj->type;
        }
    }

    public function toArray()
    {
        $arrayData = array();

        if ($this->documentId != null) {
            $arrayData["documentId"] = $this->documentId;
        }

        if ($this->type != null) {
            $arrayData["type"] = $this->type;
        }

        return $arrayData;
    }
}
