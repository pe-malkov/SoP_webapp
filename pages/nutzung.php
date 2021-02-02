<img id="top" src="images/top.png" alt="">
<div id="form_container">

    <h1><a>WZM-DB</a></h1>
    <form id="form_816263" class="appnitro"  method="post" action="?goto=query2">
        <div class="form_description">
            <h2>WZM-Nutzung</h2>
            <p>Datenbankzugriff auf die DB WZM</p>
        </div>                        
        <ul >

            <li id="li_1" >
            <label class="description" for="element_1">Maschinenen-ID </label>
            <div>
                <select class="element select medium" id="element_1" name="ID_n"> 
                        
<?php
    // Session-Nutzung, um die zuletzt ausgewählten Elemente in den Select-Feldern zu aktivieren!
    session_name("sop");
    session_start();

    include_once("include/connect_to_database.inc.php");
    $dblink = connect_to_database("mbi");

    $query =  "SELECT MNr FROM Maschine order by MNr;";
    $result = mysqli_query($dblink, $query);

    if ($result != false) {
        while($row = mysqli_fetch_row($result)) {
            echo "<option value=$row[0]>"; //TypNr wir übergeben
            if (isset($_SESSION["ID_n"])) {
                echo " selected";
            }
            echo ">".htmlentities($row[0])."</option>"; //MTyp wird in die Liste geschrieben
        }
    }

?>
                </select>
            </div> 
            </li>
            
            
            <li id="li_2" >
            <label class="description" for="resdat">Nuztungsdatum </label>
				<div>
					<input id="resdat" name="NDatum_n" class="element text medium tcal" type="text" maxlength="255" value="" required/> 
				</div> 
            </li>
            <li id="li_2" >
            <div>
            <input id="check1" type="checkbox" name="wdat" onclick="switchState()">
            <label class="radiolabel" for="wdat">seit letzter Wartung</label>
            </div>
            </li>
            

            <li class="buttons">
            <input type="hidden" name="form_id" value="816263" />
            <input id="saveForm" class="button_text" type="submit" name="submit" value="Absenden" />
            </li>
        </ul>
    </form>    
    <div id="footer">
        Generated by <a href="http://www.phpform.org">pForm</a>
    </div>
</div>
<img id="bottom" src="images/bottom.png" alt="">

<script>
    function switchState() {
        if (document.getElementById("check1").checked == true) {
            document.getElementById("resdat").disabled = true;
        } else if (document.getElementById("check1").checked == false) {
            document.getElementById("resdat").disabled = false;
        }
    }
</script>





