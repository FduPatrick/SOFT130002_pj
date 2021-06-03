
function alert1(text)
{
    var a,p,btn,btntext,ptext;
    a=document.createElement('div');
    p=document.createElement('p');
    btn=document.createElement('button');
    ptext=document.createTextNode(text);
    btntext=document.createTextNode('确定');
    css(a,{
        

        "position" : "fixed",
        
        "left" : "0",
        
        "right" : "0",
        
        "top" : "30%",

        "height" : "90px",
        
        "width" : "300px",
        
        "margin" : "0 auto",
        
        "background-color" : "rgba(200,200,200,0.9)",
        
        "font-size" : "20px",
        
        "text-align" : "center",

        "border" : "1px solid "
        
        });
        
    css(btn,{
        "cursor"  :  "pointer",

        "display" : "block",

        "width" : "100px",

        "margin" : "0 auto",

        "height" : "30px",

        "bottom" : "5px",

        "margin-top" : "15px"
    
        
    
    })
    css(p,{
        "margin-top" : "10px",
    })
    p.appendChild(ptext);
    btn.appendChild(btntext);
    a.appendChild(p);
    a.appendChild(btn);
    //构建弹出框结构
    
    document.getElementsByTagName('body')[0].appendChild(a);//整体显示到页面内
    btn.onclick=function(){
        a.remove();
    }

}
function css(targetobj,cssobj)
{
    for(var i in cssobj)
    {
        targetobj.style[i]=cssobj[i];
    }
}

    
