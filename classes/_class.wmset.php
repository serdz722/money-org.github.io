<?PHP

class wmset{


	var $sets = array( array() );

	public function __construct(){
	
		# ��� 1
		$this->sets[1]["min_sum"] = 50;
		$this->sets[1]["desc"] = "�� 50 �� 99 RUB";
		$this->sets[1]["t_a"] = 1;
		$this->sets[1]["t_b"] = 0;
		$this->sets[1]["t_c"] = 0;
		$this->sets[1]["t_d"] = 0;
		$this->sets[1]["t_e"] = 0;
                $this->sets[1]["t_f"] = 0;
                
		
		# ��� 2
		$this->sets[2]["min_sum"] = 100;
		$this->sets[2]["desc"] = "�� 100 �� 249 RUB";
		$this->sets[2]["t_a"] = 2;
		$this->sets[2]["t_b"] = 1;
		$this->sets[2]["t_c"] = 0;
		$this->sets[2]["t_d"] = 0;
		$this->sets[2]["t_e"] = 0;
                $this->sets[2]["t_f"] = 0;
            
		
		# ��� 3
		$this->sets[3]["min_sum"] = 250;
		$this->sets[3]["desc"] = "�� 250 �� 499 RUB";
		$this->sets[3]["t_a"] = 3;
		$this->sets[3]["t_b"] = 2;
		$this->sets[3]["t_c"] = 0;
		$this->sets[3]["t_d"] = 0;
		$this->sets[3]["t_e"] = 0;
                $this->sets[3]["t_f"] = 0;
               
		
		# ��� 4
		$this->sets[4]["min_sum"] = 500;
		$this->sets[4]["desc"] = "�� 500 �� 999 RUB";
		$this->sets[4]["t_a"] = 5;
		$this->sets[4]["t_b"] = 1;
		$this->sets[4]["t_c"] = 1;
		$this->sets[4]["t_d"] = 0;
		$this->sets[4]["t_e"] = 0;
                $this->sets[4]["t_f"] = 0;
               
		# ��� 5
		$this->sets[5]["min_sum"] = 1000;
		$this->sets[5]["desc"] = "�� 1000 �� 2499 RUB";
		$this->sets[5]["t_a"] = 7;
		$this->sets[5]["t_b"] = 3;
		$this->sets[5]["t_c"] = 2;
		$this->sets[5]["t_d"] = 0;
		$this->sets[5]["t_e"] = 0;
                $this->sets[5]["t_f"] = 0;
                

                # ��� 6
		$this->sets[6]["min_sum"] = 2500;
		$this->sets[6]["desc"] = "�� 2500 �� 4999 RUB";
		$this->sets[6]["t_a"] = 11;
		$this->sets[6]["t_b"] = 3;
		$this->sets[6]["t_c"] = 3;
		$this->sets[6]["t_d"] = 1;
		$this->sets[6]["t_e"] = 0;
                $this->sets[6]["t_f"] = 0;
               

                # ��� 7
		$this->sets[7]["min_sum"] = 5000;
		$this->sets[7]["desc"] = "�� 5000 �� 9999 RUB";
		$this->sets[7]["t_a"] = 18;
		$this->sets[7]["t_b"] = 5;
		$this->sets[7]["t_c"] = 1;
		$this->sets[7]["t_d"] = 2;
		$this->sets[7]["t_e"] = 1;
                $this->sets[7]["t_f"] = 0;
                
		
		# ��� 8
		$this->sets[8]["min_sum"] = 10000;
		$this->sets[8]["desc"] = "�� 10000 RUB";
		$this->sets[8]["t_a"] = 22;
		$this->sets[8]["t_b"] = 4;
		$this->sets[8]["t_c"] = 4;
		$this->sets[8]["t_d"] = 3;
		$this->sets[8]["t_e"] = 2;
                $this->sets[8]["t_f"] = 0;
               
	
	}
	
	
	function SetsList(){
		
		unset($this->sets[0]);
		return $this->sets;
	
	}
	
	
	function GetSet($sum){
		$sum = $sum +1;
		$my_array = array_reverse( $this->SetsList() );
		
		foreach($my_array as $key => $value){
		
			if($sum >= $value["min_sum"]) return $value;
		
		}
		
	}
	
}


?>