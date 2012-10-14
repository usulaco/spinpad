qf.comp.qfmenueditor = Ext.extend(Ext.Panel,{
        title:'{_MAIN_MENU_EDITOR}',
	initComponent:function(){   
	  var _this = this;
              _this.items = [];
          qf.comp.qfmenueditor.superclass.initComponent.call(this);
	} 
});
Ext.reg('qfmenueditor', qf.comp.qfmenueditor);