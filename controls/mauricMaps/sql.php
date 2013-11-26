<?php class sql {

function getTotal($q) { $s=""; $k="";
	$s.="SELECT ";
	$s.="sum(coalesce(SALL,0)) as SUM_SALL, ";
	$s.="sum(coalesce(RESIDENT,0)) as SUM_RESIDENT, ";
	$s.="sum(coalesce(COUNTAPARTMENT,0)) as SUM_COUNTAPARTMENT,  ";
	$s.="count(UUID) as COUNT_BUILDINGS ";
	$s.="FROM VW_BUILDINGS_WEB WHERE (1=1) ";
	if ($q->validate->direction($q)) { 
		$s.="AND (DIRECTION='".stripslashes($q->validate->toWin($q->url->f_direction))."') ";
	}
	if ($q->validate->ctp($q)) { 
		$s.="AND (CTP='".stripslashes($q->validate->toWin($q->url->f_ctp))."') ";
	}
	if ($q->validate->sector($q)) { 
		$s.="AND (SREGION='".stripslashes($q->validate->toWin($q->url->f_sector))."') ";
	}
	if ($q->validate->street($q)) { 
		$s.="AND (STREET='".stripslashes($q->validate->toWin($q->url->f_street))."') ";
	}
	if ($q->validate->home($q)) { 
		$s.="AND (NOMER='".stripslashes($q->validate->toWin($q->url->f_home))."') ";
	}
	return $s;
}

function balloon(&$q) { $s="";
	$s.="SELECT * FROM VW_BUILDINGS_WEB WHERE (UUID='".$q->url->uuid."') ";
	//$q->alert=$k;
	return $s;
}

function table(&$q) { $s=""; $i=0; $k="";
	$q->validate->skipForSql($q->url->last);
	$s.="SELECT SKIP ".$q->url->last." * FROM VW_BUILDINGS_WEB WHERE (1=1) ";
	if ($q->validate->direction($q)) { 
		$s.="AND 	(DIRECTION='".stripslashes($q->validate->toWin($q->url->f_direction))."') ";
	}
	if ($q->validate->ctp($q)) { 
		$s.="AND (CTP='".stripslashes($q->validate->toWin($q->url->f_ctp))."') ";
	}
	if ($q->validate->sector($q)) { 
		$s.="AND (SREGION='".stripslashes($q->validate->toWin($q->url->f_sector))."') ";
	}
	if ($q->validate->street($q)) { 
		$s.="AND (STREET='".stripslashes($q->validate->toWin($q->url->f_street))."') ";
	}
	if ($q->validate->home($q)) { 
		$s.="AND (NOMER='".stripslashes($q->validate->toWin($q->url->f_home))."') ";
	}
	$s.="AND (STREET<>'') ";
	$s.="AND (STREET<>'-') ";
	$s.="AND (SREGION<>'') ";
	$s.="ORDER by STREET, SORTEDCAPTION ASC ";

	//$q->alert=$k;
	return $s;
}

function getList($q,$key) { $s=""; $k="";
	$s.="SELECT ".$key." FROM VW_BUILDINGS_WEB WHERE (1=1) ";
	if ($q->validate->direction($q)) { 
		$s.="AND (DIRECTION='".stripslashes($q->validate->toWin($q->url->f_direction))."') ";
	}
	if ($q->validate->ctp($q)) { 
		$s.="AND (CTP='".stripslashes($q->validate->toWin($q->url->f_ctp))."') ";
	}
	if ($q->validate->sector($q)) { 
		$s.="AND (SREGION='".stripslashes($q->validate->toWin($q->url->f_sector))."') ";
	}
	if ($q->validate->street($q)) { 
		$s.="AND (STREET='".stripslashes($q->validate->toWin($q->url->f_street))."') ";
	}
	if ($q->validate->home($q)) { 
		$s.="AND (NOMER='".stripslashes($q->validate->toWin($q->url->f_home))."') ";
	}
	$s.="AND (STREET<>'') ";
	$s.="AND (STREET<>'-') ";
	$s.="AND (SREGION<>'') ";
	$s.="GROUP by ".$key." ";
	$s.="ORDER by ".$key." ASC ";
	
	return $s;
}

} ?>
