<?php


class Region
{
    public $region_id;
    public $region_name;

    /**
     * Region constructor.
     * @param $region_id
     * @param $region_name
     */
    public function __construct($region_id, $region_name)
    {
        $this->region_id = $region_id;
        $this->region_name = $region_name;
    }




    public static function all() {
        $list = [];
        $req = Database::query("SELECT * FROM regions");
        foreach($req as $region) {
            $list[] = new Region($region['region_id'], $region['region_name']);
        }
        return $list;
    }

    public static function find($region_id) {
        //$region_id = intval($region_id);
        $req = Database::query("SELECT * FROM regions WHERE region_id = $region_id");
        $region = $req[0];
        return new Region($region['region_id'], $region['region_name']);
    }

    public static function save($region_id, $region_name)
    {
        return Database::query("INSERT INTO regions (region_id, region_name) VALUES ($region_id, '$region_name')");
    }

    public static function update($region_id, $region_name)
    {
        return Database::query("UPDATE regions SET region_id = $region_id, region_name = '$region_name'  WHERE region_id = $region_id");
    }

    public static function delete($region_id)
    {
        return Database::query("DELETE FROM regions WHERE region_id = '$region_id'");
    }


}