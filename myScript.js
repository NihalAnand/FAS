var tabButtons=document.querySelectorAll(".tabcontainer .buttonContainer button");
var tabPanels=document.querySelectorAll(".tabcontainer .tabPanel");

function showPanel(panelIndex,colorCode) {	
	tabButtons.forEach(function(node){
		node.style.backgroundColor="";
		node.style.color="";
		});
	tabButtons[panelIndex].style.backgroundColor=colorCode;
	tabButtons[panelIndex].style.color="orange";
	tabPanels.forEach(function(node){
		node.style.display="none";

	});
	tabPanels[panelIndex].style.display="block";
	tabPanels[panelIndex].style.backgroundColor=colorCode;
	}


