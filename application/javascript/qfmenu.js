/*
 *  tree main menu 
 */
qf.comp.qfmenu = Ext.extend(Ext.form.FormPanel,{
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
                  },
                  click:function(n,e){
                     var tabpanel = Ext.getCmp('qform_center');
                     var tab_id = n.id.replace('menu','tab');
                     
                     if(!tabpanel.hasListener('tabchange')){
                         tabpanel.addListener('tabchange',function(p,t){
                           if(t.node) 
                              t.node.select(); 
                         });
                     }
                     
                     if(!qf.center_tabs[tab_id]) {
                       var tab = tabpanel.add({
                                     id:tab_id,
                                     closable:true,
                                     node:n,
                                     autoDestroy:true,
                                     xtype:qf.load.xtype(n.attributes.tab_xtype),
                                     listeners:{
                                         beforeclose:function(){
                                            delete qf.center_tabs[this.id]; 
                                         }
                                     }
                                 });  
                       qf.center_tabs[tab_id] = tab;
                     } else {
                       var tab = tabpanel.getComponent(tab_id);  
                     }
                     tabpanel.setActiveTab(tab);
                  }
                  
                }
              });
              _this.items = [_this.panel];
              _this.listeners = {
                  
              };         
         qf.comp.qfmenu.superclass.initComponent.call(this);
	} 
});
Ext.reg('qfmenu', qf.comp.qfmenu);