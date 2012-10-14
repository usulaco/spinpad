/*
 *  tree main menu 
 */
qf.comp.menu = Ext.extend(Ext.form.FormPanel,{
        title:'{_MENU}',
        layout:'fit',
	initComponent:function(){   
	  var _this = this;
              _this.loader = new Ext.tree.TreeLoader({
                dataUrl: 'qform/loadmenu',
                nodeParameter:'menu_id'
              });
              _this.panel = new Ext.tree.TreePanel({
                loader:_this.loader,
                autoDestroy:true,
                autoScroll:true,
                border:false,
                rootVisible:false,
                root: {
                    nodeType: 'async',
                    text: '{_APPLICATION_ROOT}',
                    draggable: false,
                    id: 'menu.0',
                    expanded:true
                },
                listeners:{
                  contextmenu:function(n,e){
                      console.log(e);
                  }
                }
              });
              _this.items = [_this.panel];
              _this.listeners = {
                  
              };         
         qf.comp.menu.superclass.initComponent.call(this);
	} 
});
Ext.reg('menu', qf.comp.menu);