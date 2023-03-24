<?php
class Home_model extends Mmodel{

    public function __construct(){
        parent::__construct();
    }

    //Fetch Data Dynamically

    /**
     * @throws Exception
     */
    public function fetch()
    {

//        $this->db->select('id,name');
        $this->db->select('id,txn_id');
//        $this->db->table('table');
//        $this->db->join('table2', 'table2.id = table.table2_id', 'left');
//        $this->db->where('category', 'fruit');
//        $this->db->group_start();
//        $this->db->where('price <', 10);
//        $this->db->or_where('quantity >', 20);
//        $this->db->group_start();
        $this->db->like('txn_id', 'some');
//        $this->db->group_end();
        $this->db->order('id', 'desc');
        $query = $this->db->execute('transactions');
        print_r($query->fetch());
        exit();

        return [
                'obj' => $result->fetch(),
                'arr' => $result->fetch_array(),
                'count' => $result->count()
            ];

        $query = $this->db->buildFetchQuery('table', 10, 20);
        print_r($query);

//        $this->db->where('id', 1);
//        return $this->db->insert('transactions', ['status' => 'status']);
    }
}
?>
