		fixMozillaZIndex=true; 
        _menuCloseDelay=50;
        _menuOpenDelay=150;
        _subOffsetTop=2;
        _subOffsetLeft=-300;

        with(menuStyle=new mm_style()){
        bordercolor="#CCCCCC";
        borderstyle="solid";
        borderwidth=1;
        fontfamily="Verdana, Arial, Helvetica, sans-serif";
        fontsize="11px";
        fontstyle="bold";
        headerbgcolor="#000000";
        headercolor="#000000";
        offbgcolor="#4d7598";
        offcolor="#f5f5f5";
        onbgcolor="#7baad3";
        oncolor="#000000";
        outfilter="randomdissolve(duration=0.3)";
        overfilter="Fade(duration=0.2);Alpha(opacity=90);Shadow(color=#777777', Direction=135, Strength=5)";
        padding=5;
        pagebgcolor="#FFFFFF";
        pagecolor="black";
        separatorcolor="#FFFFFF";
        separatorsize=1;
     }
	 
	
with(milonic=new menuname("Skill Development Initiatives"))
	{
		style=menuStyle;
		aI("text=Why and How comes;url=Why_How.asp;");
											
		style=menuStyle;
		aI("text=Application Forms ;url=pdf/ApplicationForm.pdf; target=blank");

		style=menuStyle;
		aI("text=List of VTPs ;url=VTP.asp;");
		
		style=menuStyle;
		aI("text=Financial and Physical Achievements ;url=#");
		
		style=menuStyle;
		aI("text=Testing and Certification;url=#");
		
		style=menuStyle;
		aI("text=Success Stories  ;url=#");
		
		style=menuStyle;
		aI("text=Rules and Procedure  ;url=#");
		
		style=menuStyle;
		aI("text=Monitoring ;url=#");
		
		style=menuStyle;
		aI("text=Disclosure Management ;url=#");
		
		
	}

drawMenus();

with(milonic=new menuname("Vendor")){
style=menuStyle;
aI("text=Supplier;url=#;");
aI("text=Customers ;url=#;");
aI("text=Contractors;url=#");
}
drawMenus();