<?php
$bdd = new PDO('mysql:host=localhost;dbname=prof;charset=utf8','root','');

if(isset($_GET['delete']) AND !empty($_GET['delete'])){
  $supprime = (int) $_GET['delete'];
  $red = $bdd->prepare('DELETE FROM BDD where id = ?');
  $red->execute(array($supprime));



}

if(isset($_POST['newName']) AND !empty($_POST['newName'])
 AND isset($_POST['new1Date']) AND !empty($_POST['new1Date'])
  AND isset($_POST['new2Date']) AND !empty($_POST['new2Date'])
   AND isset($_POST['new1Hour']) AND !empty($_POST['new1Hour'])
    AND isset($_POST['new2Hour']) AND !empty($_POST['new2Hour'])
    AND isset($_POST['id']) AND !empty($_POST['id'])
  ){
    $newname = $_POST['newName'];
    $newdate1 = $_POST['new1Date'];
    $newdate2 = $_POST['new2Date'];
    $newhour1 = $_POST['new1Hour'];
    $newhour2 = $_POST['new2Hour'];
    $id = $_POST['id'];

$insert = $bdd ->prepare("UPDATE BDD SET `name` = ?, `1date` = ? , `2date` = ?, `1hour` = ?, `2hour` = ? WHERE bdd.id = ?;");
$insert->execute(array($newname, $newdate1, $newdate2, $newhour1, $newhour2,$id));
  }

