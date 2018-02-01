<?php


class ReviseMeasuresCest
{
    public $businessNew, $id_businessNew = "10955", $url_businessNew;
    public $businessOld, $id_businessOld = '16183', $url_businessOld;
    public $GeneralNew = array(), $GeneralOld = array();
    public $EnergyNew = array(), $EnergyOld = array();
    public $PollutionPreventionNew = array(), $PollutionPreventionOld = array();
    public $SolidWasteNew = array(), $SolidWasteOld = array();
    public $TransportationNew = array(), $TransportationOld = array();
    public $WastewaterNew = array(), $WastewaterOld = array();
    public $WaterNew = array(), $WaterOld = array();
    public $MeasuresNew = array(), $MeasuresOld = array();

    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function CheckNewBusiness(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_businessNew));
        $I->wait(2);
        $general    = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_GeneralGroupButton);
        $energy     = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        $pollution  = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_PollutionPreventionGroupButton);
        $solid      = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
        $transport  = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_TransportationGroupButton);
        $wastewater = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_WastewaterGroupButton);
        $water      = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_WaterGroupButton);
        if($general != null){
                    $I->comment("------Grab measures from General group NEW------");
                    $I->click(\Page\BusinessChecklistView::$LeftMenu_GeneralGroupButton);
                    $I->wait(5);
                    $countSubgroup = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_GeneralGroupButton." li");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->comment("                                        ");
                        $I->comment("------------General subgroup #$i----------");
                        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup($i));
                        $I->wait(5);
                        $countMeasures = $I->getAmount($I, \Page\BusinessChecklistView::$MeasureRow);
                        $count = $I->getAmount($I, ".application-content-titles");
                            $I->comment("Count of types (core/elective): $count");
                            $countFirst = $I->getAmount($I, "#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type");
                            for($k=1; $k<=$countFirst; $k++){
                                $I->makeElementVisible(["#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type:nth-of-type($k)"], $style = 'visibility');
                            }
                            if($count=="2"){
                                $countSecond = $I->getAmount($I, "#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type");
                                $I->comment("Core count: $countFirst\nElective count: $countSecond");
                                for($l=1; $l<=$countSecond; $l++){
                                    $I->makeElementVisible(["#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type:nth-of-type($l)"], $style = 'visibility');
                                }
                            }
                        $I->comment("Count of measures: $countMeasures");
                        for($j=1; $j<=$countMeasures; $j++){
                            $measure = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureDescription($j));
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(2);
                            $answer = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureToggleButton($j)."/option[@selected]");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answer);
                            $this->GeneralNew[$measure] = $answer;
                            $this->MeasuresNew[$measure] = $answer;
                        }
                    }
        } 
        if($energy != null){
                    $I->comment("------Grab measures from Energy group NEW------");
                    $I->click(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
                    $I->wait(5);
                    $countSubgroup = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton." li");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->comment("                                        ");
                        $I->comment("-----------Energy subgroup #$i----------");
                        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup($i));
                        $I->wait(5);
                        $countMeasures = $I->getAmount($I, \Page\BusinessChecklistView::$MeasureRow);
                        $count = $I->getAmount($I, ".application-content-titles");
                            $I->comment("Count of types (core/elective): $count");
                            $countFirst = $I->getAmount($I, "#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type");
                            for($k=1; $k<=$countFirst; $k++){
                                $I->makeElementVisible(["#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type:nth-of-type($k)"], $style = 'visibility');
                            }
                            if($count=="2"){
                                $countSecond = $I->getAmount($I, "#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type");
                                $I->comment("Core count: $countFirst\nElective count: $countSecond");
                                for($l=1; $l<=$countSecond; $l++){
                                    $I->makeElementVisible(["#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type:nth-of-type($l)"], $style = 'visibility');
                                }
                            }
                        $I->comment("Count of measures: $countMeasures");
                        for($j=1; $j<=$countMeasures; $j++){
                            $measure = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureDescription($j));
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(2);
                            $answer = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureToggleButton($j)."/option[@selected]");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answer);
                            $this->EnergyNew[$measure] = $answer;
                            $this->MeasuresNew[$measure] = $answer;
                        }
                    }
        }
        if($pollution != null){
                    $I->comment("------Grab measures from Pollution Prevention group NEW------");
                    $I->click(\Page\BusinessChecklistView::$LeftMenu_PollutionPreventionGroupButton);
                    $I->wait(5);
                    $countSubgroup = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_PollutionPreventionGroupButton." li");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->comment("                                        ");
                        $I->comment("----Pollution Prevention subgroup #$i---");
                        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup($i));
                        $I->wait(5);
                        $countMeasures = $I->getAmount($I, \Page\BusinessChecklistView::$MeasureRow);
                        $count = $I->getAmount($I, ".application-content-titles");
                            $I->comment("Count of types (core/elective): $count");
                            $countFirst = $I->getAmount($I, "#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type");
                            for($k=1; $k<=$countFirst; $k++){
                                $I->makeElementVisible(["#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type:nth-of-type($k)"], $style = 'visibility');
                            }
                            if($count=="2"){
                                $countSecond = $I->getAmount($I, "#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type");
                                $I->comment("Core count: $countFirst\nElective count: $countSecond");
                                for($l=1; $l<=$countSecond; $l++){
                                    $I->makeElementVisible(["#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type:nth-of-type($l)"], $style = 'visibility');
                                }
                            }
                        $I->comment("Count of measures: $countMeasures");
                        for($j=1; $j<=$countMeasures; $j++){
                            $measure = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureDescription($j));
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(2);
                            $answer = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureToggleButton($j)."/option[@selected]");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answer);
                            $this->PollutionPreventionNew[$measure] = $answer;
                            $this->MeasuresNew[$measure] = $answer;
                        }
                    }
        }
        if($solid != null){
                    $I->comment("------Grab measures from Solid Waste group NEW------");
                    $I->click(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
                    $I->wait(5);
                    $countSubgroup = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton." li");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->comment("                                        ");
                        $I->comment("---------Solid Waste subgroup #$i-------");
                        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup($i));
                        $I->wait(5);
                        $countMeasures = $I->getAmount($I, \Page\BusinessChecklistView::$MeasureRow);
                        $count = $I->getAmount($I, ".application-content-titles");
                            $I->comment("Count of types (core/elective): $count");
                            $countFirst = $I->getAmount($I, "#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type");
                            for($k=1; $k<=$countFirst; $k++){
                                $I->makeElementVisible(["#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type:nth-of-type($k)"], $style = 'visibility');
                            }
                            if($count=="2"){
                                $countSecond = $I->getAmount($I, "#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type");
                                $I->comment("Core count: $countFirst\nElective count: $countSecond");
                                for($l=1; $l<=$countSecond; $l++){
                                    $I->makeElementVisible(["#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type:nth-of-type($l)"], $style = 'visibility');
                                }
                            }
                        $I->comment("Count of measures: $countMeasures");
                        for($j=1; $j<=$countMeasures; $j++){
                            $measure = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureDescription($j));
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', ' ', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(2);
                            $answer = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureToggleButton($j)."/option[@selected]");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answer);
                            $this->SolidWasteNew[$measure] = $answer;
                            $this->MeasuresNew[$measure] = $answer;
                        }
                    }
        }
