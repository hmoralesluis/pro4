

    (function(f,h,c,j,d,l,k){/*! Jssor */
    new(function(){});var e={yd:function(a){return-c.cos(a*c.PI)/2+.5},ec:function(a){return a},Dd:function(a){return-a*(a-2)}},g={Ce:e.ec};var b=new function(){var g=this,G=1,db=2,hb=3,gb=4,lb=5,H,r=0,i=0,s=0,W=0,z=0,J=navigator,pb=J.appName,o=J.userAgent,p=parseFloat;function zb(){if(!H){H={Zd:"ontouchstart"in f||"createTouch"in h};var a;if(J.pointerEnabled||(a=J.msPointerEnabled))H.Vc=a?"msTouchAction":"touchAction"}return H}function v(j){if(!r){r=-1;if(pb=="Microsoft Internet Explorer"&&!!f.attachEvent&&!!f.ActiveXObject){var e=o.indexOf("MSIE");r=G;s=p(o.substring(e+5,o.indexOf(";",e)));/*@cc_on W=@_jscript_version@*/;i=h.documentMode||s}else if(pb=="Netscape"&&!!f.addEventListener){var d=o.indexOf("Firefox"),b=o.indexOf("Safari"),g=o.indexOf("Chrome"),c=o.indexOf("AppleWebKit");if(d>=0){r=db;i=p(o.substring(d+8))}else if(b>=0){var k=o.substring(0,b).lastIndexOf("/");r=g>=0?gb:hb;i=p(o.substring(k+1,b))}else{var a=/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(o);if(a){r=G;i=s=p(a[1])}}if(c>=0)z=p(o.substring(c+12))}else{var a=/(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(o);if(a){r=lb;i=p(a[2])}}}return j==r}function q(){return v(G)}function R(){return q()&&(i<6||h.compatMode=="BackCompat")}function fb(){return v(hb)}function kb(){return v(lb)}function wb(){return fb()&&z>534&&z<535}function K(){v();return z>537||i>42||r==G&&i>=11}function P(){return q()&&i<9}function xb(a){var b,c;return function(f){if(!b){b=d;var e=a.substr(0,1).toUpperCase()+a.substr(1);n([a].concat(["WebKit","ms","Moz","O","webkit"]),function(g,d){var b=a;if(d)b=g+e;if(f.style[b]!=k)return c=b})}return c}}function vb(b){var a;return function(c){a=a||xb(b)(c)||b;return a}}var L=vb("transform");function ob(a){return{}.toString.call(a)}var F;function Hb(){if(!F){F={};n(["Boolean","Number","String","Function","Array","Date","RegExp","Object"],function(a){F["[object "+a+"]"]=a.toLowerCase()})}return F}function n(b,d){var a,c;if(ob(b)=="[object Array]"){for(a=0;a<b.length;a++)if(c=d(b[a],a,b))return c}else for(a in b)if(c=d(b[a],a,b))return c}function C(a){return a==j?String(a):Hb()[ob(a)]||"object"}function A(a){try{return C(a)=="object"&&!a.nodeType&&a!=a.window&&(!a.constructor||{}.hasOwnProperty.call(a.constructor.prototype,"isPrototypeOf"))}catch(b){}}function u(a,b){return{x:a,y:b}}function sb(b,a){setTimeout(b,a||0)}function I(b,d,c){var a=!b||b=="inherit"?"":b;n(d,function(c){var b=c.exec(a);if(b){var d=a.substr(0,b.index),e=a.substr(b.index+b[0].length+1,a.length-1);a=d+e}});a=c+(!a.indexOf(" ")?"":" ")+a;return a}function ub(b,a){if(i<9)b.style.filter=a}g.Kd=zb;g.Rc=q;g.Nd=fb;g.Qd=K;g.dc=P;xb("transform");g.fc=function(){return i};g.ic=sb;function Z(a){a.constructor===Z.caller&&a.lc&&a.lc.apply(a,Z.caller.arguments)}g.lc=Z;g.Ib=function(a){if(g.Ud(a))a=h.getElementById(a);return a};function t(a){return a||f.event}g.mc=t;g.Cb=function(b){b=t(b);var a=b.target||b.srcElement||h;if(a.nodeType==3)a=g.pc(a);return a};g.sc=function(a){a=t(a);return{x:a.pageX||a.clientX||0,y:a.pageY||a.clientY||0}};function D(c,d,a){if(a!==k)c.style[d]=a==k?"":a;else{var b=c.currentStyle||c.style;a=b[d];if(a==""&&f.getComputedStyle){b=c.ownerDocument.defaultView.getComputedStyle(c,j);b&&(a=b.getPropertyValue(d)||b[d])}return a}}function bb(b,c,a,d){if(a!==k){if(a==j)a="";else d&&(a+="px");D(b,c,a)}else return p(D(b,c))}function m(c,a){var d=a?bb:D,b;if(a&4)b=vb(c);return function(e,f){return d(e,b?b(e):c,f,a&2)}}function Eb(b){if(q()&&s<9){var a=/opacity=([^)]*)/.exec(b.style.filter||"");return a?p(a[1])/100:1}else return p(b.style.opacity||"1")}function Gb(b,a,f){if(q()&&s<9){var h=b.style.filter||"",i=new RegExp(/[\s]*alpha\([^\)]*\)/g),e=c.round(100*a),d="";if(e<100||f)d="alpha(opacity="+e+") ";var g=I(h,[i],d);ub(b,g)}else b.style.opacity=a==1?"":c.round(a*100)/100}var M={L:["rotate"],I:["rotateX"],E:["rotateY"],ob:["skewX"],nb:["skewY"]};if(!K())M=B(M,{k:["scaleX",2],l:["scaleY",2],G:["translateZ",1]});function N(d,a){var c="";if(a){if(q()&&i&&i<10){delete a.I;delete a.E;delete a.G}b.e(a,function(d,b){var a=M[b];if(a){var e=a[1]||0;if(O[b]!=d)c+=" "+a[0]+"("+d+(["deg","px",""])[e]+")"}});if(K()){if(a.J||a.R||a.G)c+=" translate3d("+(a.J||0)+"px,"+(a.R||0)+"px,"+(a.G||0)+"px)";if(a.k==k)a.k=1;if(a.l==k)a.l=1;if(a.k!=1||a.l!=1)c+=" scale3d("+a.k+", "+a.l+", 1)"}}d.style[L(d)]=c}g.tc=m("transformOrigin",4);g.te=m("backfaceVisibility",4);g.ye=m("transformStyle",4);g.we=m("perspective",6);g.xe=m("perspectiveOrigin",4);g.Ae=function(a,b){if(q()&&s<9||s<10&&R())a.style.zoom=b==1?"":b;else{var c=L(a),f="scale("+b+")",e=a.style[c],g=new RegExp(/[\s]*scale\(.*?\)/g),d=I(e,[g],f);a.style[c]=d}};g.Bc=function(b,a){return function(c){c=t(c);var e=c.type,d=c.relatedTarget||(e=="mouseout"?c.toElement:c.fromElement);(!d||d!==a&&!g.Be(a,d))&&b(c)}};g.a=function(a,d,b,c){a=g.Ib(a);if(a.addEventListener){d=="mousewheel"&&a.addEventListener("DOMMouseScroll",b,c);a.addEventListener(d,b,c)}else if(a.attachEvent){a.attachEvent("on"+d,b);c&&a.setCapture&&a.setCapture()}};g.fb=function(a,c,d,b){a=g.Ib(a);if(a.removeEventListener){c=="mousewheel"&&a.removeEventListener("DOMMouseScroll",d,b);a.removeEventListener(c,d,b)}else if(a.detachEvent){a.detachEvent("on"+c,d);b&&a.releaseCapture&&a.releaseCapture()}};g.Pb=function(a){a=t(a);a.preventDefault&&a.preventDefault();a.cancel=d;a.returnValue=l};g.ze=function(a){a=t(a);a.stopPropagation&&a.stopPropagation();a.cancelBubble=d};g.mb=function(d,c){var a=[].slice.call(arguments,2),b=function(){var b=a.concat([].slice.call(arguments,0));return c.apply(d,b)};return b};g.xb=function(d,c){for(var b=[],a=d.firstChild;a;a=a.nextSibling)(c||a.nodeType==1)&&b.push(a);return b};function nb(a,c,e,b){b=b||"u";for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){if(V(a,b)==c)return a;if(!e){var d=nb(a,c,e,b);if(d)return d}}}g.s=nb;function ib(a,c,d){for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){if(a.tagName==c)return a;if(!d){var b=ib(a,c,d);if(b)return b}}}g.ed=ib;function B(){var e=arguments,d,c,b,a,g=1&e[0],f=1+g;d=e[f-1]||{};for(;f<e.length;f++)if(c=e[f])for(b in c){a=c[b];if(a!==k){a=c[b];var h=d[b];d[b]=g&&(A(h)||A(a))?B(g,{},h,a):a}}return d}g.yb=B;g.bd=function(a){return C(a)=="function"};g.Ud=function(a){return C(a)=="string"};g.gd=function(a){return!isNaN(p(a))&&isFinite(a)};g.e=n;function S(a){return h.createElement(a)}g.vb=function(){return S("DIV")};g.Hc=function(){};function X(b,c,a){if(a==k)return b.getAttribute(c);b.setAttribute(c,a)}function V(a,b){return X(a,b)||X(a,"data-"+b)}g.lb=X;g.f=V;function x(b,a){if(a==k)return b.className;b.className=a}g.Dc=x;g.pc=function(a){return a.parentNode};g.v=function(a){g.z(a,"none")};g.Bb=function(a,b){g.z(a,b?"none":"")};g.hd=function(b,a){b.removeAttribute(a)};g.jd=function(){return q()&&i<10};g.fd=function(d,a){if(a)d.style.clip="rect("+c.round(a.g)+"px "+c.round(a.o)+"px "+c.round(a.p)+"px "+c.round(a.i)+"px)";else if(a!==k){var g=d.style.cssText,f=[new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i),new RegExp(/[\s]*cliptop: .*?[;]?/i),new RegExp(/[\s]*clipright: .*?[;]?/i),new RegExp(/[\s]*clipbottom: .*?[;]?/i),new RegExp(/[\s]*clipleft: .*?[;]?/i)],e=I(g,f,"");b.Nb(d,e)}};g.B=function(){return+new Date};g.K=function(b,a){b.appendChild(a)};g.Rb=function(b,a,c){(c||a.parentNode).insertBefore(b,a)};g.uc=function(b,a){a=a||b.parentNode;a&&a.removeChild(b)};g.ld=function(a,b){n(a,function(a){g.uc(a,b)})};g.Ec=function(a){g.ld(g.xb(a,d),a)};g.Fd=function(a,b){var c=g.pc(a);b&1&&g.D(a,(g.m(c)-g.m(a))/2);b&2&&g.F(a,(g.n(c)-g.n(a))/2)};g.Cd=function(b,a){return parseInt(b,a||10)};g.Bd=p;g.Be=function(b,a){var c=h.body;while(a&&b!==a&&c!==a)try{a=a.parentNode}catch(d){return l}return b===a};function Y(d,c,b){var a=d.cloneNode(!c);!b&&g.hd(a,"id");return a}g.jb=Y;g.gb=function(e,f){var a=new Image;function b(e,d){g.fb(a,"load",b);g.fb(a,"abort",c);g.fb(a,"error",c);f&&f(a,d)}function c(a){b(a,d)}if(kb()&&i<11.6||!e)b(!e);else{g.a(a,"load",b);g.a(a,"abort",c);g.a(a,"error",c);a.src=e}};g.Ad=function(d,a,e){var c=d.length+1;function b(b){c--;if(a&&b&&b.src==a.src)a=b;!c&&e&&e(a)}n(d,function(a){g.gb(a.src,b)});b()};g.M=D;g.Ab=m("overflow");g.F=m("top",2);g.D=m("left",2);g.m=m("width",2);g.n=m("height",2);g.kd=m("marginLeft",2);g.Id=m("marginTop",2);g.r=m("position");g.z=m("display");g.q=m("zIndex",1);g.Ob=function(b,a,c){if(a!=k)Gb(b,a,c);else return Eb(b)};g.Nb=function(a,b){if(b!=k)a.style.cssText=b;else return a.style.cssText};var U={bb:g.Ob,g:g.F,i:g.D,rb:g.m,qb:g.n,Y:g.r,Ne:g.z,X:g.q};function w(f,l){var e=P(),b=K(),d=wb(),h=L(f);function i(b,d,a){var e=b.N(u(-d/2,-a/2)),f=b.N(u(d/2,-a/2)),g=b.N(u(d/2,a/2)),h=b.N(u(-d/2,a/2));b.N(u(300,300));return u(c.min(e.x,f.x,g.x,h.x)+d/2,c.min(e.y,f.y,g.y,h.y)+a/2)}function a(d,a){a=a||{};var f=a.G||0,l=(a.I||0)%360,m=(a.E||0)%360,o=(a.L||0)%360,p=a.Me;if(e){f=0;l=0;m=0;p=0}var c=new Db(a.J,a.R,f);c.I(l);c.E(m);c.Hd(o);c.vd(a.ob,a.nb);c.td(a.k,a.l,p);if(b){c.V(a.cb,a.hb);d.style[h]=c.sd()}else if(!W||W<9){var j="";if(o||a.k!=k&&a.k!=1||a.l!=k&&a.l!=1){var n=i(c,a.O,a.P);g.Id(d,n.y);g.kd(d,n.x);j=c.rd()}var r=d.style.filter,s=new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g),q=I(r,[s],j);ub(d,q)}}w=function(e,c){c=c||{};var h=c.cb,i=c.hb,f;n(U,function(a,b){f=c[b];f!==k&&a(e,f)});g.fd(e,c.c);if(!b){h!=k&&g.D(e,c.Nc+h);i!=k&&g.F(e,c.Pc+i)}if(c.qd)if(d)sb(g.mb(j,N,e,c));else a(e,c)};g.pb=N;if(d)g.pb=w;if(e)g.pb=a;else if(!b)a=N;g.C=w;w(f,l)}g.pb=w;g.C=w;function Db(i,l,p){var d=this,b=[1,0,0,0,0,1,0,0,0,0,1,0,i||0,l||0,p||0,1],h=c.sin,g=c.cos,m=c.tan;function f(a){return a*c.PI/180}function o(a,b){return{x:a,y:b}}function n(c,e,l,m,o,r,t,u,w,z,A,C,E,b,f,k,a,g,i,n,p,q,s,v,x,y,B,D,F,d,h,j){return[c*a+e*p+l*x+m*F,c*g+e*q+l*y+m*d,c*i+e*s+l*B+m*h,c*n+e*v+l*D+m*j,o*a+r*p+t*x+u*F,o*g+r*q+t*y+u*d,o*i+r*s+t*B+u*h,o*n+r*v+t*D+u*j,w*a+z*p+A*x+C*F,w*g+z*q+A*y+C*d,w*i+z*s+A*B+C*h,w*n+z*v+A*D+C*j,E*a+b*p+f*x+k*F,E*g+b*q+f*y+k*d,E*i+b*s+f*B+k*h,E*n+b*v+f*D+k*j]}function e(c,a){return n.apply(j,(a||b).concat(c))}d.td=function(a,c,d){if(a==k)a=1;if(c==k)c=1;if(d==k)d=1;if(a!=1||c!=1||d!=1)b=e([a,0,0,0,0,c,0,0,0,0,d,0,0,0,0,1])};d.V=function(a,c,d){b[12]+=a||0;b[13]+=c||0;b[14]+=d||0};d.I=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([1,0,0,0,0,d,i,0,0,-i,d,0,0,0,0,1])}};d.E=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([d,0,-i,0,0,1,0,0,i,0,d,0,0,0,0,1])}};d.Hd=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([d,i,0,0,-i,d,0,0,0,0,1,0,0,0,0,1])}};d.vd=function(a,c){if(a||c){i=f(a);l=f(c);b=e([1,m(l),0,0,m(i),1,0,0,0,0,1,0,0,0,0,1])}};d.N=function(c){var a=e(b,[1,0,0,0,0,1,0,0,0,0,1,0,c.x,c.y,0,1]);return o(a[12],a[13])};d.sd=function(){return"matrix3d("+b.join(",")+")"};d.rd=function(){return"progid:DXImageTransform.Microsoft.Matrix(M11="+b[0]+", M12="+b[4]+", M21="+b[1]+", M22="+b[5]+", SizingMethod='auto expand')"}}new function(){var a=this;function b(d,g){for(var j=d[0].length,i=d.length,h=g[0].length,f=[],c=0;c<i;c++)for(var k=f[c]=[],b=0;b<h;b++){for(var e=0,a=0;a<j;a++)e+=d[c][a]*g[a][b];k[b]=e}return f}a.k=function(b,c){return a.Uc(b,c,0)};a.l=function(b,c){return a.Uc(b,0,c)};a.Uc=function(a,c,d){return b(a,[[c,0],[0,d]])};a.N=function(d,c){var a=b(d,[[c.x],[c.y]]);return u(a[0][0],a[1][0])}};var O={Nc:0,Pc:0,cb:0,hb:0,Q:1,k:1,l:1,L:0,I:0,E:0,J:0,R:0,G:0,ob:0,nb:0};g.od=function(a){var c=a||{};if(a)if(b.bd(a))c={Vb:c};else if(b.bd(a.c))c.c={Vb:a.c};return c};g.nd=function(l,m,w,n,y,z,o){var a=m;if(l){a={};for(var g in m){var A=z[g]||1,v=y[g]||[0,1],f=(w-v[0])/v[1];f=c.min(c.max(f,0),1);f=f*A;var u=c.floor(f);if(f!=u)f-=u;var h=n.Vb||e.yd,i,B=l[g],q=m[g];if(b.gd(q)){h=n[g]||h;var x=h(f);i=B+q*x}else{i=b.yb({zb:{}},l[g]);b.e(q.zb||q,function(d,a){if(n.c)h=n.c[a]||n.c.Vb||h;var c=h(f),b=d*c;i.zb[a]=b;i[a]+=b})}a[g]=i}var t=b.e(m,function(b,a){return O[a]!=k});t&&b.e(O,function(c,b){if(a[b]==k&&l[b]!==k)a[b]=l[b]});if(t){if(a.Q)a.k=a.l=a.Q;a.O=o.O;a.P=o.P;a.qd=d}}if(m.c&&o.V){var p=a.c.zb,s=(p.g||0)+(p.p||0),r=(p.i||0)+(p.o||0);a.i=(a.i||0)+r;a.g=(a.g||0)+s;a.c.i-=r;a.c.o-=r;a.c.g-=s;a.c.p-=s}if(a.c&&b.jd()&&!a.c.g&&!a.c.i&&a.c.o==o.O&&a.c.p==o.P)a.c=j;return a}};function n(){var a=this,d=[];function i(a,b){d.push({Wb:a,Yb:b})}function h(a,c){b.e(d,function(b,e){b.Wb==a&&b.Yb===c&&d.splice(e,1)})}a.db=a.addEventListener=i;a.removeEventListener=h;a.j=function(a){var c=[].slice.call(arguments,1);b.e(d,function(b){b.Wb==a&&b.Yb.apply(f,c)})}}var m=function(z,C,i,J,M,L){z=z||0;var a=this,q,n,o,u,A=0,G,H,F,B,y=0,h=0,m=0,D,k,g,e,p,w=[],x;function O(a){g+=a;e+=a;k+=a;h+=a;m+=a;y+=a}function t(o){var f=o;if(p&&(f>=e||f<=g))f=((f-g)%p+p)%p+g;if(!D||u||h!=f){var j=c.min(f,e);j=c.max(j,g);if(!D||u||j!=m){if(L){var l=(j-k)/(C||1);if(i.md)l=1-l;var n=b.nd(M,L,l,G,F,H,i);if(x)b.e(n,function(b,a){x[a]&&x[a](J,b)});else b.C(J,n)}a.Sb(m-k,j-k);m=j;b.e(w,function(b,c){var a=o<h?w[w.length-c-1]:b;a.u(m-y)});var r=h,q=m;h=f;D=d;a.kb(r,q)}}}function E(a,b,d){b&&a.Tb(e);if(!d){g=c.min(g,a.jc()+y);e=c.max(e,a.Zb()+y)}w.push(a)}var r=f.requestAnimationFrame||f.webkitRequestAnimationFrame||f.mozRequestAnimationFrame||f.msRequestAnimationFrame;if(b.Nd()&&b.fc()<7)r=j;r=r||function(a){b.ic(a,i.hc)};function I(){if(q){var d=b.B(),e=c.min(d-A,i.Ac),a=h+e*o;A=d;if(a*o>=n*o)a=n;t(a);if(!u&&a*o>=n*o)K(B);else r(I)}}function s(f,i,j){if(!q){q=d;u=j;B=i;f=c.max(f,g);f=c.min(f,e);n=f;o=n<h?-1:1;a.nc();A=b.B();r(I)}}function K(b){if(q){u=q=B=l;a.rc();b&&b()}}a.vc=function(a,b,c){s(a?h+a:e,b,c)};a.yc=s;a.T=K;a.Yd=function(a){s(a)};a.A=function(){return h};a.Yc=function(){return n};a.eb=function(){return m};a.u=t;a.V=function(a){t(h+a)};a.cd=function(){return q};a.pd=function(a){p=a};a.Tb=O;a.Lc=function(a,b){E(a,0,b)};a.Jb=function(a){E(a,1)};a.jc=function(){return g};a.Zb=function(){return e};a.kb=a.nc=a.rc=a.Sb=b.Hc;a.Lb=b.B();i=b.yb({hc:16,Ac:50},i);p=i.ad;x=i.wd;g=k=z;e=z+C;H=i.xd||{};F=i.zd||{};G=b.od(i.ib)};new(function(){});var i=function(p,fc){var g=this;function Bc(){var a=this;m.call(a,-1e8,2e8);a.be=function(){var b=a.eb(),d=c.floor(b),f=t(d),e=b-c.floor(b);return{S:f,ce:d,Y:e}};a.kb=function(b,a){var e=c.floor(a);if(e!=a&&a>b)e++;Ub(e,d);g.j(i.re,t(a),t(b),a,b)}}function Ac(){var a=this;m.call(a,0,0,{ad:r});b.e(C,function(b){D&1&&b.pd(r);a.Jb(b);b.Tb(ib/bc)})}function zc(){var a=this,b=Tb.H;m.call(a,-1,2,{ib:e.ec,wd:{Y:Zb},ad:r},b,{Y:1},{Y:-2});a.Fb=b}function nc(o,n){var b=this,e,f,h,k,c;m.call(b,-1e8,2e8,{Ac:100});b.nc=function(){M=d;S=j;g.j(i.qe,t(w.A()),w.A())};b.rc=function(){M=l;k=l;var a=w.be();g.j(i.pe,t(w.A()),w.A());!a.Y&&Dc(a.ce,s)};b.kb=function(i,g){var b;if(k)b=c;else{b=f;if(h){var d=g/h;b=a.Zc(d)*(f-e)+e}}w.u(b)};b.wb=function(a,d,c,g){e=a;f=d;h=c;w.u(a);b.u(0);b.yc(c,g)};b.Jd=function(a){k=d;c=a;b.vc(a,j,d)};b.ne=function(a){c=a};w=new Bc;w.Lc(o);w.Lc(n)}function pc(){var c=this,a=Xb();b.q(a,0);b.M(a,"pointerEvents","none");c.H=a;c.tb=function(){b.v(a);b.Ec(a)}}function xc(o,f){var e=this,q,L,v,k,y=[],x,B,W,G,Q,F,h,w,p;m.call(e,-u,u+1,{});function E(a){q&&q.Xc();T(o,a,0);F=d;q=new I.ab(o,I,b.Bd(b.f(o,"idle"))||lc);q.u(0)}function Z(){q.Lb<I.Lb&&E()}function M(p,r,o){if(!G){G=d;if(k&&o){var h=o.width,c=o.height,n=h,m=c;if(h&&c&&a.Z){if(a.Z&3&&(!(a.Z&4)||h>K||c>J)){var j=l,q=K/J*c/h;if(a.Z&1)j=q>1;else if(a.Z&2)j=q<1;n=j?h*J/c:K;m=j?J:c*K/h}b.m(k,n);b.n(k,m);b.F(k,(J-m)/2);b.D(k,(K-n)/2)}b.r(k,"absolute");g.j(i.ke,f)}}b.v(r);p&&p(e)}function Y(b,c,d,g){if(g==S&&s==f&&N)if(!Cc){var a=t(b);A.Rd(a,f,c,e,d);c.je();U.Tb(a-U.jc()-1);U.u(a);z.wb(b,b,0)}}function cb(b){if(b==S&&s==f){if(!h){var a=j;if(A)if(A.S==f)a=A.Md();else A.tb();Z();h=new vc(o,f,a,q);h.Qc(p)}!h.cd()&&h.Mb()}}function R(d,g,l){if(d==f){if(d!=g)C[g]&&C[g].ie();else!l&&h&&h.ge();p&&p.Wc();var m=S=b.B();e.gb(b.mb(j,cb,m))}else{var k=c.min(f,d),i=c.max(f,d),o=c.min(i-k,k+r-i),n=u+a.fe-1;(!Q||o<=n)&&e.gb()}}function db(){if(s==f&&h){h.T();p&&p.ee();p&&p.de();h.Kc()}}function eb(){s==f&&h&&h.T()}function ab(a){!P&&g.j(i.ae,f,a)}function O(){p=w.pInstance;h&&h.Qc(p)}e.gb=function(c,a){a=a||v;if(y.length&&!G){b.Bb(a);if(!W){W=d;g.j(i.ve,f);b.e(y,function(a){if(!b.lb(a,"src")){a.src=b.f(a,"src2");b.z(a,a["display-origin"])}})}b.Ad(y,k,b.mb(j,M,c,a))}else M(c,a)};e.he=function(){var h=f;if(a.Gb<0)h-=r;var d=h+a.Gb*tc;if(D&2)d=t(d);if(!(D&1))d=c.max(0,c.min(d,r-u));if(d!=f){if(A){var e=A.Td(r);if(e){var i=S=b.B(),g=C[t(d)];return g.gb(b.mb(j,Y,d,g,e,i),v)}}bb(d)}};e.Eb=function(){R(f,f,d)};e.ie=function(){p&&p.ee();p&&p.de();e.Fc();h&&h.le();h=j;E()};e.je=function(){b.v(o)};e.Fc=function(){b.Bb(o)};e.me=function(){p&&p.Wc()};function T(a,c,e){if(b.lb(a,"jssor-slider"))return;if(!F){if(a.tagName=="IMG"){y.push(a);if(!b.lb(a,"src")){Q=d;a["display-origin"]=b.z(a);b.v(a)}}b.dc()&&b.q(a,(b.q(a)||0)+1)}var f=b.xb(a);b.e(f,function(f){var h=f.tagName,i=b.f(f,"u");if(i=="player"&&!w){w=f;if(w.pInstance)O();else b.a(w,"dataavailable",O)}if(i=="caption"){if(c){b.tc(f,b.f(f,"to"));b.te(f,b.f(f,"bf"));b.f(f,"3d")&&b.ye(f,"preserve-3d")}else if(!b.Rc()){var g=b.jb(f,l,d);b.Rb(g,f,a);b.uc(f,a);f=g;c=d}}else if(!F&&!e&&!k){if(h=="A"){if(b.f(f,"u")=="image")k=b.ed(f,"IMG");else k=b.s(f,"image",d);if(k){x=f;b.z(x,"block");b.C(x,V);B=b.jb(x,d);b.r(x,"relative");b.Ob(B,0);b.M(B,"backgroundColor","#000")}}else if(h=="IMG"&&b.f(f,"u")=="image")k=f;if(k){k.border=0;b.C(k,V)}}T(f,c,e+1)})}e.Sb=function(c,b){var a=u-b;Zb(L,a)};e.S=f;n.call(e);b.we(o,b.f(o,"p"));b.xe(o,b.f(o,"po"));var H=b.s(o,"thumb",d);if(H){b.jb(H);b.v(H)}b.Bb(o);v=b.jb(fb);b.q(v,1e3);b.a(o,"click",ab);E(d);e.Od=k;e.Cc=B;e.Fb=L=o;b.K(L,v);g.db(203,R);g.db(28,eb);g.db(24,db)}function vc(y,f,p,q){var a=this,n=0,u=0,h,j,e,c,k,t,r,o=C[f];m.call(a,0,0);function v(){b.Ec(L);cc&&k&&o.Cc&&b.K(L,o.Cc);b.Bb(L,!k&&o.Od)}function w(){a.Mb()}function x(b){r=b;a.T();a.Mb()}a.Mb=function(){var b=a.eb();if(!B&&!M&&!r&&s==f){if(!b){if(h&&!k){k=d;a.Kc(d);g.j(i.oe,f,n,u,h,c)}v()}var l,p=i.Gc;if(b!=c)if(b==e)l=c;else if(b==j)l=e;else if(!b)l=j;else l=a.Yc();g.j(p,f,b,n,j,e,c);var m=N&&(!E||F);if(b==c)(e!=c&&!(E&12)||m)&&o.he();else(m||b!=e)&&a.yc(l,w)}};a.ge=function(){e==c&&e==a.eb()&&a.u(j)};a.le=function(){A&&A.S==f&&A.tb();var b=a.eb();b<c&&g.j(i.Gc,f,-b-1,n,j,e,c)};a.Kc=function(a){p&&b.Ab(jb,a&&p.qc.De?"":"hidden")};a.Sb=function(b,a){if(k&&a>=h){k=l;v();o.Fc();A.tb();g.j(i.se,f,n,u,h,c)}g.j(i.Ld,f,a,n,j,e,c)};a.Qc=function(a){if(a&&!t){t=a;a.db($JssorPlayer$.ud,x)}};p&&a.Jb(p);h=a.Zb();a.Jb(q);j=h+q.Ic;e=h+q.Jc;c=a.Zb()}function Kb(a,c,d){b.D(a,c);b.F(a,d)}function Zb(c,b){var a=x>0?x:eb,d=zb*b*(a&1),e=Ab*b*(a>>1&1);Kb(c,d,e)}function Pb(){pb=M;Ib=z.Yc();G=w.A()}function gc(){Pb();if(B||!F&&E&12){z.T();g.j(i.Pd)}}function ec(f){if(!B&&(F||!(E&12))&&!z.cd()){var d=w.A(),b=c.ceil(G);if(f&&c.abs(H)>=a.Oc){b=c.ceil(d);b+=hb}if(!(D&1))b=c.min(r-u,c.max(b,0));var e=c.abs(b-d);e=1-c.pow(1-e,5);if(!P&&pb)z.Yd(Ib);else if(d==b){sb.me();sb.Eb()}else z.wb(d,b,e*Vb)}}function Hb(a){!b.f(b.Cb(a),"nodrag")&&b.Pb(a)}function rc(a){Yb(a,1)}function Yb(a,c){a=b.mc(a);var k=b.Cb(a);if(!O&&!b.f(k,"nodrag")&&sc()&&(!c||a.touches.length==1)){B=d;yb=l;S=j;b.a(h,c?"touchmove":"mousemove",Bb);b.B();P=0;gc();if(!pb)x=0;if(c){var f=a.touches[0];ub=f.clientX;vb=f.clientY}else{var e=b.sc(a);ub=e.x;vb=e.y}H=0;gb=0;hb=0;g.j(i.Sd,t(G),G,a)}}function Bb(e){if(B){e=b.mc(e);var f;if(e.type!="mousemove"){var l=e.touches[0];f={x:l.clientX,y:l.clientY}}else f=b.sc(e);if(f){var j=f.x-ub,k=f.y-vb;if(c.floor(G)!=G)x=x||eb&O;if((j||k)&&!x){if(O==3)if(c.abs(k)>c.abs(j))x=2;else x=1;else x=O;if(mb&&x==1&&c.abs(k)-c.abs(j)>3)yb=d}if(x){var a=k,i=Ab;if(x==1){a=j;i=zb}if(!(D&1)){if(a>0){var g=i*s,h=a-g;if(h>0)a=g+c.sqrt(h)*5}if(a<0){var g=i*(r-u-s),h=-a-g;if(h>0)a=-g-c.sqrt(h)*5}}if(H-gb<-2)hb=0;else if(H-gb>2)hb=-1;gb=H;H=a;rb=G-H/i/(Y||1);if(H&&x&&!yb){b.Pb(e);if(!M)z.Jd(rb);else z.ne(rb)}}}}}function ab(){qc();if(B){B=l;b.B();b.fb(h,"mousemove",Bb);b.fb(h,"touchmove",Bb);P=H;z.T();var a=w.A();g.j(i.Vd,t(a),a,t(G),G);E&12&&Pb();ec(d)}}function jc(c){if(P){b.ze(c);var a=b.Cb(c);while(a&&v!==a){a.tagName=="A"&&b.Pb(c);try{a=a.parentNode}catch(d){break}}}}function Jb(a){C[s];s=t(a);sb=C[s];Ub(a);return s}function Dc(a,b){x=0;Jb(a);g.j(i.Wd,t(a),b)}function Ub(a,c){wb=a;b.e(T,function(b){b.Ub(t(a),a,c)})}function sc(){var b=i.Tc||0,a=X;if(mb)a&1&&(a&=1);i.Tc|=a;return O=a&~b}function qc(){if(O){i.Tc&=~X;O=0}}function Xb(){var a=b.vb();b.C(a,V);b.r(a,"absolute");return a}function t(a){return(a%r+r)%r}function kc(b,d){if(d)if(!D){b=c.min(c.max(b+wb,0),r-u);d=l}else if(D&2){b=t(b+wb);d=l}bb(b,a.sb,d)}function xb(){b.e(T,function(a){a.Xb(a.ub.Ee<=F)})}function hc(){if(!F){F=1;xb();if(!B){E&12&&ec();E&3&&C[s].Eb()}}}function Ec(){if(F){F=0;xb();B||!(E&12)||gc()}}function ic(){V={rb:K,qb:J,g:0,i:0};b.e(Q,function(a){b.C(a,V);b.r(a,"absolute");b.Ab(a,"hidden");b.v(a)});b.C(fb,V)}function ob(b,a){bb(b,a,d)}function bb(g,f,j){if(Rb&&(!B&&(F||!(E&12))||a.Sc)){M=d;B=l;z.T();if(f==k)f=Vb;var e=Cb.eb(),b=g;if(j){b=e+g;if(g>0)b=c.ceil(b);else b=c.floor(b)}if(D&2)b=t(b);if(!(D&1))b=c.max(0,c.min(b,r-u));var i=(b-e)%r;b=e+i;var h=e==b?0:f*c.abs(i);h=c.min(h,f*u*1.5);z.wb(e,b,h||1)}}g.vc=function(){if(!N){N=d;C[s]&&C[s].Eb()}};function W(){return b.m(y||p)}function lb(){return b.n(y||p)}g.O=W;g.P=lb;function Eb(c,d){if(c==k)return b.m(p);if(!y){var a=b.vb(h);b.Dc(a,b.Dc(p));b.Nb(a,b.Nb(p));b.z(a,"block");b.r(a,"relative");b.F(a,0);b.D(a,0);b.Ab(a,"visible");y=b.vb(h);b.r(y,"absolute");b.F(y,0);b.D(y,0);b.m(y,b.m(p));b.n(y,b.n(p));b.tc(y,"0 0");b.K(y,a);var g=b.xb(p);b.K(p,y);b.M(p,"backgroundImage","");b.e(g,function(c){b.K(b.f(c,"noscale")?p:a,c);b.f(c,"autocenter")&&Mb.push(c)})}Y=c/(d?b.n:b.m)(y);b.Ae(y,Y);var f=d?Y*W():c,e=d?c:Y*lb();b.m(p,f);b.n(p,e);b.e(Mb,function(a){var c=b.Cd(b.f(a,"autocenter"));b.Fd(a,c)})}g.oc=Eb;n.call(g);g.H=p=b.Ib(p);var a=b.yb({Z:0,fe:1,ac:1,bc:0,cc:l,dd:1,W:d,Sc:d,Gb:1,gc:3e3,Qb:1,sb:500,Zc:e.Dd,Oc:20,wc:0,U:1,xc:0,Xd:1,Db:1,zc:1},fc);a.W=a.W&&b.Qd();if(a.Mc!=k)a.gc=a.Mc;if(a.ue!=k)a.xc=a.ue;var eb=a.Db&3,tc=(a.Db&4)/-4||1,kb=a.Fe,I=b.yb({ab:q,W:a.W},a.Ge);I.Hb=I.Hb||I.He;var Fb=a.Ie,Z=a.Le,db=a.Ke,R=!a.Xd,y,v=b.s(p,"slides",R),fb=b.s(p,"loading",R)||b.vb(h),Nb=b.s(p,"navigator",R),dc=b.s(p,"arrowleft",R),ac=b.s(p,"arrowright",R),Lb=b.s(p,"thumbnavigator",R),oc=b.m(v),mc=b.n(v),V,Q=[],uc=b.xb(v);b.e(uc,function(a){if(a.tagName=="DIV"&&!b.f(a,"u"))Q.push(a);else b.dc()&&b.q(a,(b.q(a)||0)+1)});var s=-1,wb,sb,r=Q.length,K=a.kc||oc,J=a.id||mc,Wb=a.wc,zb=K+Wb,Ab=J+Wb,bc=eb&1?zb:Ab,u=c.min(a.U,r),jb,x,O,yb,T=[],Qb,Sb,Ob,cc,Cc,N,E=a.Qb,lc=a.gc,Vb=a.sb,qb,tb,ib,Rb=u<r,D=Rb?a.dd:0,X,P,F=1,M,B,S,ub=0,vb=0,H,gb,hb,Cb,w,U,z,Tb=new pc,Y,Mb=[];if(a.W)Kb=function(a,c,d){b.pb(a,{J:c,R:d})};N=a.cc;g.ub=fc;ic();b.lb(p,"jssor-slider",d);b.q(v,b.q(v)||0);b.r(v,"absolute");jb=b.jb(v,d);b.Rb(jb,v);if(kb){cc=kb.Je;qb=kb.ab;tb=u==1&&r>1&&qb&&(!b.Rc()||b.fc()>=8)}ib=tb||u>=r||!(D&1)?0:a.xc;X=(u>1||ib?eb:-1)&a.zc;var Gb=v,C=[],A,L,Db=b.Kd(),mb=Db.Zd,G,pb,Ib,rb;Db.Vc&&b.M(Gb,Db.Vc,([j,"pan-y","pan-x","none"])[X]||"");U=new zc;if(tb)A=new qb(Tb,K,J,kb,mb);b.K(jb,U.Fb);b.Ab(v,"hidden");L=Xb();b.M(L,"backgroundColor","#000");b.Ob(L,0);b.Rb(L,Gb.firstChild,Gb);for(var cb=0;cb<Q.length;cb++){var wc=Q[cb],yc=new xc(wc,cb);C.push(yc)}b.v(fb);Cb=new Ac;z=new nc(Cb,U);if(X){b.a(v,"mousedown",Yb);b.a(v,"touchstart",rc);b.a(v,"dragstart",Hb);b.a(v,"selectstart",Hb);b.a(h,"mouseup",ab);b.a(h,"touchend",ab);b.a(h,"touchcancel",ab);b.a(f,"blur",ab)}E&=mb?10:5;if(Nb&&Fb){Qb=new Fb.ab(Nb,Fb,W(),lb());T.push(Qb)}if(Z&&dc&&ac){Z.dd=D;Z.U=u;Sb=new Z.ab(dc,ac,Z,W(),lb());T.push(Sb)}if(Lb&&db){db.bc=a.bc;Ob=new db.ab(Lb,db);T.push(Ob)}b.e(T,function(a){a.Kb(r,C,fb);a.db(o.Ed,kc)});b.M(p,"visibility","visible");Eb(W());b.a(v,"click",jc,d);b.a(p,"mouseout",b.Bc(hc,p));b.a(p,"mouseover",b.Bc(Ec,p));xb();a.ac&&b.a(h,"keydown",function(b){if(b.keyCode==37)ob(-a.ac);else b.keyCode==39&&ob(a.ac)});var nb=a.bc;if(!(D&1))nb=c.max(0,c.min(nb,r-u));z.wb(nb,nb,0)};i.ae=21;i.Sd=22;i.Vd=23;i.qe=24;i.pe=25;i.ve=26;i.ke=27;i.Pd=28;i.re=202;i.Wd=203;i.oe=206;i.se=207;i.Ld=208;i.Gc=209;var o={Ed:1};function q(e,d,c){var a=this;m.call(a,0,c);a.Xc=b.Hc;a.Ic=0;a.Jc=c}
        jssor_1_slider_init=function(){var h={cc:d,Mc:0,Gb:4,sb:1600,Zc:g.Ce,Qb:4,kc:140,U:7},e=new i("jssor_1",h);function a(){var b=e.H.parentNode.clientWidth;if(b){b=c.min(b,809);e.oc(b)}else f.setTimeout(a,30)}a();b.a(f,"load",a);b.a(f,"resize",a);b.a(f,"orientationchange",a);function a(){var b=e.H.parentNode.clientWidth;if(b){b=c.min(b,809);e.oc(b)}else f.setTimeout(a,30)}a();b.a(f,"load",a);b.a(f,"resize",a);b.a(f,"orientationchange",a)}})(window,document,Math,null,true,false)
