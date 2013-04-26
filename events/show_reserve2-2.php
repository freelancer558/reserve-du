<?php
if(!session_id())session_start();

$server   = "localhost";
$username = "project"; 
$password = "project";
$dbname   = "project";

class SmoothCalendar {

    private $options = null,
            $get,
            $post;

    private $connection;

    function __construct($options) 
    {
        $this->connection = mysql_connect($GLOBALS["server"  ],
                                          $GLOBALS["username"],
                                          $GLOBALS["password"]);

        mysql_select_db($GLOBALS["dbname"],$this->connection);

        $this->options = array_merge(array(
            'dateFormat' => "%a %b %d %Y %H:%M:%S",
            'safe'       => true,
            'view'       => true,
            'destroy'    => false,
            'edit'       => false,
            'create'     => false,
            'update'     => false
        ), $options);
        
        $this->post = $_POST;
        $this->get  = $_GET;
    }
    
    function __destruct() 
    {
		mysql_close($this->connection);
        unset($this->connection);
    }

    public function throw_server_exception($message) 
    {
        return array("error" => $message);
    }

    public function listreserve($from, $to) 
    {
        if (!$this->options["view"]) 
            return $this->throw_server_exception("Viewing events is disabled");

        if (!isset($from) || $from == null) 
        {
			$dateInfo = getdate();
			$from     = mktime(0, 0, 0, $dateInfo["mon"], 1, $dateInfo["year"]);
        }

        if (isset($to))
        {
           $sql = "SELECT * FROM `reserve` WHERE `Date` >= '" . date('Y-m-d', $from) . "' AND `Date` <= '" . date('Y-m-d', $to) . "' ORDER BY `ID` DESC";
        }
        else
        {
           $sql = "SELECT * FROM `reserve` WHERE `Date` >= '" . date('Y-m-d', $from) . "' ORDER BY `ID` DESC";
        }
        
        $data   = array();
        $result = $this->query($sql);

        while ($row = mysql_fetch_assoc($result)) 
        {
            $q = $this->query('SELECT * FROM user WHERE UserId='.$row["user_id"]);
            $u = mysql_fetch_assoc($q);
            if($row['status'] != 'pending'  || $_SESSION['UserStatus'] == 'authority_apply'){
                $data[sizeof($data)] = array(
                    "id"        => $row["ID"],
                    "content"   => $row["DurableArticleSet"],
                    "status"    => $row["status"],
                    "date"      => strftime($this->options["dateFormat"] ,strtotime($row["Date"])),
                    "end_date"  => strftime($this->options["dateFormat"] ,strtotime($row["end_date"])),
                    "user_id"   => $row["user_id"],
                    "fullname" => $u['UserFullname'],
                );            
            }
        }

  		return $data;
    }

    public function listreserveByGroupId($from, $to) 
    {
        if (!$this->options["view"]) 
            return $this->throw_server_exception("Viewing events is disabled");

        if (!isset($from) || $from == null) 
        {
            $dateInfo = getdate();
            $from     = mktime(0, 0, 0, $dateInfo["mon"], 1, $dateInfo["year"]);
        }

        if (isset($to))
        {
            $sql = "SELECT * FROM `reserve` WHERE `Date` >= '" . date('Y-m-d', $from) . "' AND `Date` <= '" . date('Y-m-d', $to) . "' AND status = 'approved'
			OR status = 'reject' GROUP BY `group_id` DESC";
          $product = "SELECT * FROM `reserve` WHERE `Date` >= '" . date('Y-m-d', $from) . "' AND `Date` <= '" . date('Y-m-d', $to) . "' AND  status = 'approved' OR status = 'reject' ORDER BY `group_id` DESC";
        }
        else
        {
           $sql = "SELECT * FROM `reserve` WHERE `Date` >= '" . date('Y-m-d', $from) . "' AND status = 'approved' OR status = 'reject' GROUP BY `group_id` DESC";
           $product = "SELECT * FROM `reserve` WHERE `Date` >= '" . date('Y-m-d', $from) . "' AND  status = 'approved' OR status = 'reject' ORDER BY `group_id` DESC";
        }
        
        $data   = array();
        $pname  = array();
        $result = $this->query($sql);
        $product= $this->query($product);
        while($product_result = mysql_fetch_assoc($product)){
          $pname[$product_result['group_id']][] = $product_result["DurableArticleSet"];
        }
        while ($row = mysql_fetch_assoc($result)) 
        {
            $q = $this->query('SELECT * FROM user WHERE UserId='.$row["user_id"]);
            $u = mysql_fetch_assoc($q);
            //if($row['status'] != 'pending'  || $_SESSION['UserStatus'] == 'ADMIN'){
                $data[sizeof($data)] = array(
                    "id"        => $row["ID"],
                    "content"   => $row["DurableArticleSet"],
                    "status"    => $row["status"],
                    "date"      => strftime($this->options["dateFormat"] ,strtotime($row["Date"])),
                    "end_date"  => strftime($this->options["dateFormat"] ,strtotime($row["end_date"])),
                    "user_id"   => $row["user_id"],
                    "fullname"  => $u['UserFullname'],
                    "products"  => implode(",", $pname[$row["group_id"]]),
                    "group_id"  => $row["group_id"],
                );            
            //}
        }

        return $data;
    }
    
