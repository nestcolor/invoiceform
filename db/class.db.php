<?php


/**
 * Class DB
 *
 * interaction from DB SQLite3
 *
 * @param $path
 * @param $db_name
 */
class DB {
    /** path to the folder of BD file
     *
     * @var
     */
    private $path;
    /** db file name
     *
     * @var
     */
    private $db_name;
    /** exemplar class SQLite3 (need for install)
     *
     * @var SQLite3
     */
    public $db;

    /** construct method
     *
     * @param $path
     * @param $db_name
     */
    function __construct($path, $db_name){
        $this->path = $path;
        $this->db_name = $db_name;
        $this->db = new SQLite3($this->path.DIRECTORY_SEPARATOR.$this->db_name);
        $this->create_table();
        return $this->db;
    }

    /** create table if not exist
     *
     */
    private function create_table(){

        $sql = "CREATE TABLE IF NOT EXISTS mails ( id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                company TEXT NULL,
                contactName TEXT NULL,
                contactMail TEXT NULL,
                invoiceCenter TEXT NULL,
                payment TEXT NULL,
                dMessage TEXT NULL,
                bookLike TEXT NULL,
                yMessage TEXT NULL,
                attention INTEGER NULL,
                date TEXT NULL)";

        $this->db->query($sql);
    }

    /** save mail post
     *
     * @param $post
     */
    function add_mail($post){
       $date = time();
       $sql = "
            INSERT INTO mails (
            company,
            contactName,
            contactMail,
            invoiceCenter,
            payment,
            dMessage,
            bookLike,
            yMessage,
            attention,
            date
            )
          VALUES (
            '{$post['company']}',
            '{$post['contactName']}',
            '{$post['contactMail']}',
            '{$post['invoiceCenter']}',
            '{$post['payment']}',
            '{$post['dMessage']}',
            '{$post['bookLike']}',
            '{$post['yMessage']}',
            '{$post['attention']}',
            '$date') ";

        $this->db->query($sql);
    }

    /** get list of attr to send browser and show in datalist
     *
     * @return array
     */
    function list_company(){
        $sql ="select company, contactName, contactMail FROM mails group by company";
        $list = $this->db->query($sql);
        $arr = array();
        while ($row = $list->fetchArray(SQLITE3_ASSOC)) {
            if($row['company']){
                $arr[] = $row;
            };
        }
        return $arr;
    }
}