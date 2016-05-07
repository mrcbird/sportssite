<?php 
/*
Simple PHP Task Queue implementation. 
Author: Raivo Ratsep http://raivoratsep.com on 6/01/2011
Version: 0.1a
*/
class Queue {
    
    public function run() {
        foreach ($this->get_tasks() as $task) {
            $result = $this->execute_script($task['run_script'], $task['method'], unserialize($task['script_params']));
            if($result === true) {
                $this->mark_complete($task['id']);
                echo "Task id {$task['id']} complete.<br>";
            } else {
                echo "Task id {$task['id']} not complete.<br>";
            }
        }
    }

    private function mark_complete($task_id) {
        $db = DB::get_instance();
        $sql = "UPDATE queue SET completed = 1, completed_datetime = NOW() WHERE id = ? LIMIT 1;";
        $db->stmtPrepare($sql);
        $db->bindParameters("i", array($task_id));
        $db->stmtExecute();             
    }   
    
    private function execute_script($script_to_run, $method, $param_array) {
        $query_string = http_build_query($param_array);
        switch ($method) {
            case 'POST': 
                $urlConn = curl_init ("http://".CRON_DIR_USERNAME.":".CRON_DIR_PASSWORD."@{$_SERVER['HTTP_HOST']}/cron/queues/{$script_to_run}.php");
                curl_setopt ($urlConn, CURLOPT_POST, 1);
                curl_setopt ($urlConn, CURLOPT_POSTFIELDS, $query_string);  //submitting an array did not work :(
            break;

            case 'GET':                 
                $urlConn = curl_init ("http://".CRON_DIR_USERNAME.":".CRON_DIR_PASSWORD."@{$_SERVER['HTTP_HOST']}/cron/queues/{$script_to_run}.php?$query_string");
                curl_setopt ($urlConn, CURLOPT_HTTPGET, 1);
            break;      
        }

        ob_start(); // prevent the buffer from being displayed
        curl_exec($urlConn);
        $raw_response = ob_get_contents();
        ob_end_clean();     
        curl_close($urlConn);       // close the connection
//echo $raw_response;       
        $result_array = json_decode($raw_response, true);
        if(isset($result_array['status'])) {
            return $result_array['status']; 
        } else {
            return -1;
        }
    }
    
    private function get_tasks() {
        $db = DB::get_instance();
        $sql = "SELECT * FROM queue WHERE completed = 0;";
        $db->stmtPrepare($sql);
        $db->stmtExecute();         
        $out = array();
        while($row = $db->stmtFetch()) {
            $out[] = $row;
        }
        return $out;
    }
    
    public static function add($run_script, Array $params, $method = 'GET') {
        $db = DB::get_instance();
        $sql = "INSERT INTO queue (run_script, script_params, inserted_datetime, task_md5_hash, method) VALUES (?,?, NOW(),?,?);";
        $db->stmtPrepare($sql);
        $serialized_params = serialize($params);
        $db->bindParameters("ssss", array($run_script, $serialized_params, md5($run_script.$serialized_params), strtoupper($method)));
        $db->stmtExecute();
    }   
    
    public static function exists($run_script, Array $params) {
        $db = DB::get_instance();
        $sql = "SELECT id FROM queue WHERE task_md5_hash = ?;";
        $db->stmtPrepare($sql);
        $serialized_params = serialize($params);
        $db->bindParameters("s", array(md5($run_script.$serialized_params)));
        $db->stmtExecute();
        if($db->stmtGetRowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
