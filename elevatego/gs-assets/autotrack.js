(function() {
    var f = this;

    function g(a, c) {
        var b = a.split("."),
            d = f;
        b[0] in d || !d.execScript || d.execScript("var " + b[0]);
        for (var e; b.length && (e = b.shift());) b.length || void 0 === c ? d = d[e] ? d[e] : d[e] = {} : d[e] = c
    }

    function h(a, c, b) {
        return a.call.apply(a.bind, arguments)
    }

    function l(a, c, b) {
        if (!a) throw Error();
        if (2 < arguments.length) {
            var d = Array.prototype.slice.call(arguments, 2);
            return function() {
                var b = Array.prototype.slice.call(arguments);
                Array.prototype.unshift.apply(b, d);
                return a.apply(c, b)
            }
        }
        return function() {
            return a.apply(c, arguments)
        }
    }

    function m(a, c, b) {
        m = Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? h : l;
        return m.apply(null, arguments)
    }
    Function.prototype.bind = Function.prototype.bind || function(a, c) {
        if (1 < arguments.length) {
            var b = Array.prototype.slice.call(arguments, 1);
            b.unshift(this, a);
            return m.apply(null, b)
        }
        return m(this, a)
    };

    function n(a) {
        this.a = a || {};
        this.pathname = window.location.pathname;
        window._gaq = window._gaq || [];
        this.h = !0;
        if (!1 === this.a.tracklinks || !1 === this.a.trackClicks) this.h = !1;
        this.a.trackQueryParams && (this.n = !0);
        this.m = void 0 === this.a.adsDbCompatible ? !0 : this.a.adsDbCompatible;
        this.c = this.a.tracker ? this.a.tracker + "." : "";
        this.g = this.a.cookiePath || /^([^;,]*\/)/.exec(this.pathname)[0];
        this.e = this.a.cookiePathCopy || [];
        this.prefix = this.a.prefix || "";
        this.j = this.a.defaultEventName;
        this.i = this.a.defaultAction;
        this.k =
            this.a.defaultLabel;
        this.b([this.c + "_setAccount", this.a.profile]);
        this.b([this.c + "_setCookiePath", this.g]);
        this.a.domainName && this.b([this.c + "_setDomainName", this.a.domainName]);
        this.b([this.c + "_setAllowAnchor", !0]);
        this.m && (window.location.hash || window.location.search) && (a = window.location.href, this.b([this.c + "_setCampIdKey", "cid"]), -1 == a.indexOf("utm_campaign=") && this.b([this.c + "_setCampNameKey", "sourceid"]), -1 == a.indexOf("utm_medium=") && this.b([this.c + "_setCampMediumKey", "medium"]), -1 == a.indexOf("utm_source=") &&
            this.b([this.c + "_setCampSourceKey", "subid"]), -1 == a.indexOf("utm_term=") && this.b([this.c + "_setCampTermKey", "term"]), -1 == a.indexOf("utm_content=") && this.b([this.c + "_setCampContentKey", "content"]));
        var c = this.a.commands;
        if (c) {
            a = 0;
            for (var b; b = c[a]; a++) b[0] = b[0] && this.c + b[0], this.b(b)
        }
        if (this.e)
            for (a = 0, c = this.e.length; a < c; a++) 0 > this.g.indexOf(this.e[a]) && this.b([this.c + "_cookiePathCopy", this.e[a]]);
        this.a.disableTrackPageview || (a = this.a.pageviewPath, a || (a = this.prefix + this.pathname, this.n && (a += window.location.search)),
            this.b([this.c + "_trackPageview", a]));
        window._gat || (a = document.createElement("script"), a.type = "text/javascript", a.async = !0, a.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js", c = document.getElementsByTagName("script")[0], c.parentNode.insertBefore(a, c));
        p(this, this.l, this);
        this.a.trackUnload && q(window, "unload", this.o, this);
        (this.d = this.a.trackEventCallback) && "function" !== typeof this.d && (this.d = void 0);
        r = !0
    }
    var r = !1;
    n.prototype.l = function() {
        this.h && s(this);
        this.a.heatMapper && t(this)
    };
    n.prototype.o = function() {
        this.f("AutoTrack: Navigation", "Unload", window.location.href)
    };

    function s(a) {
        q(document.body, "click", function(a) {
            a = a || window.event;
            a = a.target || a.srcElement;
            a = 3 == a.nodeType ? a.parentNode : a;
            do {
                var b = a;
                if (Boolean("a" == b.nodeName.toLowerCase() || b.getAttribute("data-g-event") || b.getAttribute("data-g-action") || b.getAttribute("data-g-label"))) {
                    var b = u(this, "eventname", a),
                        d = u(this, "action", a),
                        e = u(this, "label", a);
                    this.f(b, d, e)
                }
                a.parentNode && (a = a.parentNode)
            } while (a.parentNode)
        }, a)
    }

    function t(a) {
        q(document.body, "click", function(a) {
            this.f("AutoTrack: Heatmap", "Click", a.clientX + "," + a.clientY)
        }, a)
    }
    n.prototype.f = function(a, c, b) {
        this.prefix && (b = this.prefix + b);
        this.b([this.c + "_trackEvent", a, c, b]);
        this.d && this.d(a, c, b)
    };

    function u(a, c, b) {
        function d(a) {
            return "string" == typeof a ? a : "function" == typeof a ? a(b) : ""
        }
        return "eventname" == c ? b.getAttribute("data-g-event") || d(a.j) || ("a" == b.tagName.toLowerCase() ? b.hostname == window.location.hostname ? "AutoTrack: Link Click" : "AutoTrack: Outbound Click" : "AutoTrack: Element Click") : "action" == c ? b.getAttribute("data-g-action") || d(a.i) || b.getAttribute("href") || "AutoTrack: Element Click" : "label" == c ? b.getAttribute("data-g-label") || d(a.k) || a.pathname : ""
    }

    function q(a, c, b, d) {
        d && (b = m(b, d));
        a.addEventListener ? a.addEventListener(c, b, !1) : a.attachEvent && a.attachEvent("on" + c, b)
    }

    function p(a, c, b) {
        b && (c = m(c, b));
        if (document.addEventListener) try {
            q(document, "DOMContentLoaded", c, a)
        } catch (d) {
            q(window, "load", c, a)
        }
        elseif(!document.uniqueID && document.expando) var e = document.createElement("tempnode"),
            k = window.setInterval(function() {
                try {
                    e.doScroll("left")
                } catch (a) {
                    return
                }
                window.clearInterval(k);
                k = e = null;
                b && (c = m(c, b));
                c()
            }, 50);
        else "readyState" in document ? k = window.setInterval(function() {
                /loaded|complete/.test(document.readyState) && (window.clearInterval(k), k = null, b && (c = m(c, b)), c())
            }, 50) :
            q(window, "load", c, a)
    }
    n.prototype.b = function(a) {
        a instanceof Array && window._gaq.push(a)
    };
    g("gweb.analytics.AutoTrack", n);
    n.prototype.trackEvent = n.prototype.f;
    n.prototype.pushCommand = n.prototype.b;
    g("gweb.analytics.AutoTrack.hasInstance", function() {
        return r
    });
})()
