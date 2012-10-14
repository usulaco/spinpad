qf.comp.centertabpanel = Ext.extend(Ext.Panel,{
        title:'{_CENTER_PANEL}',
	initComponent:function(){   
	  var _this = this;
              _this.items = [];
          qf.comp.centertabpanel.superclass.initComponent.call(this);
	} 
});
Ext.reg('centertabpanel', qf.comp.centertabpanel);

