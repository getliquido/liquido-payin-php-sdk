<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

class Document
{

    private ?String $documentId = null;
    private ?String $type = null;

    public function __construct(
        array $documenData
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
