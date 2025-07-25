! function(e) {
    var t = {};

    function n(o) {
        if (t[o]) return t[o].exports;
        var l = t[o] = {
            i: o,
            l: !1,
            exports: {}
        };
        return e[o].call(l.exports, l, l.exports, n), l.l = !0, l.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, o) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: o
        })
    }, n.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, n.t = function(e, t) {
        if (1 & t && (e = n(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var o = Object.create(null);
        if (n.r(o), Object.defineProperty(o, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var l in e) n.d(o, l, function(t) {
                return e[t]
            }.bind(null, l));
        return o
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 0)
}([function(e, t, n) {
    (function(o) {
        var l, r, i;
        ! function(o, s) {
            r = [], l = function(e) {
                "use strict";
                var t, o, l, r = n(2),
                    i = {},
                    s = {},
                    c = n(3),
                    a = n(4),
                    u = n(5),
                    d = !!(e && e.document && e.document.querySelector && e.addEventListener);
                if ("undefined" == typeof window && !d) return;
                var f = Object.prototype.hasOwnProperty;

                function m(e, t, n) {
                    var o, l;
                    return t || (t = 250),
                        function() {
                            var r = n || this,
                                i = +new Date,
                                s = arguments;
                            o && i < o + t ? (clearTimeout(l), l = setTimeout(function() {
                                o = i, e.apply(r, s)
                            }, t)) : (o = i, e.apply(r, s))
                        }
                }
                return s.destroy = function() {
                    if (!i.skipRendering) try {
                        document.querySelector(i.tocSelector).innerHTML = ""
                    } catch (e) {
                        console.warn("Element not found: " + i.tocSelector)
                    }
                    i.scrollContainer && document.querySelector(i.scrollContainer) ? (document.querySelector(i.scrollContainer).removeEventListener("scroll", this._scrollListener, !1), document.querySelector(i.scrollContainer).removeEventListener("resize", this._scrollListener, !1), t && document.querySelector(i.scrollContainer).removeEventListener("click", this._clickListener, !1)) : (document.removeEventListener("scroll", this._scrollListener, !1), document.removeEventListener("resize", this._scrollListener, !1), t && document.removeEventListener("click", this._clickListener, !1))
                }, s.init = function(e) {
                    if (d && (i = function() {
                            for (var e = {}, t = 0; t < arguments.length; t++) {
                                var n = arguments[t];
                                for (var o in n) f.call(n, o) && (e[o] = n[o])
                            }
                            return e
                        }(r, e || {}), this.options = i, this.state = {}, i.scrollSmooth && (i.duration = i.scrollSmoothDuration, i.offset = i.scrollSmoothOffset, s.scrollSmooth = n(6).initSmoothScrolling(i)), t = c(i), o = a(i), this._buildHtml = t, this._parseContent = o, s.destroy(), null !== (l = o.selectHeadings(i.contentSelector, i.headingSelector)))) {
                        var h = o.nestHeadingsArray(l).nest;
                        i.skipRendering || t.render(i.tocSelector, h), this._scrollListener = m(function(e) {
                            t.updateToc(l), !i.disableTocScrollSync && u(i);
                            var n = e && e.target && e.target.scrollingElement && 0 === e.target.scrollingElement.scrollTop;
                            (e && (0 === e.eventPhase || null === e.currentTarget) || n) && (t.updateToc(l), i.scrollEndCallback && i.scrollEndCallback(e))
                        }, i.throttleTimeout), this._scrollListener(), i.scrollContainer && document.querySelector(i.scrollContainer) ? (document.querySelector(i.scrollContainer).addEventListener("scroll", this._scrollListener, !1), document.querySelector(i.scrollContainer).addEventListener("resize", this._scrollListener, !1)) : (document.addEventListener("scroll", this._scrollListener, !1), document.addEventListener("resize", this._scrollListener, !1));
                        var p = null;
                        return this._clickListener = m(function(e) {
                            i.scrollSmooth && t.disableTocAnimation(e), t.updateToc(l), p && clearTimeout(p), p = setTimeout(function() {
                                t.enableTocAnimation()
                            }, i.scrollSmoothDuration)
                        }, i.throttleTimeout), i.scrollContainer && document.querySelector(i.scrollContainer) ? document.querySelector(i.scrollContainer).addEventListener("click", this._clickListener, !1) : document.addEventListener("click", this._clickListener, !1), this
                    }
                }, s.refresh = function(e) {
                    s.destroy(), s.init(e || this.options)
                }, e.tocbot = s, s
            }(o), void 0 === (i = "function" == typeof l ? l.apply(t, r) : l) || (e.exports = i)
        }(void 0 !== o ? o : this.window || this.global)
    }).call(this, n(1))
}, function(e, t) {
    var n;
    n = function() {
        return this
    }();
    try {
        n = n || Function("return this")() || (0, eval)("this")
    } catch (e) {
        "object" == typeof window && (n = window)
    }
    e.exports = n
}, function(e, t) {
    e.exports = {
        tocSelector: ".js-toc",
        contentSelector: ".js-toc-content",
        headingSelector: "h1, h2, h3",
        ignoreSelector: ".js-toc-ignore",
        hasInnerContainers: !1,
        linkClass: "toc-link",
        extraLinkClasses: "",
        activeLinkClass: "is-active-link",
        listClass: "toc-list",
        extraListClasses: "",
        isCollapsedClass: "is-collapsed",
        collapsibleClass: "is-collapsible",
        listItemClass: "toc-list-item",
        activeListItemClass: "is-active-li",
        collapseDepth: 0,
        scrollSmooth: !0,
        scrollSmoothDuration: 420,
        scrollSmoothOffset: 0,
        scrollEndCallback: function(e) {},
        headingsOffset: 1,
        throttleTimeout: 50,
        positionFixedSelector: null,
        positionFixedClass: "is-position-fixed",
        fixedSidebarOffset: "auto",
        includeHtml: !1,
        onClick: function(e) {},
        orderedList: !0,
        scrollContainer: null,
        skipRendering: !1,
        headingLabelCallback: !1,
        ignoreHiddenElements: !1,
        headingObjectCallback: null,
        basePath: "",
        disableTocScrollSync: !1
    }
}, function(e, t) {
    e.exports = function(e) {
        var t = [].forEach,
            n = [].some,
            o = document.body,
            l = !0,
            r = " ";

        function i(n, o) {
            var l = o.appendChild(function(n) {
                var o = document.createElement("li"),
                    l = document.createElement("a");
                e.listItemClass && o.setAttribute("class", e.listItemClass);
                e.onClick && (l.onclick = e.onClick);
                e.includeHtml && n.childNodes.length ? t.call(n.childNodes, function(e) {
                    l.appendChild(e.cloneNode(!0))
                }) : l.textContent = n.textContent;
                return l.setAttribute("href", e.basePath + "#" + n.id), l.setAttribute("class", e.linkClass + r + "node-name--" + n.nodeName + r + e.extraLinkClasses), o.appendChild(l), o
            }(n));
            if (n.children.length) {
                var c = s(n.isCollapsed);
                n.children.forEach(function(e) {
                    i(e, c)
                }), l.appendChild(c)
            }
        }

        function s(t) {
            var n = e.orderedList ? "ol" : "ul",
                o = document.createElement(n),
                l = e.listClass + r + e.extraListClasses;
            return t && (l += r + e.collapsibleClass, l += r + e.isCollapsedClass), o.setAttribute("class", l), o
        }
        return {
            enableTocAnimation: function() {
                l = !0
            },
            disableTocAnimation: function(t) {
                var n = t.target || t.srcElement;
                "string" == typeof n.className && -1 !== n.className.indexOf(e.linkClass) && (l = !1)
            },
            render: function(e, t) {
                var n = s(!1);
                t.forEach(function(e) {
                    i(e, n)
                });
                var o = document.querySelector(e);
                if (null !== o) return o.firstChild && o.removeChild(o.firstChild), 0 === t.length ? o : o.appendChild(n)
            },
            updateToc: function(i) {
                var s;
                s = e.scrollContainer && document.querySelector(e.scrollContainer) ? document.querySelector(e.scrollContainer).scrollTop : document.documentElement.scrollTop || o.scrollTop, e.positionFixedSelector && function() {
                    var t;
                    t = e.scrollContainer && document.querySelector(e.scrollContainer) ? document.querySelector(e.scrollContainer).scrollTop : document.documentElement.scrollTop || o.scrollTop;
                    var n = document.querySelector(e.positionFixedSelector);
                    "auto" === e.fixedSidebarOffset && (e.fixedSidebarOffset = document.querySelector(e.tocSelector).offsetTop), t > e.fixedSidebarOffset ? -1 === n.className.indexOf(e.positionFixedClass) && (n.className += r + e.positionFixedClass) : n.className = n.className.split(r + e.positionFixedClass).join("")
                }();
                var c, a = i;
                if (l && null !== document.querySelector(e.tocSelector) && a.length > 0) {
                    n.call(a, function(t, n) {
                        return function t(n) {
                            var o = 0;
                            return n !== document.querySelector(e.contentSelector && null != n) && (o = n.offsetTop, e.hasInnerContainers && (o += t(n.offsetParent))), o
                        }(t) > s + e.headingsOffset + 10 ? (c = a[0 === n ? n : n - 1], !0) : n === a.length - 1 ? (c = a[a.length - 1], !0) : void 0
                    });
                    var u = document.querySelector(e.tocSelector).querySelectorAll("." + e.linkClass);
                    t.call(u, function(t) {
                        t.className = t.className.split(r + e.activeLinkClass).join("")
                    });
                    var d = document.querySelector(e.tocSelector).querySelectorAll("." + e.listItemClass);
                    t.call(d, function(t) {
                        t.className = t.className.split(r + e.activeListItemClass).join("")
                    });
                    var f = document.querySelector(e.tocSelector).querySelector("." + e.linkClass + ".node-name--" + c.nodeName + '[href="' + e.basePath + "#" + c.id.replace(/([ #;&,.+*~':"!^$[\]()=>|/@])/g, "\\$1") + '"]'); - 1 === f.className.indexOf(e.activeLinkClass) && (f.className += r + e.activeLinkClass);
                    var m = f.parentNode;
                    m && -1 === m.className.indexOf(e.activeListItemClass) && (m.className += r + e.activeListItemClass);
                    var h = document.querySelector(e.tocSelector).querySelectorAll("." + e.listClass + "." + e.collapsibleClass);
                    t.call(h, function(t) {
                            -1 === t.className.indexOf(e.isCollapsedClass) && (t.className += r + e.isCollapsedClass)
                        }), 
						e.isCollapsedClass!='' && f.nextSibling && -1 !== f.nextSibling.className.indexOf(e.isCollapsedClass) && (f.nextSibling.className = f.nextSibling.className.split(r + e.isCollapsedClass).join("")),
                        function t(n) {
							if(e.isCollapsedClass!=''){
								return -1 !== n.className.indexOf(e.collapsibleClass) && -1 !== n.className.indexOf(e.isCollapsedClass) ? (n.className = n.className.split(r + e.isCollapsedClass).join(""), t(n.parentNode.parentNode)) : n
							}
                        }(f.parentNode.parentNode) 
                }
            }
        }
    }
}, function(e, t) {
    e.exports = function(e) {
        var t = [].reduce;

        function n(e) {
            return e[e.length - 1]
        }

        function o(t) {
            if (!(t instanceof window.HTMLElement)) return t;
            if (e.ignoreHiddenElements && (!t.offsetHeight || !t.offsetParent)) return null;
			
			if ("" === t.id) {
                var t1 = e.headingLabelCallback ? e.headingLabelCallback(t.textContent) + "" : t.textContent.trim();
                0 === t1.length && (t1 = "?");
                for (var n = "", o = 1, l = (l = t1.replace(/\s+/g, "-")).replace(/[&\/\\#,+()$!~%.'":*?<>{}]/g, ""); null !== document.getElementById(l + n);) n = "_" + o++;
                t.id = l + n
            }
			
            var n = {
                id: t.id,
                children: [],
                nodeName: t.nodeName,
                headingLevel: function(e) {
                    return +e.nodeName.split("H").join("")
                }(t),
                textContent: e.headingLabelCallback ? String(e.headingLabelCallback(t.textContent)) : t.textContent.trim()
            };
            return e.includeHtml && (n.childNodes = t.childNodes), e.headingObjectCallback ? e.headingObjectCallback(n, t) : n
        }
        return {
            nestHeadingsArray: function(l) {
                return t.call(l, function(t, l) {
                    var r = o(l);
                    return r && function(t, l) {
                        for (var r = o(t), i = r.headingLevel, s = l, c = n(s), a = i - (c ? c.headingLevel : 0); a > 0;)(c = n(s)) && void 0 !== c.children && (s = c.children), a--;
                        i >= e.collapseDepth && (r.isCollapsed = !0), s.push(r)
                    }(r, t.nest), t
                }, {
                    nest: []
                })
            },
            selectHeadings: function(t, n) {
                var o = n;
                e.ignoreSelector && (o = n.split(",").map(function(t) {
                    return t.trim() + ":not(" + e.ignoreSelector + ")"
                }));
				var allSelector = [];
				var eleAll = document.querySelector(t);
				if(eleAll){
				 	eleAll = eleAll.querySelectorAll(n);
					eleAll.forEach(function(el) {
						var aaa = el.closest(e.ignoreSelector);
						if(!aaa){
							allSelector.push(el); 
						}
					});
				}
				return allSelector;
                /*try {
                    return document.querySelector(t).querySelectorAll(o)
                } catch (e) {
                    return console.warn("Element not found: " + t), null
                }*/
            }
        }
    }
}, function(e, t) {
    e.exports = function(e) {
        var t = document.querySelector(e.tocSelector);
        if (t && t.scrollHeight > t.clientHeight) {
            var n = t.querySelector("." + e.activeListItemClass);
            n && (t.scrollTop = n.offsetTop)
        }
    }
}, function(e, t) {
    function n(e, t) {
        var n = window.pageYOffset,
            o = {
                duration: t.duration,
                offset: t.offset || 0,
                callback: t.callback,
                easing: t.easing || d
            },
            l = document.querySelector('[id="' + decodeURI(e).split("#").join("") + '"]'),
            r = typeof e === "string" ? o.offset + (e ? l && l.getBoundingClientRect().top || 0 : -(document.documentElement.scrollTop || document.body.scrollTop)) : e,
            i = typeof o.duration === "function" ? o.duration(r) : o.duration,
            s, c;

        function a(e) {
            c = e - s;
            window.scrollTo(0, o.easing(c, n, r, i));
            if (c < i) {
                requestAnimationFrame(a)
            } else {
                u()
            }
        }

        function u() {
            if (window.scrollTo(0, n + r), "function" == typeof o.callback) {
                o.callback()
            }
        }

        function d(e, t, n, o) {
            return (e /= o / 2) < 1 ? n / 2 * e * e + t : -n / 2 * (--e * (e - 2) - 1) + t
        }
        requestAnimationFrame(function(e) {
            s = e;
            a(e)
        })
    }
    t.initSmoothScrolling = function(e) {
        document.documentElement.style;
        var t = e.duration,
            o = e.offset,
            l = location.hash ? r(location.href) : location.href;

        function r(e) {
            return e.slice(0, e.lastIndexOf("#"))
        }! function() {
            document.body.addEventListener("click", function(i) {
                if (! function(e) {
                        return "a" === e.tagName.toLowerCase() && (e.hash.length > 0 || "#" === e.href.charAt(e.href.length - 1)) && (r(e.href) === l || r(e.href) + "#" === l)
                    }(i.target) || i.target.className.indexOf("no-smooth-scroll") > -1 || "#" === i.target.href.charAt(i.target.href.length - 2) && "!" === i.target.href.charAt(i.target.href.length - 1) || -1 === i.target.className.indexOf(e.linkClass)) return;
                n(i.target.hash, {
                    duration: t,
                    offset: o,
                    callback: function() {
                        ! function(e) {
                            var t = document.getElementById(e.substring(1));
                            t && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
                        }(i.target.hash)
                    }
                })
            }, !1)
        }()
    }
}]);