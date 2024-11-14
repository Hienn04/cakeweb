/*! lazysizes - v4.1.4 */
!function(a,b){var c=b(a,a.document);a.lazySizes=c,"object"==typeof module&&module.exports&&(module.exports=c)}(window,function(a,b){"use strict";if(b.getElementsByClassName){var c,d,e=b.documentElement,f=a.Date,g=a.HTMLPictureElement,h="addEventListener",i="getAttribute",j=a[h],k=a.setTimeout,l=a.requestAnimationFrame||k,m=a.requestIdleCallback,n=/^picture$/i,o=["load","error","lazyincluded","_lazyloaded"],p={},q=Array.prototype.forEach,r=function(a,b){return p[b]||(p[b]=new RegExp("(\\s|^)"+b+"(\\s|$)")),p[b].test(a[i]("class")||"")&&p[b]},s=function(a,b){r(a,b)||a.setAttribute("class",(a[i]("class")||"").trim()+" "+b)},t=function(a,b){var c;(c=r(a,b))&&a.setAttribute("class",(a[i]("class")||"").replace(c," "))},u=function(a,b,c){var d=c?h:"removeEventListener";c&&u(a,b),o.forEach(function(c){a[d](c,b)})},v=function(a,d,e,f,g){var h=b.createEvent("Event");return e||(e={}),e.instance=c,h.initEvent(d,!f,!g),h.detail=e,a.dispatchEvent(h),h},w=function(b,c){var e;!g&&(e=a.picturefill||d.pf)?(c&&c.src&&!b[i]("srcset")&&b.setAttribute("srcset",c.src),e({reevaluate:!0,elements:[b]})):c&&c.src&&(b.src=c.src)},x=function(a,b){return(getComputedStyle(a,null)||{})[b]},y=function(a,b,c){for(c=c||a.offsetWidth;c<d.minSize&&b&&!a._lazysizesWidth;)c=b.offsetWidth,b=b.parentNode;return c},z=function(){var a,c,d=[],e=[],f=d,g=function(){var b=f;for(f=d.length?e:d,a=!0,c=!1;b.length;)b.shift()();a=!1},h=function(d,e){a&&!e?d.apply(this,arguments):(f.push(d),c||(c=!0,(b.hidden?k:l)(g)))};return h._lsFlush=g,h}(),A=function(a,b){return b?function(){z(a)}:function(){var b=this,c=arguments;z(function(){a.apply(b,c)})}},B=function(a){var b,c=0,e=d.throttleDelay,g=d.ricTimeout,h=function(){b=!1,c=f.now(),a()},i=m&&g>49?function(){m(h,{timeout:g}),g!==d.ricTimeout&&(g=d.ricTimeout)}:A(function(){k(h)},!0);return function(a){var d;(a=a===!0)&&(g=33),b||(b=!0,d=e-(f.now()-c),0>d&&(d=0),a||9>d?i():k(i,d))}},C=function(a){var b,c,d=99,e=function(){b=null,a()},g=function(){var a=f.now()-c;d>a?k(g,d-a):(m||e)(e)};return function(){c=f.now(),b||(b=k(g,d))}};!function(){var b,c={lazyClass:"lazyload",loadedClass:"lazyloaded",loadingClass:"lazyloading",preloadClass:"lazypreload",errorClass:"lazyerror",autosizesClass:"lazyautosizes",srcAttr:"data-src",srcsetAttr:"data-srcset",sizesAttr:"data-sizes",minSize:40,customMedia:{},init:!0,expFactor:1.5,hFac:.8,loadMode:2,loadHidden:!0,ricTimeout:0,throttleDelay:125};d=a.lazySizesConfig||a.lazysizesConfig||{};for(b in c)b in d||(d[b]=c[b]);a.lazySizesConfig=d,k(function(){d.init&&F()})}();var D=function(){var g,l,m,o,p,y,D,F,G,H,I,J,K,L,M=/^img$/i,N=/^iframe$/i,O="onscroll"in a&&!/(gle|ing)bot/.test(navigator.userAgent),P=0,Q=0,R=0,S=-1,T=function(a){R--,a&&a.target&&u(a.target,T),(!a||0>R||!a.target)&&(R=0)},U=function(a,c){var d,f=a,g="hidden"==x(b.body,"visibility")||"hidden"!=x(a.parentNode,"visibility")&&"hidden"!=x(a,"visibility");for(F-=c,I+=c,G-=c,H+=c;g&&(f=f.offsetParent)&&f!=b.body&&f!=e;)g=(x(f,"opacity")||1)>0,g&&"visible"!=x(f,"overflow")&&(d=f.getBoundingClientRect(),g=H>d.left&&G<d.right&&I>d.top-1&&F<d.bottom+1);return g},V=function(){var a,f,h,j,k,m,n,p,q,r=c.elements;if((o=d.loadMode)&&8>R&&(a=r.length)){f=0,S++,null==K&&("expand"in d||(d.expand=e.clientHeight>500&&e.clientWidth>500?500:370),J=d.expand,K=J*d.expFactor),K>Q&&1>R&&S>2&&o>2&&!b.hidden?(Q=K,S=0):Q=o>1&&S>1&&6>R?J:P;for(;a>f;f++)if(r[f]&&!r[f]._lazyRace)if(O)if((p=r[f][i]("data-expand"))&&(m=1*p)||(m=Q),q!==m&&(y=innerWidth+m*L,D=innerHeight+m,n=-1*m,q=m),h=r[f].getBoundingClientRect(),(I=h.bottom)>=n&&(F=h.top)<=D&&(H=h.right)>=n*L&&(G=h.left)<=y&&(I||H||G||F)&&(d.loadHidden||"hidden"!=x(r[f],"visibility"))&&(l&&3>R&&!p&&(3>o||4>S)||U(r[f],m))){if(ba(r[f]),k=!0,R>9)break}else!k&&l&&!j&&4>R&&4>S&&o>2&&(g[0]||d.preloadAfterLoad)&&(g[0]||!p&&(I||H||G||F||"auto"!=r[f][i](d.sizesAttr)))&&(j=g[0]||r[f]);else ba(r[f]);j&&!k&&ba(j)}},W=B(V),X=function(a){s(a.target,d.loadedClass),t(a.target,d.loadingClass),u(a.target,Z),v(a.target,"lazyloaded")},Y=A(X),Z=function(a){Y({target:a.target})},$=function(a,b){try{a.contentWindow.location.replace(b)}catch(c){a.src=b}},_=function(a){var b,c=a[i](d.srcsetAttr);(b=d.customMedia[a[i]("data-media")||a[i]("media")])&&a.setAttribute("media",b),c&&a.setAttribute("srcset",c)},aa=A(function(a,b,c,e,f){var g,h,j,l,o,p;(o=v(a,"lazybeforeunveil",b)).defaultPrevented||(e&&(c?s(a,d.autosizesClass):a.setAttribute("sizes",e)),h=a[i](d.srcsetAttr),g=a[i](d.srcAttr),f&&(j=a.parentNode,l=j&&n.test(j.nodeName||"")),p=b.firesLoad||"src"in a&&(h||g||l),o={target:a},p&&(u(a,T,!0),clearTimeout(m),m=k(T,2500),s(a,d.loadingClass),u(a,Z,!0)),l&&q.call(j.getElementsByTagName("source"),_),h?a.setAttribute("srcset",h):g&&!l&&(N.test(a.nodeName)?$(a,g):a.src=g),f&&(h||l)&&w(a,{src:g})),a._lazyRace&&delete a._lazyRace,t(a,d.lazyClass),z(function(){(!p||a.complete&&a.naturalWidth>1)&&(p?T(o):R--,X(o))},!0)}),ba=function(a){var b,c=M.test(a.nodeName),e=c&&(a[i](d.sizesAttr)||a[i]("sizes")),f="auto"==e;(!f&&l||!c||!a[i]("src")&&!a.srcset||a.complete||r(a,d.errorClass)||!r(a,d.lazyClass))&&(b=v(a,"lazyunveilread").detail,f&&E.updateElem(a,!0,a.offsetWidth),a._lazyRace=!0,R++,aa(a,b,f,e,c))},ca=function(){if(!l){if(f.now()-p<999)return void k(ca,999);var a=C(function(){d.loadMode=3,W()});l=!0,d.loadMode=3,W(),j("scroll",function(){3==d.loadMode&&(d.loadMode=2),a()},!0)}};return{_:function(){p=f.now(),c.elements=b.getElementsByClassName(d.lazyClass),g=b.getElementsByClassName(d.lazyClass+" "+d.preloadClass),L=d.hFac,j("scroll",W,!0),j("resize",W,!0),a.MutationObserver?new MutationObserver(W).observe(e,{childList:!0,subtree:!0,attributes:!0}):(e[h]("DOMNodeInserted",W,!0),e[h]("DOMAttrModified",W,!0),setInterval(W,999)),j("hashchange",W,!0),["focus","mouseover","click","load","transitionend","animationend","webkitAnimationEnd"].forEach(function(a){b[h](a,W,!0)}),/d$|^c/.test(b.readyState)?ca():(j("load",ca),b[h]("DOMContentLoaded",W),k(ca,2e4)),c.elements.length?(V(),z._lsFlush()):W()},checkElems:W,unveil:ba}}(),E=function(){var a,c=A(function(a,b,c,d){var e,f,g;if(a._lazysizesWidth=d,d+="px",a.setAttribute("sizes",d),n.test(b.nodeName||""))for(e=b.getElementsByTagName("source"),f=0,g=e.length;g>f;f++)e[f].setAttribute("sizes",d);c.detail.dataAttr||w(a,c.detail)}),e=function(a,b,d){var e,f=a.parentNode;f&&(d=y(a,f,d),e=v(a,"lazybeforesizes",{width:d,dataAttr:!!b}),e.defaultPrevented||(d=e.detail.width,d&&d!==a._lazysizesWidth&&c(a,f,e,d)))},f=function(){var b,c=a.length;if(c)for(b=0;c>b;b++)e(a[b])},g=C(f);return{_:function(){a=b.getElementsByClassName(d.autosizesClass),j("resize",g)},checkElems:g,updateElem:e}}(),F=function(){F.i||(F.i=!0,E._(),D._())};return c={cfg:d,autoSizer:E,loader:D,init:F,uP:w,aC:s,rC:t,hC:r,fire:v,gW:y,rAF:z}}});
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
  typeof define === 'function' && define.amd ? define(['exports'], factory) :
  (factory((global.ElasticAppSearch = {})));
}(this, (function (exports) { 'use strict';

  var classCallCheck = function (instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  };

  var createClass = function () {
    function defineProperties(target, props) {
      for (var i = 0; i < props.length; i++) {
        var descriptor = props[i];
        descriptor.enumerable = descriptor.enumerable || false;
        descriptor.configurable = true;
        if ("value" in descriptor) descriptor.writable = true;
        Object.defineProperty(target, descriptor.key, descriptor);
      }
    }

    return function (Constructor, protoProps, staticProps) {
      if (protoProps) defineProperties(Constructor.prototype, protoProps);
      if (staticProps) defineProperties(Constructor, staticProps);
      return Constructor;
    };
  }();

  var defineProperty = function (obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  };

  var _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  var objectWithoutProperties = function (obj, keys) {
    var target = {};

    for (var i in obj) {
      if (keys.indexOf(i) >= 0) continue;
      if (!Object.prototype.hasOwnProperty.call(obj, i)) continue;
      target[i] = obj[i];
    }

    return target;
  };

  var slicedToArray = function () {
    function sliceIterator(arr, i) {
      var _arr = [];
      var _n = true;
      var _d = false;
      var _e = undefined;

      try {
        for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
          _arr.push(_s.value);

          if (i && _arr.length === i) break;
        }
      } catch (err) {
        _d = true;
        _e = err;
      } finally {
        try {
          if (!_n && _i["return"]) _i["return"]();
        } finally {
          if (_d) throw _e;
        }
      }

      return _arr;
    }

    return function (arr, i) {
      if (Array.isArray(arr)) {
        return arr;
      } else if (Symbol.iterator in Object(arr)) {
        return sliceIterator(arr, i);
      } else {
        throw new TypeError("Invalid attempt to destructure non-iterable instance");
      }
    };
  }();

  var toArray = function (arr) {
    return Array.isArray(arr) ? arr : Array.from(arr);
  };

  var toConsumableArray = function (arr) {
    if (Array.isArray(arr)) {
      for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) arr2[i] = arr[i];

      return arr2;
    } else {
      return Array.from(arr);
    }
  };

  /**
   * An individual search result
   */

  var ResultItem = function () {
    function ResultItem(data) {
      classCallCheck(this, ResultItem);

      if (data._group && data._group.length > 0) {
        data = _extends({}, data, {
          _group: data._group.map(function (nestedData) {
            return new ResultItem(nestedData);
          })
        });
      }
      this.data = data;
    }

    /**
     * Return the HTML-unsafe raw value for a field, if it exists
     *
     * @param {String} key - name of the field
     *
     * @returns {any} the raw value of the field
     */


    createClass(ResultItem, [{
      key: "getRaw",
      value: function getRaw(key) {
        return (this.data[key] || {}).raw;
      }

      /**
       * Return the HTML-safe snippet value for a field, if it exists
       *
       * @param {String} key - name of the field
       *
       * @returns {any} the snippet value of the field
       */

    }, {
      key: "getSnippet",
      value: function getSnippet(key) {
        return (this.data[key] || {}).snippet;
      }
    }]);
    return ResultItem;
  }();

  /**
   * A list of ResultItems and additional information returned by a search request
   */

  var ResultList = function ResultList(rawResults, rawInfo) {
    classCallCheck(this, ResultList);

    this.rawResults = rawResults;
    this.rawInfo = rawInfo;

    var results = new Array();
    rawResults.forEach(function (data) {
      results.push(new ResultItem(data));
    });

    this.results = results;
    this.info = rawInfo;
  };

  /**
   * A helper for working with the JSON structure which represent
   * filters in API requests.
   */
  var Filters = function () {
    function Filters() {
      var filtersJSON = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
      classCallCheck(this, Filters);

      this.filtersJSON = filtersJSON;
    }

    createClass(Filters, [{
      key: "removeFilter",
      value: function removeFilter(filterKey) {
        var filtersMap = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : this.filtersJSON;

        function go(filterKey, filtersMap) {
          var filtered = Object.entries(filtersMap).reduce(function (acc, _ref) {
            var _ref2 = slicedToArray(_ref, 2),
                filterName = _ref2[0],
                filterValue = _ref2[1];

            if (filterName === filterKey) {
              return acc;
            }

            if (["all", "any", "none"].includes(filterName)) {
              var nestedFiltersArray = filterValue;
              filterValue = nestedFiltersArray.reduce(function (acc, nestedFiltersMap) {
                var updatedNestedFiltersMap = go(filterKey, nestedFiltersMap);
                if (updatedNestedFiltersMap) {
                  return acc.concat(updatedNestedFiltersMap);
                } else {
                  return acc;
                }
              }, []);
            }

            return _extends({}, acc, defineProperty({}, filterName, filterValue));
          }, {});

          if (Object.keys(filtered).length === 0) {
            return;
          }
          return filtered;
        }

        var filtered = go(filterKey, filtersMap);
        return new Filters(filtered);
      }
    }, {
      key: "getListOfAppliedFilters",
      value: function getListOfAppliedFilters() {
        var _this = this;

        var filters = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.filtersJSON;

        var set$$1 = Object.entries(filters).reduce(function (acc, _ref3) {
          var _ref4 = slicedToArray(_ref3, 2),
              key = _ref4[0],
              value = _ref4[1];

          if (!["all", "any", "none"].includes(key)) {
            acc.add(key);
          } else {
            value.forEach(function (nestedValue) {
              Object.keys(nestedValue).forEach(function (nestedKey) {
                if (!["all", "any", "none"].includes(nestedKey)) {
                  acc.add(nestedKey);
                } else {
                  acc = new Set([].concat(toConsumableArray(acc), toConsumableArray(_this.getListOfAppliedFilters(nestedValue))));
                }
              });
            });
          }
          return acc;
        }, new Set());

        return Array.from(set$$1.values());
      }
    }]);
    return Filters;
  }();

  var version = "8.7.0";

  var QueryCache = function () {
    function QueryCache() {
      classCallCheck(this, QueryCache);

      this.cache = {};
    }

    createClass(QueryCache, [{
      key: "getKey",
      value: function getKey(method, url, params) {
        return method + url + JSON.stringify(params);
      }
    }, {
      key: "store",
      value: function store(key, response) {
        this.cache[key] = response;
      }
    }, {
      key: "retrieve",
      value: function retrieve(key) {
        return this.cache[key];
      }
    }]);
    return QueryCache;
  }();

  var cache = new QueryCache();

  function request(searchKey, apiEndpoint, path, params, cacheResponses) {
    var _ref = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : {},
        additionalHeaders = _ref.additionalHeaders;

    var method = "POST";
    var key = cache.getKey(method, apiEndpoint + path, params);
    if (cacheResponses) {
      var cachedResult = cache.retrieve(key);
      if (cachedResult) {
        return Promise.resolve(cachedResult);
      }
    }

    return _request(method, searchKey, apiEndpoint, path, params, {
      additionalHeaders: additionalHeaders
    }).then(function (response) {
      return response.json().then(function (json) {
        var result = { response: response, json: json };
        if (cacheResponses) cache.store(key, result);
        return result;
      }).catch(function () {
        return { response: response, json: {} };
      });
    });
  }

  function _request(method, searchKey, apiEndpoint, path, params) {
    var _ref2 = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : {},
        additionalHeaders = _ref2.additionalHeaders;

    var jsVersion = typeof window !== "undefined" ? "browser" : process.version;
    var metaHeader = "ent=" + version + "-legacy,js=" + jsVersion + ",t=" + version + "-legacy,ft=universal";
    var headers = new Headers(_extends({}, searchKey && { Authorization: "Bearer " + searchKey }, {
      "Content-Type": "application/json",
      "X-Swiftype-Client": "elastic-app-search-javascript",
      "X-Swiftype-Client-Version": version,
      "x-elastic-client-meta": metaHeader
    }, additionalHeaders));

    return fetch("" + apiEndpoint + path, {
      method: method,
      headers: headers,
      body: JSON.stringify(params),
      credentials: "include"
    });
  }

  var SEARCH_TYPES = {
    SEARCH: "SEARCH",
    MULTI_SEARCH: "MULTI_SEARCH"
  };

  /**
   * Omit a single key from an object
   */
  function omit(obj, keyToOmit) {
    if (!obj) return;
    var _ = obj[keyToOmit],
        rest = objectWithoutProperties(obj, [keyToOmit]);

    return rest;
  }

  function flatten(arrayOfArrays) {
    return [].concat.apply([], arrayOfArrays);
  }

  function formatResultsJSON(json) {
    return new ResultList(json.results, omit(json, "results"));
  }

  function handleErrorResponse(_ref) {
    var response = _ref.response,
        json = _ref.json;

    if (!response.ok) {
      var message = Array.isArray(json) ? " " + flatten(json.map(function (response) {
        return response.errors;
      })).join(", ") : "" + (json.errors ? " " + json.errors : "");
      throw new Error("[" + response.status + "]" + message);
    }
    return json;
  }

  var Client = function () {
    function Client(hostIdentifier, searchKey, engineName) {
      var _ref2 = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : {},
          _ref2$endpointBase = _ref2.endpointBase,
          endpointBase = _ref2$endpointBase === undefined ? "" : _ref2$endpointBase,
          _ref2$cacheResponses = _ref2.cacheResponses,
          cacheResponses = _ref2$cacheResponses === undefined ? true : _ref2$cacheResponses,
          additionalHeaders = _ref2.additionalHeaders;

      classCallCheck(this, Client);

      this.additionalHeaders = additionalHeaders;
      this.searchKey = searchKey;
      this.cacheResponses = cacheResponses;
      this.engineName = engineName;
      this.apiEndpoint = endpointBase ? endpointBase + "/api/as/v1/" : "https://" + hostIdentifier + ".api.swiftype.com/api/as/v1/";
      this.searchPath = "engines/" + this.engineName + "/search";
      this.multiSearchPath = "engines/" + this.engineName + "/multi_search";
      this.querySuggestionPath = "engines/" + this.engineName + "/query_suggestion";
      this.clickPath = "engines/" + this.engineName + "/click";
    }

    /**
     * Sends a query suggestion request to the Elastic App Search Api
     *
     * @param {String} query String that is used to perform a query suggest.
     * @param {Object} options Object used for configuring the query suggest, like 'types' or 'size'
     * @returns {Promise<ResultList>} a Promise that returns results, otherwise throws an Error.
     */


    createClass(Client, [{
      key: "querySuggestion",
      value: function querySuggestion(query) {
        var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

        var params = Object.assign({ query: query }, options);

        return request(this.searchKey, this.apiEndpoint, this.querySuggestionPath, params, this.cacheResponses, { additionalHeaders: this.additionalHeaders }).then(handleErrorResponse);
      }

      /**
       * Sends a search request to the Elastic App Search Api
       *
       * @param {String} query String, Query, or Object that is used to perform a search request.
       * @param {Object} options Object used for configuring the search like search_fields and result_fields
       * @returns {Promise<ResultList>} a Promise that returns a {ResultList} when resolved, otherwise throws an Error.
       */

    }, {
      key: "search",
      value: function search(query) {
        var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
        var disjunctiveFacets = options.disjunctiveFacets,
            disjunctiveFacetsAnalyticsTags = options.disjunctiveFacetsAnalyticsTags,
            validOptions = objectWithoutProperties(options, ["disjunctiveFacets", "disjunctiveFacetsAnalyticsTags"]);


        var params = Object.assign({ query: query }, validOptions);

        if (disjunctiveFacets && disjunctiveFacets.length > 0) {
          return this._performDisjunctiveSearch(params, disjunctiveFacets, disjunctiveFacetsAnalyticsTags).then(formatResultsJSON);
        }
        return this._performSearch(params).then(formatResultsJSON);
      }

      /**
       * Sends multiple search requests to the Elastic App Search Api, using the
       * "multi_search" endpoint
       *
       * @param {Array[Object]} searches searches to send, valid keys are:
       * - query: String
       * - options: Object (optional)
       * @returns {Promise<[ResultList]>} a Promise that returns an array of {ResultList} when resolved, otherwise throws an Error.
       */

    }, {
      key: "multiSearch",
      value: function multiSearch(searches) {
        var params = searches.map(function (search) {
          return _extends({
            query: search.query
          }, search.options || {});
        });

        return this._performSearch({ queries: params }, SEARCH_TYPES.MULTI_SEARCH).then(function (responses) {
          return responses.map(formatResultsJSON);
        });
      }

      /*
       * A disjunctive search, as opposed to a regular search is used any time
       * a `disjunctiveFacet` option is provided to the `search` method. A
       * a disjunctive facet requires multiple API calls.
       *
       * Typically:
       *
       * 1 API call to get the base results
       * 1 additional API call to get the "disjunctive" facet counts for each
       * facet configured as "disjunctive".
       *
       * The additional API calls are required, because a "disjunctive" facet
       * is one where we want the counts for a facet as if there is no filter applied
       * to a particular field.
       *
       * After all queries are performed, we merge the facet values on the
       * additional requests into the facet values of the original request, thus
       * creating a single response with the disjunctive facet values.
       */

    }, {
      key: "_performDisjunctiveSearch",
      value: function _performDisjunctiveSearch(params, disjunctiveFacets) {
        var _this = this;

        var disjunctiveFacetsAnalyticsTags = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : ["Facet-Only"];

        var baseQueryPromise = this._performSearch(params);

        var filters = new Filters(params.filters);
        var appliedFilers = filters.getListOfAppliedFilters();
        var listOfAppliedDisjunctiveFilters = appliedFilers.filter(function (filter) {
          return disjunctiveFacets.includes(filter);
        });

        if (!listOfAppliedDisjunctiveFilters.length) {
          return baseQueryPromise;
        }

        var page = params.page || {};

        // We intentionally drop passed analytics tags here so that we don't get
        // double counted search analytics in the dashboard from disjunctive
        // calls
        var analytics = params.analytics || {};
        analytics.tags = disjunctiveFacetsAnalyticsTags;

        var disjunctiveQueriesPromises = listOfAppliedDisjunctiveFilters.map(function (appliedDisjunctiveFilter) {
          return _this._performSearch(_extends({}, params, {
            filters: filters.removeFilter(appliedDisjunctiveFilter).filtersJSON,
            record_analytics: false,
            page: _extends({}, page, {
              // Set this to 0 for performance, since disjunctive queries
              // don't need results
              size: 0
            }),
            analytics: analytics,
            facets: defineProperty({}, appliedDisjunctiveFilter, params.facets[appliedDisjunctiveFilter])
          }));
        });

        return Promise.all([baseQueryPromise].concat(toConsumableArray(disjunctiveQueriesPromises))).then(function (_ref3) {
          var _ref4 = toArray(_ref3),
              baseQueryResults = _ref4[0],
              disjunctiveQueries = _ref4.slice(1);

          disjunctiveQueries.forEach(function (disjunctiveQueryResults) {
            var _Object$entries$ = slicedToArray(Object.entries(disjunctiveQueryResults.facets)[0], 2),
                facetName = _Object$entries$[0],
                facetValue = _Object$entries$[1];

            baseQueryResults.facets[facetName] = facetValue;
          });
          return baseQueryResults;
        });
      }
    }, {
      key: "_performSearch",
      value: function _performSearch(params) {
        var searchType = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : SEARCH_TYPES.SEARCH;

        var searchPath = searchType === SEARCH_TYPES.MULTI_SEARCH ? this.multiSearchPath : this.searchPath;
        return request(this.searchKey, this.apiEndpoint, searchPath + ".json", params, this.cacheResponses, { additionalHeaders: this.additionalHeaders }).then(handleErrorResponse);
      }

      /**
       * Sends a click event to the Elastic App Search Api, to track a click-through event
       *
       * @param {String} query Query that was used to perform the search request
       * @param {String} documentId ID of the document that was clicked
       * @param {String} requestId Request_id from search response
       * @param {String[]} tags Tags to categorize this request in the Dashboard
       * @returns {Promise} An empty Promise, otherwise throws an Error.
       */

    }, {
      key: "click",
      value: function click(_ref5) {
        var query = _ref5.query,
            documentId = _ref5.documentId,
            requestId = _ref5.requestId,
            _ref5$tags = _ref5.tags,
            tags = _ref5$tags === undefined ? [] : _ref5$tags;

        var params = {
          query: query,
          document_id: documentId,
          request_id: requestId,
          tags: tags
        };

        return request(this.searchKey, this.apiEndpoint, this.clickPath + ".json", params, this.cacheResponses, { additionalHeaders: this.additionalHeaders }).then(handleErrorResponse);
      }
    }]);
    return Client;
  }();

  function createClient(_ref) {
    var hostIdentifier = _ref.hostIdentifier,
        accountHostKey = _ref.accountHostKey,
        apiKey = _ref.apiKey,
        searchKey = _ref.searchKey,
        engineName = _ref.engineName,
        endpointBase = _ref.endpointBase,
        cacheResponses = _ref.cacheResponses,
        additionalHeaders = _ref.additionalHeaders;

    hostIdentifier = hostIdentifier || accountHostKey; // accountHostKey is deprecated
    searchKey = searchKey || apiKey; //apiKey is deprecated
    return new Client(hostIdentifier, searchKey, engineName, {
      endpointBase: endpointBase,
      cacheResponses: cacheResponses,
      additionalHeaders: additionalHeaders
    });
  }

  exports.createClient = createClient;

  Object.defineProperty(exports, '__esModule', { value: true });

})));