    public function removeEvent($id) 
    {
        if (!$this->options["remove"]) 
            return $this->throw_server_exception("Removing events is disabled");

        if (!$id)
            return $this->throw_server_exception("Request had a problem");
        
        $sql    = "DELETE FROM `reserve` WHERE `ID` = $id";
        $result = $this->query($sql);

        return array(
            "message" => "Removed successfully",
            "removed" => $id
        );
    }

    public function hideEvent($id) 
    {
        if (!$this->options["remove"]) 
            return $this->throw_server_exception("Removing events is disabled");

        if (!$id)
            return $this->throw_server_exception("Request had a problem");
        
        $sql    = "UPDATE `reserve` SET `show` = false WHERE `group_id` = $id";
        $result = $this->query($sql);
	
        return array(
            "message" => "Removed successfully",
            "removed" => $id
        );
    }
    
    public function getEventById($id)
    {
        if (!$this->options["view"]) 
            return $this->throw_server_exception("Viewing events is disabled");
    
        $sql    = "SELECT * FROM `reserve` WHERE `ID` = $id";
        $result = $this->query($sql);
        
        if ($result)
        {
            $row = mysql_fetch_assoc($result);
            $q = $this->query('SELECT * FROM user WHERE UserId='.$row["user_id"]);
            $u = mysql_fetch_assoc($q);
            return array(
                "id"      => $row["ID"],
                "content" => $row["DurableArticleSet"],
                "date"    => strftime($this->options["dateFormat"] ,strtotime($row["Date"])),
                "end_date"=> strftime($this->options["dateFormat"] ,strtotime($row["end_date"])),
                "user_id" => $row["user_id"],
                "fullname" => $u['UserFullname'],
            );            
        }

		return array();
    }
    
    public function editEvent($event) 
    {
        if (!$this->options["edit"])
            return $this->throw_server_exception("Editing events is disabled");
        
        $id      = $event["id"  ];
        $date    = $event["date"];
        $content = mysql_real_escape_string($event["content"]);
        
        if (!$id || !$date) 
            return $this->throw_server_exception("Request had a problem");

        if ($this->options["safe"])
            $content = $this->strip_html_tags($content);

        $sql    = "UPDATE `reserve` SET `DurableArticleSet` = '$content', `date` = '$date' WHERE `ID` = $id";  
        $result = $this->query($sql);

        return array("message" => "ทำการเปลี่ยนแปลงสถานะสำเร็จ");
    }

 public function updatereserveStatus($event)

