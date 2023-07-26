/*!
 * Bootstrap v5.3.0-alpha1 (https://getbootstrap.com/)
 * Copyright 2011-2022 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
! function(t, e) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = e(require("@popperjs/core")) : "function" == typeof define && define.amd ? define(["@popperjs/core"], e) : (t = "undefined" != typeof globalThis ? globalThis : t || self).bootstrap = e(t.Popper)
}(this, (function(t) {
	"use strict";

	function e(t) {
		const e = Object.create(null, {
			[Symbol.toStringTag]: {
				value: "Module"
			}
		});
		if (t)
			for (const s in t)
				if ("default" !== s) {
					const i = Object.getOwnPropertyDescriptor(t, s);
					Object.defineProperty(e, s, i.get ? i : {
						enumerable: !0,
						get: () => t[s]
					})
				}
		return e.default = t, Object.freeze(e)
	}
	const s = e(t),
		i = "transitionend",
		n = t => (t && window.CSS && window.CSS.escape && (t = t.replace(/#([^\s"#']+)/g, ((t, e) => `#${CSS.escape(e)}`))), t),
		o = t => {
			t.dispatchEvent(new Event(i))
		},
		r = t => !(!t || "object" != typeof t) && (void 0 !== t.jquery && (t = t[0]), void 0 !== t.nodeType),
		a = t => r(t) ? t.jquery ? t[0] : t : "string" == typeof t && t.length > 0 ? document.querySelector(n(t)) : null,
		l = t => {
			if (!r(t) || 0 === t.getClientRects().length) return !1;
			const e = "visible" === getComputedStyle(t).getPropertyValue("visibility"),
				s = t.closest("details:not([open])");
			if (!s) return e;
			if (s !== t) {
				const e = t.closest("summary");
				if (e && e.parentNode !== s) return !1;
				if (null === e) return !1
			}
			return e
		},
		c = t => !t || t.nodeType !== Node.ELEMENT_NODE || !!t.classList.contains("disabled") || (void 0 !== t.disabled ? t.disabled : t.hasAttribute("disabled") && "false" !== t.getAttribute("disabled")),
		h = t => {
			if (!document.documentElement.attachShadow) return null;
			if ("function" == typeof t.getRootNode) {
				const e = t.getRootNode();
				return e instanceof ShadowRoot ? e : null
			}
			return t instanceof ShadowRoot ? t : t.parentNode ? h(t.parentNode) : null
		},
		d = () => {},
		u = t => {
			t.offsetHeight
		},
		_ = () => window.jQuery && !document.body.hasAttribute("data-bs-no-jquery") ? window.jQuery : null,
		g = [],
		f = () => "rtl" === document.documentElement.dir,
		m = t => {
			var e;
			e = () => {
				const e = _();
				if (e) {
					const s = t.NAME,
						i = e.fn[s];
					e.fn[s] = t.jQueryInterface, e.fn[s].Constructor = t, e.fn[s].noConflict = () => (e.fn[s] = i, t.jQueryInterface)
				}
			}, "loading" === document.readyState ? (g.length || document.addEventListener("DOMContentLoaded", (() => {
				for (const t of g) t()
			})), g.push(e)) : e()
		},
		p = (t, e = [], s = t) => "function" == typeof t ? t(...e) : s,
		b = (t, e, s = !0) => {
			if (!s) return void p(t);
			const n = (t => {
				if (!t) return 0;
				let {
					transitionDuration: e,
					transitionDelay: s
				} = window.getComputedStyle(t);
				const i = Number.parseFloat(e),
					n = Number.parseFloat(s);
				return i || n ? (e = e.split(",")[0], s = s.split(",")[0], 1e3 * (Number.parseFloat(e) + Number.parseFloat(s))) : 0
			})(e) + 5;
			let r = !1;
			const a = ({
				target: s
			}) => {
				s === e && (r = !0, e.removeEventListener(i, a), p(t))
			};
			e.addEventListener(i, a), setTimeout((() => {
				r || o(e)
			}), n)
		},
		v = (t, e, s, i) => {
			const n = t.length;
			let o = t.indexOf(e);
			return -1 === o ? !s && i ? t[n - 1] : t[0] : (o += s ? 1 : -1, i && (o = (o + n) % n), t[Math.max(0, Math.min(o, n - 1))])
		},
		y = /[^.]*(?=\..*)\.|.*/,
		w = /\..*/,
		A = /::\d+$/,
		E = {};
	let C = 1;
	const T = {
			mouseenter: "mouseover",
			mouseleave: "mouseout"
		},
		k = new Set(["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"]);

	function S(t, e) {
		return e && `${e}::${C++}` || t.uidEvent || C++
	}

	function L(t) {
		const e = S(t);
		return t.uidEvent = e, E[e] = E[e] || {}, E[e]
	}

	function O(t, e, s = null) {
		return Object.values(t).find((t => t.callable === e && t.delegationSelector === s))
	}

	function I(t, e, s) {
		const i = "string" == typeof e,
			n = i ? s : e || s;
		let o = x(t);
		return k.has(o) || (o = t), [i, n, o]
	}

	function D(t, e, s, i, n) {
		if ("string" != typeof e || !t) return;
		let [o, r, a] = I(e, s, i);
		if (e in T) {
			const t = t => function(e) {
				if (!e.relatedTarget || e.relatedTarget !== e.delegateTarget && !e.delegateTarget.contains(e.relatedTarget)) return t.call(this, e)
			};
			r = t(r)
		}
		const l = L(t),
			c = l[a] || (l[a] = {}),
			h = O(c, r, o ? s : null);
		if (h) return void(h.oneOff = h.oneOff && n);
		const d = S(r, e.replace(y, "")),
			u = o ? function(t, e, s) {
				return function i(n) {
					const o = t.querySelectorAll(e);
					for (let {
							target: r
						} = n; r && r !== this; r = r.parentNode)
						for (const a of o)
							if (a === r) return j(n, {
								delegateTarget: r
							}), i.oneOff && M.off(t, n.type, e, s), s.apply(r, [n])
				}
			}(t, s, r) : function(t, e) {
				return function s(i) {
					return j(i, {
						delegateTarget: t
					}), s.oneOff && M.off(t, i.type, e), e.apply(t, [i])
				}
			}(t, r);
		u.delegationSelector = o ? s : null, u.callable = r, u.oneOff = n, u.uidEvent = d, c[d] = u, t.addEventListener(a, u, o)
	}

	function N(t, e, s, i, n) {
		const o = O(e[s], i, n);
		o && (t.removeEventListener(s, o, Boolean(n)), delete e[s][o.uidEvent])
	}

	function P(t, e, s, i) {
		const n = e[s] || {};
		for (const [o, r] of Object.entries(n)) o.includes(i) && N(t, e, s, r.callable, r.delegationSelector)
	}

	function x(t) {
		return t = t.replace(w, ""), T[t] || t
	}
	const M = {
		on(t, e, s, i) {
			D(t, e, s, i, !1)
		},
		one(t, e, s, i) {
			D(t, e, s, i, !0)
		},
		off(t, e, s, i) {
			if ("string" != typeof e || !t) return;
			const [n, o, r] = I(e, s, i), a = r !== e, l = L(t), c = l[r] || {}, h = e.startsWith(".");
			if (void 0 === o) {
				if (h)
					for (const s of Object.keys(l)) P(t, l, s, e.slice(1));
				for (const [s, i] of Object.entries(c)) {
					const n = s.replace(A, "");
					a && !e.includes(n) || N(t, l, r, i.callable, i.delegationSelector)
				}
			} else {
				if (!Object.keys(c).length) return;
				N(t, l, r, o, n ? s : null)
			}
		},
		trigger(t, e, s) {
			if ("string" != typeof e || !t) return null;
			const i = _();
			let n = null,
				o = !0,
				r = !0,
				a = !1;
			e !== x(e) && i && (n = i.Event(e, s), i(t).trigger(n), o = !n.isPropagationStopped(), r = !n.isImmediatePropagationStopped(), a = n.isDefaultPrevented());
			let l = new Event(e, {
				bubbles: o,
				cancelable: !0
			});
			return l = j(l, s), a && l.preventDefault(), r && t.dispatchEvent(l), l.defaultPrevented && n && n.preventDefault(), l
		}
	};

	function j(t, e = {}) {
		for (const [s, i] of Object.entries(e)) try {
			t[s] = i
		} catch (e) {
			Object.defineProperty(t, s, {
				configurable: !0,
				get: () => i
			})
		}
		return t
	}
	const F = new Map,
		$ = {
			set(t, e, s) {
				F.has(t) || F.set(t, new Map);
				const i = F.get(t);
				i.has(e) || 0 === i.size ? i.set(e, s) : console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(i.keys())[0]}.`)
			},
			get: (t, e) => F.has(t) && F.get(t).get(e) || null,
			remove(t, e) {
				if (!F.has(t)) return;
				const s = F.get(t);
				s.delete(e), 0 === s.size && F.delete(t)
			}
		};

	function z(t) {
		if ("true" === t) return !0;
		if ("false" === t) return !1;
		if (t === Number(t).toString()) return Number(t);
		if ("" === t || "null" === t) return null;
		if ("string" != typeof t) return t;
		try {
			return JSON.parse(decodeURIComponent(t))
		} catch (e) {
			return t
		}
	}

	function H(t) {
		return t.replace(/[A-Z]/g, (t => `-${t.toLowerCase()}`))
	}
	const B = {
		setDataAttribute(t, e, s) {
			t.setAttribute(`data-bs-${H(e)}`, s)
		},
		removeDataAttribute(t, e) {
			t.removeAttribute(`data-bs-${H(e)}`)
		},
		getDataAttributes(t) {
			if (!t) return {};
			const e = {},
				s = Object.keys(t.dataset).filter((t => t.startsWith("bs") && !t.startsWith("bsConfig")));
			for (const i of s) {
				let s = i.replace(/^bs/, "");
				s = s.charAt(0).toLowerCase() + s.slice(1, s.length), e[s] = z(t.dataset[i])
			}
			return e
		},
		getDataAttribute: (t, e) => z(t.getAttribute(`data-bs-${H(e)}`))
	};
	class q {
		static get Default() {
			return {}
		}
		static get DefaultType() {
			return {}
		}
		static get NAME() {
			throw new Error('You have to implement the static method "NAME", for each component!')
		}
		_getConfig(t) {
			return t = this._mergeConfigObj(t), t = this._configAfterMerge(t), this._typeCheckConfig(t), t
		}
		_configAfterMerge(t) {
			return t
		}
		_mergeConfigObj(t, e) {
			const s = r(e) ? B.getDataAttribute(e, "config") : {};
			return { ...this.constructor.Default,
				..."object" == typeof s ? s : {},
				...r(e) ? B.getDataAttributes(e) : {},
				..."object" == typeof t ? t : {}
			}
		}
		_typeCheckConfig(t, e = this.constructor.DefaultType) {
			for (const [i, n] of Object.entries(e)) {
				const e = t[i],
					o = r(e) ? "element" : null == (s = e) ? `${s}` : Object.prototype.toString.call(s).match(/\s([a-z]+)/i)[1].toLowerCase();
				if (!new RegExp(n).test(o)) throw new TypeError(`${this.constructor.NAME.toUpperCase()}: Option "${i}" provided type "${o}" but expected type "${n}".`)
			}
			var s
		}
	}
	class W extends q {
		constructor(t, e) {
			super(), (t = a(t)) && (this._element = t, this._config = this._getConfig(e), $.set(this._element, this.constructor.DATA_KEY, this))
		}
		dispose() {
			$.remove(this._element, this.constructor.DATA_KEY), M.off(this._element, this.constructor.EVENT_KEY);
			for (const t of Object.getOwnPropertyNames(this)) this[t] = null
		}
		_queueCallback(t, e, s = !0) {
			b(t, e, s)
		}
		_getConfig(t) {
			return t = this._mergeConfigObj(t, this._element), t = this._configAfterMerge(t), this._typeCheckConfig(t), t
		}
		static getInstance(t) {
			return $.get(a(t), this.DATA_KEY)
		}
		static getOrCreateInstance(t, e = {}) {
			return this.getInstance(t) || new this(t, "object" == typeof e ? e : null)
		}
		static get VERSION() {
			return "5.3.0-alpha1"
		}
		static get DATA_KEY() {
			return `bs.${this.NAME}`
		}
		static get EVENT_KEY() {
			return `.${this.DATA_KEY}`
		}
		static eventName(t) {
			return `${t}${this.EVENT_KEY}`
		}
	}
	const R = t => {
			let e = t.getAttribute("data-bs-target");
			if (!e || "#" === e) {
				let s = t.getAttribute("href");
				if (!s || !s.includes("#") && !s.startsWith(".")) return null;
				s.includes("#") && !s.startsWith("#") && (s = `#${s.split("#")[1]}`), e = s && "#" !== s ? s.trim() : null
			}
			return n(e)
		},
		V = {
			find: (t, e = document.documentElement) => [].concat(...Element.prototype.querySelectorAll.call(e, t)),
			findOne: (t, e = document.documentElement) => Element.prototype.querySelector.call(e, t),
			children: (t, e) => [].concat(...t.children).filter((t => t.matches(e))),
			parents(t, e) {
				const s = [];
				let i = t.parentNode.closest(e);
				for (; i;) s.push(i), i = i.parentNode.closest(e);
				return s
			},
			prev(t, e) {
				let s = t.previousElementSibling;
				for (; s;) {
					if (s.matches(e)) return [s];
					s = s.previousElementSibling
				}
				return []
			},
			next(t, e) {
				let s = t.nextElementSibling;
				for (; s;) {
					if (s.matches(e)) return [s];
					s = s.nextElementSibling
				}
				return []
			},
			focusableChildren(t) {
				const e = ["a", "button", "input", "textarea", "select", "details", "[tabindex]", '[contenteditable="true"]'].map((t => `${t}:not([tabindex^="-"])`)).join(",");
				return this.find(e, t).filter((t => !c(t) && l(t)))
			},
			getSelectorFromElement(t) {
				const e = R(t);
				return e && V.findOne(e) ? e : null
			},
			getElementFromSelector(t) {
				const e = R(t);
				return e ? V.findOne(e) : null
			},
			getMultipleElementsFromSelector(t) {
				const e = R(t);
				return e ? V.find(e) : []
			}
		},
		K = (t, e = "hide") => {
			const s = `click.dismiss${t.EVENT_KEY}`,
				i = t.NAME;
			M.on(document, s, `[data-bs-dismiss="${i}"]`, (function(s) {
				if (["A", "AREA"].includes(this.tagName) && s.preventDefault(), c(this)) return;
				const n = V.getElementFromSelector(this) || this.closest(`.${i}`);
				t.getOrCreateInstance(n)[e]()
			}))
		};
	class Q extends W {
		static get NAME() {
			return "alert"
		}
		close() {
			if (M.trigger(this._element, "close.bs.alert").defaultPrevented) return;
			this._element.classList.remove("show");
			const t = this._element.classList.contains("fade");
			this._queueCallback((() => this._destroyElement()), this._element, t)
		}
		_destroyElement() {
			this._element.remove(), M.trigger(this._element, "closed.bs.alert"), this.dispose()
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = Q.getOrCreateInstance(this);
				if ("string" == typeof t) {
					if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	K(Q, "close"), m(Q);
	const X = '[data-bs-toggle="button"]';
	class Y extends W {
		static get NAME() {
			return "button"
		}
		toggle() {
			this._element.setAttribute("aria-pressed", this._element.classList.toggle("active"))
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = Y.getOrCreateInstance(this);
				"toggle" === t && e[t]()
			}))
		}
	}
	M.on(document, "click.bs.button.data-api", X, (t => {
		t.preventDefault();
		const e = t.target.closest(X);
		Y.getOrCreateInstance(e).toggle()
	})), m(Y);
	const U = {
			endCallback: null,
			leftCallback: null,
			rightCallback: null
		},
		G = {
			endCallback: "(function|null)",
			leftCallback: "(function|null)",
			rightCallback: "(function|null)"
		};
	class J extends q {
		constructor(t, e) {
			super(), this._element = t, t && J.isSupported() && (this._config = this._getConfig(e), this._deltaX = 0, this._supportPointerEvents = Boolean(window.PointerEvent), this._initEvents())
		}
		static get Default() {
			return U
		}
		static get DefaultType() {
			return G
		}
		static get NAME() {
			return "swipe"
		}
		dispose() {
			M.off(this._element, ".bs.swipe")
		}
		_start(t) {
			this._supportPointerEvents ? this._eventIsPointerPenTouch(t) && (this._deltaX = t.clientX) : this._deltaX = t.touches[0].clientX
		}
		_end(t) {
			this._eventIsPointerPenTouch(t) && (this._deltaX = t.clientX - this._deltaX), this._handleSwipe(), p(this._config.endCallback)
		}
		_move(t) {
			this._deltaX = t.touches && t.touches.length > 1 ? 0 : t.touches[0].clientX - this._deltaX
		}
		_handleSwipe() {
			const t = Math.abs(this._deltaX);
			if (t <= 40) return;
			const e = t / this._deltaX;
			this._deltaX = 0, e && p(e > 0 ? this._config.rightCallback : this._config.leftCallback)
		}
		_initEvents() {
			this._supportPointerEvents ? (M.on(this._element, "pointerdown.bs.swipe", (t => this._start(t))), M.on(this._element, "pointerup.bs.swipe", (t => this._end(t))), this._element.classList.add("pointer-event")) : (M.on(this._element, "touchstart.bs.swipe", (t => this._start(t))), M.on(this._element, "touchmove.bs.swipe", (t => this._move(t))), M.on(this._element, "touchend.bs.swipe", (t => this._end(t))))
		}
		_eventIsPointerPenTouch(t) {
			return this._supportPointerEvents && ("pen" === t.pointerType || "touch" === t.pointerType)
		}
		static isSupported() {
			return "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0
		}
	}
	const Z = "next",
		tt = "prev",
		et = "left",
		st = "right",
		it = "slid.bs.carousel",
		nt = "carousel",
		ot = "active",
		rt = {
			ArrowLeft: st,
			ArrowRight: et
		},
		at = {
			interval: 5e3,
			keyboard: !0,
			pause: "hover",
			ride: !1,
			touch: !0,
			wrap: !0
		},
		lt = {
			interval: "(number|boolean)",
			keyboard: "boolean",
			pause: "(string|boolean)",
			ride: "(boolean|string)",
			touch: "boolean",
			wrap: "boolean"
		};
	class ct extends W {
		constructor(t, e) {
			super(t, e), this._interval = null, this._activeElement = null, this._isSliding = !1, this.touchTimeout = null, this._swipeHelper = null, this._indicatorsElement = V.findOne(".carousel-indicators", this._element), this._addEventListeners(), this._config.ride === nt && this.cycle()
		}
		static get Default() {
			return at
		}
		static get DefaultType() {
			return lt
		}
		static get NAME() {
			return "carousel"
		}
		next() {
			this._slide(Z)
		}
		nextWhenVisible() {
			!document.hidden && l(this._element) && this.next()
		}
		prev() {
			this._slide(tt)
		}
		pause() {
			this._isSliding && o(this._element), this._clearInterval()
		}
		cycle() {
			this._clearInterval(), this._updateInterval(), this._interval = setInterval((() => this.nextWhenVisible()), this._config.interval)
		}
		_maybeEnableCycle() {
			this._config.ride && (this._isSliding ? M.one(this._element, it, (() => this.cycle())) : this.cycle())
		}
		to(t) {
			const e = this._getItems();
			if (t > e.length - 1 || t < 0) return;
			if (this._isSliding) return void M.one(this._element, it, (() => this.to(t)));
			const s = this._getItemIndex(this._getActive());
			if (s === t) return;
			const i = t > s ? Z : tt;
			this._slide(i, e[t])
		}
		dispose() {
			this._swipeHelper && this._swipeHelper.dispose(), super.dispose()
		}
		_configAfterMerge(t) {
			return t.defaultInterval = t.interval, t
		}
		_addEventListeners() {
			this._config.keyboard && M.on(this._element, "keydown.bs.carousel", (t => this._keydown(t))), "hover" === this._config.pause && (M.on(this._element, "mouseenter.bs.carousel", (() => this.pause())), M.on(this._element, "mouseleave.bs.carousel", (() => this._maybeEnableCycle()))), this._config.touch && J.isSupported() && this._addTouchEventListeners()
		}
		_addTouchEventListeners() {
			for (const t of V.find(".carousel-item img", this._element)) M.on(t, "dragstart.bs.carousel", (t => t.preventDefault()));
			const t = {
				leftCallback: () => this._slide(this._directionToOrder(et)),
				rightCallback: () => this._slide(this._directionToOrder(st)),
				endCallback: () => {
					"hover" === this._config.pause && (this.pause(), this.touchTimeout && clearTimeout(this.touchTimeout), this.touchTimeout = setTimeout((() => this._maybeEnableCycle()), 500 + this._config.interval))
				}
			};
			this._swipeHelper = new J(this._element, t)
		}
		_keydown(t) {
			if (/input|textarea/i.test(t.target.tagName)) return;
			const e = rt[t.key];
			e && (t.preventDefault(), this._slide(this._directionToOrder(e)))
		}
		_getItemIndex(t) {
			return this._getItems().indexOf(t)
		}
		_setActiveIndicatorElement(t) {
			if (!this._indicatorsElement) return;
			const e = V.findOne(".active", this._indicatorsElement);
			e.classList.remove(ot), e.removeAttribute("aria-current");
			const s = V.findOne(`[data-bs-slide-to="${t}"]`, this._indicatorsElement);
			s && (s.classList.add(ot), s.setAttribute("aria-current", "true"))
		}
		_updateInterval() {
			const t = this._activeElement || this._getActive();
			if (!t) return;
			const e = Number.parseInt(t.getAttribute("data-bs-interval"), 10);
			this._config.interval = e || this._config.defaultInterval
		}
		_slide(t, e = null) {
			if (this._isSliding) return;
			const s = this._getActive(),
				i = t === Z,
				n = e || v(this._getItems(), s, i, this._config.wrap);
			if (n === s) return;
			const o = this._getItemIndex(n),
				r = e => M.trigger(this._element, e, {
					relatedTarget: n,
					direction: this._orderToDirection(t),
					from: this._getItemIndex(s),
					to: o
				});
			if (r("slide.bs.carousel").defaultPrevented) return;
			if (!s || !n) return;
			const a = Boolean(this._interval);
			this.pause(), this._isSliding = !0, this._setActiveIndicatorElement(o), this._activeElement = n;
			const l = i ? "carousel-item-start" : "carousel-item-end",
				c = i ? "carousel-item-next" : "carousel-item-prev";
			n.classList.add(c), u(n), s.classList.add(l), n.classList.add(l), this._queueCallback((() => {
				n.classList.remove(l, c), n.classList.add(ot), s.classList.remove(ot, c, l), this._isSliding = !1, r(it)
			}), s, this._isAnimated()), a && this.cycle()
		}
		_isAnimated() {
			return this._element.classList.contains("slide")
		}
		_getActive() {
			return V.findOne(".active.carousel-item", this._element)
		}
		_getItems() {
			return V.find(".carousel-item", this._element)
		}
		_clearInterval() {
			this._interval && (clearInterval(this._interval), this._interval = null)
		}
		_directionToOrder(t) {
			return f() ? t === et ? tt : Z : t === et ? Z : tt
		}
		_orderToDirection(t) {
			return f() ? t === tt ? et : st : t === tt ? st : et
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = ct.getOrCreateInstance(this, t);
				if ("number" != typeof t) {
					if ("string" == typeof t) {
						if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
						e[t]()
					}
				} else e.to(t)
			}))
		}
	}
	M.on(document, "click.bs.carousel.data-api", "[data-bs-slide], [data-bs-slide-to]", (function(t) {
		const e = V.getElementFromSelector(this);
		if (!e || !e.classList.contains(nt)) return;
		t.preventDefault();
		const s = ct.getOrCreateInstance(e),
			i = this.getAttribute("data-bs-slide-to");
		return i ? (s.to(i), void s._maybeEnableCycle()) : "next" === B.getDataAttribute(this, "slide") ? (s.next(), void s._maybeEnableCycle()) : (s.prev(), void s._maybeEnableCycle())
	})), M.on(window, "load.bs.carousel.data-api", (() => {
		const t = V.find('[data-bs-ride="carousel"]');
		for (const e of t) ct.getOrCreateInstance(e)
	})), m(ct);
	const ht = "show",
		dt = "collapse",
		ut = "collapsing",
		_t = '[data-bs-toggle="collapse"]',
		gt = {
			parent: null,
			toggle: !0
		},
		ft = {
			parent: "(null|element)",
			toggle: "boolean"
		};
	class mt extends W {
		constructor(t, e) {
			super(t, e), this._isTransitioning = !1, this._triggerArray = [];
			const s = V.find(_t);
			for (const t of s) {
				const e = V.getSelectorFromElement(t),
					s = V.find(e).filter((t => t === this._element));
				null !== e && s.length && this._triggerArray.push(t)
			}
			this._initializeChildren(), this._config.parent || this._addAriaAndCollapsedClass(this._triggerArray, this._isShown()), this._config.toggle && this.toggle()
		}
		static get Default() {
			return gt
		}
		static get DefaultType() {
			return ft
		}
		static get NAME() {
			return "collapse"
		}
		toggle() {
			this._isShown() ? this.hide() : this.show()
		}
		show() {
			if (this._isTransitioning || this._isShown()) return;
			let t = [];
			if (this._config.parent && (t = this._getFirstLevelChildren(".collapse.show, .collapse.collapsing").filter((t => t !== this._element)).map((t => mt.getOrCreateInstance(t, {
					toggle: !1
				})))), t.length && t[0]._isTransitioning) return;
			if (M.trigger(this._element, "show.bs.collapse").defaultPrevented) return;
			for (const e of t) e.hide();
			const e = this._getDimension();
			this._element.classList.remove(dt), this._element.classList.add(ut), this._element.style[e] = 0, this._addAriaAndCollapsedClass(this._triggerArray, !0), this._isTransitioning = !0;
			const s = `scroll${e[0].toUpperCase()+e.slice(1)}`;
			this._queueCallback((() => {
				this._isTransitioning = !1, this._element.classList.remove(ut), this._element.classList.add(dt, ht), this._element.style[e] = "", M.trigger(this._element, "shown.bs.collapse")
			}), this._element, !0), this._element.style[e] = `${this._element[s]}px`
		}
		hide() {
			if (this._isTransitioning || !this._isShown()) return;
			if (M.trigger(this._element, "hide.bs.collapse").defaultPrevented) return;
			const t = this._getDimension();
			this._element.style[t] = `${this._element.getBoundingClientRect()[t]}px`, u(this._element), this._element.classList.add(ut), this._element.classList.remove(dt, ht);
			for (const t of this._triggerArray) {
				const e = V.getElementFromSelector(t);
				e && !this._isShown(e) && this._addAriaAndCollapsedClass([t], !1)
			}
			this._isTransitioning = !0, this._element.style[t] = "", this._queueCallback((() => {
				this._isTransitioning = !1, this._element.classList.remove(ut), this._element.classList.add(dt), M.trigger(this._element, "hidden.bs.collapse")
			}), this._element, !0)
		}
		_isShown(t = this._element) {
			return t.classList.contains(ht)
		}
		_configAfterMerge(t) {
			return t.toggle = Boolean(t.toggle), t.parent = a(t.parent), t
		}
		_getDimension() {
			return this._element.classList.contains("collapse-horizontal") ? "width" : "height"
		}
		_initializeChildren() {
			if (!this._config.parent) return;
			const t = this._getFirstLevelChildren(_t);
			for (const e of t) {
				const t = V.getElementFromSelector(e);
				t && this._addAriaAndCollapsedClass([e], this._isShown(t))
			}
		}
		_getFirstLevelChildren(t) {
			const e = V.find(":scope .collapse .collapse", this._config.parent);
			return V.find(t, this._config.parent).filter((t => !e.includes(t)))
		}
		_addAriaAndCollapsedClass(t, e) {
			if (t.length)
				for (const s of t) s.classList.toggle("collapsed", !e), s.setAttribute("aria-expanded", e)
		}
		static jQueryInterface(t) {
			const e = {};
			return "string" == typeof t && /show|hide/.test(t) && (e.toggle = !1), this.each((function() {
				const s = mt.getOrCreateInstance(this, e);
				if ("string" == typeof t) {
					if (void 0 === s[t]) throw new TypeError(`No method named "${t}"`);
					s[t]()
				}
			}))
		}
	}
	M.on(document, "click.bs.collapse.data-api", _t, (function(t) {
		("A" === t.target.tagName || t.delegateTarget && "A" === t.delegateTarget.tagName) && t.preventDefault();
		for (const t of V.getMultipleElementsFromSelector(this)) mt.getOrCreateInstance(t, {
			toggle: !1
		}).toggle()
	})), m(mt);
	const pt = "dropdown",
		bt = "ArrowUp",
		vt = "ArrowDown",
		yt = "click.bs.dropdown.data-api",
		wt = "keydown.bs.dropdown.data-api",
		At = "show",
		Et = '[data-bs-toggle="dropdown"]:not(.disabled):not(:disabled)',
		Ct = `${Et}.show`,
		Tt = ".dropdown-menu",
		kt = f() ? "top-end" : "top-start",
		St = f() ? "top-start" : "top-end",
		Lt = f() ? "bottom-end" : "bottom-start",
		Ot = f() ? "bottom-start" : "bottom-end",
		It = f() ? "left-start" : "right-start",
		Dt = f() ? "right-start" : "left-start",
		Nt = {
			autoClose: !0,
			boundary: "clippingParents",
			display: "dynamic",
			offset: [0, 2],
			popperConfig: null,
			reference: "toggle"
		},
		Pt = {
			autoClose: "(boolean|string)",
			boundary: "(string|element)",
			display: "string",
			offset: "(array|string|function)",
			popperConfig: "(null|object|function)",
			reference: "(string|element|object)"
		};
	class xt extends W {
		constructor(t, e) {
			super(t, e), this._popper = null, this._parent = this._element.parentNode, this._menu = V.next(this._element, Tt)[0] || V.prev(this._element, Tt)[0] || V.findOne(Tt, this._parent), this._inNavbar = this._detectNavbar()
		}
		static get Default() {
			return Nt
		}
		static get DefaultType() {
			return Pt
		}
		static get NAME() {
			return pt
		}
		toggle() {
			return this._isShown() ? this.hide() : this.show()
		}
		show() {
			if (c(this._element) || this._isShown()) return;
			const t = {
				relatedTarget: this._element
			};
			if (!M.trigger(this._element, "show.bs.dropdown", t).defaultPrevented) {
				if (this._createPopper(), "ontouchstart" in document.documentElement && !this._parent.closest(".navbar-nav"))
					for (const t of [].concat(...document.body.children)) M.on(t, "mouseover", d);
				this._element.focus(), this._element.setAttribute("aria-expanded", !0), this._menu.classList.add(At), this._element.classList.add(At), M.trigger(this._element, "shown.bs.dropdown", t)
			}
		}
		hide() {
			if (c(this._element) || !this._isShown()) return;
			const t = {
				relatedTarget: this._element
			};
			this._completeHide(t)
		}
		dispose() {
			this._popper && this._popper.destroy(), super.dispose()
		}
		update() {
			this._inNavbar = this._detectNavbar(), this._popper && this._popper.update()
		}
		_completeHide(t) {
			if (!M.trigger(this._element, "hide.bs.dropdown", t).defaultPrevented) {
				if ("ontouchstart" in document.documentElement)
					for (const t of [].concat(...document.body.children)) M.off(t, "mouseover", d);
				this._popper && this._popper.destroy(), this._menu.classList.remove(At), this._element.classList.remove(At), this._element.setAttribute("aria-expanded", "false"), B.removeDataAttribute(this._menu, "popper"), M.trigger(this._element, "hidden.bs.dropdown", t)
			}
		}
		_getConfig(t) {
			if ("object" == typeof(t = super._getConfig(t)).reference && !r(t.reference) && "function" != typeof t.reference.getBoundingClientRect) throw new TypeError(`${pt.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`);
			return t
		}
		_createPopper() {
			if (void 0 === s) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
			let t = this._element;
			"parent" === this._config.reference ? t = this._parent : r(this._config.reference) ? t = a(this._config.reference) : "object" == typeof this._config.reference && (t = this._config.reference);
			const e = this._getPopperConfig();
			this._popper = s.createPopper(t, this._menu, e)
		}
		_isShown() {
			return this._menu.classList.contains(At)
		}
		_getPlacement() {
			const t = this._parent;
			if (t.classList.contains("dropend")) return It;
			if (t.classList.contains("dropstart")) return Dt;
			if (t.classList.contains("dropup-center")) return "top";
			if (t.classList.contains("dropdown-center")) return "bottom";
			const e = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim();
			return t.classList.contains("dropup") ? e ? St : kt : e ? Ot : Lt
		}
		_detectNavbar() {
			return null !== this._element.closest(".navbar")
		}
		_getOffset() {
			const {
				offset: t
			} = this._config;
			return "string" == typeof t ? t.split(",").map((t => Number.parseInt(t, 10))) : "function" == typeof t ? e => t(e, this._element) : t
		}
		_getPopperConfig() {
			const t = {
				placement: this._getPlacement(),
				modifiers: [{
					name: "preventOverflow",
					options: {
						boundary: this._config.boundary
					}
				}, {
					name: "offset",
					options: {
						offset: this._getOffset()
					}
				}]
			};
			return (this._inNavbar || "static" === this._config.display) && (B.setDataAttribute(this._menu, "popper", "static"), t.modifiers = [{
				name: "applyStyles",
				enabled: !1
			}]), { ...t,
				...p(this._config.popperConfig, [t])
			}
		}
		_selectMenuItem({
			key: t,
			target: e
		}) {
			const s = V.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", this._menu).filter((t => l(t)));
			s.length && v(s, e, t === vt, !s.includes(e)).focus()
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = xt.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
		static clearMenus(t) {
			if (2 === t.button || "keyup" === t.type && "Tab" !== t.key) return;
			const e = V.find(Ct);
			for (const s of e) {
				const e = xt.getInstance(s);
				if (!e || !1 === e._config.autoClose) continue;
				const i = t.composedPath(),
					n = i.includes(e._menu);
				if (i.includes(e._element) || "inside" === e._config.autoClose && !n || "outside" === e._config.autoClose && n) continue;
				if (e._menu.contains(t.target) && ("keyup" === t.type && "Tab" === t.key || /input|select|option|textarea|form/i.test(t.target.tagName))) continue;
				const o = {
					relatedTarget: e._element
				};
				"click" === t.type && (o.clickEvent = t), e._completeHide(o)
			}
		}
		static dataApiKeydownHandler(t) {
			const e = /input|textarea/i.test(t.target.tagName),
				s = "Escape" === t.key,
				i = [bt, vt].includes(t.key);
			if (!i && !s) return;
			if (e && !s) return;
			t.preventDefault();
			const n = this.matches(Et) ? this : V.prev(this, Et)[0] || V.next(this, Et)[0] || V.findOne(Et, t.delegateTarget.parentNode),
				o = xt.getOrCreateInstance(n);
			if (i) return t.stopPropagation(), o.show(), void o._selectMenuItem(t);
			o._isShown() && (t.stopPropagation(), o.hide(), n.focus())
		}
	}
	M.on(document, wt, Et, xt.dataApiKeydownHandler), M.on(document, wt, Tt, xt.dataApiKeydownHandler), M.on(document, yt, xt.clearMenus), M.on(document, "keyup.bs.dropdown.data-api", xt.clearMenus), M.on(document, yt, Et, (function(t) {
		t.preventDefault(), xt.getOrCreateInstance(this).toggle()
	})), m(xt);
	const Mt = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
		jt = ".sticky-top",
		Ft = "padding-right",
		$t = "margin-right";
	class zt {
		constructor() {
			this._element = document.body
		}
		getWidth() {
			const t = document.documentElement.clientWidth;
			return Math.abs(window.innerWidth - t)
		}
		hide() {
			const t = this.getWidth();
			this._disableOverFlow(), this._setElementAttributes(this._element, Ft, (e => e + t)), this._setElementAttributes(Mt, Ft, (e => e + t)), this._setElementAttributes(jt, $t, (e => e - t))
		}
		reset() {
			this._resetElementAttributes(this._element, "overflow"), this._resetElementAttributes(this._element, Ft), this._resetElementAttributes(Mt, Ft), this._resetElementAttributes(jt, $t)
		}
		isOverflowing() {
			return this.getWidth() > 0
		}
		_disableOverFlow() {
			this._saveInitialAttribute(this._element, "overflow"), this._element.style.overflow = "hidden"
		}
		_setElementAttributes(t, e, s) {
			const i = this.getWidth();
			this._applyManipulationCallback(t, (t => {
				if (t !== this._element && window.innerWidth > t.clientWidth + i) return;
				this._saveInitialAttribute(t, e);
				const n = window.getComputedStyle(t).getPropertyValue(e);
				t.style.setProperty(e, `${s(Number.parseFloat(n))}px`)
			}))
		}
		_saveInitialAttribute(t, e) {
			const s = t.style.getPropertyValue(e);
			s && B.setDataAttribute(t, e, s)
		}
		_resetElementAttributes(t, e) {
			this._applyManipulationCallback(t, (t => {
				const s = B.getDataAttribute(t, e);
				null !== s ? (B.removeDataAttribute(t, e), t.style.setProperty(e, s)) : t.style.removeProperty(e)
			}))
		}
		_applyManipulationCallback(t, e) {
			if (r(t)) e(t);
			else
				for (const s of V.find(t, this._element)) e(s)
		}
	}
	const Ht = "show",
		Bt = "mousedown.bs.backdrop",
		qt = {
			className: "modal-backdrop",
			clickCallback: null,
			isAnimated: !1,
			isVisible: !0,
			rootElement: "body"
		},
		Wt = {
			className: "string",
			clickCallback: "(function|null)",
			isAnimated: "boolean",
			isVisible: "boolean",
			rootElement: "(element|string)"
		};
	class Rt extends q {
		constructor(t) {
			super(), this._config = this._getConfig(t), this._isAppended = !1, this._element = null
		}
		static get Default() {
			return qt
		}
		static get DefaultType() {
			return Wt
		}
		static get NAME() {
			return "backdrop"
		}
		show(t) {
			if (!this._config.isVisible) return void p(t);
			this._append();
			const e = this._getElement();
			this._config.isAnimated && u(e), e.classList.add(Ht), this._emulateAnimation((() => {
				p(t)
			}))
		}
		hide(t) {
			this._config.isVisible ? (this._getElement().classList.remove(Ht), this._emulateAnimation((() => {
				this.dispose(), p(t)
			}))) : p(t)
		}
		dispose() {
			this._isAppended && (M.off(this._element, Bt), this._element.remove(), this._isAppended = !1)
		}
		_getElement() {
			if (!this._element) {
				const t = document.createElement("div");
				t.className = this._config.className, this._config.isAnimated && t.classList.add("fade"), this._element = t
			}
			return this._element
		}
		_configAfterMerge(t) {
			return t.rootElement = a(t.rootElement), t
		}
		_append() {
			if (this._isAppended) return;
			const t = this._getElement();
			this._config.rootElement.append(t), M.on(t, Bt, (() => {
				p(this._config.clickCallback)
			})), this._isAppended = !0
		}
		_emulateAnimation(t) {
			b(t, this._getElement(), this._config.isAnimated)
		}
	}
	const Vt = ".bs.focustrap",
		Kt = "backward",
		Qt = {
			autofocus: !0,
			trapElement: null
		},
		Xt = {
			autofocus: "boolean",
			trapElement: "element"
		};
	class Yt extends q {
		constructor(t) {
			super(), this._config = this._getConfig(t), this._isActive = !1, this._lastTabNavDirection = null
		}
		static get Default() {
			return Qt
		}
		static get DefaultType() {
			return Xt
		}
		static get NAME() {
			return "focustrap"
		}
		activate() {
			this._isActive || (this._config.autofocus && this._config.trapElement.focus(), M.off(document, Vt), M.on(document, "focusin.bs.focustrap", (t => this._handleFocusin(t))), M.on(document, "keydown.tab.bs.focustrap", (t => this._handleKeydown(t))), this._isActive = !0)
		}
		deactivate() {
			this._isActive && (this._isActive = !1, M.off(document, Vt))
		}
		_handleFocusin(t) {
			const {
				trapElement: e
			} = this._config;
			if (t.target === document || t.target === e || e.contains(t.target)) return;
			const s = V.focusableChildren(e);
			0 === s.length ? e.focus() : this._lastTabNavDirection === Kt ? s[s.length - 1].focus() : s[0].focus()
		}
		_handleKeydown(t) {
			"Tab" === t.key && (this._lastTabNavDirection = t.shiftKey ? Kt : "forward")
		}
	}
	const Ut = "hidden.bs.modal",
		Gt = "show.bs.modal",
		Jt = "modal-open",
		Zt = "show",
		te = "modal-static",
		ee = {
			backdrop: !0,
			focus: !0,
			keyboard: !0
		},
		se = {
			backdrop: "(boolean|string)",
			focus: "boolean",
			keyboard: "boolean"
		};
	class ie extends W {
		constructor(t, e) {
			super(t, e), this._dialog = V.findOne(".modal-dialog", this._element), this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._isShown = !1, this._isTransitioning = !1, this._scrollBar = new zt, this._addEventListeners()
		}
		static get Default() {
			return ee
		}
		static get DefaultType() {
			return se
		}
		static get NAME() {
			return "modal"
		}
		toggle(t) {
			return this._isShown ? this.hide() : this.show(t)
		}
		show(t) {
			this._isShown || this._isTransitioning || M.trigger(this._element, Gt, {
				relatedTarget: t
			}).defaultPrevented || (this._isShown = !0, this._isTransitioning = !0, this._scrollBar.hide(), document.body.classList.add(Jt), this._adjustDialog(), this._backdrop.show((() => this._showElement(t))))
		}
		hide() {
			this._isShown && !this._isTransitioning && (M.trigger(this._element, "hide.bs.modal").defaultPrevented || (this._isShown = !1, this._isTransitioning = !0, this._focustrap.deactivate(), this._element.classList.remove(Zt), this._queueCallback((() => this._hideModal()), this._element, this._isAnimated())))
		}
		dispose() {
			for (const t of [window, this._dialog]) M.off(t, ".bs.modal");
			this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
		}
		handleUpdate() {
			this._adjustDialog()
		}
		_initializeBackDrop() {
			return new Rt({
				isVisible: Boolean(this._config.backdrop),
				isAnimated: this._isAnimated()
			})
		}
		_initializeFocusTrap() {
			return new Yt({
				trapElement: this._element
			})
		}
		_showElement(t) {
			document.body.contains(this._element) || document.body.append(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.scrollTop = 0;
			const e = V.findOne(".modal-body", this._dialog);
			e && (e.scrollTop = 0), u(this._element), this._element.classList.add(Zt), this._queueCallback((() => {
				this._config.focus && this._focustrap.activate(), this._isTransitioning = !1, M.trigger(this._element, "shown.bs.modal", {
					relatedTarget: t
				})
			}), this._dialog, this._isAnimated())
		}
		_addEventListeners() {
			M.on(this._element, "keydown.dismiss.bs.modal", (t => {
				if ("Escape" === t.key) return this._config.keyboard ? (t.preventDefault(), void this.hide()) : void this._triggerBackdropTransition()
			})), M.on(window, "resize.bs.modal", (() => {
				this._isShown && !this._isTransitioning && this._adjustDialog()
			})), M.on(this._element, "mousedown.dismiss.bs.modal", (t => {
				M.one(this._element, "click.dismiss.bs.modal", (e => {
					this._element === t.target && this._element === e.target && ("static" !== this._config.backdrop ? this._config.backdrop && this.hide() : this._triggerBackdropTransition())
				}))
			}))
		}
		_hideModal() {
			this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._isTransitioning = !1, this._backdrop.hide((() => {
				document.body.classList.remove(Jt), this._resetAdjustments(), this._scrollBar.reset(), M.trigger(this._element, Ut)
			}))
		}
		_isAnimated() {
			return this._element.classList.contains("fade")
		}
		_triggerBackdropTransition() {
			if (M.trigger(this._element, "hidePrevented.bs.modal").defaultPrevented) return;
			const t = this._element.scrollHeight > document.documentElement.clientHeight,
				e = this._element.style.overflowY;
			"hidden" === e || this._element.classList.contains(te) || (t || (this._element.style.overflowY = "hidden"), this._element.classList.add(te), this._queueCallback((() => {
				this._element.classList.remove(te), this._queueCallback((() => {
					this._element.style.overflowY = e
				}), this._dialog)
			}), this._dialog), this._element.focus())
		}
		_adjustDialog() {
			const t = this._element.scrollHeight > document.documentElement.clientHeight,
				e = this._scrollBar.getWidth(),
				s = e > 0;
			if (s && !t) {
				const t = f() ? "paddingLeft" : "paddingRight";
				this._element.style[t] = `${e}px`
			}
			if (!s && t) {
				const t = f() ? "paddingRight" : "paddingLeft";
				this._element.style[t] = `${e}px`
			}
		}
		_resetAdjustments() {
			this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
		}
		static jQueryInterface(t, e) {
			return this.each((function() {
				const s = ie.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === s[t]) throw new TypeError(`No method named "${t}"`);
					s[t](e)
				}
			}))
		}
	}
	M.on(document, "click.bs.modal.data-api", '[data-bs-toggle="modal"]', (function(t) {
		const e = V.getElementFromSelector(this);
		["A", "AREA"].includes(this.tagName) && t.preventDefault(), M.one(e, Gt, (t => {
			t.defaultPrevented || M.one(e, Ut, (() => {
				l(this) && this.focus()
			}))
		}));
		const s = V.findOne(".modal.show");
		s && ie.getInstance(s).hide(), ie.getOrCreateInstance(e).toggle(this)
	})), K(ie), m(ie);
	const ne = "show",
		oe = "showing",
		re = "hiding",
		ae = ".offcanvas.show",
		le = "hidePrevented.bs.offcanvas",
		ce = "hidden.bs.offcanvas",
		he = {
			backdrop: !0,
			keyboard: !0,
			scroll: !1
		},
		de = {
			backdrop: "(boolean|string)",
			keyboard: "boolean",
			scroll: "boolean"
		};
	class ue extends W {
		constructor(t, e) {
			super(t, e), this._isShown = !1, this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._addEventListeners()
		}
		static get Default() {
			return he
		}
		static get DefaultType() {
			return de
		}
		static get NAME() {
			return "offcanvas"
		}
		toggle(t) {
			return this._isShown ? this.hide() : this.show(t)
		}
		show(t) {
			this._isShown || M.trigger(this._element, "show.bs.offcanvas", {
				relatedTarget: t
			}).defaultPrevented || (this._isShown = !0, this._backdrop.show(), this._config.scroll || (new zt).hide(), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.classList.add(oe), this._queueCallback((() => {
				this._config.scroll && !this._config.backdrop || this._focustrap.activate(), this._element.classList.add(ne), this._element.classList.remove(oe), M.trigger(this._element, "shown.bs.offcanvas", {
					relatedTarget: t
				})
			}), this._element, !0))
		}
		hide() {
			this._isShown && (M.trigger(this._element, "hide.bs.offcanvas").defaultPrevented || (this._focustrap.deactivate(), this._element.blur(), this._isShown = !1, this._element.classList.add(re), this._backdrop.hide(), this._queueCallback((() => {
				this._element.classList.remove(ne, re), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._config.scroll || (new zt).reset(), M.trigger(this._element, ce)
			}), this._element, !0)))
		}
		dispose() {
			this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
		}
		_initializeBackDrop() {
			const t = Boolean(this._config.backdrop);
			return new Rt({
				className: "offcanvas-backdrop",
				isVisible: t,
				isAnimated: !0,
				rootElement: this._element.parentNode,
				clickCallback: t ? () => {
					"static" !== this._config.backdrop ? this.hide() : M.trigger(this._element, le)
				} : null
			})
		}
		_initializeFocusTrap() {
			return new Yt({
				trapElement: this._element
			})
		}
		_addEventListeners() {
			M.on(this._element, "keydown.dismiss.bs.offcanvas", (t => {
				"Escape" === t.key && (this._config.keyboard ? this.hide() : M.trigger(this._element, le))
			}))
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = ue.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	M.on(document, "click.bs.offcanvas.data-api", '[data-bs-toggle="offcanvas"]', (function(t) {
		const e = V.getElementFromSelector(this);
		if (["A", "AREA"].includes(this.tagName) && t.preventDefault(), c(this)) return;
		M.one(e, ce, (() => {
			l(this) && this.focus()
		}));
		const s = V.findOne(ae);
		s && s !== e && ue.getInstance(s).hide(), ue.getOrCreateInstance(e).toggle(this)
	})), M.on(window, "load.bs.offcanvas.data-api", (() => {
		for (const t of V.find(ae)) ue.getOrCreateInstance(t).show()
	})), M.on(window, "resize.bs.offcanvas", (() => {
		for (const t of V.find("[aria-modal][class*=show][class*=offcanvas-]")) "fixed" !== getComputedStyle(t).position && ue.getOrCreateInstance(t).hide()
	})), K(ue), m(ue);
	const _e = new Set(["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]),
		ge = /^(?:(?:https?|mailto|ftp|tel|file|sms):|[^#&/:?]*(?:[#/?]|$))/i,
		fe = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
		me = (t, e) => {
			const s = t.nodeName.toLowerCase();
			return e.includes(s) ? !_e.has(s) || Boolean(ge.test(t.nodeValue) || fe.test(t.nodeValue)) : e.filter((t => t instanceof RegExp)).some((t => t.test(s)))
		},
		pe = {
			"*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
			a: ["target", "href", "title", "rel"],
			area: [],
			b: [],
			br: [],
			col: [],
			code: [],
			div: [],
			em: [],
			hr: [],
			h1: [],
			h2: [],
			h3: [],
			h4: [],
			h5: [],
			h6: [],
			i: [],
			img: ["src", "srcset", "alt", "title", "width", "height"],
			li: [],
			ol: [],
			p: [],
			pre: [],
			s: [],
			small: [],
			span: [],
			sub: [],
			sup: [],
			strong: [],
			u: [],
			ul: []
		},
		be = {
			allowList: pe,
			content: {},
			extraClass: "",
			html: !1,
			sanitize: !0,
			sanitizeFn: null,
			template: "<div></div>"
		},
		ve = {
			allowList: "object",
			content: "object",
			extraClass: "(string|function)",
			html: "boolean",
			sanitize: "boolean",
			sanitizeFn: "(null|function)",
			template: "string"
		},
		ye = {
			entry: "(string|element|function|null)",
			selector: "(string|element)"
		};
	class we extends q {
		constructor(t) {
			super(), this._config = this._getConfig(t)
		}
		static get Default() {
			return be
		}
		static get DefaultType() {
			return ve
		}
		static get NAME() {
			return "TemplateFactory"
		}
		getContent() {
			return Object.values(this._config.content).map((t => this._resolvePossibleFunction(t))).filter(Boolean)
		}
		hasContent() {
			return this.getContent().length > 0
		}
		changeContent(t) {
			return this._checkContent(t), this._config.content = { ...this._config.content,
				...t
			}, this
		}
		toHtml() {
			const t = document.createElement("div");
			t.innerHTML = this._maybeSanitize(this._config.template);
			for (const [e, s] of Object.entries(this._config.content)) this._setContent(t, s, e);
			const e = t.children[0],
				s = this._resolvePossibleFunction(this._config.extraClass);
			return s && e.classList.add(...s.split(" ")), e
		}
		_typeCheckConfig(t) {
			super._typeCheckConfig(t), this._checkContent(t.content)
		}
		_checkContent(t) {
			for (const [e, s] of Object.entries(t)) super._typeCheckConfig({
				selector: e,
				entry: s
			}, ye)
		}
		_setContent(t, e, s) {
			const i = V.findOne(s, t);
			i && ((e = this._resolvePossibleFunction(e)) ? r(e) ? this._putElementInTemplate(a(e), i) : this._config.html ? i.innerHTML = this._maybeSanitize(e) : i.textContent = e : i.remove())
		}
		_maybeSanitize(t) {
			return this._config.sanitize ? function(t, e, s) {
				if (!t.length) return t;
				if (s && "function" == typeof s) return s(t);
				const i = (new window.DOMParser).parseFromString(t, "text/html"),
					n = [].concat(...i.body.querySelectorAll("*"));
				for (const t of n) {
					const s = t.nodeName.toLowerCase();
					if (!Object.keys(e).includes(s)) {
						t.remove();
						continue
					}
					const i = [].concat(...t.attributes),
						n = [].concat(e["*"] || [], e[s] || []);
					for (const e of i) me(e, n) || t.removeAttribute(e.nodeName)
				}
				return i.body.innerHTML
			}(t, this._config.allowList, this._config.sanitizeFn) : t
		}
		_resolvePossibleFunction(t) {
			return p(t, [this])
		}
		_putElementInTemplate(t, e) {
			if (this._config.html) return e.innerHTML = "", void e.append(t);
			e.textContent = t.textContent
		}
	}
	const Ae = new Set(["sanitize", "allowList", "sanitizeFn"]),
		Ee = "fade",
		Ce = "show",
		Te = ".modal",
		ke = "hide.bs.modal",
		Se = "hover",
		Le = "focus",
		Oe = {
			AUTO: "auto",
			TOP: "top",
			RIGHT: f() ? "left" : "right",
			BOTTOM: "bottom",
			LEFT: f() ? "right" : "left"
		},
		Ie = {
			allowList: pe,
			animation: !0,
			boundary: "clippingParents",
			container: !1,
			customClass: "",
			delay: 0,
			fallbackPlacements: ["top", "right", "bottom", "left"],
			html: !1,
			offset: [0, 0],
			placement: "top",
			popperConfig: null,
			sanitize: !0,
			sanitizeFn: null,
			selector: !1,
			template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
			title: "",
			trigger: "hover focus"
		},
		De = {
			allowList: "object",
			animation: "boolean",
			boundary: "(string|element)",
			container: "(string|element|boolean)",
			customClass: "(string|function)",
			delay: "(number|object)",
			fallbackPlacements: "array",
			html: "boolean",
			offset: "(array|string|function)",
			placement: "(string|function)",
			popperConfig: "(null|object|function)",
			sanitize: "boolean",
			sanitizeFn: "(null|function)",
			selector: "(string|boolean)",
			template: "string",
			title: "(string|element|function)",
			trigger: "string"
		};
	class Ne extends W {
		constructor(t, e) {
			if (void 0 === s) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
			super(t, e), this._isEnabled = !0, this._timeout = 0, this._isHovered = null, this._activeTrigger = {}, this._popper = null, this._templateFactory = null, this._newContent = null, this.tip = null, this._setListeners(), this._config.selector || this._fixTitle()
		}
		static get Default() {
			return Ie
		}
		static get DefaultType() {
			return De
		}
		static get NAME() {
			return "tooltip"
		}
		enable() {
			this._isEnabled = !0
		}
		disable() {
			this._isEnabled = !1
		}
		toggleEnabled() {
			this._isEnabled = !this._isEnabled
		}
		toggle() {
			this._isEnabled && (this._activeTrigger.click = !this._activeTrigger.click, this._isShown() ? this._leave() : this._enter())
		}
		dispose() {
			clearTimeout(this._timeout), M.off(this._element.closest(Te), ke, this._hideModalHandler), this._element.getAttribute("data-bs-original-title") && this._element.setAttribute("title", this._element.getAttribute("data-bs-original-title")), this._disposePopper(), super.dispose()
		}
		show() {
			if ("none" === this._element.style.display) throw new Error("Please use show on visible elements");
			if (!this._isWithContent() || !this._isEnabled) return;
			const t = M.trigger(this._element, this.constructor.eventName("show")),
				e = (h(this._element) || this._element.ownerDocument.documentElement).contains(this._element);
			if (t.defaultPrevented || !e) return;
			this._disposePopper();
			const s = this._getTipElement();
			this._element.setAttribute("aria-describedby", s.getAttribute("id"));
			const {
				container: i
			} = this._config;
			if (this._element.ownerDocument.documentElement.contains(this.tip) || (i.append(s), M.trigger(this._element, this.constructor.eventName("inserted"))), this._popper = this._createPopper(s), s.classList.add(Ce), "ontouchstart" in document.documentElement)
				for (const t of [].concat(...document.body.children)) M.on(t, "mouseover", d);
			this._queueCallback((() => {
				M.trigger(this._element, this.constructor.eventName("shown")), !1 === this._isHovered && this._leave(), this._isHovered = !1
			}), this.tip, this._isAnimated())
		}
		hide() {
			if (this._isShown() && !M.trigger(this._element, this.constructor.eventName("hide")).defaultPrevented) {
				if (this._getTipElement().classList.remove(Ce), "ontouchstart" in document.documentElement)
					for (const t of [].concat(...document.body.children)) M.off(t, "mouseover", d);
				this._activeTrigger.click = !1, this._activeTrigger.focus = !1, this._activeTrigger.hover = !1, this._isHovered = null, this._queueCallback((() => {
					this._isWithActiveTrigger() || (this._isHovered || this._disposePopper(), this._element.removeAttribute("aria-describedby"), M.trigger(this._element, this.constructor.eventName("hidden")))
				}), this.tip, this._isAnimated())
			}
		}
		update() {
			this._popper && this._popper.update()
		}
		_isWithContent() {
			return Boolean(this._getTitle())
		}
		_getTipElement() {
			return this.tip || (this.tip = this._createTipElement(this._newContent || this._getContentForTemplate())), this.tip
		}
		_createTipElement(t) {
			const e = this._getTemplateFactory(t).toHtml();
			if (!e) return null;
			e.classList.remove(Ee, Ce), e.classList.add(`bs-${this.constructor.NAME}-auto`);
			const s = (t => {
				do {
					t += Math.floor(1e6 * Math.random())
				} while (document.getElementById(t));
				return t
			})(this.constructor.NAME).toString();
			return e.setAttribute("id", s), this._isAnimated() && e.classList.add(Ee), e
		}
		setContent(t) {
			this._newContent = t, this._isShown() && (this._disposePopper(), this.show())
		}
		_getTemplateFactory(t) {
			return this._templateFactory ? this._templateFactory.changeContent(t) : this._templateFactory = new we({ ...this._config,
				content: t,
				extraClass: this._resolvePossibleFunction(this._config.customClass)
			}), this._templateFactory
		}
		_getContentForTemplate() {
			return {
				".tooltip-inner": this._getTitle()
			}
		}
		_getTitle() {
			return this._resolvePossibleFunction(this._config.title) || this._element.getAttribute("data-bs-original-title")
		}
		_initializeOnDelegatedTarget(t) {
			return this.constructor.getOrCreateInstance(t.delegateTarget, this._getDelegateConfig())
		}
		_isAnimated() {
			return this._config.animation || this.tip && this.tip.classList.contains(Ee)
		}
		_isShown() {
			return this.tip && this.tip.classList.contains(Ce)
		}
		_createPopper(t) {
			const e = p(this._config.placement, [this, t, this._element]),
				i = Oe[e.toUpperCase()];
			return s.createPopper(this._element, t, this._getPopperConfig(i))
		}
		_getOffset() {
			const {
				offset: t
			} = this._config;
			return "string" == typeof t ? t.split(",").map((t => Number.parseInt(t, 10))) : "function" == typeof t ? e => t(e, this._element) : t
		}
		_resolvePossibleFunction(t) {
			return p(t, [this._element])
		}
		_getPopperConfig(t) {
			const e = {
				placement: t,
				modifiers: [{
					name: "flip",
					options: {
						fallbackPlacements: this._config.fallbackPlacements
					}
				}, {
					name: "offset",
					options: {
						offset: this._getOffset()
					}
				}, {
					name: "preventOverflow",
					options: {
						boundary: this._config.boundary
					}
				}, {
					name: "arrow",
					options: {
						element: `.${this.constructor.NAME}-arrow`
					}
				}, {
					name: "preSetPlacement",
					enabled: !0,
					phase: "beforeMain",
					fn: t => {
						this._getTipElement().setAttribute("data-popper-placement", t.state.placement)
					}
				}]
			};
			return { ...e,
				...p(this._config.popperConfig, [e])
			}
		}
		_setListeners() {
			const t = this._config.trigger.split(" ");
			for (const e of t)
				if ("click" === e) M.on(this._element, this.constructor.eventName("click"), this._config.selector, (t => {
					this._initializeOnDelegatedTarget(t).toggle()
				}));
				else if ("manual" !== e) {
				const t = e === Se ? this.constructor.eventName("mouseenter") : this.constructor.eventName("focusin"),
					s = e === Se ? this.constructor.eventName("mouseleave") : this.constructor.eventName("focusout");
				M.on(this._element, t, this._config.selector, (t => {
					const e = this._initializeOnDelegatedTarget(t);
					e._activeTrigger["focusin" === t.type ? Le : Se] = !0, e._enter()
				})), M.on(this._element, s, this._config.selector, (t => {
					const e = this._initializeOnDelegatedTarget(t);
					e._activeTrigger["focusout" === t.type ? Le : Se] = e._element.contains(t.relatedTarget), e._leave()
				}))
			}
			this._hideModalHandler = () => {
				this._element && this.hide()
			}, M.on(this._element.closest(Te), ke, this._hideModalHandler)
		}
		_fixTitle() {
			const t = this._element.getAttribute("title");
			t && (this._element.getAttribute("aria-label") || this._element.textContent.trim() || this._element.setAttribute("aria-label", t), this._element.setAttribute("data-bs-original-title", t), this._element.removeAttribute("title"))
		}
		_enter() {
			this._isShown() || this._isHovered ? this._isHovered = !0 : (this._isHovered = !0, this._setTimeout((() => {
				this._isHovered && this.show()
			}), this._config.delay.show))
		}
		_leave() {
			this._isWithActiveTrigger() || (this._isHovered = !1, this._setTimeout((() => {
				this._isHovered || this.hide()
			}), this._config.delay.hide))
		}
		_setTimeout(t, e) {
			clearTimeout(this._timeout), this._timeout = setTimeout(t, e)
		}
		_isWithActiveTrigger() {
			return Object.values(this._activeTrigger).includes(!0)
		}
		_getConfig(t) {
			const e = B.getDataAttributes(this._element);
			for (const t of Object.keys(e)) Ae.has(t) && delete e[t];
			return t = { ...e,
				..."object" == typeof t && t ? t : {}
			}, t = this._mergeConfigObj(t), t = this._configAfterMerge(t), this._typeCheckConfig(t), t
		}
		_configAfterMerge(t) {
			return t.container = !1 === t.container ? document.body : a(t.container), "number" == typeof t.delay && (t.delay = {
				show: t.delay,
				hide: t.delay
			}), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), t
		}
		_getDelegateConfig() {
			const t = {};
			for (const [e, s] of Object.entries(this._config)) this.constructor.Default[e] !== s && (t[e] = s);
			return t.selector = !1, t.trigger = "manual", t
		}
		_disposePopper() {
			this._popper && (this._popper.destroy(), this._popper = null), this.tip && (this.tip.remove(), this.tip = null)
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = Ne.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	m(Ne);
	const Pe = { ...Ne.Default,
			content: "",
			offset: [0, 8],
			placement: "right",
			template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
			trigger: "click"
		},
		xe = { ...Ne.DefaultType,
			content: "(null|string|element|function)"
		};
	class Me extends Ne {
		static get Default() {
			return Pe
		}
		static get DefaultType() {
			return xe
		}
		static get NAME() {
			return "popover"
		}
		_isWithContent() {
			return this._getTitle() || this._getContent()
		}
		_getContentForTemplate() {
			return {
				".popover-header": this._getTitle(),
				".popover-body": this._getContent()
			}
		}
		_getContent() {
			return this._resolvePossibleFunction(this._config.content)
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = Me.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	m(Me);
	const je = "click.bs.scrollspy",
		Fe = "active",
		$e = "[href]",
		ze = {
			offset: null,
			rootMargin: "0px 0px -25%",
			smoothScroll: !1,
			target: null,
			threshold: [.1, .5, 1]
		},
		He = {
			offset: "(number|null)",
			rootMargin: "string",
			smoothScroll: "boolean",
			target: "element",
			threshold: "array"
		};
	class Be extends W {
		constructor(t, e) {
			super(t, e), this._targetLinks = new Map, this._observableSections = new Map, this._rootElement = "visible" === getComputedStyle(this._element).overflowY ? null : this._element, this._activeTarget = null, this._observer = null, this._previousScrollData = {
				visibleEntryTop: 0,
				parentScrollTop: 0
			}, this.refresh()
		}
		static get Default() {
			return ze
		}
		static get DefaultType() {
			return He
		}
		static get NAME() {
			return "scrollspy"
		}
		refresh() {
			this._initializeTargetsAndObservables(), this._maybeEnableSmoothScroll(), this._observer ? this._observer.disconnect() : this._observer = this._getNewObserver();
			for (const t of this._observableSections.values()) this._observer.observe(t)
		}
		dispose() {
			this._observer.disconnect(), super.dispose()
		}
		_configAfterMerge(t) {
			return t.target = a(t.target) || document.body, t.rootMargin = t.offset ? `${t.offset}px 0px -30%` : t.rootMargin, "string" == typeof t.threshold && (t.threshold = t.threshold.split(",").map((t => Number.parseFloat(t)))), t
		}
		_maybeEnableSmoothScroll() {
			this._config.smoothScroll && (M.off(this._config.target, je), M.on(this._config.target, je, $e, (t => {
				const e = this._observableSections.get(t.target.hash);
				if (e) {
					t.preventDefault();
					const s = this._rootElement || window,
						i = e.offsetTop - this._element.offsetTop;
					if (s.scrollTo) return void s.scrollTo({
						top: i,
						behavior: "smooth"
					});
					s.scrollTop = i
				}
			})))
		}
		_getNewObserver() {
			const t = {
				root: this._rootElement,
				threshold: this._config.threshold,
				rootMargin: this._config.rootMargin
			};
			return new IntersectionObserver((t => this._observerCallback(t)), t)
		}
		_observerCallback(t) {
			const e = t => this._targetLinks.get(`#${t.target.id}`),
				s = t => {
					this._previousScrollData.visibleEntryTop = t.target.offsetTop, this._process(e(t))
				},
				i = (this._rootElement || document.documentElement).scrollTop,
				n = i >= this._previousScrollData.parentScrollTop;
			this._previousScrollData.parentScrollTop = i;
			for (const o of t) {
				if (!o.isIntersecting) {
					this._activeTarget = null, this._clearActiveClass(e(o));
					continue
				}
				const t = o.target.offsetTop >= this._previousScrollData.visibleEntryTop;
				if (n && t) {
					if (s(o), !i) return
				} else n || t || s(o)
			}
		}
		_initializeTargetsAndObservables() {
			this._targetLinks = new Map, this._observableSections = new Map;
			const t = V.find($e, this._config.target);
			for (const e of t) {
				if (!e.hash || c(e)) continue;
				const t = V.findOne(e.hash, this._element);
				l(t) && (this._targetLinks.set(e.hash, e), this._observableSections.set(e.hash, t))
			}
		}
		_process(t) {
			this._activeTarget !== t && (this._clearActiveClass(this._config.target), this._activeTarget = t, t.classList.add(Fe), this._activateParents(t), M.trigger(this._element, "activate.bs.scrollspy", {
				relatedTarget: t
			}))
		}
		_activateParents(t) {
			if (t.classList.contains("dropdown-item")) V.findOne(".dropdown-toggle", t.closest(".dropdown")).classList.add(Fe);
			else
				for (const e of V.parents(t, ".nav, .list-group"))
					for (const t of V.prev(e, ".nav-link, .nav-item > .nav-link, .list-group-item")) t.classList.add(Fe)
		}
		_clearActiveClass(t) {
			t.classList.remove(Fe);
			const e = V.find("[href].active", t);
			for (const t of e) t.classList.remove(Fe)
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = Be.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	M.on(window, "load.bs.scrollspy.data-api", (() => {
		for (const t of V.find('[data-bs-spy="scroll"]')) Be.getOrCreateInstance(t)
	})), m(Be);
	const qe = "ArrowLeft",
		We = "ArrowRight",
		Re = "ArrowUp",
		Ve = "ArrowDown",
		Ke = "active",
		Qe = "fade",
		Xe = "show",
		Ye = '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]',
		Ue = `.nav-link:not(.dropdown-toggle), .list-group-item:not(.dropdown-toggle), [role="tab"]:not(.dropdown-toggle), ${Ye}`;
	class Ge extends W {
		constructor(t) {
			super(t), this._parent = this._element.closest('.list-group, .nav, [role="tablist"]'), this._parent && (this._setInitialAttributes(this._parent, this._getChildren()), M.on(this._element, "keydown.bs.tab", (t => this._keydown(t))))
		}
		static get NAME() {
			return "tab"
		}
		show() {
			const t = this._element;
			if (this._elemIsActive(t)) return;
			const e = this._getActiveElem(),
				s = e ? M.trigger(e, "hide.bs.tab", {
					relatedTarget: t
				}) : null;
			M.trigger(t, "show.bs.tab", {
				relatedTarget: e
			}).defaultPrevented || s && s.defaultPrevented || (this._deactivate(e, t), this._activate(t, e))
		}
		_activate(t, e) {
			t && (t.classList.add(Ke), this._activate(V.getElementFromSelector(t)), this._queueCallback((() => {
				"tab" === t.getAttribute("role") ? (t.removeAttribute("tabindex"), t.setAttribute("aria-selected", !0), this._toggleDropDown(t, !0), M.trigger(t, "shown.bs.tab", {
					relatedTarget: e
				})) : t.classList.add(Xe)
			}), t, t.classList.contains(Qe)))
		}
		_deactivate(t, e) {
			t && (t.classList.remove(Ke), t.blur(), this._deactivate(V.getElementFromSelector(t)), this._queueCallback((() => {
				"tab" === t.getAttribute("role") ? (t.setAttribute("aria-selected", !1), t.setAttribute("tabindex", "-1"), this._toggleDropDown(t, !1), M.trigger(t, "hidden.bs.tab", {
					relatedTarget: e
				})) : t.classList.remove(Xe)
			}), t, t.classList.contains(Qe)))
		}
		_keydown(t) {
			if (![qe, We, Re, Ve].includes(t.key)) return;
			t.stopPropagation(), t.preventDefault();
			const e = [We, Ve].includes(t.key),
				s = v(this._getChildren().filter((t => !c(t))), t.target, e, !0);
			s && (s.focus({
				preventScroll: !0
			}), Ge.getOrCreateInstance(s).show())
		}
		_getChildren() {
			return V.find(Ue, this._parent)
		}
		_getActiveElem() {
			return this._getChildren().find((t => this._elemIsActive(t))) || null
		}
		_setInitialAttributes(t, e) {
			this._setAttributeIfNotExists(t, "role", "tablist");
			for (const t of e) this._setInitialAttributesOnChild(t)
		}
		_setInitialAttributesOnChild(t) {
			t = this._getInnerElement(t);
			const e = this._elemIsActive(t),
				s = this._getOuterElement(t);
			t.setAttribute("aria-selected", e), s !== t && this._setAttributeIfNotExists(s, "role", "presentation"), e || t.setAttribute("tabindex", "-1"), this._setAttributeIfNotExists(t, "role", "tab"), this._setInitialAttributesOnTargetPanel(t)
		}
		_setInitialAttributesOnTargetPanel(t) {
			const e = V.getElementFromSelector(t);
			e && (this._setAttributeIfNotExists(e, "role", "tabpanel"), t.id && this._setAttributeIfNotExists(e, "aria-labelledby", `#${t.id}`))
		}
		_toggleDropDown(t, e) {
			const s = this._getOuterElement(t);
			if (!s.classList.contains("dropdown")) return;
			const i = (t, i) => {
				const n = V.findOne(t, s);
				n && n.classList.toggle(i, e)
			};
			i(".dropdown-toggle", Ke), i(".dropdown-menu", Xe), s.setAttribute("aria-expanded", e)
		}
		_setAttributeIfNotExists(t, e, s) {
			t.hasAttribute(e) || t.setAttribute(e, s)
		}
		_elemIsActive(t) {
			return t.classList.contains(Ke)
		}
		_getInnerElement(t) {
			return t.matches(Ue) ? t : V.findOne(Ue, t)
		}
		_getOuterElement(t) {
			return t.closest(".nav-item, .list-group-item") || t
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = Ge.getOrCreateInstance(this);
				if ("string" == typeof t) {
					if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	M.on(document, "click.bs.tab", Ye, (function(t) {
		["A", "AREA"].includes(this.tagName) && t.preventDefault(), c(this) || Ge.getOrCreateInstance(this).show()
	})), M.on(window, "load.bs.tab", (() => {
		for (const t of V.find('.active[data-bs-toggle="tab"], .active[data-bs-toggle="pill"], .active[data-bs-toggle="list"]')) Ge.getOrCreateInstance(t)
	})), m(Ge);
	const Je = "hide",
		Ze = "show",
		ts = "showing",
		es = {
			animation: "boolean",
			autohide: "boolean",
			delay: "number"
		},
		ss = {
			animation: !0,
			autohide: !0,
			delay: 5e3
		};
	class is extends W {
		constructor(t, e) {
			super(t, e), this._timeout = null, this._hasMouseInteraction = !1, this._hasKeyboardInteraction = !1, this._setListeners()
		}
		static get Default() {
			return ss
		}
		static get DefaultType() {
			return es
		}
		static get NAME() {
			return "toast"
		}
		show() {
			M.trigger(this._element, "show.bs.toast").defaultPrevented || (this._clearTimeout(), this._config.animation && this._element.classList.add("fade"), this._element.classList.remove(Je), u(this._element), this._element.classList.add(Ze, ts), this._queueCallback((() => {
				this._element.classList.remove(ts), M.trigger(this._element, "shown.bs.toast"), this._maybeScheduleHide()
			}), this._element, this._config.animation))
		}
		hide() {
			this.isShown() && (M.trigger(this._element, "hide.bs.toast").defaultPrevented || (this._element.classList.add(ts), this._queueCallback((() => {
				this._element.classList.add(Je), this._element.classList.remove(ts, Ze), M.trigger(this._element, "hidden.bs.toast")
			}), this._element, this._config.animation)))
		}
		dispose() {
			this._clearTimeout(), this.isShown() && this._element.classList.remove(Ze), super.dispose()
		}
		isShown() {
			return this._element.classList.contains(Ze)
		}
		_maybeScheduleHide() {
			this._config.autohide && (this._hasMouseInteraction || this._hasKeyboardInteraction || (this._timeout = setTimeout((() => {
				this.hide()
			}), this._config.delay)))
		}
		_onInteraction(t, e) {
			switch (t.type) {
				case "mouseover":
				case "mouseout":
					this._hasMouseInteraction = e;
					break;
				case "focusin":
				case "focusout":
					this._hasKeyboardInteraction = e
			}
			if (e) return void this._clearTimeout();
			const s = t.relatedTarget;
			this._element === s || this._element.contains(s) || this._maybeScheduleHide()
		}
		_setListeners() {
			M.on(this._element, "mouseover.bs.toast", (t => this._onInteraction(t, !0))), M.on(this._element, "mouseout.bs.toast", (t => this._onInteraction(t, !1))), M.on(this._element, "focusin.bs.toast", (t => this._onInteraction(t, !0))), M.on(this._element, "focusout.bs.toast", (t => this._onInteraction(t, !1)))
		}
		_clearTimeout() {
			clearTimeout(this._timeout), this._timeout = null
		}
		static jQueryInterface(t) {
			return this.each((function() {
				const e = is.getOrCreateInstance(this, t);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	return K(is), m(is), {
		Alert: Q,
		Button: Y,
		Carousel: ct,
		Collapse: mt,
		Dropdown: xt,
		Modal: ie,
		Offcanvas: ue,
		Popover: Me,
		ScrollSpy: Be,
		Tab: Ge,
		Toast: is,
		Tooltip: Ne
	}
}));
//# sourceMappingURL=bootstrap.min.js.map