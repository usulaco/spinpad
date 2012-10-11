qf.comp.logo = Ext.extend(Ext.form.FormPanel,{
        border:false,
        layout:'fit',
        padding:0,
        text:'QForm',
	initComponent:function(){   
	  var _this = this;
              _this.items = [{
                  xtype:'panel',
                  bodyStyle:{
                        'display':'table-cell',
                        'text-align':'center',
                        'vertical-align':'middle',
                        'font-family':'verdana',
                        'color':'#ddd',
                        'font-size':'11px',
                        'border':'0px'
                  },
                  html: '<div style="text-align:center;"><div style="padding-top:15px;border-radius:4px;border:1px solid #ddd;height:30px;width:150px;margin:auto;">'+_this.text+'</div></div>',
                  listeners:{
                      afterrender:function(){
                         $($(this.body.dom).find('div')[1]).mouseenter(function(){
                             $(this).css({'background':'#ddd',color:'#FFF'}); 
                         }).mouseout(function(){
                             $(this).css({'background':'#FFF',color:'#ddd'}); 
                         });
                         
                      }
                  }
              }];
          qf.comp.logo.superclass.initComponent.call(this);
	} 
});
Ext.reg('logo', qf.comp.logo);