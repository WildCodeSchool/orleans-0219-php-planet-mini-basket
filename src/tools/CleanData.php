<?php


namespace App\tools;

class CleanData
{
    private $data;


    public function __construct($param)
    {
        $this->data = $param;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
    public function trimData(): array
    {
        $cleanData=[];
        foreach ($this->data as $key => $value) {
            $cleanValue = trim($value);
            $cleanData[$key] = $cleanValue;
        }
        return $cleanData;
    }
}