//        if($transport != null){
//                    $I->comment("------Grab measures from Transportation group NEW------");
//                    $I->click(\Page\BusinessChecklistView::$LeftMenu_TransportationGroupButton);
//                    $I->wait(4);
//                    $countSubgroup = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_TransportationGroupButton." li");
//                    for($i=1; $i<=$countSubgroup; $i++){
//                        $I->comment("                                        ");
//                        $I->comment("-------Transportation subgroup #$i------");
//                        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup($i));
//                        $I->wait(4);
//                        $countMeasures = $I->getAmount($I, \Page\BusinessChecklistView::$MeasureRow);
//                        $count = $I->getAmount($I, ".application-content-titles");
//                            $I->comment("Count of types (core/elective): $count");
//                            $countFirst = $I->getAmount($I, "#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type");
//                            for($k=1; $k<=$countFirst; $k++){
//                                $I->makeElementVisible(["#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type:nth-of-type($k)"], $style = 'visibility');
//                            }
//                            if($count=="2"){
//                                $countSecond = $I->getAmount($I, "#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type");
//                                $I->comment("Core count: $countFirst\nElective count: $countSecond");
//                                for($l=1; $l<=$countSecond; $l++){
//                                    $I->makeElementVisible(["#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type:nth-of-type($l)"], $style = 'visibility');
//                                }
//                            }
//                        $I->comment("Count of measures: $countMeasures");
//                        for($j=1; $j<=$countMeasures; $j++){
//                            $measure = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureDescription($j));
//                            $help= explode(". ", $measure);
//                            array_shift($help);
//                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', ' ', $measure);
//                            $measure = str_replace(array('®', '.'),"", $measure);
//                            $I->comment("----------Measure $j:----------");
//                            $I->comment($measure);
//                            
//                            $I->wait(5);
//                            $answer = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureToggleButton($j)."/option[@selected]");
//                            $I->comment("-----Answer for measure $j:-----");
//                            $I->comment($answer);
//                            $this->TransportationNew[$measure] = $answer;
//                            $this->MeasuresNew[$measure] = $answer;
//                        }
//                    }
//        }
        if($wastewater != null){
                    $I->comment("------Grab measures from Wastewater group NEW------");
                    $I->click(\Page\BusinessChecklistView::$LeftMenu_WastewaterGroupButton);
                    $I->wait(5);
                    $countSubgroup = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_WastewaterGroupButton." li");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->comment("                                        ");
                        $I->comment("----------Wastewater subgroup #$i----------");
                        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup($i));
                        $I->wait(5);
                        $countMeasures = $I->getAmount($I, \Page\BusinessChecklistView::$MeasureRow);
                        $count = $I->getAmount($I, ".application-content-titles");
                            $I->comment("Count of types (core/elective): $count");
                            $countFirst = $I->getAmount($I, "#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type");
                            for($k=1; $k<=$countFirst; $k++){
                                $I->makeElementVisible(["#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type:nth-of-type($k)"], $style = 'visibility');
                            }
                            if($count=="2"){
                                $countSecond = $I->getAmount($I, "#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type");
                                $I->comment("Core count: $countFirst\nElective count: $countSecond");
                                for($l=1; $l<=$countSecond; $l++){
                                    $I->makeElementVisible(["#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type:nth-of-type($l)"], $style = 'visibility');
                                }
                            }
                        $I->comment("Count of measures: $countMeasures");
                        for($j=1; $j<=$countMeasures; $j++){
                            $measure = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureDescription($j));
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', ' ', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(2);
                            $answer = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureToggleButton($j)."/option[@selected]");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answer);
                            $this->WastewaterNew[$measure] = $answer;
                            $this->MeasuresNew[$measure] = $answer;
                        }
                    }
        }
        if($water != null){
                    $I->comment("------Grab measures from Water group NEW------");
                    $I->click(\Page\BusinessChecklistView::$LeftMenu_WaterGroupButton);
                    $I->wait(5);
                    $countSubgroup = $I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_WaterGroupButton." li");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->comment("                                        ");
                        $I->comment("------------Water subgroup #$i----------");
                        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup($i));
                        $I->wait(5);
                        $countMeasures = $I->getAmount($I, \Page\BusinessChecklistView::$MeasureRow);
                        $count = $I->getAmount($I, ".application-content-titles");
                            $I->comment("Count of types (core/elective): $count");
                            $countFirst = $I->getAmount($I, "#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type");
                            for($k=1; $k<=$countFirst; $k++){
                                $I->makeElementVisible(["#measures-form>div:nth-of-type(1) #relmeasuretobusiness-answer_type:nth-of-type($k)"], $style = 'visibility');
                            }
                            if($count=="2"){
                                $countSecond = $I->getAmount($I, "#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type");
                                $I->comment("Core count: $countFirst\nElective count: $countSecond");
                                for($l=1; $l<=$countSecond; $l++){
                                    $I->makeElementVisible(["#measures-form>div:nth-last-of-type(3) #relmeasuretobusiness-answer_type:nth-of-type($l)"], $style = 'visibility');
                                }
                            }
                        $I->comment("Count of all measures: $countMeasures");
                        for($j=1; $j<=$countMeasures; $j++){
                            $measure = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureDescription($j));
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', ' ', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(2);
                            $answer = $I->grabTextFrom(\Page\BusinessChecklistView::MeasureToggleButton($j)."/option[@selected]");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answer);
                            $this->WaterNew[$measure] = $answer;
                            $this->MeasuresNew[$measure] = $answer;
                        }
                    }
        }
