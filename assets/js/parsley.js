! function(t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e(require("jquery")) : "function" == typeof define && define.amd ? define(["jquery"], e) : t.parsley = e(t.jQuery)
}(this, function(t) {
    "use strict";

    function e(t) {
        return (e = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                return typeof t
            } :
            function(t) {
                return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
            }
        )(t)
    }

    function i() {
        return (i = Object.assign || function(t) {
            for (var e = 1; e < arguments.length; e++) {
                var i = arguments[e];
                for (var n in i)
                    Object.prototype.hasOwnProperty.call(i, n) && (t[n] = i[n])
            }
            return t
        }).apply(this, arguments)
    }

    function n(t, e) {
        return function(t) {
            if (Array.isArray(t))
                return t
        }(t) || function(t, e) {
            var i = [],
                n = !0,
                r = !1,
                s = void 0;
            try {
                for (var a, o = t[Symbol.iterator](); !(n = (a = o.next()).done) && (i.push(a.value), !e || i.length !== e); n = !0)
                ;
            } catch (t) {
                r = !0,
                    s = t
            } finally {
                try {
                    n || null == o.return || o.return()
                } finally {
                    if (r)
                        throw s
                }
            }
            return i
        }(t, e) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }

    function r(t) {
        return function(t) {
            if (Array.isArray(t)) {
                for (var e = 0, i = new Array(t.length); e < t.length; e++)
                    i[e] = t[e];
                return i
            }
        }(t) || function(t) {
            if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t))
                return Array.from(t)
        }(t) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }
    var s = 1,
        a = {},
        o = {
            attr: function(t, e, i) {
                var n, r, s, a = new RegExp("^" + e, "i");
                if (void 0 === i)
                    i = {};
                else
                    for (n in i)
                        i.hasOwnProperty(n) && delete i[n];
                if (!t)
                    return i;
                for (n = (s = t.attributes).length; n--;)
                    (r = s[n]) && r.specified && a.test(r.name) && (i[this.camelize(r.name.slice(e.length))] = this.deserializeValue(r.value));
                return i
            },
            checkAttr: function(t, e, i) {
                return t.hasAttribute(e + i)
            },
            setAttr: function(t, e, i, n) {
                t.setAttribute(this.dasherize(e + i), String(n))
            },
            getType: function(t) {
                return t.getAttribute("type") || "text"
            },
            generateID: function() {
                return "" + s++
            },
            deserializeValue: function(t) {
                var e;
                try {
                    return t ? "true" == t || "false" != t && ("null" == t ? null : isNaN(e = Number(t)) ? /^[\[\{]/.test(t) ? JSON.parse(t) : t : e) : t
                } catch (e) {
                    return t
                }
            },
            camelize: function(t) {
                return t.replace(/-+(.)?/g, function(t, e) {
                    return e ? e.toUpperCase() : ""
                })
            },
            dasherize: function(t) {
                return t.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
            },
            warn: function() {
                var t;
                window.console && "function" == typeof window.console.warn && (t = window.console).warn.apply(t, arguments)
            },
            warnOnce: function(t) {
                a[t] || (a[t] = !0,
                    this.warn.apply(this, arguments))
            },
            _resetWarnings: function() {
                a = {}
            },
            trimString: function(t) {
                return t.replace(/^\s+|\s+$/g, "")
            },
            parse: {
                date: function(t) {
                    var e = t.match(/^(\d{4,})-(\d\d)-(\d\d)$/);
                    if (!e)
                        return null;
                    var i = n(e.map(function(t) {
                            return parseInt(t, 10)
                        }), 4),
                        r = (i[0],
                            i[1]),
                        s = i[2],
                        a = i[3],
                        o = new Date(r, s - 1, a);
                    return o.getFullYear() !== r || o.getMonth() + 1 !== s || o.getDate() !== a ? null : o
                },
                string: function(t) {
                    return t
                },
                integer: function(t) {
                    return isNaN(t) ? null : parseInt(t, 10)
                },
                number: function(t) {
                    if (isNaN(t))
                        throw null;
                    return parseFloat(t)
                },
                boolean: function(t) {
                    return !/^\s*false\s*$/i.test(t)
                },
                object: function(t) {
                    return o.deserializeValue(t)
                },
                regexp: function(t) {
                    var e = "";
                    return /^\/.*\/(?:[gimy]*)$/.test(t) ? (e = t.replace(/.*\/([gimy]*)$/, "$1"),
                            t = t.replace(new RegExp("^/(.*?)/" + e + "$"), "$1")) : t = "^" + t + "$",
                        new RegExp(t, e)
                }
            },
            parseRequirement: function(t, e) {
                var i = this.parse[t || "string"];
                if (!i)
                    throw 'Unknown requirement specification: "' + t + '"';
                var n = i(e);
                if (null === n)
                    throw "Requirement is not a ".concat(t, ': "').concat(e, '"');
                return n
            },
            namespaceEvents: function(e, i) {
                return (e = this.trimString(e || "").split(/\s+/))[0] ? t.map(e, function(t) {
                    return "".concat(t, ".").concat(i)
                }).join(" ") : ""
            },
            difference: function(e, i) {
                var n = [];
                return t.each(e, function(t, e) {
                        -1 == i.indexOf(e) && n.push(e)
                    }),
                    n
            },
            all: function(e) {
                return t.when.apply(t, r(e).concat([42, 42]))
            },
            objectCreate: Object.create || function() {
                var t = function() {};
                return function(i) {
                    if (arguments.length > 1)
                        throw Error("Second argument not supported");
                    if ("object" != e(i))
                        throw TypeError("Argument must be an object");
                    t.prototype = i;
                    var n = new t;
                    return t.prototype = null,
                        n
                }
            }(),
            _SubmitSelector: 'input[type="submit"], button:submit'
        },
        l = {
            namespace: "data-parsley-",
            inputs: "input, textarea, select",
            excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden]",
            priorityEnabled: !0,
            multiple: null,
            group: null,
            uiEnabled: !0,
            validationThreshold: 3,
            focus: "first",
            trigger: !1,
            triggerAfterFailure: "input",
            errorClass: "parsley-error",
            successClass: "parsley-success",
            classHandler: function(t) {},
            errorsContainer: function(t) {},
            errorsWrapper: '<ul class="parsley-errors-list"></ul>',
            errorTemplate: "<li></li>"
        },
        u = function() {
            this.__id__ = o.generateID()
        };
    u.prototype = {
        asyncSupport: !0,
        _pipeAccordingToValidationResult: function() {
            var e = this,
                i = function() {
                    var i = t.Deferred();
                    return !0 !== e.validationResult && i.reject(),
                        i.resolve().promise()
                };
            return [i, i]
        },
        actualizeOptions: function() {
            return o.attr(this.element, this.options.namespace, this.domOptions),
                this.parent && this.parent.actualizeOptions && this.parent.actualizeOptions(),
                this
        },
        _resetOptions: function(t) {
            for (var e in this.domOptions = o.objectCreate(this.parent.options),
                    this.options = o.objectCreate(this.domOptions),
                    t)
                t.hasOwnProperty(e) && (this.options[e] = t[e]);
            this.actualizeOptions()
        },
        _listeners: null,
        on: function(t, e) {
            return this._listeners = this._listeners || {},
                (this._listeners[t] = this._listeners[t] || []).push(e),
                this
        },
        subscribe: function(e, i) {
            t.listenTo(this, e.toLowerCase(), i)
        },
        off: function(t, e) {
            var i = this._listeners && this._listeners[t];
            if (i)
                if (e)
                    for (var n = i.length; n--;)
                        i[n] === e && i.splice(n, 1);
                else
                    delete this._listeners[t];
            return this
        },
        unsubscribe: function(e, i) {
            t.unsubscribeTo(this, e.toLowerCase())
        },
        trigger: function(t, e, i) {
            e = e || this;
            var n, r = this._listeners && this._listeners[t];
            if (r)
                for (var s = r.length; s--;)
                    if (!1 === (n = r[s].call(e, e, i)))
                        return n;
            return !this.parent || this.parent.trigger(t, e, i)
        },
        asyncIsValid: function(t, e) {
            return o.warnOnce("asyncIsValid is deprecated; please use whenValid instead"),
                this.whenValid({
                    group: t,
                    force: e
                })
        },
        _findRelated: function() {
            return this.options.multiple ? t(this.parent.element.querySelectorAll("[".concat(this.options.namespace, 'multiple="').concat(this.options.multiple, '"]'))) : this.$element
        }
    };
    var d = function(e) {
        t.extend(!0, this, e)
    };
    d.prototype = {
        validate: function(t, e) {
            if (this.fn)
                return arguments.length > 3 && (e = [].slice.call(arguments, 1, -1)),
                    this.fn(t, e);
            if (Array.isArray(t)) {
                if (!this.validateMultiple)
                    throw "Validator `" + this.name + "` does not handle multiple values";
                return this.validateMultiple.apply(this, arguments)
            }
            var i = arguments[arguments.length - 1];
            if (this.validateDate && i._isDateInput())
                return arguments[0] = o.parse.date(arguments[0]),
                    null !== arguments[0] && this.validateDate.apply(this, arguments);
            if (this.validateNumber)
                return !t || !isNaN(t) && (arguments[0] = parseFloat(arguments[0]),
                    this.validateNumber.apply(this, arguments));
            if (this.validateString)
                return this.validateString.apply(this, arguments);
            throw "Validator `" + this.name + "` only handles multiple values"
        },
        parseRequirements: function(e, i) {
            if ("string" != typeof e)
                return Array.isArray(e) ? e : [e];
            var n = this.requirementType;
            if (Array.isArray(n)) {
                for (var r = function(t, e) {
                        var i = t.match(/^\s*\[(.*)\]\s*$/);
                        if (!i)
                            throw 'Requirement is not an array: "' + t + '"';
                        var n = i[1].split(",").map(o.trimString);
                        if (n.length !== e)
                            throw "Requirement has " + n.length + " values when " + e + " are needed";
                        return n
                    }(e, n.length), s = 0; s < r.length; s++)
                    r[s] = o.parseRequirement(n[s], r[s]);
                return r
            }
            return t.isPlainObject(n) ? function(t, e, i) {
                var n = null,
                    r = {};
                for (var s in t)
                    if (s) {
                        var a = i(s);
                        "string" == typeof a && (a = o.parseRequirement(t[s], a)),
                            r[s] = a
                    } else
                        n = o.parseRequirement(t[s], e);
                return [n, r]
            }(n, e, i) : [o.parseRequirement(n, e)]
        },
        requirementType: "string",
        priority: 2
    };
    var h = function(t, e) {
            this.__class__ = "ValidatorRegistry",
                this.locale = "en",
                this.init(t || {}, e || {})
        },
        c = {
            email: /^((([a-zA-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-zA-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/,
            number: /^-?(\d*\.)?\d+(e[-+]?\d+)?$/i,
            integer: /^-?\d+$/,
            digits: /^\d+$/,
            alphanum: /^\w+$/i,
            date: {
                test: function(t) {
                    return null !== o.parse.date(t)
                }
            },
            url: new RegExp("^(?:(?:https?|ftp)://)?(?:\\S+(?::\\S*)?@)?(?:(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))|(?:(?:[a-zA-Z\\u00a1-\\uffff0-9]-*)*[a-zA-Z\\u00a1-\\uffff0-9]+)(?:\\.(?:[a-zA-Z\\u00a1-\\uffff0-9]-*)*[a-zA-Z\\u00a1-\\uffff0-9]+)*(?:\\.(?:[a-zA-Z\\u00a1-\\uffff]{2,})))(?::\\d{2,5})?(?:/\\S*)?$")
        };
    c.range = c.number;
    var p = function(t) {
            var e = ("" + t).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            return e ? Math.max(0, (e[1] ? e[1].length : 0) - (e[2] ? +e[2] : 0)) : 0
        },
        f = function(t, e) {
            return function(i) {
                for (var n = arguments.length, s = new Array(n > 1 ? n - 1 : 0), a = 1; a < n; a++)
                    s[a - 1] = arguments[a];
                return s.pop(),
                    e.apply(void 0, [i].concat(r(function(t, e) {
                        return e.map(o.parse[t])
                    }(t, s))))
            }
        },
        m = function(t) {
            return {
                validateDate: f("date", t),
                validateNumber: f("number", t),
                requirementType: t.length <= 2 ? "string" : ["string", "string"],
                priority: 30
            }
        };
    h.prototype = {
        init: function(t, e) {
            for (var n in this.catalog = e,
                    this.validators = i({}, this.validators),
                    t)
                this.addValidator(n, t[n].fn, t[n].priority);
            window.Parsley.trigger("parsley:validator:init")
        },
        setLocale: function(t) {
            if (void 0 === this.catalog[t])
                throw new Error(t + " is not available in the catalog");
            return this.locale = t,
                this
        },
        addCatalog: function(t, i, n) {
            return "object" === e(i) && (this.catalog[t] = i), !0 === n ? this.setLocale(t) : this
        },
        addMessage: function(t, e, i) {
            return void 0 === this.catalog[t] && (this.catalog[t] = {}),
                this.catalog[t][e] = i,
                this
        },
        addMessages: function(t, e) {
            for (var i in e)
                this.addMessage(t, i, e[i]);
            return this
        },
        addValidator: function(t, e, i) {
            if (this.validators[t])
                o.warn('Validator "' + t + '" is already defined.');
            else if (l.hasOwnProperty(t))
                return void o.warn('"' + t + '" is a restricted keyword and is not a valid validator name.');
            return this._setValidator.apply(this, arguments)
        },
        hasValidator: function(t) {
            return !!this.validators[t]
        },
        updateValidator: function(t, e, i) {
            return this.validators[t] ? this._setValidator.apply(this, arguments) : (o.warn('Validator "' + t + '" is not already defined.'),
                this.addValidator.apply(this, arguments))
        },
        removeValidator: function(t) {
            return this.validators[t] || o.warn('Validator "' + t + '" is not defined.'),
                delete this.validators[t],
                this
        },
        _setValidator: function(t, i, n) {
            for (var r in "object" !== e(i) && (i = {
                        fn: i,
                        priority: n
                    }),
                    i.validate || (i = new d(i)),
                    this.validators[t] = i,
                    i.messages || {})
                this.addMessage(r, t, i.messages[r]);
            return this
        },
        getErrorMessage: function(t) {
            var e;
            "type" === t.name ? e = (this.catalog[this.locale][t.name] || {})[t.requirements] : e = this.formatMessage(this.catalog[this.locale][t.name], t.requirements);
            return e || this.catalog[this.locale].defaultMessage || this.catalog.en.defaultMessage
        },
        formatMessage: function(t, i) {
            if ("object" === e(i)) {
                for (var n in i)
                    t = this.formatMessage(t, i[n]);
                return t
            }
            return "string" == typeof t ? t.replace(/%s/i, i) : ""
        },
        validators: {
            notblank: {
                validateString: function(t) {
                    return /\S/.test(t)
                },
                priority: 2
            },
            required: {
                validateMultiple: function(t) {
                    return t.length > 0
                },
                validateString: function(t) {
                    return /\S/.test(t)
                },
                priority: 512
            },
            type: {
                validateString: function(t, e) {
                    var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                        n = i.step,
                        r = void 0 === n ? "any" : n,
                        s = i.base,
                        a = void 0 === s ? 0 : s,
                        o = c[e];
                    if (!o)
                        throw new Error("validator type `" + e + "` is not supported");
                    if (!t)
                        return !0;
                    if (!o.test(t))
                        return !1;
                    if ("number" === e && !/^any$/i.test(r || "")) {
                        var l = Number(t),
                            u = Math.max(p(r), p(a));
                        if (p(l) > u)
                            return !1;
                        var d = function(t) {
                            return Math.round(t * Math.pow(10, u))
                        };
                        if ((d(l) - d(a)) % d(r) != 0)
                            return !1
                    }
                    return !0
                },
                requirementType: {
                    "": "string",
                    step: "string",
                    base: "number"
                },
                priority: 256
            },
            pattern: {
                validateString: function(t, e) {
                    return !t || e.test(t)
                },
                requirementType: "regexp",
                priority: 64
            },
            minlength: {
                validateString: function(t, e) {
                    return !t || t.length >= e
                },
                requirementType: "integer",
                priority: 30
            },
            maxlength: {
                validateString: function(t, e) {
                    return t.length <= e
                },
                requirementType: "integer",
                priority: 30
            },
            length: {
                validateString: function(t, e, i) {
                    return !t || t.length >= e && t.length <= i
                },
                requirementType: ["integer", "integer"],
                priority: 30
            },
            mincheck: {
                validateMultiple: function(t, e) {
                    return t.length >= e
                },
                requirementType: "integer",
                priority: 30
            },
            maxcheck: {
                validateMultiple: function(t, e) {
                    return t.length <= e
                },
                requirementType: "integer",
                priority: 30
            },
            check: {
                validateMultiple: function(t, e, i) {
                    return t.length >= e && t.length <= i
                },
                requirementType: ["integer", "integer"],
                priority: 30
            },
            min: m(function(t, e) {
                return t >= e
            }),
            max: m(function(t, e) {
                return t <= e
            }),
            range: m(function(t, e, i) {
                return t >= e && t <= i
            }),
            equalto: {
                validateString: function(e, i) {
                    if (!e)
                        return !0;
                    var n = t(i);
                    return n.length ? e === n.val() : e === i
                },
                priority: 256
            },
            euvatin: {
                validateString: function(t, e) {
                    if (!t)
                        return !0;
                    return /^[A-Z][A-Z][A-Za-z0-9 -]{2,}$/.test(t)
                },
                priority: 30
            }
        }
    };
    var g = {};
    g.Form = {
            _actualizeTriggers: function() {
                var t = this;
                this.$element.on("submit.Parsley", function(e) {
                        t.onSubmitValidate(e)
                    }),
                    this.$element.on("click.Parsley", o._SubmitSelector, function(e) {
                        t.onSubmitButton(e)
                    }), !1 !== this.options.uiEnabled && this.element.setAttribute("novalidate", "")
            },
            focus: function() {
                if (this._focusedField = null, !0 === this.validationResult || "none" === this.options.focus)
                    return null;
                for (var t = 0; t < this.fields.length; t++) {
                    var e = this.fields[t];
                    if (!0 !== e.validationResult && e.validationResult.length > 0 && void 0 === e.options.noFocus && (this._focusedField = e.$element,
                            "first" === this.options.focus))
                        break
                }
                return null === this._focusedField ? null : this._focusedField.focus()
            },
            _destroyUI: function() {
                this.$element.off(".Parsley")
            }
        },
        g.Field = {
            _reflowUI: function() {
                if (this._buildUI(),
                    this._ui) {
                    var t = function t(e, i, n) {
                        for (var r = [], s = [], a = 0; a < e.length; a++) {
                            for (var o = !1, l = 0; l < i.length; l++)
                                if (e[a].assert.name === i[l].assert.name) {
                                    o = !0;
                                    break
                                }
                            o ? s.push(e[a]) : r.push(e[a])
                        }
                        return {
                            kept: s,
                            added: r,
                            removed: n ? [] : t(i, e, !0).added
                        }
                    }(this.validationResult, this._ui.lastValidationResult);
                    this._ui.lastValidationResult = this.validationResult,
                        this._manageStatusClass(),
                        this._manageErrorsMessages(t),
                        this._actualizeTriggers(), !t.kept.length && !t.added.length || this._failedOnce || (this._failedOnce = !0,
                            this._actualizeTriggers())
                }
            },
            getErrorsMessages: function() {
                if (!0 === this.validationResult)
                    return [];
                for (var t = [], e = 0; e < this.validationResult.length; e++)
                    t.push(this.validationResult[e].errorMessage || this._getErrorMessage(this.validationResult[e].assert));
                return t
            },
            addError: function(t) {
                var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    i = e.message,
                    n = e.assert,
                    r = e.updateClass,
                    s = void 0 === r || r;
                this._buildUI(),
                    this._addError(t, {
                        message: i,
                        assert: n
                    }),
                    s && this._errorClass()
            },
            updateError: function(t) {
                var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    i = e.message,
                    n = e.assert,
                    r = e.updateClass,
                    s = void 0 === r || r;
                this._buildUI(),
                    this._updateError(t, {
                        message: i,
                        assert: n
                    }),
                    s && this._errorClass()
            },
            removeError: function(t) {
                var e = (arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}).updateClass,
                    i = void 0 === e || e;
                this._buildUI(),
                    this._removeError(t),
                    i && this._manageStatusClass()
            },
            _manageStatusClass: function() {
                this.hasConstraints() && this.needsValidation() && !0 === this.validationResult ? this._successClass() : this.validationResult.length > 0 ? this._errorClass() : this._resetClass()
            },
            _manageErrorsMessages: function(e) {
                if (void 0 === this.options.errorsMessagesDisabled) {
                    if (void 0 !== this.options.errorMessage)
                        return e.added.length || e.kept.length ? (this._insertErrorWrapper(),
                            0 === this._ui.$errorsWrapper.find(".parsley-custom-error-message").length && this._ui.$errorsWrapper.append(t(this.options.errorTemplate).addClass("parsley-custom-error-message")),
                            this._ui.$errorsWrapper.addClass("filled").find(".parsley-custom-error-message").html(this.options.errorMessage)) : this._ui.$errorsWrapper.removeClass("filled").find(".parsley-custom-error-message").remove();
                    for (var i = 0; i < e.removed.length; i++)
                        this._removeError(e.removed[i].assert.name);
                    for (i = 0; i < e.added.length; i++)
                        this._addError(e.added[i].assert.name, {
                            message: e.added[i].errorMessage,
                            assert: e.added[i].assert
                        });
                    for (i = 0; i < e.kept.length; i++)
                        this._updateError(e.kept[i].assert.name, {
                            message: e.kept[i].errorMessage,
                            assert: e.kept[i].assert
                        })
                }
            },
            _addError: function(e, i) {
                var n = i.message,
                    r = i.assert;
                this._insertErrorWrapper(),
                    this._ui.$errorClassHandler.attr("aria-describedby", this._ui.errorsWrapperId),
                    this._ui.$errorsWrapper.addClass("filled").append(t(this.options.errorTemplate).addClass("parsley-" + e).html(n || this._getErrorMessage(r)))
            },
            _updateError: function(t, e) {
                var i = e.message,
                    n = e.assert;
                this._ui.$errorsWrapper.addClass("filled").find(".parsley-" + t).html(i || this._getErrorMessage(n))
            },
            _removeError: function(t) {
                this._ui.$errorClassHandler.removeAttr("aria-describedby"),
                    this._ui.$errorsWrapper.removeClass("filled").find(".parsley-" + t).remove()
            },
            _getErrorMessage: function(t) {
                var e = t.name + "Message";
                return void 0 !== this.options[e] ? window.Parsley.formatMessage(this.options[e], t.requirements) : window.Parsley.getErrorMessage(t)
            },
            _buildUI: function() {
                if (!this._ui && !1 !== this.options.uiEnabled) {
                    var e = {};
                    this.element.setAttribute(this.options.namespace + "id", this.__id__),
                        e.$errorClassHandler = this._manageClassHandler(),
                        e.errorsWrapperId = "parsley-id-" + (this.options.multiple ? "multiple-" + this.options.multiple : this.__id__),
                        e.$errorsWrapper = t(this.options.errorsWrapper).attr("id", e.errorsWrapperId),
                        e.lastValidationResult = [],
                        e.validationInformationVisible = !1,
                        this._ui = e
                }
            },
            _manageClassHandler: function() {
                if ("string" == typeof this.options.classHandler && t(this.options.classHandler).length)
                    return t(this.options.classHandler);
                var i = this.options.classHandler;
                if ("string" == typeof this.options.classHandler && "function" == typeof window[this.options.classHandler] && (i = window[this.options.classHandler]),
                    "function" == typeof i) {
                    var n = i.call(this, this);
                    if (void 0 !== n && n.length)
                        return n
                } else {
                    if ("object" === e(i) && i instanceof jQuery && i.length)
                        return i;
                    i && o.warn("The class handler `" + i + "` does not exist in DOM nor as a global JS function")
                }
                return this._inputHolder()
            },
            _inputHolder: function() {
                return this.options.multiple && "SELECT" !== this.element.nodeName ? this.$element.parent() : this.$element
            },
            _insertErrorWrapper: function() {
                var i = this.options.errorsContainer;
                if (0 !== this._ui.$errorsWrapper.parent().length)
                    return this._ui.$errorsWrapper.parent();
                if ("string" == typeof i) {
                    if (t(i).length)
                        return t(i).append(this._ui.$errorsWrapper);
                    "function" == typeof window[i] ? i = window[i] : o.warn("The errors container `" + i + "` does not exist in DOM nor as a global JS function")
                }
                return "function" == typeof i && (i = i.call(this, this)),
                    "object" === e(i) && i.length ? i.append(this._ui.$errorsWrapper) : this._inputHolder().after(this._ui.$errorsWrapper)
            },
            _actualizeTriggers: function() {
                var t, e = this,
                    i = this._findRelated();
                i.off(".Parsley"),
                    this._failedOnce ? i.on(o.namespaceEvents(this.options.triggerAfterFailure, "Parsley"), function() {
                        e._validateIfNeeded()
                    }) : (t = o.namespaceEvents(this.options.trigger, "Parsley")) && i.on(t, function(t) {
                        e._validateIfNeeded(t)
                    })
            },
            _validateIfNeeded: function(t) {
                var e = this;
                t && /key|input/.test(t.type) && (!this._ui || !this._ui.validationInformationVisible) && this.getValue().length <= this.options.validationThreshold || (this.options.debounce ? (window.clearTimeout(this._debounced),
                    this._debounced = window.setTimeout(function() {
                        return e.validate()
                    }, this.options.debounce)) : this.validate())
            },
            _resetUI: function() {
                this._failedOnce = !1,
                    this._actualizeTriggers(),
                    void 0 !== this._ui && (this._ui.$errorsWrapper.removeClass("filled").children().remove(),
                        this._resetClass(),
                        this._ui.lastValidationResult = [],
                        this._ui.validationInformationVisible = !1)
            },
            _destroyUI: function() {
                this._resetUI(),
                    void 0 !== this._ui && this._ui.$errorsWrapper.remove(),
                    delete this._ui
            },
            _successClass: function() {
                this._ui.validationInformationVisible = !0,
                    this._ui.$errorClassHandler.removeClass(this.options.errorClass).addClass(this.options.successClass)
            },
            _errorClass: function() {
                this._ui.validationInformationVisible = !0,
                    this._ui.$errorClassHandler.removeClass(this.options.successClass).addClass(this.options.errorClass)
            },
            _resetClass: function() {
                this._ui.$errorClassHandler.removeClass(this.options.successClass).removeClass(this.options.errorClass)
            }
        };
    var v = function(e, i, n) {
            this.__class__ = "Form",
                this.element = e,
                this.$element = t(e),
                this.domOptions = i,
                this.options = n,
                this.parent = window.Parsley,
                this.fields = [],
                this.validationResult = null
        },
        y = {
            pending: null,
            resolved: !0,
            rejected: !1
        };
    v.prototype = {
        onSubmitValidate: function(t) {
            var e = this;
            if (!0 !== t.parsley) {
                var i = this._submitSource || this.$element.find(o._SubmitSelector)[0];
                if (this._submitSource = null,
                    this.$element.find(".parsley-synthetic-submit-button").prop("disabled", !0), !i || null === i.getAttribute("formnovalidate")) {
                    window.Parsley._remoteCache = {};
                    var n = this.whenValidate({
                        event: t
                    });
                    "resolved" === n.state() && !1 !== this._trigger("submit") || (t.stopImmediatePropagation(),
                        t.preventDefault(),
                        "pending" === n.state() && n.done(function() {
                            e._submit(i)
                        }))
                }
            }
        },
        onSubmitButton: function(t) {
            this._submitSource = t.currentTarget
        },
        _submit: function(e) {
            if (!1 !== this._trigger("submit")) {
                if (e) {
                    var n = this.$element.find(".parsley-synthetic-submit-button").prop("disabled", !1);
                    0 === n.length && (n = t('<input class="parsley-synthetic-submit-button" type="hidden">').appendTo(this.$element)),
                        n.attr({
                            name: e.getAttribute("name"),
                            value: e.getAttribute("value")
                        })
                }
                this.$element.trigger(i(t.Event("submit"), {
                    parsley: !0
                }))
            }
        },
        validate: function(e) {
            if (arguments.length >= 1 && !t.isPlainObject(e)) {
                o.warnOnce("Calling validate on a parsley form without passing arguments as an object is deprecated.");
                var i = Array.prototype.slice.call(arguments);
                e = {
                    group: i[0],
                    force: i[1],
                    event: i[2]
                }
            }
            return y[this.whenValidate(e).state()]
        },
        whenValidate: function() {
            var e, n = this,
                s = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                a = s.group,
                l = s.force,
                u = s.event;
            this.submitEvent = u,
                u && (this.submitEvent = i({}, u, {
                    preventDefault: function() {
                        o.warnOnce("Using `this.submitEvent.preventDefault()` is deprecated; instead, call `this.validationResult = false`"),
                            n.validationResult = !1
                    }
                })),
                this.validationResult = !0,
                this._trigger("validate"),
                this._refreshFields();
            var d = this._withoutReactualizingFormOptions(function() {
                return t.map(n.fields, function(t) {
                    return t.whenValidate({
                        force: l,
                        group: a
                    })
                })
            });
            return (e = o.all(d).done(function() {
                n._trigger("success")
            }).fail(function() {
                n.validationResult = !1,
                    n.focus(),
                    n._trigger("error")
            }).always(function() {
                n._trigger("validated")
            })).pipe.apply(e, r(this._pipeAccordingToValidationResult()))
        },
        isValid: function(e) {
            if (arguments.length >= 1 && !t.isPlainObject(e)) {
                o.warnOnce("Calling isValid on a parsley form without passing arguments as an object is deprecated.");
                var i = Array.prototype.slice.call(arguments);
                e = {
                    group: i[0],
                    force: i[1]
                }
            }
            return y[this.whenValid(e).state()]
        },
        whenValid: function() {
            var e = this,
                i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                n = i.group,
                r = i.force;
            this._refreshFields();
            var s = this._withoutReactualizingFormOptions(function() {
                return t.map(e.fields, function(t) {
                    return t.whenValid({
                        group: n,
                        force: r
                    })
                })
            });
            return o.all(s)
        },
        refresh: function() {
            return this._refreshFields(),
                this
        },
        reset: function() {
            for (var t = 0; t < this.fields.length; t++)
                this.fields[t].reset();
            this._trigger("reset")
        },
        destroy: function() {
            this._destroyUI();
            for (var t = 0; t < this.fields.length; t++)
                this.fields[t].destroy();
            this.$element.removeData("Parsley"),
                this._trigger("destroy")
        },
        _refreshFields: function() {
            return this.actualizeOptions()._bindFields()
        },
        _bindFields: function() {
            var e = this,
                i = this.fields;
            return this.fields = [],
                this.fieldsMappedById = {},
                this._withoutReactualizingFormOptions(function() {
                    e.$element.find(e.options.inputs).not(e.options.excluded).not("[".concat(e.options.namespace, "excluded=true]")).each(function(t, i) {
                            var n = new window.Parsley.Factory(i, {}, e);
                            if ("Field" === n.__class__ || "FieldMultiple" === n.__class__) {
                                var r = n.__class__ + "-" + n.__id__;
                                void 0 === e.fieldsMappedById[r] && (e.fieldsMappedById[r] = n,
                                    e.fields.push(n))
                            }
                        }),
                        t.each(o.difference(i, e.fields), function(t, e) {
                            e.reset()
                        })
                }),
                this
        },
        _withoutReactualizingFormOptions: function(t) {
            var e = this.actualizeOptions;
            this.actualizeOptions = function() {
                return this
            };
            var i = t();
            return this.actualizeOptions = e,
                i
        },
        _trigger: function(t) {
            return this.trigger("form:" + t)
        }
    };
    var _ = function(t, e, n, r, s) {
        var a = window.Parsley._validatorRegistry.validators[e],
            o = new d(a);
        i(this, {
                validator: o,
                name: e,
                requirements: n,
                priority: r = r || t.options[e + "Priority"] || o.priority,
                isDomConstraint: s = !0 === s
            }),
            this._parseRequirements(t.options)
    };
    _.prototype = {
        validate: function(t, e) {
            var i;
            return (i = this.validator).validate.apply(i, [t].concat(r(this.requirementList), [e]))
        },
        _parseRequirements: function(t) {
            var e = this;
            this.requirementList = this.validator.parseRequirements(this.requirements, function(i) {
                return t[e.name + (n = i,
                    n[0].toUpperCase() + n.slice(1))];
                var n
            })
        }
    };
    var w = function(e, i, n, r) {
            this.__class__ = "Field",
                this.element = e,
                this.$element = t(e),
                void 0 !== r && (this.parent = r),
                this.options = n,
                this.domOptions = i,
                this.constraints = [],
                this.constraintsByName = {},
                this.validationResult = !0,
                this._bindConstraints()
        },
        b = {
            pending: null,
            resolved: !0,
            rejected: !1
        };
    w.prototype = {
        validate: function(e) {
            arguments.length >= 1 && !t.isPlainObject(e) && (o.warnOnce("Calling validate on a parsley field without passing arguments as an object is deprecated."),
                e = {
                    options: e
                });
            var i = this.whenValidate(e);
            if (!i)
                return !0;
            switch (i.state()) {
                case "pending":
                    return null;
                case "resolved":
                    return !0;
                case "rejected":
                    return this.validationResult
            }
        },
        whenValidate: function() {
            var t, e = this,
                i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                n = i.force,
                s = i.group;
            if (this.refresh(), !s || this._isInGroup(s))
                return this.value = this.getValue(),
                    this._trigger("validate"),
                    (t = this.whenValid({
                        force: n,
                        value: this.value,
                        _refreshed: !0
                    }).always(function() {
                        e._reflowUI()
                    }).done(function() {
                        e._trigger("success")
                    }).fail(function() {
                        e._trigger("error")
                    }).always(function() {
                        e._trigger("validated")
                    })).pipe.apply(t, r(this._pipeAccordingToValidationResult()))
        },
        hasConstraints: function() {
            return 0 !== this.constraints.length
        },
        needsValidation: function(t) {
            return void 0 === t && (t = this.getValue()), !(!t.length && !this._isRequired() && void 0 === this.options.validateIfEmpty)
        },
        _isInGroup: function(e) {
            return Array.isArray(this.options.group) ? -1 !== t.inArray(e, this.options.group) : this.options.group === e
        },
        isValid: function(e) {
            if (arguments.length >= 1 && !t.isPlainObject(e)) {
                o.warnOnce("Calling isValid on a parsley field without passing arguments as an object is deprecated.");
                var i = Array.prototype.slice.call(arguments);
                e = {
                    force: i[0],
                    value: i[1]
                }
            }
            var n = this.whenValid(e);
            return !n || b[n.state()]
        },
        whenValid: function() {
            var e = this,
                i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                n = i.force,
                r = void 0 !== n && n,
                s = i.value,
                a = i.group;
            if (i._refreshed || this.refresh(), !a || this._isInGroup(a)) {
                if (this.validationResult = !0, !this.hasConstraints())
                    return t.when();
                if (null == s && (s = this.getValue()), !this.needsValidation(s) && !0 !== r)
                    return t.when();
                var l = this._getGroupedConstraints(),
                    u = [];
                return t.each(l, function(i, n) {
                        var r = o.all(t.map(n, function(t) {
                            return e._validateConstraint(s, t)
                        }));
                        if (u.push(r),
                            "rejected" === r.state())
                            return !1
                    }),
                    o.all(u)
            }
        },
        _validateConstraint: function(e, i) {
            var n = this,
                r = i.validate(e, this);
            return !1 === r && (r = t.Deferred().reject()),
                o.all([r]).fail(function(t) {
                    n.validationResult instanceof Array || (n.validationResult = []),
                        n.validationResult.push({
                            assert: i,
                            errorMessage: "string" == typeof t && t
                        })
                })
        },
        getValue: function() {
            var t;
            return null == (t = "function" == typeof this.options.value ? this.options.value(this) : void 0 !== this.options.value ? this.options.value : this.$element.val()) ? "" : this._handleWhitespace(t)
        },
        reset: function() {
            return this._resetUI(),
                this._trigger("reset")
        },
        destroy: function() {
            this._destroyUI(),
                this.$element.removeData("Parsley"),
                this.$element.removeData("FieldMultiple"),
                this._trigger("destroy")
        },
        refresh: function() {
            return this._refreshConstraints(),
                this
        },
        _refreshConstraints: function() {
            return this.actualizeOptions()._bindConstraints()
        },
        refreshConstraints: function() {
            return o.warnOnce("Parsley's refreshConstraints is deprecated. Please use refresh"),
                this.refresh()
        },
        addConstraint: function(t, e, i, n) {
            if (window.Parsley._validatorRegistry.validators[t]) {
                var r = new _(this, t, e, i, n);
                "undefined" !== this.constraintsByName[r.name] && this.removeConstraint(r.name),
                    this.constraints.push(r),
                    this.constraintsByName[r.name] = r
            }
            return this
        },
        removeConstraint: function(t) {
            for (var e = 0; e < this.constraints.length; e++)
                if (t === this.constraints[e].name) {
                    this.constraints.splice(e, 1);
                    break
                }
            return delete this.constraintsByName[t],
                this
        },
        updateConstraint: function(t, e, i) {
            return this.removeConstraint(t).addConstraint(t, e, i)
        },
        _bindConstraints: function() {
            for (var t = [], e = {}, i = 0; i < this.constraints.length; i++)
                !1 === this.constraints[i].isDomConstraint && (t.push(this.constraints[i]),
                    e[this.constraints[i].name] = this.constraints[i]);
            for (var n in this.constraints = t,
                    this.constraintsByName = e,
                    this.options)
                this.addConstraint(n, this.options[n], void 0, !0);
            return this._bindHtml5Constraints()
        },
        _bindHtml5Constraints: function() {
            null !== this.element.getAttribute("required") && this.addConstraint("required", !0, void 0, !0),
                null !== this.element.getAttribute("pattern") && this.addConstraint("pattern", this.element.getAttribute("pattern"), void 0, !0);
            var t = this.element.getAttribute("min"),
                e = this.element.getAttribute("max");
            null !== t && null !== e ? this.addConstraint("range", [t, e], void 0, !0) : null !== t ? this.addConstraint("min", t, void 0, !0) : null !== e && this.addConstraint("max", e, void 0, !0),
                null !== this.element.getAttribute("minlength") && null !== this.element.getAttribute("maxlength") ? this.addConstraint("length", [this.element.getAttribute("minlength"), this.element.getAttribute("maxlength")], void 0, !0) : null !== this.element.getAttribute("minlength") ? this.addConstraint("minlength", this.element.getAttribute("minlength"), void 0, !0) : null !== this.element.getAttribute("maxlength") && this.addConstraint("maxlength", this.element.getAttribute("maxlength"), void 0, !0);
            var i = o.getType(this.element);
            return "number" === i ? this.addConstraint("type", ["number", {
                step: this.element.getAttribute("step") || "1",
                base: t || this.element.getAttribute("value")
            }], void 0, !0) : /^(email|url|range|date)$/i.test(i) ? this.addConstraint("type", i, void 0, !0) : this
        },
        _isRequired: function() {
            return void 0 !== this.constraintsByName.required && !1 !== this.constraintsByName.required.requirements
        },
        _trigger: function(t) {
            return this.trigger("field:" + t)
        },
        _handleWhitespace: function(t) {
            return !0 === this.options.trimValue && o.warnOnce('data-parsley-trim-value="true" is deprecated, please use data-parsley-whitespace="trim"'),
                "squish" === this.options.whitespace && (t = t.replace(/\s{2,}/g, " ")),
                "trim" !== this.options.whitespace && "squish" !== this.options.whitespace && !0 !== this.options.trimValue || (t = o.trimString(t)),
                t
        },
        _isDateInput: function() {
            var t = this.constraintsByName.type;
            return t && "date" === t.requirements
        },
        _getGroupedConstraints: function() {
            if (!1 === this.options.priorityEnabled)
                return [this.constraints];
            for (var t = [], e = {}, i = 0; i < this.constraints.length; i++) {
                var n = this.constraints[i].priority;
                e[n] || t.push(e[n] = []),
                    e[n].push(this.constraints[i])
            }
            return t.sort(function(t, e) {
                    return e[0].priority - t[0].priority
                }),
                t
        }
    };
    var F = function() {
        this.__class__ = "FieldMultiple"
    };
    F.prototype = {
        addElement: function(t) {
            return this.$elements.push(t),
                this
        },
        _refreshConstraints: function() {
            var e;
            if (this.constraints = [],
                "SELECT" === this.element.nodeName)
                return this.actualizeOptions()._bindConstraints(),
                    this;
            for (var i = 0; i < this.$elements.length; i++)
                if (t("html").has(this.$elements[i]).length) {
                    e = this.$elements[i].data("FieldMultiple")._refreshConstraints().constraints;
                    for (var n = 0; n < e.length; n++)
                        this.addConstraint(e[n].name, e[n].requirements, e[n].priority, e[n].isDomConstraint)
                } else
                    this.$elements.splice(i, 1);
            return this
        },
        getValue: function() {
            if ("function" == typeof this.options.value)
                return this.options.value(this);
            if (void 0 !== this.options.value)
                return this.options.value;
            if ("INPUT" === this.element.nodeName) {
                var e = o.getType(this.element);
                if ("radio" === e)
                    return this._findRelated().filter(":checked").val() || "";
                if ("checkbox" === e) {
                    var i = [];
                    return this._findRelated().filter(":checked").each(function() {
                            i.push(t(this).val())
                        }),
                        i
                }
            }
            return "SELECT" === this.element.nodeName && null === this.$element.val() ? [] : this.$element.val()
        },
        _init: function() {
            return this.$elements = [this.$element],
                this
        }
    };
    var C = function(n, r, s) {
        this.element = n,
            this.$element = t(n);
        var a = this.$element.data("Parsley");
        if (a)
            return void 0 !== s && a.parent === window.Parsley && (a.parent = s,
                    a._resetOptions(a.options)),
                "object" === e(r) && i(a.options, r),
                a;
        if (!this.$element.length)
            throw new Error("You must bind Parsley on an existing element.");
        if (void 0 !== s && "Form" !== s.__class__)
            throw new Error("Parent instance must be a Form instance");
        return this.parent = s || window.Parsley,
            this.init(r)
    };
    C.prototype = {
        init: function(t) {
            return this.__class__ = "Parsley",
                this.__version__ = "2.9.1",
                this.__id__ = o.generateID(),
                this._resetOptions(t),
                "FORM" === this.element.nodeName || o.checkAttr(this.element, this.options.namespace, "validate") && !this.$element.is(this.options.inputs) ? this.bind("parsleyForm") : this.isMultiple() ? this.handleMultiple() : this.bind("parsleyField")
        },
        isMultiple: function() {
            var t = o.getType(this.element);
            return "radio" === t || "checkbox" === t || "SELECT" === this.element.nodeName && null !== this.element.getAttribute("multiple")
        },
        handleMultiple: function() {
            var e, i, n = this;
            if (this.options.multiple = this.options.multiple || (e = this.element.getAttribute("name")) || this.element.getAttribute("id"),
                "SELECT" === this.element.nodeName && null !== this.element.getAttribute("multiple"))
                return this.options.multiple = this.options.multiple || this.__id__,
                    this.bind("parsleyFieldMultiple");
            if (!this.options.multiple)
                return o.warn("To be bound by Parsley, a radio, a checkbox and a multiple select input must have either a name or a multiple option.", this.$element),
                    this;
            this.options.multiple = this.options.multiple.replace(/(:|\.|\[|\]|\{|\}|\$)/g, ""),
                e && t('input[name="' + e + '"]').each(function(t, e) {
                    var i = o.getType(e);
                    "radio" !== i && "checkbox" !== i || e.setAttribute(n.options.namespace + "multiple", n.options.multiple)
                });
            for (var r = this._findRelated(), s = 0; s < r.length; s++)
                if (void 0 !== (i = t(r.get(s)).data("Parsley"))) {
                    this.$element.data("FieldMultiple") || i.addElement(this.$element);
                    break
                }
            return this.bind("parsleyField", !0),
                i || this.bind("parsleyFieldMultiple")
        },
        bind: function(e, i) {
            var n;
            switch (e) {
                case "parsleyForm":
                    n = t.extend(new v(this.element, this.domOptions, this.options), new u, window.ParsleyExtend)._bindFields();
                    break;
                case "parsleyField":
                    n = t.extend(new w(this.element, this.domOptions, this.options, this.parent), new u, window.ParsleyExtend);
                    break;
                case "parsleyFieldMultiple":
                    n = t.extend(new w(this.element, this.domOptions, this.options, this.parent), new F, new u, window.ParsleyExtend)._init();
                    break;
                default:
                    throw new Error(e + "is not a supported Parsley type")
            }
            return this.options.multiple && o.setAttr(this.element, this.options.namespace, "multiple", this.options.multiple),
                void 0 !== i ? (this.$element.data("FieldMultiple", n),
                    n) : (this.$element.data("Parsley", n),
                    n._actualizeTriggers(),
                    n._trigger("init"),
                    n)
        }
    };
    var A = t.fn.jquery.split(".");
    if (parseInt(A[0]) <= 1 && parseInt(A[1]) < 8)
        throw "The loaded version of jQuery is too old. Please upgrade to 1.8.x or better.";
    A.forEach || o.warn("Parsley requires ES5 to run properly. Please include https://github.com/es-shims/es5-shim");
    var E = i(new u, {
        element: document,
        $element: t(document),
        actualizeOptions: null,
        _resetOptions: null,
        Factory: C,
        version: "2.9.1"
    });
    i(w.prototype, g.Field, u.prototype),
        i(v.prototype, g.Form, u.prototype),
        i(C.prototype, u.prototype),
        t.fn.parsley = t.fn.psly = function(e) {
            if (this.length > 1) {
                var i = [];
                return this.each(function() {
                        i.push(t(this).parsley(e))
                    }),
                    i
            }
            if (0 != this.length)
                return new C(this[0], e)
        },
        void 0 === window.ParsleyExtend && (window.ParsleyExtend = {}),
        E.options = i(o.objectCreate(l), window.ParsleyConfig),
        window.ParsleyConfig = E.options,
        window.Parsley = window.psly = E,
        E.Utils = o,
        window.ParsleyUtils = {},
        t.each(o, function(t, e) {
            "function" == typeof e && (window.ParsleyUtils[t] = function() {
                return o.warnOnce("Accessing `window.ParsleyUtils` is deprecated. Use `window.Parsley.Utils` instead."),
                    o[t].apply(o, arguments)
            })
        });
    var x = window.Parsley._validatorRegistry = new h(window.ParsleyConfig.validators, window.ParsleyConfig.i18n);
    window.ParsleyValidator = {},
        t.each("setLocale addCatalog addMessage addMessages getErrorMessage formatMessage addValidator updateValidator removeValidator hasValidator".split(" "), function(t, e) {
            window.Parsley[e] = function() {
                    return x[e].apply(x, arguments)
                },
                window.ParsleyValidator[e] = function() {
                    var t;
                    return o.warnOnce("Accessing the method '".concat(e, "' through Validator is deprecated. Simply call 'window.Parsley.").concat(e, "(...)'")),
                        (t = window.Parsley)[e].apply(t, arguments)
                }
        }),
        window.Parsley.UI = g,
        window.ParsleyUI = {
            removeError: function(t, e, i) {
                var n = !0 !== i;
                return o.warnOnce("Accessing UI is deprecated. Call 'removeError' on the instance directly. Please comment in issue 1073 as to your need to call this method."),
                    t.removeError(e, {
                        updateClass: n
                    })
            },
            getErrorsMessages: function(t) {
                return o.warnOnce("Accessing UI is deprecated. Call 'getErrorsMessages' on the instance directly."),
                    t.getErrorsMessages()
            }
        },
        t.each("addError updateError".split(" "), function(t, e) {
            window.ParsleyUI[e] = function(t, i, n, r, s) {
                var a = !0 !== s;
                return o.warnOnce("Accessing UI is deprecated. Call '".concat(e, "' on the instance directly. Please comment in issue 1073 as to your need to call this method.")),
                    t[e](i, {
                        message: n,
                        assert: r,
                        updateClass: a
                    })
            }
        }), !1 !== window.ParsleyConfig.autoBind && t(function() {
            t("[data-parsley-validate]").length && t("[data-parsley-validate]").parsley()
        });
    var $ = t({}),
        V = function() {
            o.warnOnce("Parsley's pubsub module is deprecated; use the 'on' and 'off' methods on parsley instances or window.Parsley")
        };

    function P(t, e) {
        return t.parsleyAdaptedCallback || (t.parsleyAdaptedCallback = function() {
                var i = Array.prototype.slice.call(arguments, 0);
                i.unshift(this),
                    t.apply(e || $, i)
            }),
            t.parsleyAdaptedCallback
    }
    var O = "parsley:";

    function T(t) {
        return 0 === t.lastIndexOf(O, 0) ? t.substr(O.length) : t
    }
    return t.listen = function(t, i) {
            var n;
            if (V(),
                "object" === e(arguments[1]) && "function" == typeof arguments[2] && (n = arguments[1],
                    i = arguments[2]),
                "function" != typeof i)
                throw new Error("Wrong parameters");
            window.Parsley.on(T(t), P(i, n))
        },
        t.listenTo = function(t, e, i) {
            if (V(), !(t instanceof w || t instanceof v))
                throw new Error("Must give Parsley instance");
            if ("string" != typeof e || "function" != typeof i)
                throw new Error("Wrong parameters");
            t.on(T(e), P(i))
        },
        t.unsubscribe = function(t, e) {
            if (V(),
                "string" != typeof t || "function" != typeof e)
                throw new Error("Wrong arguments");
            window.Parsley.off(T(t), e.parsleyAdaptedCallback)
        },
        t.unsubscribeTo = function(t, e) {
            if (V(), !(t instanceof w || t instanceof v))
                throw new Error("Must give Parsley instance");
            t.off(T(e))
        },
        t.unsubscribeAll = function(e) {
            V(),
                window.Parsley.off(T(e)),
                t("form,input,textarea,select").each(function() {
                    var i = t(this).data("Parsley");
                    i && i.off(T(e))
                })
        },
        t.emit = function(t, e) {
            var i;
            V();
            var n = e instanceof w || e instanceof v,
                s = Array.prototype.slice.call(arguments, n ? 2 : 1);
            s.unshift(T(t)),
                n || (e = window.Parsley),
                (i = e).trigger.apply(i, r(s))
        },
        t.extend(!0, E, {
            asyncValidators: {
                default: {
                    fn: function(t) {
                        return t.status >= 200 && t.status < 300
                    },
                    url: !1
                },
                reverse: {
                    fn: function(t) {
                        return t.status < 200 || t.status >= 300
                    },
                    url: !1
                }
            },
            addAsyncValidator: function(t, e, i, n) {
                return E.asyncValidators[t] = {
                        fn: e,
                        url: i || !1,
                        options: n || {}
                    },
                    this
            }
        }),
        E.addValidator("remote", {
            requirementType: {
                "": "string",
                validator: "string",
                reverse: "boolean",
                options: "object"
            },
            validateString: function(e, i, n, r) {
                var s, a, o = {},
                    l = n.validator || (!0 === n.reverse ? "reverse" : "default");
                if (void 0 === E.asyncValidators[l])
                    throw new Error("Calling an undefined async validator: `" + l + "`");
                (i = E.asyncValidators[l].url || i).indexOf("{value}") > -1 ? i = i.replace("{value}", encodeURIComponent(e)) : o[r.element.getAttribute("name") || r.element.getAttribute("id")] = e;
                var u = t.extend(!0, n.options || {}, E.asyncValidators[l].options);
                s = t.extend(!0, {}, {
                        url: i,
                        data: o,
                        type: "GET"
                    }, u),
                    r.trigger("field:ajaxoptions", r, s),
                    a = t.param(s),
                    void 0 === E._remoteCache && (E._remoteCache = {});
                var d = E._remoteCache[a] = E._remoteCache[a] || t.ajax(s),
                    h = function() {
                        var e = E.asyncValidators[l].fn.call(r, d, i, n);
                        return e || (e = t.Deferred().reject()),
                            t.when(e)
                    };
                return d.then(h, h)
            },
            priority: -1
        }),
        E.on("form:submit", function() {
            E._remoteCache = {}
        }),
        u.prototype.addAsyncValidator = function() {
            return o.warnOnce("Accessing the method `addAsyncValidator` through an instance is deprecated. Simply call `Parsley.addAsyncValidator(...)`"),
                E.addAsyncValidator.apply(E, arguments)
        },
        E.addMessages("en", {
            defaultMessage: "This value seems to be invalid.",
            type: {
                email: "This value should be a valid email.",
                url: "This value should be a valid url.",
                number: "This value should be a valid number.",
                integer: "This value should be a valid integer.",
                digits: "This value should be digits.",
                alphanum: "This value should be alphanumeric."
            },
            notblank: "This value should not be blank.",
            required: "This value is required.",
            pattern: "This value seems to be invalid.",
            min: "This value should be greater than or equal to %s.",
            max: "This value should be lower than or equal to %s.",
            range: "This value should be between %s and %s.",
            minlength: "This value is too short. It should have %s characters or more.",
            maxlength: "This value is too long. It should have %s characters or fewer.",
            length: "This value length is invalid. It should be between %s and %s characters long.",
            mincheck: "You must select at least %s choices.",
            maxcheck: "You must select %s choices or fewer.",
            check: "You must select between %s and %s choices.",
            equalto: "This value should be the same.",
            euvatin: "It's not a valid VAT Identification Number."
        }),
        E.setLocale("en"),
        (new function() {
            var e = this,
                n = window || global;
            i(this, {
                isNativeEvent: function(t) {
                    return t.originalEvent && !1 !== t.originalEvent.isTrusted
                },
                fakeInputEvent: function(i) {
                    e.isNativeEvent(i) && t(i.target).trigger("input")
                },
                misbehaves: function(i) {
                    e.isNativeEvent(i) && (e.behavesOk(i),
                        t(document).on("change.inputevent", i.data.selector, e.fakeInputEvent),
                        e.fakeInputEvent(i))
                },
                behavesOk: function(i) {
                    e.isNativeEvent(i) && t(document).off("input.inputevent", i.data.selector, e.behavesOk).off("change.inputevent", i.data.selector, e.misbehaves)
                },
                install: function() {
                    if (!n.inputEventPatched) {
                        n.inputEventPatched = "0.0.3";
                        for (var i = ["select", 'input[type="checkbox"]', 'input[type="radio"]', 'input[type="file"]'], r = 0; r < i.length; r++) {
                            var s = i[r];
                            t(document).on("input.inputevent", s, {
                                selector: s
                            }, e.behavesOk).on("change.inputevent", s, {
                                selector: s
                            }, e.misbehaves)
                        }
                    }
                },
                uninstall: function() {
                    delete n.inputEventPatched,
                        t(document).off(".inputevent")
                }
            })
        }).install(),
        E
});