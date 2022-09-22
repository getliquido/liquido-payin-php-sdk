<?php

namespace LiquidoBrl\PayInPhpSdk\Model;

class Document
{

    private String $documentId = "";
    private String $type = "";

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

    public function getDocumentId()
    {
        return $this->documentId;
    }

    public function getType()
    {
        return $this->type;
    }
}