//        $I->comment("                                            ");
//        $I->comment("-----------General measures NEW-------------");
//        foreach($this->GeneralNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        } 
//        $I->comment("                                            ");
//        $I->comment("-----------Energy measures NEW--------------");
//        foreach($this->EnergyNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        $I->comment("                                            ");
//        $I->comment("-----Pollution Prevention measures NEW------");
//        foreach($this->PollutionPreventionNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        $I->comment("                                            ");
//        $I->comment("-----------Solid Waste measures NEW---------");
//        foreach($this->SolidWasteNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        $I->comment("                                            ");
//        $I->comment("--------Transportation measures NEW---------");
//        foreach($this->TransportationNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        $I->comment("                                            ");
//        $I->comment("-----------Wastewater measures NEW----------");
//        foreach($this->WastewaterNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        $I->comment("                                            ");
//        $I->comment("--------------Water measures NEW------------");
//        foreach($this->WaterNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        $I->comment("                                            ");
//        $I->comment("---------------All measures NEW-------------");
//        foreach($this->MeasuresNew as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
    }
    
    public function LoginInOldSystem(AcceptanceTester $I)
    {
        $I->amOnUrl("https://old.greenbiztracker.org/");
        $I->wait(3);
        $I->click("#gb_login>a");
        $I->wait(2);
        $I->fillField("#login_popup #login_username", 'paulhamel');
        $I->click("(//*[@id='login_popup']//*[@id='id_login_password'])[1]");
        $I->fillField("(//*[@id='login_popup']//*[@id='id_login_password'])[1]", 'welcome');
        $I->wait(3);
        $I->click("(//div[contains(@class, 'submit')])[1]");
        $I->wait(5);
    }  
    
    public function CheckOldBusiness(AcceptanceTester $I)
    {
        $I->amOnUrl("https://old.greenbiztracker.org/application/$this->id_businessOld/overview/");
        $I->wait(3);
        $general    = $I->getAmount($I, '.general_text');
        $energy     = $I->getAmount($I, '.energy_text');
        $pollution  = $I->getAmount($I, '.pollution_text');
        $solid      = $I->getAmount($I, '.waste_text');
        $transport  = $I->getAmount($I, '.transportation_text');
        $wastewater = $I->getAmount($I, '.wastewater_text');
        $water      = $I->getAmount($I, '.water_text');
        if($general != null){
                    $I->comment("------Grab measures from General group OLD------");
                    $I->click(".general_text>a");
                    $I->wait(4);
                    $countSubgroup = $I->getAmount($I, ".submenu.general_bg_color");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->wait(4);
                        $I->comment("                                        ");
                        $I->comment("------------General subgroup #$i----------");
                        $I->click("(//*[contains(@class, 'submenu general_bg_color')])[$i]/a");
                        $I->wait(5);
                        $countFirst = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) div.measure_row");
                        $I->comment("Count of measures: $countFirst");
                        for($j=1; $j<=$countFirst; $j++){
                            $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row general_bg_color'][$j]/div[1]/p");
                            $help= explode(". ", $measure);
                            array_shift($help);
                            
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(5);
                            $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row general_bg_color'][$j]//input[@checked and @type='radio']");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answerHelp);
                            if($answerHelp=='pending'){
                                $answer = 'no';
                            }elseif ($answerHelp=='na') {
                                $answer = 'na';
                            }elseif ($answerHelp=='complete_pre_enroll') {
                                $answer = 'yes';
                            }
                            $this->GeneralOld[$measure] = $answer;
                            $this->MeasuresOld[$measure] = $answer;
                        }
                        $I->makeElementNotVisible(["#gb_header"]);
                        $I->wait(1);
                        $I->scrollTo(".get_started_text");
                        $I->wait(2);
                        $help = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                        if($help=='1'){
                            $I->click("[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                            $I->wait(5);
                            $countSecond = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(3) div.measure_row");
                            $I->comment("Count of elective measures: $countSecond");
                            for($j=1; $j<=$countSecond; $j++){
                                $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row general_bg_color'][$j]/div[1]/p");
                                $help= explode(". ", $measure);
                                array_shift($help);
                                $measure = implode("", $help);
//                                $measure = preg_replace('|[\s]+|s', '', $measure);
                                $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                                $I->comment("----------Measure $j:----------");
                                $I->comment($measure);

                                $I->wait(1);
                                $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row general_bg_color'][$j]//input[@checked and @type='radio']");
                                $I->comment("-----Answer for measure $j:-----");
                                $I->comment($answerHelp);
                                if($answerHelp=='pending'){
                                    $answer = 'no';
                                }elseif ($answerHelp=='na') {
                                    $answer = 'na';
                                }elseif ($answerHelp=='complete_pre_enroll') {
                                    $answer = 'yes';
                                }
                                $this->GeneralOld[$measure] = $answer;
                                $this->MeasuresOld[$measure] = $answer;
                            }
                        }
                    }     
        }
        if($energy != null){
                    $I->comment("------Grab measures from Energy group OLD------");
                    $I->click(".energy_text>a");
                    $I->wait(4);
                    $countSubgroup = $I->getAmount($I, ".submenu.energy_bg_color");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->wait(4);
                        $I->comment("                                        ");
                        $I->comment("------------Energy subgroup #$i----------");
                        $I->click("(//*[contains(@class, 'submenu energy_bg_color')])[$i]/a");
                        $I->wait(5);
                        $countFirst = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) div.measure_row");
                        $I->comment("Count of measures: $countFirst");
                        for($j=1; $j<=$countFirst; $j++){
                            $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row energy_bg_color'][$j]/div[1]/p");
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(1);
                            $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row energy_bg_color'][$j]//input[@checked and @type='radio']");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answerHelp);
                            if($answerHelp=='pending'){
                                $answer = 'no';
                            }elseif ($answerHelp=='na') {
                                $answer = 'na';
                            }elseif ($answerHelp=='complete_pre_enroll') {
                                $answer = 'yes';
                            }
                            $this->EnergyOld[$measure] = $answer;
                            $this->MeasuresOld[$measure] = $answer;
                        }
                        $I->makeElementNotVisible(["#gb_header"]);
                        $I->wait(1);
                        $I->scrollTo(".get_started_text");
                        $I->wait(2);
                        $help = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                        if($help=='1'){
                            $I->click("[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                            $I->wait(5);
                            $countSecond = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(3) div.measure_row");
                            $I->comment("Count of elective measures: $countSecond");
                            for($j=1; $j<=$countSecond; $j++){
                                $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row energy_bg_color'][$j]/div[1]/p");
                                $help= explode(". ", $measure);
                                array_shift($help);
                                $measure = implode("", $help);
//                                $measure = preg_replace('|[\s]+|s', '', $measure);
                                $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                                $I->comment("----------Measure $j:----------");
                                $I->comment($measure);

                                $I->wait(1);
                                $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row energy_bg_color'][$j]//input[@checked and @type='radio']");
                                $I->comment("-----Answer for measure $j:-----");
                                $I->comment($answerHelp);
                                if($answerHelp=='pending'){
                                    $answer = 'no';
                                }elseif ($answerHelp=='na') {
                                    $answer = 'na';
                                }elseif ($answerHelp=='complete_pre_enroll') {
                                    $answer = 'yes';
                                }
                                $this->EnergyOld[$measure] = $answer;
                                $this->MeasuresOld[$measure] = $answer;
                            }
                        }
                    }     
        }
        if($pollution != null){
                    $I->comment("------Grab measures from Pollution Prevention group OLD------");
                    $I->click(".pollution_text>a");
                    $I->wait(4);
                    $countSubgroup = $I->getAmount($I, ".submenu.pollution_prevention_bg_color");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->wait(4);
                        $I->comment("                                        ");
                        $I->comment("------------Pollution Prevention subgroup #$i----------");
                        $I->click("(//*[contains(@class, 'submenu pollution_prevention_bg_color')])[$i]/a");
                        $I->wait(5);
                        $countFirst = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) div.measure_row");
                        $I->comment("Count of measures: $countFirst");
                        for($j=1; $j<=$countFirst; $j++){
                            $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row pollution_bg_color'][$j]/div[1]/p");
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(1);
                            $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row pollution_bg_color'][$j]//input[@checked and @type='radio']");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answerHelp);
                            if($answerHelp=='pending'){
                                $answer = 'no';
                            }elseif ($answerHelp=='na') {
                                $answer = 'na';
                            }elseif ($answerHelp=='complete_pre_enroll') {
                                $answer = 'yes';
                            }
                            $this->PollutionPreventionOld[$measure] = $answer;
                            $this->MeasuresOld[$measure] = $answer;
                        }
                        $I->makeElementNotVisible(["#gb_header"]);
                        $I->wait(1);
                        $I->scrollTo(".get_started_text");
                        $I->wait(2);
                        $help = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                        if($help=='1'){
                            $I->click("[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                            $I->wait(5);
                            $countSecond = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(3) div.measure_row");
                            $I->comment("Count of elective measures: $countSecond");
                            for($j=1; $j<=$countSecond; $j++){
                                $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row pollution_bg_color'][$j]/div[1]/p");
                                $help= explode(". ", $measure);
                                array_shift($help);
                                $measure = implode("", $help);
                                $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                                $I->comment("----------Measure $j:----------");
                                $I->comment($measure);

                                $I->wait(1);
                                $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row pollution_bg_color'][$j]//input[@checked and @type='radio']");
                                $I->comment("-----Answer for measure $j:-----");
                                $I->comment($answerHelp);
                                if($answerHelp=='pending'){
                                    $answer = 'no';
                                }elseif ($answerHelp=='na') {
                                    $answer = 'na';
                                }elseif ($answerHelp=='complete_pre_enroll') {
                                    $answer = 'yes';
                                }
                                $this->PollutionPreventionOld[$measure] = $answer;
                                $this->MeasuresOld[$measure] = $answer;
                            }
                        }
                    }     
        }
        if($solid != null){
                    $I->comment("------Grab measures from Solid Waste group OLD------");
                    $I->click(".waste_text>a");
                    $I->wait(4);
                    $countSubgroup = $I->getAmount($I, ".submenu.solid_waste_bg_color");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->wait(4);
                        $I->comment("                                        ");
                        $I->comment("------------Solid Waste subgroup #$i----------");
                        $I->click("(//*[contains(@class, 'submenu solid_waste_bg_color')])[$i]/a");
                        $I->wait(5);
                        $countFirst = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) div.measure_row");
                        $I->comment("Count of measures: $countFirst");
                        for($j=1; $j<=$countFirst; $j++){
                            $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row waste_bg_color'][$j]/div[1]/p");
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(1);
                            $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row waste_bg_color'][$j]//input[@checked and @type='radio']");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answerHelp);
                            if($answerHelp=='pending'){
                                $answer = 'no';
                            }elseif ($answerHelp=='na') {
                                $answer = 'na';
                            }elseif ($answerHelp=='complete_pre_enroll') {
                                $answer = 'yes';
                            }
                            $this->SolidWasteOld[$measure] = $answer;
                            $this->MeasuresOld[$measure] = $answer;
                        }
                        $I->makeElementNotVisible(["#gb_header"]);
                        $I->wait(1);
                        $I->scrollTo(".get_started_text");
                        $I->wait(2);
                        $help = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                        if($help=='1'){
                            $I->click("[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                            $I->wait(5);
                            $countSecond = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(3) div.measure_row");
                            $I->comment("Count of elective measures: $countSecond");
                            for($j=1; $j<=$countSecond; $j++){
                                $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row waste_bg_color'][$j]/div[1]/p");
                                $help= explode(". ", $measure);
                                array_shift($help);
                                $measure = implode("", $help);
//                                $measure = preg_replace('|[\s]+|s', '', $measure);
                                $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                                $I->comment("----------Measure $j:----------");
                                $I->comment($measure);

                                $I->wait(1);
                                $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row waste_bg_color'][$j]//input[@checked and @type='radio']");
                                $I->comment("-----Answer for measure $j:-----");
                                $I->comment($answerHelp);
                                if($answerHelp=='pending'){
                                    $answer = 'no';
                                }elseif ($answerHelp=='na') {
                                    $answer = 'na';
                                }elseif ($answerHelp=='complete_pre_enroll') {
                                    $answer = 'yes';
                                }
                                $this->SolidWasteOld[$measure] = $answer;
                                $this->MeasuresOld[$measure] = $answer;
                            }
                        }
                    }     
        }
        if($wastewater != null){
                    $I->comment("------Grab measures from Wastewater group OLD------");
                    $I->click(".wastewater_text>a");
                    $I->wait(4);
                    $countSubgroup = $I->getAmount($I, ".submenu.wastewater_bg_color");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->wait(4);
                        $I->comment("                                        ");
                        $I->comment("------------Wastewater subgroup #$i----------");
                        $I->click("(//*[contains(@class, 'submenu wastewater_bg_color')])[$i]/a");
                        $I->wait(5);
                        $countFirst = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) div.measure_row");
                        $I->comment("Count of measures: $countFirst");
                        for($j=1; $j<=$countFirst; $j++){
                            $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row wastewater_bg_color'][$j]/div[1]/p");
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(1);
                            $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row wastewater_bg_color'][$j]//input[@checked and @type='radio']");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answerHelp);
                            if($answerHelp=='pending'){
                                $answer = 'no';
                            }elseif ($answerHelp=='na') {
                                $answer = 'na';
                            }elseif ($answerHelp=='complete_pre_enroll') {
                                $answer = 'yes';
                            }
                            $this->WastewaterOld[$measure] = $answer;
                            $this->MeasuresOld[$measure] = $answer;
                        }
                        $I->makeElementNotVisible(["#gb_header"]);
                        $I->wait(1);
                        $I->scrollTo(".get_started_text");
                        $I->wait(2);
                        $help = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                        if($help=='1'){
                            $I->click("[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                            $I->wait(5);
                            $countSecond = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(3) div.measure_row");
                            $I->comment("Count of elective measures: $countSecond");
                            for($j=1; $j<=$countSecond; $j++){
                                $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row wastewater_bg_color'][$j]/div[1]/p");
                                $help= explode(". ", $measure);
                                array_shift($help);
                                $measure = implode("", $help);
//                                $measure = preg_replace('|[\s]+|s', '', $measure);
                                $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                                $I->comment("----------Measure $j:----------");
                                $I->comment($measure);

                                $I->wait(1);
                                $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row wastewater_bg_color'][$j]//input[@checked and @type='radio']");
                                $I->comment("-----Answer for measure $j:-----");
                                $I->comment($answerHelp);
                                if($answerHelp=='pending'){
                                    $answer = 'no';
                                }elseif ($answerHelp=='na') {
                                    $answer = 'na';
                                }elseif ($answerHelp=='complete_pre_enroll') {
                                    $answer = 'yes';
                                }
                                $this->WastewaterOld[$measure] = $answer;
                                $this->MeasuresOld[$measure] = $answer;
                            }
                        }
                    }     
        }
        if($water != null){
                    $I->comment("------Grab measures from Water group OLD------");
                    $I->click(".water_text>a");
                    $I->wait(4);
                    $countSubgroup = $I->getAmount($I, ".submenu.water_bg_color");
                    for($i=1; $i<=$countSubgroup; $i++){
                        $I->wait(4);
                        $I->comment("                                        ");
                        $I->comment("------------Water subgroup #$i----------");
                        $I->click("(//*[contains(@class, 'submenu water_bg_color')])[$i]/a");
                        $I->wait(5);
                        $countFirst = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) div.measure_row");
                        $I->comment("Count of measures: $countFirst");
                        for($j=1; $j<=$countFirst; $j++){
                            $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row water_bg_color'][$j]/div[1]/p");
                            $help= explode(". ", $measure);
                            array_shift($help);
                            $measure = implode("", $help);
//                            $measure = preg_replace('|[\s]+|s', '', $measure);
                            $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                            $I->comment("----------Measure $j:----------");
                            $I->comment($measure);
                            
                            $I->wait(1);
                            $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[2]//div[@class='measure_row water_bg_color'][$j]//input[@checked and @type='radio']");
                            $I->comment("-----Answer for measure $j:-----");
                            $I->comment($answerHelp);
                            if($answerHelp=='pending'){
                                $answer = 'no';
                            }elseif ($answerHelp=='na') {
                                $answer = 'na';
                            }elseif ($answerHelp=='complete_pre_enroll') {
                                $answer = 'yes';
                            }
                            $this->WaterOld[$measure] = $answer;
                            $this->MeasuresOld[$measure] = $answer;
                        }
                        $I->makeElementNotVisible(["#gb_header"]);
                        $I->wait(1);
                        $I->scrollTo(".get_started_text");
                        $I->wait(2);
                        $help = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                        if($help=='1'){
                            $I->click("[id=subgroup_$i] .content_application>div>div:nth-of-type(2) .additional_link.additional");
                            $I->wait(5);
                            $countSecond = $I->getAmount($I, "[id=subgroup_$i] .content_application>div>div:nth-of-type(3) div.measure_row");
                            $I->comment("Count of elective measures: $countSecond");
                            for($j=1; $j<=$countSecond; $j++){
                                $measure = $I->grabTextFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row water_bg_color'][$j]/div[1]/p");
                                $help= explode(". ", $measure);
                                array_shift($help);
                                $measure = implode("", $help);
//                                $measure = preg_replace('|[\s]+|s', '', $measure);
                                $measure = str_replace(array('®', '.', ' ', '`', "'", '"', '°', '“', '”'),"", $measure);
                                $I->comment("----------Measure $j:----------");
                                $I->comment($measure);

                                $I->wait(1);
                                $answerHelp = $I->grabValueFrom("//*[@id='subgroup_$i']//*[@class='content_application']/div/div[3]//div[@class='measure_row water_bg_color'][$j]//input[@checked and @type='radio']");
                                $I->comment("-----Answer for measure $j:-----");
                                $I->comment($answerHelp);
                                if($answerHelp=='pending'){
                                    $answer = 'no';
                                }elseif ($answerHelp=='na') {
                                    $answer = 'na';
                                }elseif ($answerHelp=='complete_pre_enroll') {
                                    $answer = 'yes';
                                }
                                $this->WaterOld[$measure] = $answer;
                                $this->MeasuresOld[$measure] = $answer;
                            }
                        }
                    }     
        }
        $I->comment("                                            ");
        $I->comment("-----------General measures OLD-------------");
        foreach($this->GeneralOld as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("                                            ");
        $I->comment("------------Energy measures OLD-------------");
        foreach($this->EnergyOld as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("                                            ");
        $I->comment("------Pollution Prevention measures OLD-----");
        foreach($this->PollutionPreventionOld as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("                                            ");
        $I->comment("----------Solid Waste measures OLD----------");
        foreach($this->SolidWasteOld as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("                                            ");
        $I->comment("------------Wastewater measures OLD---------");
        foreach($this->WastewaterOld as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("                                            ");
        $I->comment("--------------Water measures OLD------------");
        foreach($this->WaterOld as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("                                            ");
        $I->comment("---------------All measures OLD-------------");
        foreach($this->MeasuresOld as $key => $value){ 
               echo "$key = $value \n"; 
        }
    }    
    
    public function General_ArraysCheck(AcceptanceTester $I)
    {
        $general1 = array_diff_assoc($this->GeneralNew, $this->GeneralOld);
        $general2 = array_diff_assoc($this->GeneralOld, $this->GeneralNew);
        $I->comment("Gen1:");
        foreach($general1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Gen2:");
        foreach($general2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($general1)){
            $message1 = "NEW. Wrong measures: ";
            foreach ($general1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR in General group");
            $I->comment($message1);
        } 
        if(!empty($general2)){
            $message2 = "NEW. Absent this measures: ";
            foreach ($general2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR in General group");
            $I->comment($message2);
        } 
    } 
    
    public function Energy_ArraysCheck(AcceptanceTester $I)
    {
        $energy1 = array_diff_assoc($this->EnergyNew, $this->EnergyOld);
        $energy2 = array_diff_assoc($this->EnergyOld, $this->EnergyNew);
        $I->comment("Energy1:");
        foreach($energy1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Energy2:");
        foreach($energy2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($energy1)){
            $message1 = "NEW. Wrong measures: ";
            foreach ($energy1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR in Energy group");
            $I->comment($message1);
        } 
        if(!empty($energy2)){
            $message2 = "NEW. Absent this measures: ";
            foreach ($energy2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR in Energy group");
            $I->comment($message2);
        } 
    } 
    
    public function PollutionPrevention_ArraysCheck(AcceptanceTester $I)
    {
        $pollut1 = array_diff_assoc($this->PollutionPreventionNew, $this->PollutionPreventionOld);
        $pollut2 = array_diff_assoc($this->PollutionPreventionOld, $this->PollutionPreventionNew);
        $I->comment("Pollution1:");
        foreach($pollut1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Pollution2:");
        foreach($pollut2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($pollut1)){
            $message1 = "NEW. Wrong measures: ";
            foreach ($pollut1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR in Pollution Prevention group");
            $I->comment($message1);
        } 
        if(!empty($pollut2)){
            $message2 = "NEW. Absent this measures: ";
            foreach ($pollut2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR in Pollution Prevention group");
            $I->comment($message2);
        } 
    } 
    
    public function SolidWaste_ArraysCheck(AcceptanceTester $I)
    {
        $solid1 = array_diff_assoc($this->SolidWasteNew, $this->SolidWasteOld);
        $solid2 = array_diff_assoc($this->SolidWasteOld, $this->SolidWasteNew);
        $I->comment("Solid1:");
        foreach($solid1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Solid2:");
        foreach($solid2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($solid1)){
            $message1 = "NEW. Wrong measures: ";
            foreach ($solid1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR in Solid Waste group");
            $I->comment($message1);
        } 
        if(!empty($solid2)){
            $message2 = "NEW. Absent this measures: ";
            foreach ($solid2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR in Solid Waste group");
            $I->comment($message2);
        } 
    } 
//    
//    public function Transportation_ArraysCheck(AcceptanceTester $I)
//    {
//        $trans1 = array_diff_assoc($this->TransportationNew, $this->TransportationOld);
//        $trans2 = array_diff_assoc($this->TransportationOld, $this->TransportationNew);
//        $I->comment("Transport1:");
//        foreach($trans1 as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        $I->comment("Transport2:");
//        foreach($trans2 as $key => $value){ 
//               echo "$key = $value \n"; 
//        }
//        if(!empty($trans1)){
//            $message1 = "NEW. Wrong measures: ";
//            foreach ($trans1 as $key => $value) {
//                $message1 .= "$key => $value" . "\n";
//            }        
//            $I->comment("ERROR in Transportation group");
//            $I->comment($message1);
//        } 
//        if(!empty($trans2)){
//            $message2 = "NEW. Absent this measures: ";
//            foreach ($trans2 as $key => $value) {
//                $message2 .= "$key = $value" . "\n";
//            }  
//            $I->comment("ERROR in Transportation group");
//            $I->comment($message2);
//        } 
//    } 
//    
    public function Wastewater_ArraysCheck(AcceptanceTester $I)
    {
        $wastewater1 = array_diff_assoc($this->WastewaterNew, $this->WastewaterOld);
        $wastewater2 = array_diff_assoc($this->WastewaterOld, $this->WastewaterNew);
        $I->comment("Wastewater1:");
        foreach($wastewater1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Wastewater2:");
        foreach($wastewater2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($wastewater1)){
            $message1 = "NEW. Wrong measures: ";
            foreach ($wastewater1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR in Wastewater group");
            $I->comment($message1);
        } 
        if(!empty($wastewater2)){
            $message2 = "NEW. Absent this measures: ";
            foreach ($wastewater2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR in Wastewater group");
            $I->comment($message2);
        } 
    } 
    
    public function Water_ArraysCheck(AcceptanceTester $I)
    {
        $water1 = array_diff_assoc($this->WaterNew, $this->WaterOld);
        $water2 = array_diff_assoc($this->WaterOld, $this->WaterNew);
        $I->comment("Water1:");
        foreach($water1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("Water2:");
        foreach($water2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($water1)){
            $message1 = "NEW. Wrong measures: ";
            foreach ($water1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR in Water group");
            $I->comment($message1);
        } 
        if(!empty($water2)){
            $message2 = "NEW. Absent this measures: ";
            foreach ($water2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR in Water group");
            $I->comment($message2);
        } 
    } 
    
    public function AllMeasures_ArraysCheck(AcceptanceTester $I)
    {
        $all1 = array_diff_assoc($this->MeasuresNew, $this->MeasuresOld);
        $all2 = array_diff_assoc($this->MeasuresOld, $this->MeasuresNew);
        $I->comment("All1:");
        foreach($all1 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        $I->comment("All2:");
        foreach($all2 as $key => $value){ 
               echo "$key = $value \n"; 
        }
        if(!empty($all1)){
            $message1 = "NEW. Wrong measures: ";
            foreach ($all1 as $key => $value) {
                $message1 .= "$key => $value" . "\n";
            }        
            $I->comment("ERROR in All Measures");
            $I->comment($message1);
        } 
        if(!empty($all2)){
            $message2 = "NEW. Absent this measures: ";
            foreach ($all2 as $key => $value) {
                $message2 .= "$key = $value" . "\n";
            }  
            $I->comment("ERROR in All Measures");
            $I->comment($message2);
        } 
    } 
}