if(isset($_POST['name']) AND !empty($_POST['name'])
 AND isset($_POST['date1']) AND !empty($_POST['date1'])
  AND isset($_POST['date2']) AND !empty($_POST['date2'])
   AND isset($_POST['hour1']) AND !empty($_POST['hour1'])
    AND isset($_POST['hour2']) AND !empty($_POST['hour2'])
  ){
    $name = $_POST['name'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $hour1 = $_POST['hour1'];
    $hour2 = $_POST['hour2'];
  $insert = $bdd ->prepare("INSERT INTO bdd(id,name,1date,2date,1hour,2hour) VALUES (NULL,?,?,?,?,?)");
  $insert->execute(array($name, $date1, $date2, $hour1, $hour2));
}


$prof =$bdd->query('SELECT * FROM BDD');

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>admin</title>
    <style>
      table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      }
    </style>
    <style type="text/css">
    	/*###### Bouton gauche des mois ######*/
    	.MonthLeft{
    		width:14px;
    		height:50px;
    		background:url('images/static.png') -112px -250px;
    		position:absolute;
    		left:-2px;
    		top:0px;
    	}
    	.MonthLeftOver{
    		width:14px;
    		height:50px;
    		background:url('images/static.png') -126px -250px;
    		position:absolute;
    		left:-2px;
    		top:0px;
    	}
    	.MonthLeftClick{
    		width:14px;
    		height:50px;
    		background:url('images/static.png') -140px -250px;
    		position:absolute;
    		left:-2px;
    		top:0px;
    	}
    	/*###### Bouton droit des mois ######*/
    	.MonthRight{
    		width:14px;
    		height:50px;
    		background:url('images/static.png') -154px -250px;
    		position:absolute;
    		right:-2px;
    		top:0px;
    	}
    	.MonthRightOver{
    		width:14px;
    		height:50px;
    		background:url('images/static.png') -168px -250px;
    		position:absolute;
    		right:-2px;
    		top:0px;
    	}
    	.MonthRightClick{
    		width:14px;
    		height:50px;
    		background:url('images/static.png') -182px -250px;
    		position:absolute;
    		right:-2px;
    		top:0px;
    	}

    	/*###### Bouton haut des ann�es ######*/

    	.YearTop{
    		width:14px;
    		height:25px;
    		background:url('images/static.png') -196px -250px;
    		position:absolute;
    		right:-2px;
    		top:0px;
    	}
    	.YearTopOver{
    		width:14px;
    		height:25px;
    		background:url('images/static.png') -210px -250px;
    		position:absolute;
    		right:-2px;
    		top:0px;
    	}
    	.YearTopClick{
    		width:14px;
    		height:25px;
    		background:url('images/static.png') -224px -250px;
    		position:absolute;
    		right:-2px;
    		top:0px;
    	}
    	/*###### Bouton bas des ann�es ######*/

    	.YearBottom{
    		width:14px;
    		height:25px;
    		background:url('images/static.png') -196px -275px;
    		position:absolute;
    		right:-2px;
    		bottom:0px;
    	}
    	.YearBottomOver{
    		width:14px;
    		height:25px;
    		background:url('images/static.png') -210px -275px;
    		position:absolute;
    		right:-2px;
    		bottom:0px;
    	}
    	.YearBottomClick{
    		width:14px;
    		height:25px;
    		background:url('images/static.png') -224px -275px;
    		position:absolute;
    		right:-2px;
    		bottom:0px;
    	}
    	/*###### conteneur principal ######*/
    	.calendar{
    		width:300px;
    		height:250px;
    		background:url('images/static.png') no-repeat;
    		position:absolute;
    		left:400px;
    		font-weight:bold;
    		font-family:Tahoma,"Lucida Grande",Verdana,Arial,Helvetica,sans-serif;
    		font-size:11px;
    		text-align:center;
    	}

    	.contentMonth{
    		width:130px;
    		height:50px;
    		background:url('images/static.png') -100px -300px repeat-x;
    		position:absolute;
    		left:85px;
    		top:5px;
    	}
    	.pMonth{
    		width:130px;
    		height:50px;
    		line-height:50px;
    		display:block;
    	}
    	.contentDay{
    		width:56px;
    		height:50px;
    		line-height:25px;
    		text-align:center;
    		background:url('images/static.png') 0px -250px;
    		position:absolute;
    		left:15px;
    		top:5px;
    	}
    	.contentYear{
    		width:56px;
    		height:50px;
    		background:url('images/static.png') -56px -250px;
    		position:absolute;
    		left:230px;
    		top:5px;
    	}
    	.pYear{
    		width:42px;
    		height:50px;
    		line-height:50px;
    		display:block;
    	}
    	.contentListDay{
    		width:290px;
    		height:155px;
    		overflow:hidden;
    		position:absolute;
    		left:5px;
    		top:90px;

    	}
    	.contentListDay ul{
    		width:100%;
    		height:100%;
    		position:absolute;
    		margin:0px;
    		padding:2px 0px 0px 1px;
    	}
    	.dayCurrent{
    		width:41px;
    		height:25px;
    		line-height:25px;
    		display:block;
    		float:left;
    		text-align:center;
    		color:#000000;
    		font-weight:bold;
    		background:url('images/static.png') -41px -352px;
    	}
    	.liOut{
    		width:41px;
    		height:25px;
    		line-height:25px;
    		display:block;
    		float:left;
    		text-align:center;
    		color:#000000;
    		font-weight:bold;
    		background:url('images/static.png') 0px -352px;
    		cursor:pointer;
    	}
    	.liHover{
    		width:41px;
    		height:25px;
    		line-height:25px;
    		display:block;
    		float:left;
    		text-align:center;
    		color:#000000;
    		font-weight:bold;
    		background:url('images/static.png') -41px -352px;
    		cursor:pointer;
    	}
    	.liInactive{
    		width:41px;
    		height:25px;
    		line-height:25px;
    		display:block;
    		float:left;
    		text-align:center;
    		color:#000000;
    		font-weight:bold;
    		background:url('images/static.png') -82px -352px;
    	}
    	.contentNameDay{
    		width:290px;
    		height:27px;
    		line-height:27px;
    		overflow:hidden;
    		position:absolute;
    		left:5px;
    		top:63px;
    		padding:0px;
    		margin:0px;
    		list-style:none;
    	}

    	.contentNameDay li{
    		width:41px;
    		display:block;
    		float:left;
    		text-align:center;
    		color:#000000;
    		font-weight:bold;
    	}

    	.bugFrame{
    		position:absolute;
    		top:0px;
    		left:0px;
    		background:url('images/static.png') no-repeat;
    		z-index:0;
    		width:100%;
    		height:100%;
    		border:0px;
    	}
    </style>
    <script type="text/javascript">
    	var calendarElement, calendarDestruct = false, preventDouble = true;
    	document.onclick = function(e){
    		var source=window.event?window.event.srcElement:e.target;
    		if(!source.calendrier && calendarDestruct && preventDouble){
    			calendarDestruct = false;
    			calendarElement.calendarActive = false;
    			while (document.getElementById('Calendrier').childNodes.length>0) {
    				document.getElementById('Calendrier').removeChild(document.getElementById('Calendrier').firstChild);
    			}
    			document.body.removeChild(document.getElementById('Calendrier'));
    		}
    		else if(!preventDouble){preventDouble = true}
    	}
    	function calendar(element){
    		var regTest = /Debut|Fin$/;
    		if(regTest.test(element.id)){
    			this.allowFullMonth = true;
    			this.destinations = [element.id.replace(regTest, 'Debut'), element.id.replace(regTest, 'Fin')];
    		}
    		if(document.getElementById('Calendrier') && element != calendarElement){
    			while (document.getElementById('Calendrier').childNodes.length>0) {
    				document.getElementById('Calendrier').removeChild(document.getElementById('Calendrier').firstChild);
    			}
    			document.body.removeChild(document.getElementById('Calendrier'));
    			calendarElement.calendarActive = false;
    			preventDouble = false;
    		}
    		else{preventDouble = true;}
    		calendarElement = element;
    		if(!element.calendarActive){
    		//Propri�t� de la date ( ann�e , mois etc ... )
    		this.monthCurrent = null;
    		this.yearCurrent = null;
    		this.dayCurrent = null;
    		this.dateCurrent = null;
    		//Le timer pour les effet ( fade in ^^ )
    		this.timer = null;
    		/*###### Objet composant le calendrier ######*/
    		// la div principale
    		this.calendar = null;

    		this.bugFrame = null;
    		//div contenant les mois ainsi que les deux boutons suivant et pr�c�dent
    		this.contentMonth = null;
    		this.currMonth = null;
    		this.pMonth = null;
    		this.MonthLeft = null;
    		this.MonthRight = null;

    		//Div contenant l'ann�e ainsi que les deux boutons
    		this.contentYear = null;
    		this.pYear = null;
    		this.YearTop = null;
    		this.YearBottom = null;

    		//Div contenant le nom des jours
    		this.contentNameDay = null;

    		//Div contenant la liste des jours
    		this.contentListDay = null;

    		/*###### FIN des Objet du calendrier ######*/

    		//Liste des dates courantes
    		this.from = null;
    		//Liste des dates suivantes
    		this.to = null;

    		this.opacite = 0 ;
    		this.direction = null;
    		//Variable permettant de mettre a  jour le header + slide
    		this.inMove = false;
    		//Tableau d'�l�ment a d�plac�
    		this.elementToSlide = new Array();
    		//Index de l'�l�ment en cours
    		this.currentIndex = 0;
    		//Param�tre pour lancement automatique
    		this.timePause = 0 ; //permet de d�finir le temps de pause entre deux slide
    		this.auto = false ; //Permet d'activer ou non le slide automatique

    		//Input sur lequel on a cliqu�
    		this.element = (element) ? element: null;
    		element.calendarActive = true;
    		//Tableaux contenant le nom des mois et jours
    		this.monthListName = new Array('Janvier', 'F�vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao�t', 'Septembre', 'Octobre', 'Novembre', 'D�cembre');
    		this.dayListName = new Array('Lu','Ma','Me','Je','Ve','Sa','Di');
    		this.dayFullName = new Array('Lun','Mar','Mer','Jeu','Ven','Sam','Dim');

    		this.IsIE=!!document.all;

    		this.init();
    		}
    	}

    	calendar.prototype.init = function (){
    		var me = this;
    		//On cr�er une div principale
    		this.calendar = this.newElement({"typeElement":"div","classeCss":"calendar","parent":null});
    		this.calendar.id = 'Calendrier';
    		//Pour combler un bug ie , on doit ajouter les filtres d'opacit�
    		//Ajout du filtre
    	      if(this.IsIE)
    	      {
    	        this.calendar.style.filter='alpha(opacity=0)';
    	        this.calendar.filters[0].opacity=0;
    	      }
    	      else
    	      {
    	        this.calendar.style.opacity='0';
    	      }
    		//Cr�ation d'une frame pour combler un bug li� aux liste sous ie
    		this.bugFrame = this.newElement({"typeElement":"iframe","classeCss":"bugFrame","parent":this.calendar});
    		//Cr�ation d'une divContenant le fond  pour combler un bug sous ie
    		var temp = this.newElement({"typeElement":"div","classeCss":"bugFrame","parent":this.calendar});
    		//Cr�ation des contenants ( mois , ann�e , jours , listes jours etc ... )

    		this.contentDay = this.newElement({"typeElement":"div","classeCss":"contentDay","parent":this.calendar});
    		this.contentMonth = this.newElement({"typeElement":"div","classeCss":"contentMonth","parent":this.calendar});
    		this.currMonth = this.newElement({"typeElement":"div","classeCss":"currMonth","parent":this.contentMonth});
    		this.pMonth = this.newElement({"typeElement":"span","classeCss":"pMonth","parent":this.currMonth});
    		this.contentYear = this.newElement({"typeElement":"div","classeCss":"contentYear","parent":this.calendar});
    		this.pYear = this.newElement({"typeElement":"span","classeCss":"pYear","parent":this.contentYear});
    		this.contentNameDay = this.newElement({"typeElement":"ul","classeCss":"contentNameDay","parent":this.calendar});
    		this.contentListDay = this.newElement({"typeElement":"div","classeCss":"contentListDay","parent":this.calendar});

    		//Ajout des �l�ments dans les conteneurs ( bouton + initialisation des dates )
    		this.MonthLeft = this.newElement({"typeElement":"div","classeCss":"MonthLeft","parent":this.contentMonth});
    		this.MonthRight = this.newElement({"typeElement":"div","classeCss":"MonthRight","parent":this.contentMonth});
    		//Ajout des �v�nements sur les div
    		this.MonthLeft.onclick = function(){me.updateMonthBefNexCur("before");me.SlideToRight();return false};
    		this.MonthRight.onclick = function(){me.updateMonthBefNexCur("next");me.SlideToLeft();return false};
    		if(this.allowFullMonth){
    			this.currMonth.style.cursor = 'pointer';
    			this.currMonth.onclick = function(){
    				document.getElementById(me.destinations[0]).value = "1/"+ ((me.monthCurrent+1 == 13) ? 1:me.monthCurrent+1)+"/"+me.yearCurrent;
    				document.getElementById(me.destinations[1]).value = me.day_number[me.monthCurrent]+ '/' + ((me.monthCurrent+1 == 13) ? 1:me.monthCurrent+1)+"/"+me.yearCurrent;
    				calendarDestruct = false;
    				calendarElement.calendarActive = false;
    				while (document.getElementById('Calendrier').childNodes.length>0) {
    					document.getElementById('Calendrier').removeChild(document.getElementById('Calendrier').firstChild);
    				}
    				document.body.removeChild(document.getElementById('Calendrier'));
    			}
    		}

    		this.YearTop = this.newElement({"typeElement":"div","classeCss":"YearTop","parent":this.contentYear});
    		this.YearBottom = this.newElement({"typeElement":"div","classeCss":"YearBottom","parent":this.contentYear});

    		this.YearTop.onclick = function(){me.updateYearBefNexCur("next");me.SlideToTop();return false};
    		this.YearBottom.onclick = function(){me.updateYearBefNexCur("before");me.SlideToBottom();return false};
    		if(this.allowFullMonth){
    			this.pYear.style.cursor = 'pointer';
    			this.pYear.onclick = function(){
    				document.getElementById(me.destinations[0]).value = "1/1/"+me.yearCurrent;
    				document.getElementById(me.destinations[1]).value = "31/12/"+me.yearCurrent;
    				calendarDestruct = false;
    				calendarElement.calendarActive = false;
    				while (document.getElementById('Calendrier').childNodes.length>0) {
    					document.getElementById('Calendrier').removeChild(document.getElementById('Calendrier').firstChild);
    				}
    				document.body.removeChild(document.getElementById('Calendrier'));
    			}
    		}

    		//Ajout des �v�nements li�s au survol et appuis de la souris sur les �l�ments;
    		this.MonthLeft.onmouseover = function(){this.className = "MonthLeftOver"};
    		this.MonthLeft.onmouseout = function(){this.className = "MonthLeft"};
    		this.MonthLeft.onmousedown = function(){this.className = "MonthLeftClick"};
    		this.MonthLeft.onmouseup = function(){this.className = "MonthLeftOver"};

    		this.MonthRight.onmouseover = function(){this.className = "MonthRightOver"};
    		this.MonthRight.onmouseout = function(){this.className = "MonthRight"};
    		this.MonthRight.onmousedown = function(){this.className = "MonthRightClick"};
    		this.MonthRight.onmouseup = function(){this.className = "MonthRightOver"};

    		this.YearTop.onmouseover = function(){this.className = "YearTopOver"};
    		this.YearTop.onmouseout = function(){this.className = "YearTop"};
    		this.YearTop.onmousedown = function(){this.className = "YearTopClick"};
    		this.YearTop.onmouseup = function(){this.className = "YearTopOver"};

    		this.YearBottom.onmouseover = function(){this.className = "YearBottomOver"};
    		this.YearBottom.onmouseout = function(){this.className = "YearBottom"};
    		this.YearBottom.onmousedown = function(){this.className = "YearBottomClick"};
    		this.YearBottom.onmouseup = function(){this.className = "YearBottomOver"};

    		//R�cup�ration de la date du champs sinon date par d�faut

    		//Si l'�l�ment sur lequel on a cliquez n'est pas vide on extrait la date
    		if(this.element != null && this.element.value != ""){
    			var reg=new RegExp("/", "g");
    			var dateOfField = this.element.value;
    			var dateExplode = dateOfField.split(reg);
    			this.dateCurrent = this.getDateCurrent(dateExplode[0], dateExplode[1] - 1,dateExplode[2]);
    		}
    		else{
    			this.dateCurrent = this.getDateCurrent();
    		}

    		//R�cup�ration de la date du champs , sinon cr�ation d'une nouvelle;
    		this.monthCurrent = this.dateCurrent.getMonth();
    		this.yearCurrent = this.dateCurrent.getFullYear();
    		this.dayCurrent = this.dateCurrent.getDate();

    		//Cr�ation du mois courant
    		this.from = this.createContentDay(0,"left");
    		this.createMonth({"CurrentDay":this.dayCurrent,"CurrentMonth":this.monthCurrent,"CurrentYear":this.yearCurrent,"conteneur":this.from});
    		//Cr�ation de la div qui d�filera  On le remplira au moment ou on en aura besoins
    		this.to = this.createContentDay(parseInt(this.calendar.offsetWidth),"left");
    		this.createMonth({"CurrentDay":this.dayCurrent,"CurrentMonth":this.monthCurrent,"CurrentYear":this.yearCurrent,"conteneur":this.to});

    		//On ajoute les �l�ments souhait�s ( ici un tableau )  on peut utiliser la m�thode AddElement pour ajouter un seul �l�ment. on peut ajouter un id ou directement l'�l�ment ;-)
    		this.AddElements(Array(this.from,this.to));

    		//Cr�ation de l'entete
    		this.createHeader();
    		this.updateDateHeader();

    		//Positionnement du calendrier
    		this.getPosition();

    		//Apparition
    		this.fadePic(0,true);
    	}

    	calendar.prototype.getDateCurrent = function (day,month,year){

    			//Aujourd'hui si month et year ne sont pas renseign�s
    			if(year == null || month == null){
    				return (new Date());
    			}

    			else{
    				//Cr�ation d'une date en fonction de celle pass�e en param�tre
    				return (new Date(year, month , day));
    			}
    	}

    	calendar.prototype.newElement = function (parameter){
    		var typeElement = parameter['typeElement'];
    		var classToAffect = parameter['classeCss'];
    		var parent = parameter['parent'];

    		var newElement = document.createElement(typeElement);
    		newElement.className = classToAffect;
    		newElement.calendrier = true;
    		if(parent == null){
    			document.body.appendChild(newElement);
    		}
    		else{
    			parent.appendChild(newElement);
    		}
    		return newElement;
    	}

    	calendar.prototype.createMonth = function(parameter){
    		//R�cup�ration des param�tres
    		var CurrentDay = parameter["CurrentDay"];
    		var CurrentMonth = parameter["CurrentMonth"];
    		var CurrentYear = parameter["CurrentYear"];
    		var conteneur = parameter["conteneur"];

    		//On commence par d�truire toute les date du conteneur :)
    		/*for(var i = 0 , l = conteneur.childNodes.length; i < l;i++ ){
    			conteneur.removeChild(conteneur.childNodes[i]);
    		}*/
    		while (conteneur.childNodes.length>0) {
    			conteneur.removeChild(conteneur.firstChild);
    		}
    		//conteneur.innerHTML = '';

    		//Appel de la m�thode getDateCurrent retournant la date courante ou la date pass� en param�tre
    		var dateCurrent = this.getDateCurrent(CurrentDay,CurrentMonth,CurrentYear);

    		//Mois actuel
    		var monthCurrent = dateCurrent.getMonth()

    		//Ann�e actuelle
    		var yearCurrent = dateCurrent.getFullYear();

    		//Jours actuel
    		var dayCurrent = dateCurrent.getDate();

    		// On r�cup�re le premier jour de la semaine du mois
    		var dateTemp = new Date(yearCurrent, monthCurrent,1);

    		//test pour v�rifier quel jour �tait le premier du mois par rapport a la semaine
    		this.current_day_since_start_week = (( dateTemp.getDay()== 0 ) ? 6 : dateTemp.getDay() - 1);

    		//On initialise le nombre de jour par mois et on v�rifis si l'on est au mois de f�vrier
    		var nbJoursfevrier = (yearCurrent % 4) == 0 ? 29 : 28;
    		//Initialisation du tableau indiquant le nombre de jours par mois
    		this.day_number = new Array(31,nbJoursfevrier,31,30,31,30,31,31,30,31,30,31);

    		//On commence par ajouter les nombre de jours du mois pr�c�dent

    		//Calcul des date en fonction du moi pr�c�dent

    		var dayBeforeMonth = ((this.day_number[((monthCurrent == 0) ? 11:monthCurrent-1)]) - this.current_day_since_start_week)+1;

    		for(i  = dayBeforeMonth ; i <= (this.day_number[((monthCurrent == 0) ? 11:monthCurrent-1)]) ; i ++){

    			this.createDayInContent(i,false,false,conteneur);
    		}

    		//On remplit le calendrier avec le nombre de jour, en remplissant les premiers jours par des champs vides
    		for(var nbjours = 0 ; nbjours < (this.day_number[monthCurrent] + this.current_day_since_start_week) ; nbjours++){
    		//et enfin on ajoute les dates au calendrier
    		//Pour g�rer les jours "vide" et �viter de faire une boucle on v�rifit que le nombre de jours corespond bien au
    		//nombre de jour du mois
    			if(nbjours < this.day_number[monthCurrent]){
    				if(dayCurrent == (nbjours+1)){
    					this.createDayInContent(nbjours+1,true,true,conteneur);
    				}
    				else{
    					this.createDayInContent(nbjours+1,false,true,conteneur);
    				}
    			}
    		}

    		//Calcul des date en fonction du moi suivant
    		var nbCelRest = 42 - (this.day_number[monthCurrent]+this.current_day_since_start_week);

    		for(i  = 0 ; i <  nbCelRest ; i ++){

    			this.createDayInContent(i+1,false,false,conteneur);
    		}

    	}

    	calendar.prototype.createDayInContent = function (dateDay,CurrentDay,active,conteneur){
    		var me = this;
    		//Cr�ation d'un li comprenant un noeud texte avec la date du jour
    		var liDay = document.createElement("li");
    		liDay.calendrier = true;
    		var TextContent = document.createTextNode(dateDay);
    		//Pour �viter les if else ....
    		liDay.className = (CurrentDay) ? "dayCurrent":"liOut";
    		liDay.className = (!active) ? "liInactive":liDay.className;
    		liDay.appendChild(TextContent);
    		//Ajout du survol :)
    		if(active){
    			liDay.onmouseover = function(){this.className = (this.className == "dayCurrent") ? this.className : "liHover";};
    			liDay.onmouseout = function(){this.className = (this.className == "dayCurrent") ? this.className : "liOut";};
    			liDay.onclick = function(){me.dayCurrent = this.innerHTML ; me.fillField()};
    		}
    		//Ajout de l'�l�ment dans la liste
    		conteneur.appendChild(liDay);
    	}

    	calendar.prototype.createContentDay = function (positionTo,position){
    		//Cr�ation d'un li comprenant un noeud texte avec la date du jour
    		var ulDays = document.createElement("ul");
    		ulDays.calendrier = true;
    		ulDays.className = "dayCal";

    		if(position != "top"){
    			if(positionTo != null){ulDays.style.left = positionTo + "px";}
    			ulDays.style.top = 0 + "px";
    		}
    		else{
    			if(positionTo != null){ulDays.style.top = positionTo + "px";}
    			ulDays.style.left = 0 + "px";
    		}
    		this.contentListDay.appendChild(ulDays);
    		return ulDays;
    	}

    	calendar.prototype.createCalendar = function (){
    		//Cr�ation d'un li comprenant un noeud texte avec la date du jour
    		var divContent = document.createElement("div");
    		divContent.calendrier = true;
    		divContent.className = "calendrier";
    		document.body.appendChild(divContent);
    		return divContent;
    	}

    	calendar.prototype.createHeader = function(){

    		//Ajout des jours
    		for(var i = 0 , l = this.dayListName.length ; i < l ; i++){
    			var liDayTemp = document.createElement("li");
    			liDayTemp.calendrier = true;
    			TextContent = document.createTextNode(this.dayListName[i]);
    			liDayTemp.appendChild(TextContent);
    			//Ajout du jour dans la liste
    			this.contentNameDay.appendChild(liDayTemp);
    		}
    	}

    	calendar.prototype.updateDateHeader = function(){
    		var me = this ;
    		//On commence par d�truire tous les enfants des mois et ann�es
    		while (this.pMonth.childNodes.length>0) {
    			this.pMonth.removeChild(this.pMonth.firstChild);
    		}

    		while (this.pYear.childNodes.length>0) {
    			this.pYear.removeChild(this.pYear.firstChild);
    		}

    		while (this.contentDay.childNodes.length>0) {
    			this.contentDay.removeChild(this.contentDay.firstChild);
    		}

    		//Ajout de la date du jour
    		var nomDuJour =  this.dayFullName[((this.dateCurrent.getDay()-1) == -1) ? 6 :(this.dateCurrent.getDay()-1)];
    		var TextContent = document.createTextNode(nomDuJour);
    		this.contentDay.appendChild(TextContent);
    		var retourLigne = document.createElement("br");
    		this.contentDay.appendChild(retourLigne);
    		TextContent = document.createTextNode(this.dayCurrent);
    		this.contentDay.appendChild(TextContent);


    		//Ajout du mois
    		TextContent = document.createTextNode(this.monthListName[(this.monthCurrent == 12) ? 0:this.monthCurrent]);
    		this.pMonth.appendChild(TextContent);

    		//Ajout de l'ann�e
    		TextContent = document.createTextNode(this.yearCurrent);
    		this.pYear.appendChild(TextContent);
    	}

    	calendar.prototype.updateMonthBefNexCur = function(direction){

    			if(!this.inMove){
    				if(this.timer == null){
    					if(direction == "next"){
    						this.updateDate("next");
    						this.direction = "left";
    						//on le remplit
    						this.createMonth({"CurrentDay":this.dayCurrent,"CurrentMonth":this.monthCurrent,"CurrentYear":this.yearCurrent,"conteneur":this.to});
    					}
    					else if(direction == "before"){
    						this.updateDate("before");
    						this.direction = "right";
    						this.createMonth({"CurrentDay":this.dayCurrent,"CurrentMonth":this.monthCurrent,"CurrentYear":this.yearCurrent,"conteneur":this.to});

    					}
    				}
    				//On positionne la div
    				this.Positionne();
    			}
    	}

    	calendar.prototype.updateYearBefNexCur = function(direction){
    			if(!this.inMove){
    				if(this.timer == null){
    					if(direction == "next"){
    						this.yearCurrent++;
    						this.direction = "top";
    						//on le remplit
    						this.createMonth({"CurrentDay":this.dayCurrent,"CurrentMonth":this.monthCurrent,"CurrentYear":this.yearCurrent,"conteneur":this.to});
    					}
    					else if(direction == "before"){
    						this.yearCurrent--;
    						this.direction = "bottom";
    						this.createMonth({"CurrentDay":this.dayCurrent,"CurrentMonth":this.monthCurrent,"CurrentYear":this.yearCurrent,"conteneur":this.to});

    					}
    				}
    				//Mise a jour de la date courante :
    				this.dateCurrent = new Date(this.yearCurrent, this.monthCurrent,this.dayCurrent);
    				this.dateCurrent.setDate(this.dayCurrent);
    				this.updateDateHeader();
    				this.Positionne();
    			}
    	}

    	calendar.prototype.updateDate = function(direction){
    		if(this.timer == null){
    			if(direction == "before"){
    			//on calcul les dates suivante et pr�c�dente
    				if(this.monthCurrent == 0){
    					this.monthCurrent = 11;
    				}
    				else{
    					this.monthCurrent = this.monthCurrent - 1 ;
    				}
    				this.yearCurrent = (this.monthCurrent == 11 ) ? this.yearCurrent - 1:this.yearCurrent;
    			}
    			else{
    			//On r�cup�re le mois actuel puis on v�rifit que l'on est pas en janvier sinon on ajoute une ann�e
    				if(this.monthCurrent == 11){
    					this.monthCurrent = 0;

    				}
    				else{
    					this.monthCurrent =this.monthCurrent + 1;
    				}
    				this.yearCurrent = (this.monthCurrent == 0) ?  this.yearCurrent+1:this.yearCurrent;
    			}

    			//Mise a jour de la date courante :
    			this.dateCurrent = new Date(this.yearCurrent, this.monthCurrent,this.dayCurrent);
    			this.dateCurrent.setDate(this.dayCurrent);
    			this.updateDateHeader();
    		}
    	}

    	//Fonction permettant de trouver la position de l'�l�ment ( input ) pour pouvoir positioner le calendrier
    	calendar.prototype.getPosition = function() {
    	var tmpLeft = this.element.offsetLeft;
    	var tmpTop = this.element.offsetTop;
    	var MyParent = this.element.offsetParent;
    	while(MyParent) {
    		tmpLeft += MyParent.offsetLeft;
    		tmpTop += MyParent.offsetTop;
    		MyParent = MyParent.offsetParent;
    	}
    		this.calendar.style.left = tmpLeft + "px";
    		this.calendar.style.top = tmpTop +  this.element.offsetHeight + 2 +"px";
    	}

    	calendar.prototype.fillField = function(){
    		this.element.value = this.dayCurrent+"/"+ ((this.monthCurrent+1 == 13) ? 1:this.monthCurrent+1)+"/"+this.yearCurrent;
    		//On d�truit le calendrier;
    		while (this.calendar.childNodes.length>0) {
    			this.calendar.removeChild(this.calendar.firstChild);
    		}
    		document.body.removeChild(this.calendar);
    		this.element.calendarActive = false;
    		calendarDestruct = false;
    	}
    	/*##########################################################
    	############  METHODES PERMETTANT DE SCROLLER LES DATES  ##############
    	##########################################################*/
    	//Permet de r�cup�rer un �l�ment par id
    	calendar.prototype.$ = function(element){
    		return document.getElementById(element);
    	};

    	//M�thode permettant de lancer les animations si en auto :)
    	calendar.prototype.go = function(){
    		if(this.auto){
    			switch (this.direction ){
    				case 'left':
    					this.SlideToLeft();
    				break;
    				case 'right':
    					this.SlideToRight();
    				break;
    				case 'top':
    					this.SlideToTop();
    				break;
    				case 'bottom':
    					this.SlideToBottom();
    				break;
    			}
    		}
    	}

    	//M�thode permettant d'ajouter un �l�ment
    	calendar.prototype.AddElement = function(element){
    		if(typeof(element) == "string"){
    			this.elementToSlide.push(this.$(element));
    		}
    		else if(typeof(element) == "object"){
    			this.elementToSlide.push(element);
    		}
    	}

    	//M�thode permettant d'ajouter plusieurs �l�ment d'un coup
    	calendar.prototype.AddElements = function (elements){
    		for(var i = 0 , l = elements.length; i < l ;i++){
    			this.AddElement(elements[i]);
    		}
    	}

    	//M�thode permettant de d�placer les �l�ments vers la gauche
    	calendar.prototype.SlideToLeft = function(){
    		if((this.direction == null || this.direction == 'left') && this.opacite >= 100){
    			var me = this ;
    			//On v�rifit la direction pour initialiser le positionnement
    			if(this.direction != 'left'){
    					this.direction = 'left';
    					if(this.timer == null){
    						this.Positionne();
    					}
    			}
    			else if(this.direction == 'left' && this.auto && this.timer == null){
    				this.Positionne();
    			}

    			if(this.timer != null){
    				clearTimeout(this.timer);
    				this.timer = null;
    			}
    			//Si le timer n'est pas finit on d�truit l'ancienne div
    			if(parseInt(this.from.style.left) == Number.NaN || (parseInt(this.from.parentNode.offsetWidth) + parseInt(this.from.style.left))> 0){
    				this.from.style.left = parseInt(this.from.style.left) - 15 + "px";
    				this.to.style.left  =parseInt(this.to.style.left) - 15 + "px";
    				this.inMove = true;
    				this.timer = setTimeout(function(){me.SlideToLeft()},25);

    			}
    			else{
    				clearTimeout(this.timer);
    				this.timer = null;
    				this.currentIndex = (this.currentIndex == (this.elementToSlide.length-1)) ? 0:this.currentIndex + 1;
    				this.Positionne();
    				this.direction = null;
    				this.inMove = false;
    			}
    		}
    	};

    	//M�thode permettant de d�placer les �l�ments vers la droite
    	calendar.prototype.SlideToRight = function(){
    		var me = this ;
    		if((this.direction == null || this.direction == 'right') && this.opacite >= 100){
    				if(this.direction != 'right'){
    					this.direction = 'right';
    					if(this.timer == null){
    						this.Positionne();
    					}
    				}
    				else if(this.direction == 'right' && this.auto && this.timer == null){
    					this.Positionne();
    				}

    				if(this.timer != null){
    					clearTimeout(this.timer);
    					this.timer = null;
    				}
    				//Si le timer n'est pas finit on d�truit l'ancienne div
    				if(parseInt(this.from.style.left) == Number.NaN ||  parseInt(this.from.style.left) < parseInt(this.from.parentNode.offsetWidth)){
    					this.from.style.left = parseInt(this.from.style.left) + 15 + "px";
    					this.to.style.left  =parseInt(this.to.style.left) + 15 + "px";
    					this.inMove = true;
    					this.timer = setTimeout(function(){me.SlideToRight()},25);
    				}
    				else{
    					clearTimeout(this.timer);
    					this.timer = null;
    					this.currentIndex = (this.currentIndex == 0) ? this.elementToSlide.length-1:this.currentIndex - 1;
    					this.Positionne();
    					this.direction = null;
    					this.inMove = false;
    				}
    		}


    	};

    	//M�thode permettant de d�placer les �l�ments vers la gauche
    	calendar.prototype.SlideToTop = function(){
    		var me = this ;
    		if((this.direction == null || this.direction == 'top') && this.opacite >= 100){
    			//On v�rifit la direction pour initialiser le positionnement
    			if(this.direction != 'top'){
    					this.direction = 'top';
    					if(this.timer == null){
    						this.Positionne();
    					}
    			}
    			if(this.timer != null){
    				clearTimeout(this.timer);
    				this.timer = null;
    			}
    			//Si le timer n'est pas finit on d�truit l'ancienne div
    			if(parseInt(this.from.style.top) == Number.NaN || (parseInt(this.from.style.top) > - parseInt(this.from.parentNode.offsetHeight))){
    				this.from.style.top = parseInt(this.from.style.top) - 15 + "px";
    				this.to.style.top  =parseInt(this.to.style.top) - 15 + "px";
    				this.inMove = true;
    				this.timer = setTimeout(function(){me.SlideToTop()},25);
    			}
    			else{
    				clearTimeout(this.timer);
    				this.timer = null;
    				this.currentIndex = (this.currentIndex == 0) ? this.elementToSlide.length-1:this.currentIndex - 1;
    				this.Positionne();
    				this.direction = null;
    				this.inMove = false;
    			}
    		}
    	};

    	//M�thode permettant de d�placer les �l�ments vers le bas
    	calendar.prototype.SlideToBottom = function(){
    		var me = this
    		if((this.direction == null || this.direction == 'bottom') && this.opacite >= 100){
    			//On v�rifit la direction pour initialiser le positionnement
    			if(this.direction != 'bottom'){
    					this.direction = 'bottom';
    					if(this.timer == null){
    						this.Positionne();
    					}
    			}
    			if(this.timer != null){
    				clearTimeout(this.timer);
    				this.timer = null;
    			}
    			//Si le timer n'est pas finit on d�truit l'ancienne div
    			if(parseInt(this.from.style.top) == Number.NaN || parseInt(this.from.style.top) < parseInt(this.from.parentNode.offsetHeight)){
    				this.from.style.top = parseInt(this.from.style.top) + 15 + "px";
    				this.to.style.top  =parseInt(this.to.style.top) + 15 + "px";
    				this.inMove = true;
    				this.timer = setTimeout(function(){me.SlideToBottom()},25);
    			}
    			else{
    				clearTimeout(this.timer);
    				this.timer = null;
    				this.currentIndex = (this.currentIndex == this.elementToSlide.length-1) ? 0:this.currentIndex + 1;
    				this.Positionne();
    				this.direction = null;
    				this.inMove = false;
    			}
    		}
    	};

    	//Fonction initialisant le tableau en positionnant tous les �l�ments :)
    	calendar.prototype.Positionne = function(){
    		if(this.direction == 'left'){
    			//On v�rifit que l'on est pas a la fin sinon le premier devient le dernier
    			if(this.currentIndex == this.elementToSlide.length-1){
    				//r�cup�ration des �l�ments :
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[0]; //Premier �l�ment
    			}
    			else{
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[this.currentIndex + 1];
    			}
    				this.from.style.display = "block" ;
    				this.from.style.left = 0 + "px";
    				this.to.style.left = this.from.parentNode.offsetWidth + "px";
    				this.to.style.display = "block";
    				//Posionement vertical
    				this.to.style.top = 0 + "px";
    				this.from.style.top = 0 + "px" ;
    		}
    		else if(this.direction == 'right'){
    			if(this.currentIndex == 0){
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[this.elementToSlide.length-1]; // dernier �l�ment
    			}
    			else{
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[this.currentIndex-1];
    			}
    			this.from.style.display = "block" ;
    			this.from.style.left = 0 + "px";
    			this.to.style.left = - (this.from.parentNode.offsetWidth )+ "px";
    			this.to.style.display = "block";
    			//Posionement vertical
    			this.to.style.top = 0 + "px";
    			this.from.style.top = 0 + "px" ;
    		}
    		else if(this.direction == 'bottom'){
    			if(this.currentIndex == this.elementToSlide.length-1){
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[0]; // dernier �l�ment
    			}
    			else{
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[this.currentIndex+1];
    			}
    			this.from.style.display = "block" ;
    			this.from.style.top = 0 + "px";
    			this.to.style.top = - (this.from.parentNode.offsetHeight )+ "px";
    			this.to.style.display = "block";
    			//Posionement horizontal
    			this.to.style.left = 0 + "px";
    			this.from.style.left = 0 + "px" ;
    		}
    		else if(this.direction == 'top'){
    			if(this.currentIndex == 0){
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[this.elementToSlide.length-1]; // dernier �l�ment
    			}
    			else{
    				this.from = this.elementToSlide[this.currentIndex];
    				this.to = this.elementToSlide[this.currentIndex-1];
    			}
    			this.from.style.display = "block" ;
    			this.from.style.top = 0 + "px";
    			this.to.style.top = (this.from.parentNode.offsetHeight )+ "px";
    			this.to.style.display = "block";
    			//Posionement horizontal
    			this.to.style.left = 0 + "px";
    			this.from.style.left = 0 + "px" ;
    		}
    	};

    	calendar.prototype.fadePic = function (current,up){
    		this.calendar.style.display = "block";
    		this.opacite = current ;
    		this.up = up ;

    		if (this.opacite< 100 && this.up){
    			this.opacite+=3;
    			this.IsIE?this.calendar.filters[0].opacity=this.opacite:this.calendar.style.opacity=this.opacite/100;
    			var me = this;
    			this.timer = setTimeout(function(){me.fadePic(me.opacite,true)},25);
    		}
    		else{
    			clearTimeout(this.timer);
    			this.timer = null;
    			this.up = false;
    			calendarDestruct = true;
    		}
    	}
    	</script>
  </head>
  <body>
    <table>
      <?php while ($p = $prof->fetch()) {?>
        <tr>
          <form method="post" action="index.php">
            <input style="display:none;" type="text" name="id" value="<?= $p['id']?>"/>
            <td><input type="text" name="newName" value="<?= $p['name']?>"/></td>
            <td><input type="text" name="new1Date" value="<?= $p['1date']?>" onclick="new calendar(this);"/></td>
            <td><input type="text" name="new2Date" value="<?= $p['2date']?>" onclick="new calendar(this);"/></td>
            <td><input type="text" name="new1Hour" value="<?= $p['1hour']?>"/></td>
            <td><input type="text" name="new2Hour" value="<?= $p['2hour']?>"/></td>
              <td><a href="index.php?delete=<?= $p['id'] ?>">Suprimmer</a></td>
              <td><input type="submit" value="modifier"/></td>
            </tr>
        </form>
      <?php }?>
      <tr>
        <form method="post" action="index.php">
          <td><input type="text" name="name" placeholder="name"/></td>
          <td><input type="text" name="date1" placeholder="date1"/ onclick="new calendar(this);"></td>
          <td><input type="text" name="date2" placeholder="date2"/ onclick="new calendar(this);"></td>
          <td><input type="text" name="hour1" placeholder="hour1"/></td>
          <td><input type="text" name="hour2" placeholder="hour2"/></td>
          <td><input type="submit" value="Ajouter"/></td>
        </from>
      </tr>
  </body>
</html>
