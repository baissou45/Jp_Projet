/**
 * Minified by jsDelivr using Terser v5.7.1.
 * Original file: /npm/simple-datatables@3.1.2/dist/umd/simple-datatables.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
!(function (t) {
  if ("object" == typeof exports && "undefined" != typeof module)
    module.exports = t();
  else if ("function" == typeof define && define.amd)
    define([], t);
  else {
    (
      "undefined" != typeof window
      ? window
      : "undefined" != typeof global
        ? global
        : "undefined" != typeof self
          ? self
          : this).simpleDatatables = t();
  }
})(function () {
  return (function t(e, s, i) {
    function a(r, o) {
      if (!s[r]) {
        if (!e[r]) {
          var h = "function" == typeof require && require;
          if (!o && h)
            return h(r, !0);
          if (n)
            return n(r, !0);
          var l = new Error("Cannot find module '" + r + "'");
          throw((l.code = "MODULE_NOT_FOUND"), l);
        }
        var d = (s[r] = {
          exports: {}
        });
        e[r][0].call(d.exports, function (t) {
          return a(e[r][1][t] || t);
        }, d, d.exports, t, e, s, i);
      }
      return s[r].exports;
    }
    for (var n = "function" == typeof require && require, r = 0; r < i.length; r++)
      a(i[r]);
    return a;
  })({
    1: [
      function (t, e, s) {
        (function (t) {
          (function () {
            "use strict";

            function e(t, e) {
              return (t((e = {
                exports: {}
              }), e.exports), e.exports);
            }
            "undefined" != typeof globalThis
              ? globalThis
              : "undefined" != typeof window
                ? window
                : void 0 !== t || ("undefined" != typeof self && self);
            var i = e(function (t, e) {
                t.exports = (function () {
                  var t = 6e4,
                    e = 36e5,
                    s = "millisecond",
                    i = "second",
                    a = "minute",
                    n = "hour",
                    r = "day",
                    o = "week",
                    h = "month",
                    l = "quarter",
                    d = "year",
                    c = "date",
                    u = "Invalid Date",
                    p = /^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,
                    f = /\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a|A|m{1,2}|s{1,2}|Z{1,2}|SSS/g,
                    g = {
                      name: "en",
                      weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
                      months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_")
                    },
                    m = function (t, e, s) {
                      var i = String(t);
                      return !i || i.length >= e
                        ? t
                        : "" + Array(e + 1 - i.length).join(s) + t;
                    },
                    b = {
                      s: m,
                      z: function (t) {
                        var e = -t.utcOffset(),
                          s = Math.abs(e),
                          i = Math.floor(s / 60),
                          a = s % 60;
                        return ((
                          e <= 0
                          ? "+"
                          : "-") + m(i, 2, "0") + ":" + m(a, 2, "0"));
                      },
                      m: function t(e, s) {
                        if (e.date() < s.date())
                          return -t(s, e);
                        var i = 12 * (s.year() - e.year()) + (s.month() - e.month()),
                          a = e.clone().add(i, h),
                          n = s - a < 0,
                          r = e.clone().add(i + (
                            n
                            ? -1
                            : 1), h);
                        return + (-(i + (s - a) / (
                          n
                          ? a - r
                          : r - a)) || 0);
                      },
                      a: function (t) {
                        return t < 0
                          ? Math.ceil(t) || 0
                          : Math.floor(t);
                      },
                      p: function (t) {
                        return ({
                          M: h,
                          y: d,
                          w: o,
                          d: r,
                          D: c,
                          h: n,
                          m: a,
                          s: i,
                          ms: s,
                          Q: l
                        }[t] || String(t || "").toLowerCase().replace(/s$/, ""));
                      },
                      u: function (t) {
                        return void 0 === t;
                      }
                    },
                    y = "en",
                    v = {};
                  v[y] = g;
                  var w = function (t) {
                      return t instanceof $;
                    },
                    C = function (t, e, s) {
                      var i;
                      if (!t)
                        return y;
                      if ("string" == typeof t)
                        v[t] && (i = t),
                        e && ((v[t] = e), (i = t));
                      else {
                        var a = t.name;
                        (v[a] = t),
                        (i = a);
                      }
                      return !s && i && (y = i),
                      i || (!s && y);
                    },
                    x = function (t, e) {
                      if (w(t))
                        return t.clone();
                      var s = "object" == typeof e
                        ? e
                        : {};
                      return (s.date = t),
                      (s.args = arguments),
                      new $(s);
                    },
                    M = b;
                  (M.l = C),
                  (M.i = w),
                  (M.w = function (t, e) {
                    return x(t, {
                      locale: e.$L,
                      utc: e.$u,
                      x: e.$x,
                      $offset: e.$offset
                    });
                  });
                  var $ = (function () {
                      function g(t) {
                        (this.$L = C(t.locale, null, !0)),
                        this.parse(t);
                      }
                      var m = g.prototype;
                      return ((m.parse = function (t) {
                        (this.$d = (function (t) {
                          var e = t.date,
                            s = t.utc;
                          if (null === e)
                            return new Date(NaN);
                          if (M.u(e))
                            return new Date();
                          if (e instanceof Date)
                            return new Date(e);
                          if ("string" == typeof e && !/Z$/i.test(e)) {
                            var i = e.match(p);
                            if (i) {
                              var a = i[2] - 1 || 0,
                                n = (i[7] || "0").substring(0, 3);
                              return s
                                ? new Date(Date.UTC(i[1], a, i[3] || 1, i[4] || 0, i[5] || 0, i[6] || 0, n))
                                : new Date(i[1], a, i[3] || 1, i[4] || 0, i[5] || 0, i[6] || 0, n);
                            }
                          }
                          return new Date(e);
                        })(t)),
                        (this.$x = t.x || {}),
                        this.init();
                      }), (m.init = function () {
                        var t = this.$d;
                        (this.$y = t.getFullYear()),
                        (this.$M = t.getMonth()),
                        (this.$D = t.getDate()),
                        (this.$W = t.getDay()),
                        (this.$H = t.getHours()),
                        (this.$m = t.getMinutes()),
                        (this.$s = t.getSeconds()),
                        (this.$ms = t.getMilliseconds());
                      }), (m.$utils = function () {
                        return M;
                      }), (m.isValid = function () {
                        return !(this.$d.toString() === u);
                      }), (m.isSame = function (t, e) {
                        var s = x(t);
                        return this.startOf(e) <= s && s <= this.endOf(e);
                      }), (m.isAfter = function (t, e) {
                        return x(t) < this.startOf(e);
                      }), (m.isBefore = function (t, e) {
                        return this.endOf(e) < x(t);
                      }), (m.$g = function (t, e, s) {
                        return M.u(t)
                          ? this[e]
                          : this.set(s, t);
                      }), (m.unix = function () {
                        return Math.floor(this.valueOf() / 1e3);
                      }), (m.valueOf = function () {
                        return this.$d.getTime();
                      }), (m.startOf = function (t, e) {
                        var s = this,
                          l = !!M.u(e) || e,
                          u = M.p(t),
                          p = function (t, e) {
                            var i = M.w(
                              s.$u
                              ? Date.UTC(s.$y, e, t)
                              : new Date(s.$y, e, t),
                            s);
                            return l
                              ? i
                              : i.endOf(r);
                          },
                          f = function (t, e) {
                            return M.w(s.toDate()[t].apply(s.toDate("s"), (
                              l
                              ? [0, 0, 0, 0]
                              : [23, 59, 59, 999]).slice(e)), s);
                          },
                          g = this.$W,
                          m = this.$M,
                          b = this.$D,
                          y = "set" + (
                            this.$u
                            ? "UTC"
                            : "");
                        switch (u) {
                          case d:
                            return l
                              ? p(1, 0)
                              : p(31, 11);
                          case h:
                            return l
                              ? p(1, m)
                              : p(0, m + 1);
                          case o:
                            var v = this.$locale().weekStart || 0,
                              w = (
                                g < v
                                ? g + 7
                                : g) - v;
                            return p(
                              l
                              ? b - w
                              : b + (6 - w),
                            m);
                          case r:
                          case c:
                            return f(y + "Hours", 0);
                          case n:
                            return f(y + "Minutes", 1);
                          case a:
                            return f(y + "Seconds", 2);
                          case i:
                            return f(y + "Milliseconds", 3);
                          default:
                            return this.clone();
                        }
                      }), (m.endOf = function (t) {
                        return this.startOf(t, !1);
                      }), (m.$set = function (t, e) {
                        var o,
                          l = M.p(t),
                          u = "set" + (
                            this.$u
                            ? "UTC"
                            : ""),
                          p = ((o = {}), (o[r] = u + "Date"), (o[c] = u + "Date"), (o[h] = u + "Month"), (o[d] = u + "FullYear"), (o[n] = u + "Hours"), (o[a] = u + "Minutes"), (o[i] = u + "Seconds"), (o[s] = u + "Milliseconds"), o)[l],
                          f = l === r
                            ? this.$D + (e - this.$W)
                            : e;
                        if (l === h || l === d) {
                          var g = this.clone().set(c, 1);
                          g.$d[p](f),
                          g.init(),
                          (this.$d = g.set(c, Math.min(this.$D, g.daysInMonth())).$d);
                        } else
                          p && this.$d[p](f);
                        return this.init(),
                        this;
                      }), (m.set = function (t, e) {
                        return this.clone().$set(t, e);
                      }), (m.get = function (t) {
                        return this[M.p(t)]();
                      }), (m.add = function (s, l) {
                        var c,
                          u = this;
                        s = Number(s);
                        var p = M.p(l),
                          f = function (t) {
                            var e = x(u);
                            return M.w(e.date(e.date() + Math.round(t * s)), u);
                          };
                        if (p === h)
                          return this.set(h, this.$M + s);
                        if (p === d)
                          return this.set(d, this.$y + s);
                        if (p === r)
                          return f(1);
                        if (p === o)
                          return f(7);
                        var g = ((c = {}), (c[a] = t), (c[n] = e), (c[i] = 1e3), c)[p] || 1,
                          m = this.$d.getTime() + s * g;
                        return M.w(m, this);
                      }), (m.subtract = function (t, e) {
                        return this.add(-1 * t, e);
                      }), (m.format = function (t) {
                        var e = this,
                          s = this.$locale();
                        if (!this.isValid())
                          return s.invalidDate || u;
                        var i = t || "YYYY-MM-DDTHH:mm:ssZ",
                          a = M.z(this),
                          n = this.$H,
                          r = this.$m,
                          o = this.$M,
                          h = s.weekdays,
                          l = s.months,
                          d = function (t, s, a, n) {
                            return ((t && (t[s] || t(e, i))) || a[s].substr(0, n));
                          },
                          c = function (t) {
                            return M.s(n % 12 || 12, t, "0");
                          },
                          p = s.meridiem || function (t, e, s) {
                            var i = t < 12
                              ? "AM"
                              : "PM";
                            return s
                              ? i.toLowerCase()
                              : i;
                          },
                          g = {
                            YY: String(this.$y).slice(-2),
                            YYYY: this.$y,
                            M: o + 1,
                            MM: M.s(o + 1, 2, "0"),
                            MMM: d(s.monthsShort, o, l, 3),
                            MMMM: d(l, o),
                            D: this.$D,
                            DD: M.s(this.$D, 2, "0"),
                            d: String(this.$W),
                            dd: d(s.weekdaysMin, this.$W, h, 2),
                            ddd: d(s.weekdaysShort, this.$W, h, 3),
                            dddd: h[this.$W],
                            H: String(n),
                            HH: M.s(n, 2, "0"),
                            h: c(1),
                            hh: c(2),
                            a: p(n, r, !0),
                            A: p(n, r, !1),
                            m: String(r),
                            mm: M.s(r, 2, "0"),
                            s: String(this.$s),
                            ss: M.s(this.$s, 2, "0"),
                            SSS: M.s(this.$ms, 3, "0"),
                            Z: a
                          };
                        return i.replace(f, function (t, e) {
                          return e || g[t] || a.replace(":", "");
                        });
                      }), (m.utcOffset = function () {
                        return (15 * -Math.round(this.$d.getTimezoneOffset() / 15));
                      }), (m.diff = function (s, c, u) {
                        var p,
                          f = M.p(c),
                          g = x(s),
                          m = (g.utcOffset() - this.utcOffset()) * t,
                          b = this - g,
                          y = M.m(this, g);
                        return (
                          (y = ((p = {}), (p[d] = y / 12), (p[h] = y), (p[l] = y / 3), (p[o] = (b - m) / 6048e5), (p[r] = (b - m) / 864e5), (p[n] = b / e), (p[a] = b / t), (p[i] = b / 1e3), p)[f] || b), u
                          ? y
                          : M.a(y));
                      }), (m.daysInMonth = function () {
                        return this.endOf(h).$D;
                      }), (m.$locale = function () {
                        return v[this.$L];
                      }), (m.locale = function (t, e) {
                        if (!t)
                          return this.$L;
                        var s = this.clone(),
                          i = C(t, e, !0);
                        return i && (s.$L = i),
                        s;
                      }), (m.clone = function () {
                        return M.w(this.$d, this);
                      }), (m.toDate = function () {
                        return new Date(this.valueOf());
                      }), (m.toJSON = function () {
                        return this.isValid()
                          ? this.toISOString()
                          : null;
                      }), (m.toISOString = function () {
                        return this.$d.toISOString();
                      }), (m.toString = function () {
                        return this.$d.toUTCString();
                      }), g);
                    })(),
                    T = $.prototype;
                  return ((x.prototype = T), [
                    [
                      "$ms", s
                    ],
                    [
                      "$s", i
                    ],
                    [
                      "$m", a
                    ],
                    [
                      "$H", n
                    ],
                    [
                      "$W", r
                    ],
                    [
                      "$M", h
                    ],
                    [
                      "$y", d
                    ],
                    [
                      "$D", c
                    ]
                  ].forEach(function (t) {
                    T[t[1]] = function (e) {
                      return this.$g(e, t[0], t[1]);
                    };
                  }), (x.extend = function (t, e) {
                    return t.$i || (t(e, $, x), (t.$i = !0)),
                    x;
                  }), (x.locale = C), (x.isDayjs = w), (x.unix = function (t) {
                    return x(1e3 * t);
                  }), (x.en = v[y]), (x.Ls = v), (x.p = {}), x);
                })();
              }),
              a = e(function (t, e) {
                t.exports = (function () {
                  var t = {
                      LTS: "h:mm:ss A",
                      LT: "h:mm A",
                      L: "MM/DD/YYYY",
                      LL: "MMMM D, YYYY",
                      LLL: "MMMM D, YYYY h:mm A",
                      LLLL: "dddd, MMMM D, YYYY h:mm A"
                    },
                    e = /(\[[^[]*\])|([-:/.()\s]+)|(A|a|YYYY|YY?|MM?M?M?|Do|DD?|hh?|HH?|mm?|ss?|S{1,3}|z|ZZ?)/g,
                    s = /\d\d/,
                    i = /\d\d?/,
                    a = /\d*[^\s\d-_:/()]+/,
                    n = {},
                    r = function (t) {
                      return (t = + t) + (
                        t > 68
                        ? 1900
                        : 2e3);
                    },
                    o = function (t) {
                      return function (e) {
                        this[t] = + e;
                      };
                    },
                    h = [
                      /[+-]\d\d:?(\d\d)?|Z/,
                      function (t) {
                        (this.zone || (this.zone = {})).offset = (function (t) {
                          if (!t)
                            return 0;
                          if ("Z" === t)
                            return 0;
                          var e = t.match(/([+-]|\d\d)/g),
                            s = 60 * e[1] + (+ e[2] || 0);
                          return 0 === s
                            ? 0
                            : "+" === e[0]
                              ? -s
                              : s;
                        })(t);
                      }
                    ],
                    l = function (t) {
                      var e = n[t];
                      return e && (
                        e.indexOf
                        ? e
                        : e.s.concat(e.f));
                    },
                    d = function (t, e) {
                      var s,
                        i = n.meridiem;
                      if (i) {
                        for (var a = 1; a <= 24; a += 1)
                          if (t.indexOf(i(a, 0, e)) > -1) {
                            s = a > 12;
                            break;
                          }
                        } else
                        s = t === (
                          e
                          ? "pm"
                          : "PM");
                      return s;
                    },
                    c = {
                      A: [
                        a,
                        function (t) {
                          this.afternoon = d(t, !1);
                        }
                      ],
                      a: [
                        a,
                        function (t) {
                          this.afternoon = d(t, !0);
                        }
                      ],
                      S: [
                        /\d/,
                        function (t) {
                          this.milliseconds = 100 * + t;
                        }
                      ],
                      SS: [
                        s,
                        function (t) {
                          this.milliseconds = 10 * + t;
                        }
                      ],
                      SSS: [
                        /\d{3}/,
                        function (t) {
                          this.milliseconds = + t;
                        }
                      ],
                      s: [
                        i, o("seconds")
                      ],
                      ss: [
                        i, o("seconds")
                      ],
                      m: [
                        i, o("minutes")
                      ],
                      mm: [
                        i, o("minutes")
                      ],
                      H: [
                        i, o("hours")
                      ],
                      h: [
                        i, o("hours")
                      ],
                      HH: [
                        i, o("hours")
                      ],
                      hh: [
                        i, o("hours")
                      ],
                      D: [
                        i, o("day")
                      ],
                      DD: [
                        s, o("day")
                      ],
                      Do: [
                        a,
                        function (t) {
                          var e = n.ordinal,
                            s = t.match(/\d+/);
                          if (((this.day = s[0]), e))
                            for (var i = 1; i <= 31; i += 1)
                              e(i).replace(/\[|\]/g, "") === t && (this.day = i);
                            }
                          ],
                      M: [
                        i, o("month")
                      ],
                      MM: [
                        s, o("month")
                      ],
                      MMM: [
                        a,
                        function (t) {
                          var e = l("months"),
                            s = (l("monthsShort") || e.map(function (t) {
                              return t.substr(0, 3);
                            })).indexOf(t) + 1;
                          if (s < 1)
                            throw new Error();
                          this.month = s % 12 || s;
                        }
                      ],
                      MMMM: [
                        a,
                        function (t) {
                          var e = l("months").indexOf(t) + 1;
                          if (e < 1)
                            throw new Error();
                          this.month = e % 12 || e;
                        }
                      ],
                      Y: [
                        /[+-]?\d+/, o("year")
                      ],
                      YY: [
                        s,
                        function (t) {
                          this.year = r(t);
                        }
                      ],
                      YYYY: [
                        /\d{4}/, o("year")
                      ],
                      Z: h,
                      ZZ: h
                    };

                  function u(s) {
                    var i,
                      a;
                    (i = s),
                    (a = n && n.formats);
                    for (var r = (s = i.replace(/(\[[^\]]+])|(LTS?|l{1,4}|L{1,4})/g, function (e, s, i) {
                      var n = i && i.toUpperCase();
                      return (s || a[i] || t[i] || a[n].replace(/(\[[^\]]+])|(MMMM|MM|DD|dddd)/g, function (t, e, s) {
                        return e || s.slice(1);
                      }));
                    })).match(e), o = r.length, h = 0; h < o; h += 1) {
                      var l = r[h],
                        d = c[l],
                        u = d && d[0],
                        p = d && d[1];
                      r[h] = p
                        ? {
                          regex: u,
                          parser: p
                        }
                        : l.replace(/^\[|\]$/g, "");
                    }
                    return function (t) {
                      for (var e = {}, s = 0, i = 0; s < o; s += 1) {
                        var a = r[s];
                        if ("string" == typeof a)
                          i += a.length;
                        else {
                          var n = a.regex,
                            h = a.parser,
                            l = t.substr(i),
                            d = n.exec(l)[0];
                          h.call(e, d),
                          (t = t.replace(d, ""));
                        }
                      }
                      return ((function (t) {
                        var e = t.afternoon;
                        if (void 0 !== e) {
                          var s = t.hours;
                          e
                            ? s < 12 && (t.hours += 12)
                            : 12 === s && (t.hours = 0),
                          delete t.afternoon;
                        }
                      })(e), e);
                    };
                  }
                  return function (t, e, s) {
                    (s.p.customParseFormat = !0),
                    t && t.parseTwoDigitYear && (r = t.parseTwoDigitYear);
                    var i = e.prototype,
                      a = i.parse;
                    i.parse = function (t) {
                      var e = t.date,
                        i = t.utc,
                        r = t.args;
                      this.$u = i;
                      var o = r[1];
                      if ("string" == typeof o) {
                        var h = !0 === r[2],
                          l = !0 === r[3],
                          d = h || l,
                          c = r[2];
                        l && (c = r[2]),
                        (n = this.$locale()),
                        !h && c && (n = s.Ls[c]),
                        (this.$d = (function (t, e, s) {
                          try {
                            if (["x", "X"].indexOf(e) > -1)
                              return new Date((
                                "X" === e
                                ? 1e3
                                : 1) * t);
                            var i = u(e)(t),
                              a = i.year,
                              n = i.month,
                              r = i.day,
                              o = i.hours,
                              h = i.minutes,
                              l = i.seconds,
                              d = i.milliseconds,
                              c = i.zone,
                              p = new Date(),
                              f = r || (
                                a || n
                                ? 1
                                : p.getDate()),
                              g = a || p.getFullYear(),
                              m = 0;
                            (a && !n) || (
                              m = n > 0
                              ? n - 1
                              : p.getMonth());
                            var b = o || 0,
                              y = h || 0,
                              v = l || 0,
                              w = d || 0;
                            return c
                              ? new Date(Date.UTC(g, m, f, b, y, v, w + 60 * c.offset * 1e3))
                              : s
                                ? new Date(Date.UTC(g, m, f, b, y, v, w))
                                : new Date(g, m, f, b, y, v, w);
                          } catch (t) {
                            return new Date("");
                          }
                        })(e, o, i)),
                        this.init(),
                        c && !0 !== c && (this.$L = this.locale(c).$L),
                        d && e !== this.format(o) && (this.$d = new Date("")),
                        (n = {});
                      } else if (o instanceof Array)
                        for (var p = o.length, f = 1; f <= p; f += 1) {
                          r[1] = o[f - 1];
                          var g = s.apply(this, r);
                          if (g.isValid()) {
                            (this.$d = g.$d),
                            (this.$L = g.$L),
                            this.init();
                            break;
                          }
                          f === p && (this.$d = new Date(""));
                        }
                      else
                        a.call(this, t);
                      }
                    ;
                  };
                })();
              });
            i.extend(a),
            (s.parseDate = (t, e) => {
              let s = !1;
              if (e)
                switch (e) {
                  case "ISO_8601":
                    s = t;
                    break;
                  case "RFC_2822":
                    s = i(t.slice(5), "DD MMM YYYY HH:mm:ss ZZ").unix();
                    break;
                  case "MYSQL":
                    s = i(t, "YYYY-MM-DD hh:mm:ss").unix();
                    break;
                  case "UNIX":
                    s = i(t).unix();
                    break;
                  default:
                    s = i(t, e).valueOf();
                }
              return s;
            });
          }.call(this));
        }.call(
          this, "undefined" != typeof global
          ? global
          : "undefined" != typeof self
            ? self
            : "undefined" != typeof window
              ? window
              : {}));
      }, {}
    ],
    2: [
      function (t, e, s) {
        "use strict";
        Object.defineProperty(s, "__esModule", {
          value: !0
        });
        const i = t => "[object Object]" === Object.prototype.toString.call(t),
          a = (t, e) => {
            const s = document.createElement(t);
            if (e && "object" == typeof e)
              for (const t in e)
                "html" === t
                  ? (s.innerHTML = e[t])
                  : s.setAttribute(t, e[t]);
            return s;
          },
          n = t => {
            t instanceof NodeList
              ? t.forEach(t => n(t))
              : (t.innerHTML = "");
          },
          r = (t, e, s) => a("li", {
            class: t,
            html: `<a href="#" data-page="${e}">${s}</a>`
          }),
          o = (t, e) => {
            let s,
              i;
            1 === e
              ? ((s = 0), (i = t.length))
              : -1 === e && ((s = t.length - 1), (i = -1));
            for (let a = !0; a;) {
              a = !1;
              for (let n = s; n != i; n += e)
                if (t[n + e] && t[n].value > t[n + e].value) {
                  const s = t[n],
                    i = t[n + e],
                    r = s;
                  (t[n] = i),
                  (t[n + e] = r),
                  (a = !0);
                }
              }
            return t;
          };
        class h {
          constructor(t, e) {
            return (this.dt = t),
            (this.rows = e),
            this;
          }
          build(t) {
            const e = a("tr");
            let s = this.dt.headings;
            return (s.length || (s = t.map(() => "")), s.forEach((s, i) => {
              const n = a("td");
              (t[i] && t[i].length) || (t[i] = ""),
              (n.innerHTML = t[i]),
              (n.data = t[i]),
              e.appendChild(n);
            }), e);
          }
          render(t) {
            return t;
          }
          add(t) {
            if (Array.isArray(t)) {
              const e = this.dt;
              Array.isArray(t[0])
                ? t.forEach(t => {
                  e.data.push(this.build(t));
                })
                : e.data.push(this.build(t)),
              e.data.length && (e.hasRows = !0),
              this.update(),
              e.columns().rebuild();
            }
          }
          remove(t) {
            const e = this.dt;
            Array.isArray(t)
              ? (t.sort((t, e) => e - t), t.forEach(t => {
                e.data.splice(t, 1);
              }))
              : "all" == t
                ? (e.data = [])
                : e.data.splice(t, 1),
            e.data.length || (e.hasRows = !1),
            this.update(),
            e.columns().rebuild();
          }
          update() {
            this.dt.data.forEach((t, e) => {
              t.dataIndex = e;
            });
          }
        }
        class l {
          constructor(t) {
            return (this.dt = t),
            this;
          }
          swap(t) {
            if (t.length && 2 === t.length) {
              const e = [];
              this.dt.headings.forEach((t, s) => {
                e.push(s);
              });
              const s = t[0],
                i = t[1],
                a = e[i];
              (e[i] = e[s]),
              (e[s] = a),
              this.order(e);
            }
          }
          order(t) {
            let e,
              s,
              i,
              a,
              n,
              r,
              o;
            const h = [
                [], [], [], []
              ],
              l = this.dt;
            t.forEach((t, i) => {
              (n = l.headings[t]),
              (r = "false" !== n.getAttribute("data-sortable")),
              (e = n.cloneNode(!0)),
              (e.originalCellIndex = i),
              (e.sortable = r),
              h[0].push(e),
              l.hiddenColumns.includes(t) || ((s = n.cloneNode(!0)), (s.originalCellIndex = i), (s.sortable = r), h[1].push(s));
            }),
            l.data.forEach((e, s) => {
              (i = e.cloneNode(!1)),
              (a = e.cloneNode(!1)),
              (i.dataIndex = a.dataIndex = s),
              null !== e.searchIndex && void 0 !== e.searchIndex && (i.searchIndex = a.searchIndex = e.searchIndex),
              t.forEach(t => {
                (o = e.cells[t].cloneNode(!0)),
                (o.data = e.cells[t].data),
                i.appendChild(o),
                l.hiddenColumns.includes(t) || ((o = e.cells[t].cloneNode(!0)), (o.data = e.cells[t].data), a.appendChild(o));
              }),
              h[2].push(i),
              h[3].push(a);
            }),
            (l.headings = h[0]),
            (l.activeHeadings = h[1]),
            (l.data = h[2]),
            (l.activeRows = h[3]),
            l.update();
          }
          hide(t) {
            if (t.length) {
              const e = this.dt;
              t.forEach(t => {
                e.hiddenColumns.includes(t) || e.hiddenColumns.push(t);
              }),
              this.rebuild();
            }
          }
          show(t) {
            if (t.length) {
              let e;
              const s = this.dt;
              t.forEach(t => {
                (e = s.hiddenColumns.indexOf(t)),
                e > -1 && s.hiddenColumns.splice(e, 1);
              }),
              this.rebuild();
            }
          }
          visible(t) {
            let e;
            const s = this.dt;
            return (
              (t = t || s.headings.map(t => t.originalCellIndex)), isNaN(t)
              ? Array.isArray(t) && ((e = []), t.forEach(t => {
                e.push(!s.hiddenColumns.includes(t));
              }))
              : (e = !s.hiddenColumns.includes(t)),
            e);
          }
          add(t) {
            let e;
            const s = document.createElement("th");
            if (!this.dt.headings.length)
              return (this.dt.insert({
                headings: [t.heading],
                data: t.data.map(t => [t])
              }), void this.rebuild());
            this.dt.hiddenHeader
              ? (s.innerHTML = "")
              : t.heading.nodeName
                ? s.appendChild(t.heading)
                : (s.innerHTML = t.heading),
            this.dt.headings.push(s),
            this.dt.data.forEach((s, i) => {
              t.data[i] && (
                (e = document.createElement("td")), t.data[i].nodeName
                ? e.appendChild(t.data[i])
                : (e.innerHTML = t.data[i]),
              (e.data = e.innerHTML),
              t.render && (e.innerHTML = t.render.call(this, e.data, e, s)),
              s.appendChild(e));
            }),
            t.type && s.setAttribute("data-type", t.type),
            t.format && s.setAttribute("data-format", t.format),
            t.hasOwnProperty("sortable") && ((s.sortable = t.sortable), s.setAttribute(
              "data-sortable", !0 === t.sortable
              ? "true"
              : "false")),
            this.rebuild(),
            this.dt.renderHeader();
          }
          remove(t) {
            Array.isArray(t)
              ? (t.sort((t, e) => e - t), t.forEach(t => this.remove(t)))
              : (this.dt.headings.splice(t, 1), this.dt.data.forEach(e => {
                e.removeChild(e.cells[t]);
              })),
            this.rebuild();
          }
          filter(t, e, s, i) {
            const a = this.dt;
            if ((a.filterState || (a.filterState = {
              originalData: a.data
            }), !a.filterState[t])) {
              const e = [
                ...i,
                () => !0
              ];
              a.filterState[t] = (function () {
                let t = 0;
                return() => e[t++ % e.length];
              })();
            }
            const n = a.filterState[t](),
              r = Array.from(a.filterState.originalData).filter(e => {
                const s = e.cells[t],
                  i = s.hasAttribute("data-content")
                    ? s.getAttribute("data-content")
                    : s.innerText;
                return "function" == typeof n
                  ? n(i)
                  : i === n;
              });
            (a.data = r),
            a.data.length
              ? (this.rebuild(), a.update())
              : (a.clear(), a.setMessage(a.options.labels.noRows)),
            s || a.emit("datatable.sort", t, e);
          }
          sort(e, s, i) {
            const a = this.dt;
            if (a.hasHeadings && (e < 0 || e > a.headings.length))
              return !1;
            const n = a.options.filters && a.options.filters[a.headings[e].textContent];
            if (n && 0 !== n.length)
              return void this.filter(e, s, i, n);

            (a.sorting = !0),
            i || a.emit("datatable.sorting", e, s);
            let r = a.data;
            const h = [],
              l = [];
            let d = 0,
              c = 0;
            const u = a.headings[e],
              p = [];
            if ("date" === u.getAttribute("data-type")) {
              let e = !1;
              u.hasAttribute("data-format") && (e = u.getAttribute("data-format")),
              p.push(Promise.resolve().then(function () {
                return t("./date-ee454f51.js");
              }).then(({parseDate: t}) => s => t(s, e)));
            }
            Promise.all(p).then(t => {
              const n = t[0];
              let p,
                f;
              Array.from(r).forEach(t => {
                const s = t.cells[e],
                  i = s.hasAttribute("data-content")
                    ? s.getAttribute("data-content")
                    : s.innerText;
                let a;
                (
                  a = n
                  ? n(i)
                  : "string" == typeof i
                    ? i.replace(/(\$|,|\s|%)/g, "")
                    : i),
                parseFloat(a) == a
                  ? (l[c++] = {
                    value: Number(a),
                    row: t
                  })
                  : (h[d++] = {
                    value: "string" == typeof i
                      ? i.toLowerCase()
                      : i,
                    row: t
                  });
              }),
              s || (
                s = u.classList.contains("asc")
                ? "desc"
                : "asc"),
              "desc" == s
                ? ((p = o(h, -1)), (f = o(l, -1)), u.classList.remove("asc"), u.classList.add("desc"))
                : ((p = o(l, 1)), (f = o(h, 1)), u.classList.remove("desc"), u.classList.add("asc")),
              a.lastTh && u != a.lastTh && (a.lastTh.classList.remove("desc"), a.lastTh.classList.remove("asc")),
              (a.lastTh = u),
              (r = p.concat(f)),
              (a.data = []);
              const g = [];
              r.forEach((t, e) => {
                a.data.push(t.row),
                null !== t.row.searchIndex && void 0 !== t.row.searchIndex && g.push(e);
              }),
              (a.searchData = g),
              this.rebuild(),
              a.update(),
              i || a.emit("datatable.sort", e, s);
            });
          }
          rebuild() {
            let t,
              e,
              s,
              i;
            const a = this.dt,
              n = [];
            (a.activeRows = []),
            (a.activeHeadings = []),
            a.headings.forEach((t, e) => {
              (t.originalCellIndex = e),
              (t.sortable = "false" !== t.getAttribute("data-sortable")),
              a.hiddenColumns.includes(e) || a.activeHeadings.push(t);
            }),
            a.data.forEach((r, o) => {
              (t = r.cloneNode(!1)),
              (e = r.cloneNode(!1)),
              (t.dataIndex = e.dataIndex = o),
              null !== r.searchIndex && void 0 !== r.searchIndex && (t.searchIndex = e.searchIndex = r.searchIndex),
              Array.from(r.cells).forEach(n => {
                (s = n.cloneNode(!0)),
                (s.data = n.data),
                t.appendChild(s),
                a.hiddenColumns.includes(s.cellIndex) || ((i = s.cloneNode(!0)), (i.data = s.data), e.appendChild(i));
              }),
              n.push(t),
              a.activeRows.push(e);
            }),
            (a.data = n),
            a.update();
          }
        }
        const d = function (t) {
            let e = !1,
              s = !1;
            if ((t = t || this.options.data).headings) {
              e = a("thead");
              const s = a("tr");
              t.headings.forEach(t => {
                const e = a("th", {html: t});
                s.appendChild(e);
              }),
              e.appendChild(s);
            }
            t.data && t.data.length && ((s = a("tbody")), t.data.forEach(e => {
              if (t.headings && t.headings.length !== e.length)
                throw new Error("The number of rows do not match the number of headings.");
              const i = a("tr");
              e.forEach(t => {
                const e = a("td", {html: t});
                i.appendChild(e);
              }),
              s.appendChild(i);
            })),
            e && (null !== this.dom.tHead && this.dom.removeChild(this.dom.tHead), this.dom.appendChild(e)),
            s && (this.dom.tBodies.length && this.dom.removeChild(this.dom.tBodies[0]), this.dom.appendChild(s));
          },
          c = {
            sortable: !0,
            searchable: !0,
            paging: !0,
            perPage: 10,
            perPageSelect: [
              5, 10, 15, 20, 25
            ],
            nextPrev: !0,
            firstLast: !1,
            prevText: "&lsaquo;",
            nextText: "&rsaquo;",
            firstText: "&laquo;",
            lastText: "&raquo;",
            ellipsisText: "&hellip;",
            ascText: "▴",
            descText: "▾",
            truncatePager: !0,
            pagerDelta: 2,
            scrollY: "",
            fixedColumns: !0,
            fixedHeight: !1,
            header: !0,
            hiddenHeader: !1,
            footer: !1,
            labels: {
              placeholder: "Search...",
              perPage: "{select} Elements par page ",
              noRows: "Aucune donnée trouvée",
              info: "De {start} à {end} ( Totale : {rows} )"
            },
            layout: {
              top: "{select}{search}",
              bottom: "{info}{pager}"
            }
          };
        class u {
          constructor(t, e = {}) {
            const s = "string" == typeof t
              ? document.querySelector(t)
              : t;
            if (((this.options = {
              ...c,
              ...e,
              layout: {
                ...c.layout,
                ...e.layout
              },
              labels: {
                ...c.labels,
                ...e.labels
              }
            }), (this.initialized = !1), (this.initialLayout = s.innerHTML), (this.initialSortable = this.options.sortable), this.options.header || (this.options.sortable = !1), null === s.tHead && (!this.options.data || (this.options.data && !this.options.data.headings)) && (this.options.sortable = !1), s.tBodies.length && !s.tBodies[0].rows.length && this.options.data && !this.options.data.data))
              throw new Error("You seem to be using the data option, but you've not defined any rows.");

            (this.dom = s),
            (this.table = this.dom),
            (this.listeners = {
              onResize: t => this.onResize(t)
            }),
            this.init();
          }
          static extend(t, e) {
            "function" == typeof e
              ? (u.prototype[t] = e)
              : (u[t] = e);
          }
          init(t) {
            if (this.initialized || this.dom.classList.contains("dataTable-table"))
              return !1;
            Object.assign(this.options, t || {}),
            (this.currentPage = 1),
            (this.onFirstPage = !0),
            (this.hiddenColumns = []),
            (this.columnRenderers = []),
            (this.selectedColumns = []),
            this.render(),
            setTimeout(() => {
              this.emit("datatable.init"),
              (this.initialized = !0),
              this.options.plugins && Object.entries(this.options.plugins).forEach(([t, e]) => {
                this[t] && "function" == typeof this[t] && ((this[t] = this[t](e, {createElement: a})), e.enabled && this[t].init && "function" == typeof this[t].init && this[t].init());
              });
            }, 10);
          }
          render(t) {
            if (t) {
              switch (t) {
                case "page":
                  this.renderPage();
                  break;
                case "pager":
                  this.renderPager();
                  break;
                case "header":
                  this.renderHeader();
              }
              return !1;
            }
            const e = this.options;
            let s = "";
            if ((e.data && d.call(this), (this.body = this.dom.tBodies[0]), (this.head = this.dom.tHead), (this.foot = this.dom.tFoot), this.body || ((this.body = a("tbody")), this.dom.appendChild(this.body)), (this.hasRows = this.body.rows.length > 0), !this.head)) {
              const t = a("thead"),
                s = a("tr");
              this.hasRows && (Array.from(this.body.rows[0].cells).forEach(() => {
                s.appendChild(a("th"));
              }), t.appendChild(s)),
              (this.head = t),
              this.dom.insertBefore(this.head, this.body),
              (this.hiddenHeader = e.hiddenHeader);
            }
            if ((
              (this.headings = []), (this.hasHeadings = this.head.rows.length > 0), this.hasHeadings && ((this.header = this.head.rows[0]), (this.headings = [].slice.call(this.header.cells))), e.header || (this.head && this.dom.removeChild(this.dom.tHead)), e.footer
              ? this.head && !this.foot && ((this.foot = a("tfoot", {html: this.head.innerHTML})), this.dom.appendChild(this.foot))
              : this.foot && this.dom.removeChild(this.dom.tFoot),
            (this.wrapper = a("div", {class: "dataTable-wrapper dataTable-loading"})),
            (s += "<div class='dataTable-top'>"),
            (s += e.layout.top),
            (s += "</div>"),
            e.scrollY.length
              ? (s += `<div class='dataTable-container' style='height: ${e.scrollY}; overflow-Y: auto;'></div>`)
              : (s += "<div class='dataTable-container'></div>"),
            (s += "<div class='dataTable-bottom'>"),
            (s += e.layout.bottom),
            (s += "</div>"),
            (s = s.replace(
              "{info}", e.paging
              ? "<div class='dataTable-info'></div>"
              : "")),
            e.paging && e.perPageSelect)) {
              let t = "<div class='dataTable-dropdown'><label>";
              (t += e.labels.perPage),
              (t += "</label></div>");
              const i = a("select", {class: "dataTable-selector"});
              e.perPageSelect.forEach(t => {
                const s = t === e.perPage,
                  a = new Option(t, t, s, s);
                i.add(a);
              }),
              (t = t.replace("{select}", i.outerHTML)),
              (s = s.replace("{select}", t));
            } else
              s = s.replace("{select}", "");
            if (e.searchable) {
              const t = `<div class='dataTable-search'><input class='dataTable-input' placeholder='${e.labels.placeholder}' type='text'></div>`;
              s = s.replace("{search}", t);
            } else
              s = s.replace("{search}", "");
            this.hasHeadings && this.render("header"),
            this.dom.classList.add("dataTable-table");
            const i = a("nav", {class: "dataTable-pagination"}),
              n = a("ul", {class: "dataTable-pagination-list"});
            i.appendChild(n),
            (s = s.replace(/\{pager\}/g, i.outerHTML)),
            (this.wrapper.innerHTML = s),
            (this.container = this.wrapper.querySelector(".dataTable-container")),
            (this.pagers = this.wrapper.querySelectorAll(".dataTable-pagination-list")),
            (this.label = this.wrapper.querySelector(".dataTable-info")),
            this.dom.parentNode.replaceChild(this.wrapper, this.dom),
            this.container.appendChild(this.dom),
            (this.rect = this.dom.getBoundingClientRect()),
            (this.data = Array.from(this.body.rows)),
            (this.activeRows = this.data.slice()),
            (this.activeHeadings = this.headings.slice()),
            this.update(),
            this.setColumns(),
            this.fixHeight(),
            this.fixColumns(),
            e.header || this.wrapper.classList.add("no-header"),
            e.footer || this.wrapper.classList.add("no-footer"),
            e.sortable && this.wrapper.classList.add("sortable"),
            e.searchable && this.wrapper.classList.add("searchable"),
            e.fixedHeight && this.wrapper.classList.add("fixed-height"),
            e.fixedColumns && this.wrapper.classList.add("fixed-columns"),
            this.bindEvents();
          }
          renderPage() {
            if ((this.hasHeadings && (n(this.header), this.activeHeadings.forEach(t => this.header.appendChild(t))), this.hasRows && this.totalPages)) {
              this.currentPage > this.totalPages && (this.currentPage = 1);
              const t = this.currentPage - 1,
                e = document.createDocumentFragment();
              this.pages[t].forEach(t => e.appendChild(this.rows().render(t))),
              this.clear(e),
              (this.onFirstPage = 1 === this.currentPage),
              (this.onLastPage = this.currentPage === this.lastPage);
            } else
              this.setMessage(this.options.labels.noRows);
            let t,
              e = 0,
              s = 0,
              i = 0;
            if ((this.totalPages && ((e = this.currentPage - 1), (s = e * this.options.perPage), (i = s + this.pages[e].length), (s += 1), (
              t = this.searching
              ? this.searchData.length
              : this.data.length)), this.label && this.options.labels.info.length)) {
              const e = this.options.labels.info.replace("{start}", s).replace("{end}", i).replace("{page}", this.currentPage).replace("{pages}", this.totalPages).replace("{rows}", t);
              this.label.innerHTML = t
                ? e
                : "";
            }
            1 == this.currentPage && this.fixHeight();
          }
          renderPager() {
            if ((n(this.pagers), this.totalPages > 1)) {
              const t = "pager",
                e = document.createDocumentFragment(),
                s = this.onFirstPage
                  ? 1
                  : this.currentPage - 1,
                i = this.onLastPage
                  ? this.totalPages
                  : this.currentPage + 1;
              this.options.firstLast && e.appendChild(r(t, 1, this.options.firstText)),
              this.options.nextPrev && !this.onFirstPage && e.appendChild(r(t, s, this.options.prevText));
              let n = this.links;
              this.options.truncatePager && (n = ((t, e, s, i, n) => {
                let r;
                const o = 2 * (i = i || 2);
                let h = e - i,
                  l = e + i;
                const d = [],
                  c = [];
                e < 4 - i + o
                  ? (l = 3 + o)
                  : e > s - (3 - i + o) && (h = s - (2 + o));
                for (let e = 1; e <= s; e++)
                  if (1 == e || e == s || (e >= h && e <= l)) {
                    const s = t[e - 1];
                    s.classList.remove("active"),
                    d.push(s);
                  }
                return (d.forEach(e => {
                  const s = e.children[0].getAttribute("data-page");
                  if (r) {
                    const e = r.children[0].getAttribute("data-page");
                    if (s - e == 2)
                      c.push(t[e]);
                    else if (s - e != 1) {
                      const t = a("li", {
                        class: "ellipsis",
                        html: `<a href="#">${n}</a>`
                      });
                      c.push(t);
                    }
                  }
                  c.push(e),
                  (r = e);
                }), c);
              })(this.links, this.currentPage, this.pages.length, this.options.pagerDelta, this.options.ellipsisText)),
              this.links[this.currentPage - 1].classList.add("active"),
              n.forEach(t => {
                t.classList.remove("active"),
                e.appendChild(t);
              }),
              this.links[this.currentPage - 1].classList.add("active"),
              this.options.nextPrev && !this.onLastPage && e.appendChild(r(t, i, this.options.nextText)),
              this.options.firstLast && e.appendChild(r(t, this.totalPages, this.options.lastText)),
              this.pagers.forEach(t => {
                t.appendChild(e.cloneNode(!0));
              });
            }
          }
          renderHeader() {
            (this.labels = []),
            this.headings && this.headings.length && this.headings.forEach((t, e) => {
              if (((this.labels[e] = t.textContent), t.firstElementChild && t.firstElementChild.classList.contains("dataTable-sorter") && (t.innerHTML = t.firstElementChild.innerHTML), (t.sortable = "false" !== t.getAttribute("data-sortable")), (t.originalCellIndex = e), this.options.sortable && t.sortable)) {
                const e = a("a", {
                  href: "#",
                  class: "dataTable-sorter",
                  html: t.innerHTML
                });
                (t.innerHTML = ""),
                t.setAttribute("data-sortable", ""),
                t.appendChild(e);
              }
            }),
            this.fixColumns();
          }
          bindEvents() {
            const t = this.options;
            if (t.perPageSelect) {
              const e = this.wrapper.querySelector(".dataTable-selector");
              e && e.addEventListener("change", () => {
                (t.perPage = parseInt(e.value, 10)),
                this.update(),
                this.fixHeight(),
                this.emit("datatable.perpage", t.perPage);
              }, !1);
            }
            t.searchable && ((this.input = this.wrapper.querySelector(".dataTable-input")), this.input && this.input.addEventListener("keyup", () => this.search(this.input.value), !1)),
            this.wrapper.addEventListener("click", e => {
              const s = e.target.closest("a");
              s && "a" === s.nodeName.toLowerCase() && (
                s.hasAttribute("data-page")
                ? (this.page(s.getAttribute("data-page")), e.preventDefault())
                : t.sortable && s.classList.contains("dataTable-sorter") && "false" != s.parentNode.getAttribute("data-sortable") && (this.columns().sort(this.headings.indexOf(s.parentNode)), e.preventDefault()));
            }, !1),
            window.addEventListener("resize", this.listeners.onResize);
          }
          onResize() {
            (this.rect = this.container.getBoundingClientRect()),
            this.rect.width && this.fixColumns();
          }
          setColumns(t) {
            t || this.data.forEach(t => {
              Array.from(t.cells).forEach(t => {
                t.data = t.innerHTML;
              });
            }),
            this.options.columns && this.headings.length && this.options.columns.forEach(t => {
              Array.isArray(t.select) || (t.select = [t.select]),
              t.hasOwnProperty("render") && "function" == typeof t.render && ((this.selectedColumns = this.selectedColumns.concat(t.select)), this.columnRenderers.push({columns: t.select, renderer: t.render})),
              t.select.forEach(e => {
                const s = this.headings[e];
                t.type && s.setAttribute("data-type", t.type),
                t.format && s.setAttribute("data-format", t.format),
                t.hasOwnProperty("sortable") && s.setAttribute("data-sortable", t.sortable),
                t.hasOwnProperty("hidden") && !1 !== t.hidden && this.columns().hide([e]),
                t.hasOwnProperty("sort") && 1 === t.select.length && this.columns().sort(t.select[0], t.sort, !0);
              });
            }),
            this.hasRows && (this.data.forEach((t, e) => {
              (t.dataIndex = e),
              Array.from(t.cells).forEach(t => {
                t.data = t.innerHTML;
              });
            }), this.selectedColumns.length && this.data.forEach(t => {
              Array.from(t.cells).forEach((e, s) => {
                this.selectedColumns.includes(s) && this.columnRenderers.forEach(i => {
                  i.columns.includes(s) && (e.innerHTML = i.renderer.call(this, e.data, e, t));
                });
              });
            }), this.columns().rebuild()),
            this.render("header");
          }
          destroy() {
            (this.dom.innerHTML = this.initialLayout),
            this.dom.classList.remove("dataTable-table"),
            this.wrapper.parentNode.replaceChild(this.dom, this.wrapper),
            (this.initialized = !1),
            window.removeEventListener("resize", this.listeners.onResize);
          }
          update() {
            this.wrapper.classList.remove("dataTable-empty"),
            this.paginate(this),
            this.render("page"),
            (this.links = []);
            let t = this.pages.length;
            for (; t--;) {
              const e = t + 1;
              this.links[t] = r(
                0 === t
                ? "active"
                : "",
              e,
              e);
            }
            (this.sorting = !1),
            this.render("pager"),
            this.rows().update(),
            this.emit("datatable.update");
          }
          paginate() {
            const t = this.options.perPage;
            let e = this.activeRows;
            return (
              this.searching && ((e = []), this.searchData.forEach(t => e.push(this.activeRows[t]))), this.options.paging
              ? (this.pages = e.map((s, i) => (
                i % t == 0
                ? e.slice(i, i + t)
                : null)).filter(t => t))
              : (this.pages = [e]),
            (this.totalPages = this.lastPage = this.pages.length),
            this.totalPages);
          }
          fixColumns() {
            if ((this.options.scrollY.length || this.options.fixedColumns) && this.activeHeadings && this.activeHeadings.length) {
              let t,
                e = !1;
              if (((this.columnWidths = []), this.dom.tHead)) {
                if ((this.options.scrollY.length && ((e = a("thead")), e.appendChild(a("tr")), (e.style.height = "0px"), this.headerTable && (this.dom.tHead = this.headerTable.tHead)), this.activeHeadings.forEach(t => {
                  t.style.width = "";
                }), this.activeHeadings.forEach((t, s) => {
                  const i = t.offsetWidth,
                    n = (i / this.rect.width) * 100;
                  if (((t.style.width = `${n}%`), (this.columnWidths[s] = i), this.options.scrollY.length)) {
                    const t = a("th");
                    e.firstElementChild.appendChild(t),
                    (t.style.width = `${n}%`),
                    (t.style.paddingTop = "0"),
                    (t.style.paddingBottom = "0"),
                    (t.style.border = "0");
                  }
                }), this.options.scrollY.length)) {
                  const t = this.dom.parentElement;
                  if (!this.headerTable) {
                    this.headerTable = a("table", {class: "dataTable-table"});
                    const e = a("div", {class: "dataTable-headercontainer"});
                    e.appendChild(this.headerTable),
                    t.parentElement.insertBefore(e, t);
                  }
                  const s = this.dom.tHead;
                  this.dom.replaceChild(e, s),
                  (this.headerTable.tHead = s),
                  (this.headerTable.parentElement.style.paddingRight = `${this.headerTable.clientWidth - this.dom.clientWidth + parseInt(this.headerTable.parentElement.style.paddingRight || "0", 10)}px`),
                  t.scrollHeight > t.clientHeight && (t.style.overflowY = "scroll");
                }
              } else {
                (t = []),
                (e = a("thead"));
                const s = a("tr");
                Array.from(this.dom.tBodies[0].rows[0].cells).forEach(() => {
                  const e = a("th");
                  s.appendChild(e),
                  t.push(e);
                }),
                e.appendChild(s),
                this.dom.insertBefore(e, this.body);
                const i = [];
                t.forEach((t, e) => {
                  const s = t.offsetWidth,
                    a = (s / this.rect.width) * 100;
                  i.push(a),
                  (this.columnWidths[e] = s);
                }),
                this.data.forEach(t => {
                  Array.from(t.cells).forEach((t, e) => {
                    this.columns(t.cellIndex).visible() && (t.style.width = `${i[e]}%`);
                  });
                }),
                this.dom.removeChild(e);
              }
            }
          }
          fixHeight() {
            this.options.fixedHeight && ((this.container.style.height = null), (this.rect = this.container.getBoundingClientRect()), (this.container.style.height = `${this.rect.height}px`));
          }
          search(t) {
            return (!!this.hasRows && (
              (t = t.toLowerCase()), (this.currentPage = 1), (this.searching = !0), (this.searchData = []), t.length
              ? (
                this.clear(), this.data.forEach((e, s) => {
                const i = this.searchData.includes(e);
                t.split(" ").reduce((t, s) => {
                  let i = !1,
                    a = null,
                    n = null;
                  for (let t = 0; t < e.cells.length; t++)
                    if (((a = e.cells[t]), (
                      n = a.hasAttribute("data-content")
                      ? a.getAttribute("data-content")
                      : a.textContent), n.toLowerCase().includes(s) && this.columns(a.cellIndex).visible())) {
                      i = !0;
                      break;
                    }
                  return t && i;
                }, !0) && !i
                  ? ((e.searchIndex = s), this.searchData.push(s))
                  : (e.searchIndex = null);
              }), this.wrapper.classList.add("search-results"), this.searchData.length
                ? this.update()
                : (this.wrapper.classList.remove("search-results"), this.setMessage(this.options.labels.noRows)),
              void this.emit("datatable.search", t, this.searchData))
              : ((this.searching = !1), this.update(), this.emit("datatable.search", t, this.searchData), this.wrapper.classList.remove("search-results"), !1)));
          }
          page(t) {
            return (t != this.currentPage && (isNaN(t) || (this.currentPage = parseInt(t, 10)), !(t > this.pages.length || t < 0) && (this.render("page"), this.render("pager"), void this.emit("datatable.page", t))));
          }
          sortColumn(t, e) {
            this.columns().sort(t, e);
          }
          insert(t) {
            let e = [];
            if (i(t)) {
              if (t.headings && !this.hasHeadings && !this.hasRows) {
                const e = a("tr");
                t.headings.forEach(t => {
                  const s = a("th", {html: t});
                  e.appendChild(s);
                }),
                this.head.appendChild(e),
                (this.header = e),
                (this.headings = [].slice.call(e.cells)),
                (this.hasHeadings = !0),
                (this.options.sortable = this.initialSortable),
                this.render("header"),
                (this.activeHeadings = this.headings.slice());
              }
              t.data && Array.isArray(t.data) && (e = t.data);
            } else
              Array.isArray(t) && t.forEach(t => {
                const s = [];
                Object.entries(t).forEach(([t, e]) => {
                  const i = this.labels.indexOf(t);
                  i > -1 && (s[i] = e);
                }),
                e.push(s);
              });
            e.length && (this.rows().add(e), (this.hasRows = !0)),
            this.update(),
            this.setColumns(),
            this.fixColumns();
          }
          refresh() {
            this.options.searchable && ((this.input.value = ""), (this.searching = !1)),
            (this.currentPage = 1),
            (this.onFirstPage = !0),
            this.update(),
            this.emit("datatable.refresh");
          }
          clear(t) {
            this.body && n(this.body);
            let e = this.body;
            this.body || (e = this.dom),
            t && ("string" == typeof t && (document.createDocumentFragment().innerHTML = t), e.appendChild(t));
          }
          export(t) {
            if (!this.hasHeadings && !this.hasRows)
              return !1;
            const e = this.activeHeadings;
            let s = [];
            const a = [];
            let n,
              r,
              o,
              h;
            if (!i(t))
              return !1;
            const l = {
              download: !0,
              skipColumn: [],
              lineDelimiter: "\n",
              columnDelimiter: ",",
              tableName: "myTable",
              replacer: null,
              space: 4,
              ...t
            };
            if (l.type) {
              if ((("txt" !== l.type && "csv" !== l.type) || (s[0] = this.header), l.selection))
                if (isNaN(l.selection)) {
                  if (Array.isArray(l.selection))
                    for (n = 0; n < l.selection.length; n++)
                      s = s.concat(this.pages[l.selection[n] - 1]);
                    }
                  else
                  s = s.concat(this.pages[l.selection - 1]);
            else
                s = s.concat(this.activeRows);
              if (s.length) {
                if ("txt" === l.type || "csv" === l.type) {
                  for (o = "", n = 0; n < s.length; n++) {
                    for (r = 0; r < s[n].cells.length; r++)
                      if (!l.skipColumn.includes(e[r].originalCellIndex) && this.columns(e[r].originalCellIndex).visible()) {
                        let t = s[n].cells[r].textContent;
                        (t = t.trim()),
                        (t = t.replace(/\s{2,}/g, " ")),
                        (t = t.replace(/\n/g, "  ")),
                        (t = t.replace(/"/g, '""')),
                        (t = t.replace(/#/g, "%23")),
                        t.includes(",") && (t = `"${t}"`),
                        (o += t + l.columnDelimiter);
                      }
                    (o = o.trim().substring(0, o.length - 1)),
                    (o += l.lineDelimiter);
                  }
                  (o = o.trim().substring(0, o.length - 1)),
                  l.download && (o = `data:text/csv;charset=utf-8,${o}`);
                } else if ("sql" === l.type) {
                  for (o = `INSERT INTO \`${l.tableName}\` (`, n = 0; n < e.length; n++)
                    !l.skipColumn.includes(e[n].originalCellIndex) && this.columns(e[n].originalCellIndex).visible() && (o += `\`${e[n].textContent}\`,`);
                  for (o = o.trim().substring(0, o.length - 1), o += ") VALUES ", n = 0; n < s.length; n++) {
                    for (o += "(", r = 0; r < s[n].cells.length; r++)
                      !l.skipColumn.includes(e[r].originalCellIndex) && this.columns(e[r].originalCellIndex).visible() && (o += `"${s[n].cells[r].textContent}",`);

                    (o = o.trim().substring(0, o.length - 1)),
                    (o += "),");
                  }
                  (o = o.trim().substring(0, o.length - 1)),
                  (o += ";"),
                  l.download && (o = `data:application/sql;charset=utf-8,${o}`);
                } else if ("json" === l.type) {
                  for (r = 0; r < s.length; r++)
                    for (a[r] = a[r] || {}, n = 0; n < e.length; n++)
                      !l.skipColumn.includes(e[n].originalCellIndex) && this.columns(e[n].originalCellIndex).visible() && (a[r][e[n].textContent] = s[r].cells[n].textContent);
                (o = JSON.stringify(a, l.replacer, l.space)),
                  l.download && (o = `data:application/json;charset=utf-8,${o}`);
                }
                return (l.download && ((l.filename = l.filename || "datatable_export"), (l.filename += `.${l.type}`), (o = encodeURI(o)), (h = document.createElement("a")), (h.href = o), (h.download = l.filename), document.body.appendChild(h), h.click(), document.body.removeChild(h)), o);
              }
            }
            return !1;
          }
          import (t) {
            let e = !1;
            if (!i(t))
              return !1;
            const s = {
              lineDelimiter: "\n",
              columnDelimiter: ",",
              ...t
            };
            if (s.data.length || i(s.data)) {
              if ("csv" === s.type) {
                e = {
                  data: []
                };
                const t = s.data.split(s.lineDelimiter);
                t.length && (s.headings && ((e.headings = t[0].split(s.columnDelimiter)), t.shift()), t.forEach((t, i) => {
                  e.data[i] = [];
                  const a = t.split(s.columnDelimiter);
                  a.length && a.forEach(t => {
                    e.data[i].push(t);
                  });
                }));
              } else if ("json" === s.type) {
                const t = (t => {
                  let e = !1;
                  try {
                    e = JSON.parse(t);
                  } catch (t) {
                    return !1;
                  }
                  return !(null === e || (!Array.isArray(e) && !i(e))) && e;
                })(s.data);
                t && ((e = {
                  headings: [],
                  data: []
                }), t.forEach((t, s) => {
                  (e.data[s] = []),
                  Object.entries(t).forEach(([t, i]) => {
                    e.headings.includes(t) || e.headings.push(t),
                    e.data[s].push(i);
                  });
                }));
              }
              i(s.data) && (e = s.data),
              e && this.insert(e);
            }
            return !1;
          }
          print() {
            const t = this.activeHeadings,
              e = this.activeRows,
              s = a("table"),
              i = a("thead"),
              n = a("tbody"),
              r = a("tr");
            t.forEach(t => {
              r.appendChild(a("th", {html: t.textContent}));
            }),
            i.appendChild(r),
            e.forEach(t => {
              const e = a("tr");
              Array.from(t.cells).forEach(t => {
                e.appendChild(a("td", {html: t.textContent}));
              }),
              n.appendChild(e);
            }),
            s.appendChild(i),
            s.appendChild(n);
            const o = window.open();
            o.document.body.appendChild(s),
            o.print();
          }
          setMessage(t) {
            let e = 1;
            this.hasRows
              ? (e = this.data[0].cells.length)
              : this.activeHeadings.length && (e = this.activeHeadings.length),
            this.wrapper.classList.add("dataTable-empty"),
            this.label && (this.label.innerHTML = ""),
            (this.totalPages = 0),
            this.render("pager"),
            this.clear(a("tr", {html: `<td class="dataTables-empty" colspan="${e}">${t}</td>`}));
          }
          columns(t) {
            return new l(this, t);
          }
          rows(t) {
            return new h(this, t);
          }
          on(t, e) {
            (this.events = this.events || {}),
            (this.events[t] = this.events[t] || []),
            this.events[t].push(e);
          }
          off(t, e) {
            (this.events = this.events || {}),
            t in this.events != 0 && this.events[t].splice(this.events[t].indexOf(e), 1);
          }
          emit(t) {
            if (((this.events = this.events || {}), t in this.events != 0))
              for (let e = 0; e < this.events[t].length; e++)
                this.events[t][e].apply(this, Array.prototype.slice.call(arguments, 1));
              }
            }
        s.DataTable = u;
      }, {
        "./date-ee454f51.js": 1
      }
    ]
  }, {}, [2])(2);
});
//# sourceMappingURL=/sm/876fa2c01d9b3002453d909fbf5ca67d51633e110f906918de324adea86acc26.map

//# sourceMappingURL=/sm/876fa2c01d9b3002453d909fbf5ca67d51633e110f906918de324adea86acc26.map

//# sourceMappingURL=/sm/876fa2c01d9b3002453d909fbf5ca67d51633e110f906918de324adea86acc26.map

//# sourceMappingURL=/sm/876fa2c01d9b3002453d909fbf5ca67d51633e110f906918de324adea86acc26.map