    {

        if (!$this->options["update"])

            return $this->throw_server_exception("Update events are disabled");

        $p = $this->query('SELECT * FROM reserve WHERE ID ='. $event['id']);

        $found = mysql_fetch_assoc($p);

 //       $q_overlap = $this->query("SELECT * FROM `reserve`");

//  $num_overlap = mysql_num_rows($q_overlap);
//        if($num_overlap <= 0){
          $id      = $event["id"  ];
          $status  = $event["status"];
          $group_id= $event["group_id"];
          if (!$id || !$status) 
              return $this->throw_server_exception("Request had a problem");
          $sql    = "UPDATE `reserve` SET `status` = '$status' WHERE `group_id` = $group_id";
		  $result = $this->query($sql);
          return array("message" => "ทำการเปลี่ยนสถานะสำเร็จ");   
//          }else{
//          return array("message" => "อนุมัติเครื่องนี้แล้ว เป็นการจองทับซ้อน");   
  		  //return array("message" => "SELECT * FROM `reserve` WHERE `DurableArticleSet` =  ' ".$found['DurableArticleSet']." ' AND status = 'approved' AND Date BETWEEN DATE('".$found['Date']."') AND DATE('".$found['end_date']."')");
 //       }

	} 
    
    
    public function createEvent($event)
    {
        if (!$this->options["create"])
            return $this->throw_server_exception("Creating events are disabled");
            for($i=0; $i<count($event["content"]); $i++){
                $content = stripslashes($event["content"][$i]);
                $content = mysql_real_escape_string($content);
                $date    = $event["date"    ];
                $end_date= $event["end_date"];
                $user_id = $_SESSION["UserId"];
                $group_id= $event["group_id"];

                // return $this->checkDateTimeOverlap($content, $date, $end_date);
                 if($this->checkDateTimeOverlap($content, $date, $end_date))
                 return $this->throw_server_exception("ช่วงเวลาที่เลือกไม่ถูกต้อง");

                if (!$content || !$date) 
                    return $this->throw_server_exception("คำร้องมีปัญหา");
                
                if ($this->options["safe"])
                    $content = $this->strip_html_tags($content);
                
                $sql    = "INSERT INTO `reserve` (`DurableArticleSet`, `date`, `end_date`, `user_id`, `group_id` ) VALUES('$content','$date', '$end_date', '$user_id', '$group_id')";  
                $result = $this->query($sql);
            }
        return array("message" => "Created new event");
    }
    
    public function checkDateTimeOverlap($product, $product_start, $product_end)
    {
        $product_start = strtotime($product_start);
        $product_end = strtotime($product_end);
        $date = new DateTime();
        $current_timestamp = $date->getTimestamp();
        $sql = "SELECT * FROM `reserve` WHERE `DurableArticleSet` = '" . $product . "' AND `status` <> 'pending'";
        $query = $this->query($sql);
        if($this->num_rows($sql) > 0){
          while($result = mysql_fetch_assoc($query))
          {
              $start_at = strtotime($result['Date']);
              $end_at = strtotime($result['end_date']);
              if($product_start >= $start_at && $product_start <= $end_at){
                  return true;
              }
              if($product_end >= $start_at && $product_end <= $end_at){
                return true;  
              } 
          }
        }
      return false;
    }

    private function strip_html_tags($text)
    {
        $text = preg_replace(
            array(
              // Remove invisible content
                '@<head[^>]*?>.*?</head>@siu',
                '@<style[^>]*?>.*?</style>@siu',
                '@<script[^>]*?.*?</script>@siu',
                '@<object[^>]*?.*?</object>@siu',
                '@<embed[^>]*?.*?</embed>@siu',
                '@<applet[^>]*?.*?</applet>@siu',
                '@<noframes[^>]*?.*?</noframes>@siu',
                '@<noscript[^>]*?.*?</noscript>@siu',
                '@<noembed[^>]*?.*?</noembed>@siu',
              // Add line breaks before and after blocks
                '@</?((address)|(blockquote)|(center)|(del))@iu',
                '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
                '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
                '@</?((table)|(th)|(td)|(caption))@iu',
                '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
                '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
                '@</?((frameset)|(frame)|(iframe))@iu',
            ),
            array(
                ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
                "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
                "\n\$0", "\n\$0",
            ),
            $text );
        return strip_tags($text);
    }
    public function num_rows($query)
    {
      $result = mysql_query($query, $this->connection);
      if (!$result) 
      {
          echo 'Could not run query: ' . mysql_error();
          exit;
      }
      return mysql_num_rows($result); 
    }
    public function query($query) 
    {
        $result = mysql_query($query, $this->connection);
        if (!$result) 
        {
            echo 'Could not run query: ' . mysql_error();
            exit;
        }
        return $result;
    }
}

$calendar = new SmoothCalendar(array(
    'view'   => true,
    'remove' => true,
    'edit'   => false,
    'create' => true,
    'safe'   => false,
    'update' => true
));

?>