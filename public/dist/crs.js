/**
 * country-region-selector
 * -----------------------
 * 0.5.0
 * @author Ben Keen
 * @repo https://github.com/benkeen/country-region-selector
 * @licence MIT
 */
(function (root, factory) {
  if (typeof define === "function" && define.amd) {
    // AMD. Register as an anonymous module
    define([], factory);
  } else if (typeof exports === "object") {
    // Add try/catch for CommonJS-like environments that support module.exports
    try {
      module.exports = factory(require());
    } catch (err) {
      module.exports = factory();
    }
  } else {
    // browser globals (root is window)
    root.crs = factory(root);
  }
})(this, function () {
  "use strict";

  var _countryClass = "crs-country";
  var _defaultCountryStr = "Select country";
  var _defaultRegionStr = "Select region";
  var _showEmptyCountryOption = true;
  var _showEmptyRegionOption = true;
  var _countries = [];
  var _memoizedIndexes = {};

  // included during grunt build step (run `grunt generate` on the command line)
  //
  var _data = [
    [
      "Andijon viloyati",
      "5",
      " Bo'ston tumani~22| Ulug`nor tumani~41| Paxtaobod tumani~42| Oltinko`l tumani~86| Andijon tumani~87| Baliqchi tumani~88| Buloqboshi tumani~89| Jalaquduq tumani~90| Izboskan tumani~91| Qo`rg`ontepa tumani~92| Asaka tumani~93| Marxamat tumani~94| Shaxrixon tumani~95| Xo`jaobod tumani~96| Andijon~97| Xonobod~98",
    ],
    [
      "Buxoro viloyati",
      "6",
      " Qorako`l tumani~43| Romitan tumani~44| Olot tumani~99| Buxoro tumani~100| Vobkent tumani~101| G`ijduvon tumani~102| Kogon tumani~103| Qorovulbozor tumani~104| Peshku tumani~105| Jondor tumani~106| Shofirkon tumani~107| Buxoro~108| Kogon~109",
    ],
    [
      "Farg`ona viloyati",
      "3",
      " O`zbekiston tumani~30| Oltiariq tumani~31| Uchko`prik tumani~58| Furqat tumani~69| Qo`shtepa tumani~71| Toshloq tumani~80| Dang`ara tumani~82| Bog`dod tumani~185| Buvayda tumani~186| Beshariq tumani~187| Quva tumani~188| Rishton tumani~189| So`x tumani~190| Farg`ona tumani~191| Yozyovon tumani~192| Farg`ona~193| Qo`qon~194| Quvasoy~195| Marg`ilon~196",
    ],
    [
      "Jizzax viloyati",
      "7",
      " Arnasoy tumani~110| Baxmal tumani~111| G`allaorol tumani~112| Sharof Rashidov tumani~113| Do`stlik tumani~114| Zomin tumani~115| Zarbdor tumani~116| Mirzacho`l tumani~117| Zafarobod tumani~118| Paxtakor tumani~119| Forish tumani~120| Yangiobod tumani~121| Jizzax~122",
    ],
    [
      "Namangan viloyati",
      "11",
      " Pop tumani~15| Chust tumani~16| Yangiqo`rg`on tumani~76| Namangan~77| Mingbuloq tumani~153| Kosonsoy tumani~154| Namangan tumani~155| Norin tumani~157| To`raqo`rg`on tumani~158| Uychi tumani~160| Uchqo`rg`on tumani~161| Chortoq tumani~162",
    ],
    [
      "Navoiy viloyati",
      "10",
      " Konimex tumani~142| Qiziltepa tumani~143| Navbahor tumani~144| Karmana tumani~145| Nurota tumani~146| Tomdi tumani~147| Uchquduq tumani~148| Xatirchi tumani~149| Navoiy~151| Zarafshon~152",
    ],
    [
      "Qashqadaryo viloyati",
      "8",
      " G`uzor tumani~123| Dehqonobod tumani~125| Qamashi tumani~126| Qarshi tumani~127| Koson tumani~129| Kitob tumani~131| Mirishkor tumani~132| Muborak tumani~133| Nishon tumani~134| Kasbi tumani~135| Chiroqchi tumani~136| Shahrisabz tumani~138| Yakkabog` tumani~139| Qarshi~140| Shahrisabz~141",
    ],
    [
      "Qoraqalpog`iston Respublikasi",
      "14",
      "Beruniy tumani~17|Qo`ng`irot tumani~18| Nukus tumani~19| Xo`jayli tumani~20| Shumanay tumani~21| Amudaryo tumani~206| Qorao`zak tumani~207| Kegeyli tumani~208| Qanliko`l tumani~209| Mo`ynoq tumani~210| Taxiatosh tumani~211| Taxtako`pir tumani~212| To`rtko`l tumani~213| Chimboy tumani~214| Ellikkala tumani~215|Bo'zatov tumani~217|Nukus~218",
    ],
    [
      "Samarqand viloyati",
      "4",
      " Pastdarg`om tumani~26| Nurobod tumani~27| Jomboy tumani~39| Ishtixon tumani~40| Payariq tumani~52| Paxtachi tumani~54| Samarqand tumani~55| Urgut tumani~56| Tayloq tumani~57| Samarqand~59| Kattaqo`rg`on~60| Oqdaryo tumani~78| Bulung`ur tumani~81| Kattaqo`rg`on tumani~83| Qo`shrabot tumani~84| Narpay tumani~85",
    ],
    [
      "Sirdaryo viloyati",
      "1",
      " Sardoba tumani~25| Xovos tumani~35| Oqoltin tumani~48| Boyovut tumani~49| Sayxunobod tumani~50| Guliston tumani~51| Mirzaobod tumani~70| Sirdaryo tumani~73| Guliston~163| Shirin~164| Yangiyer~165",
    ],
    [
      "Surxandaryo viloyati",
      "2",
      " Bandixon tumani~23| Uzun tumani~24| Muzrabot tumani~28| Qiziriq tumani~29| Sherobod tumani~45| Sho`rchi tumani~46| Termiz~47| Oltinsoy tumani~61| Angor tumani~62| Boysun tumani~63| Denov tumani~64| Jarqo`rg`on tumani~65| Qumqo`rg`on tumani~66| Sariosiyo tumani~67| Termiz tumani~68",
    ],
    [
      "Toshkent shahri",
      "12",
      " Sirg`ali tumani~32| Yakkasaroy tumani~33| Yashnobod tumani~124| Chilonzor tumani~128| Uchtepa tumani~167| Bektemir tumani~168| Yunusobod tumani~169| Mirzo Ulug`bek tumani~170| Mirobod tumani~171| Shayxontoxur tumani~172| Olmazor tumani~173",
    ],
    [
      "Toshkent viloyati",
      "9",
      " Chinoz tumani~36| Yangiyo`l tumani~37| Qibray tumani~38| Chirchiq~74| Yangiyo`l~75| Yuqorichirchiq tumani~79| Oqqo`rg`on tumani~130| Bo`stonliq tumani~137| Bo`ka tumani~150| Zangiota tumani~156| Pskent tumani~159| Ohangaron tumani~174| Bekobod tumani~175| Qiyichirchiq tumani~176| Parkent tumani~177| O`rtachirchiq tumani~178| Toshkent tumani~179| Nurafshon~180| Olmaliq~181| Angren~182| Bekobod~183| Ohangaron~184",
    ],
    [
      "Xorazm viloyati",
      "13",
      " Xiva tumani~34| Bog`ot tumani~53| Urganch tumani~72| Gurlan tumani~197| Qo`shko`pir tumani~198| Xazorasp tumani~199| Xonqa tumani~200| Shovot tumani~201| Yangiariq tumani~202| Yangibozor tumani~203| Urganch~204| Xiva~205| Tuproqqal'a tumani~216",
    ],
  ];

  var _init = function () {
    _countries = _data;

    var countryDropdowns = document.getElementsByClassName(_countryClass);
    for (var i = 0; i < countryDropdowns.length; i++) {
      _populateCountryFields(countryDropdowns[i]);
    }
  };

  var _populateCountryFields = function (countryElement) {
    // ensure the dropdown only gets initialized once
    var loaded = countryElement.getAttribute("data-crs-loaded");
    if (loaded === "true") {
      return;
    }

    countryElement.length = 0;
    var customOptionStr = countryElement.getAttribute("data-default-option");
    var defaultOptionStr = customOptionStr
      ? customOptionStr
      : _defaultCountryStr;
    var showEmptyOption = countryElement.getAttribute(
      "data-show-default-option"
    );
    _showEmptyCountryOption =
      showEmptyOption === null ? true : showEmptyOption === "true";

    var defaultSelectedValue =
      countryElement.getAttribute("data-default-value");
    var customValue = countryElement.getAttribute("data-value");
    var foundIndex = 0;

    if (_showEmptyCountryOption) {
      countryElement.options[0] = new Option(defaultOptionStr, "");
    }

    // parses the region data into a more manageable format
    _initRegions();

    var countries = _getCountries(countryElement);

    console.log(customValue);

    for (var i = 0; i < countries.length; i++) {
      var val =
        customValue === "shortcode" || customValue === "2-char"
          ? countries[i][1]
          : countries[i][0];

      // workaround to allow the preferred countries delimiter have an empty value
      if (countries[i][4]) {
        val = "";
      }
      countryElement.options[countryElement.length] = new Option(
        countries[i][0],
        val
      );

      if (defaultSelectedValue != null && defaultSelectedValue === val) {
        foundIndex = i;
        if (_showEmptyCountryOption) {
          foundIndex++;
        }
      }
    }
    countryElement.selectedIndex = foundIndex;

    var regionID = countryElement.getAttribute("data-region-id");
    if (!regionID) {
      console.error(
        "Missing data-region-id on country-region-selector country field."
      );
      return;
    }

    var regionElement = document.getElementById(regionID);
    if (regionElement) {
      _initRegionField(regionElement);

      countryElement.onchange = function () {
        _populateRegionFields(countryElement, regionElement);
      };

      // if the country dropdown has a default value, populate the region field as well
      if (defaultSelectedValue !== null && countryElement.selectedIndex > 0) {
        _populateRegionFields(countryElement, regionElement);

        var defaultRegionSelectedValue =
          regionElement.getAttribute("data-default-value");
        var useShortcode =
          regionElement.getAttribute("data-value") === "shortcode";
        if (defaultRegionSelectedValue !== null) {
          var index = _showEmptyCountryOption
            ? countryElement.selectedIndex - 1
            : countryElement.selectedIndex;
          var data = countries[index][3];
          _setDefaultRegionValue(
            regionElement,
            data,
            defaultRegionSelectedValue,
            useShortcode
          );
        }
      } else if (_showEmptyCountryOption === false) {
        _populateRegionFields(countryElement, regionElement);
      }
    } else {
      console.error(
        "Region dropdown DOM node with ID " + regionID + " not found."
      );
    }

    countryElement.setAttribute("data-crs-loaded", "true");
  };

  var _initRegionField = function (el) {
    var customOptionStr = el.getAttribute("data-blank-option");
    var defaultOptionStr = customOptionStr ? customOptionStr : "-";
    var showEmptyOption = el.getAttribute("data-show-default-option");
    _showEmptyRegionOption =
      showEmptyOption === null ? true : showEmptyOption === "true";

    el.length = 0;
    if (_showEmptyRegionOption) {
      el.options[0] = new Option(defaultOptionStr, "");
      el.selectedIndex = 0;
    }
  };

  // called for every component instantiation. Before, this used to construct _countries with the appropriate list
  // based on whitelist/blacklist, but that causes problems when there are multiple fields some with/without
  // black/whitelists. Instead, this just memoizes the whitelist/blacklist for quick lookup
  var _getCountrySubset = function (params) {
    var key = params.whitelist + "|" + params.blacklist;
    var i = 0;

    if (!_memoizedIndexes.hasOwnProperty(key)) {
      _memoizedIndexes[key] = [];
      if (params.whitelist) {
        var whitelist = params.whitelist.split(",");
        for (i = 0; i < _data.length; i++) {
          if (whitelist.indexOf(_data[i][1]) !== -1) {
            _memoizedIndexes[key].push(i);
          }
        }
      } else if (params.blacklist) {
        var blacklist = params.blacklist.split(",");
        for (i = 0; i < _data.length; i++) {
          if (blacklist.indexOf(_data[i][1]) === -1) {
            _memoizedIndexes[key].push(i);
          }
        }
      }
    }

    // now return the data in the memoized indexes
    var countries = [];
    for (i = 0; i < _memoizedIndexes[key].length; i++) {
      countries.push(_data[_memoizedIndexes[key][i]]);
    }

    return countries;
  };

  var _initRegions = function () {
    for (var i = 0; i < _countries.length; i++) {
      var regionData = {
        hasShortcodes: /~/.test(_countries[i][2]),
        regions: [],
      };
      var regions = _countries[i][2].split("|");
      for (var j = 0; j < regions.length; j++) {
        var parts = regions[j].split("~");
        regionData.regions.push([parts[0], parts[1]]); // 2nd index will be undefined for regions that don't have shortcodes
      }
      _countries[i][3] = regionData;
    }
  };

  var _setDefaultRegionValue = function (field, data, val, useShortcode) {
    for (var i = 0; i < data.regions.length; i++) {
      var currVal =
        useShortcode && data.hasShortcodes && data.regions[i][1]
          ? data.regions[i][1]
          : data.regions[i][0];
      if (currVal === val) {
        field.selectedIndex = _showEmptyRegionOption ? i + 1 : i;
        break;
      }
    }
  };

  var _populateRegionFields = function (countryElement, regionElement) {
    var selectedCountryIndex = _showEmptyCountryOption
      ? countryElement.selectedIndex - 1
      : countryElement.selectedIndex;

    var customOptionStr = regionElement.getAttribute("data-default-option");
    var displayType = regionElement.getAttribute("data-value");
    var defaultOptionStr = customOptionStr
      ? customOptionStr
      : _defaultRegionStr;

    if (countryElement.value === "") {
      _initRegionField(regionElement);
    } else {
      regionElement.length = 0;
      if (_showEmptyRegionOption) {
        regionElement.options[0] = new Option(defaultOptionStr, "");
      }

      var countries = _getCountries(countryElement);
      var regionData = countries[selectedCountryIndex][3];

      var weWantAndHaveShortCodes =
        displayType === "shortcode" && regionData.hasShortcodes;
      var indexToSort = weWantAndHaveShortCodes ? 1 : 0;
      regionData.regions.sort(function (a, b) {
        var x = a[indexToSort].toLowerCase();
        var y = b[indexToSort].toLowerCase();
        return x < y ? -1 : x > y ? 1 : 0;
      });

      for (var i = 0; i < regionData.regions.length; i++) {
        var val = weWantAndHaveShortCodes
          ? regionData.regions[i][1]
          : regionData.regions[i][0];
        regionElement.options[regionElement.length] = new Option(
          regionData.regions[i][0],
          val
        );
      }
      regionElement.selectedIndex = 0;
    }
  };

  // returns the list of countries for this instance, taking into account black- and whitelists
  var _getCountries = function (countryElement) {
    var whitelist = countryElement.getAttribute("data-whitelist");
    var blacklist = countryElement.getAttribute("data-blacklist");
    var preferred = countryElement.getAttribute("data-preferred");
    var preferredDelim = countryElement.getAttribute("data-preferred-delim");

    var countries = _countries;
    if (whitelist || blacklist) {
      countries = _getCountrySubset({
        whitelist: whitelist,
        blacklist: blacklist,
      });
    }

    if (preferred) {
      countries = _applyPreferredCountries(
        countries,
        preferred,
        preferredDelim
      );
    }

    return countries;
  };

  // in 0.5.0 we added the option for "preferred" countries that get listed first. This just causes the preferred
  // countries to get listed at the top of the list with an optional delimiter row following them
  var _applyPreferredCountries = function (
    countries,
    preferred,
    preferredDelim
  ) {
    var preferredShortCodes = preferred.split(",").reverse();
    var preferredMap = {};
    var foundPreferred = false;

    var updatedCountries = countries.filter(function (c) {
      if (preferredShortCodes.indexOf(c[1]) !== -1) {
        preferredMap[c[1]] = c;
        foundPreferred = true;
        return false;
      }
      return true;
    });

    if (foundPreferred && preferredDelim) {
      updatedCountries.unshift([preferredDelim, "", "", {}, true]);
    }

    // now prepend the preferred countries
    for (var i = 0; i < preferredShortCodes.length; i++) {
      var code = preferredShortCodes[i];
      updatedCountries.unshift(preferredMap[code]);
    }

    return updatedCountries;
  };

  /*!
   * contentloaded.js
   *
   * Author: Diego Perini (diego.perini at gmail.com)
   * Summary: cross-browser wrapper for DOMContentLoaded
   * Updated: 20101020
   * License: MIT
   * Version: 1.2
   *
   * URL:
   * http://javascript.nwbox.com/ContentLoaded/
   * http://javascript.nwbox.com/ContentLoaded/MIT-LICENSE
   *
   */

  // @win window reference
  // @fn function reference
  var _contentLoaded = function (win, fn) {
    var done = false,
      top = true,
      doc = win.document,
      root = doc.documentElement,
      add = doc.addEventListener ? "addEventListener" : "attachEvent",
      rem = doc.addEventListener ? "removeEventListener" : "detachEvent",
      pre = doc.addEventListener ? "" : "on",
      init = function (e) {
        if (e.type == "readystatechange" && doc.readyState != "complete")
          return;
        (e.type == "load" ? win : doc)[rem](pre + e.type, init, false);
        if (!done && (done = true)) fn.call(win, e.type || e);
      },
      poll = function () {
        try {
          root.doScroll("left");
        } catch (e) {
          setTimeout(poll, 50);
          return;
        }
        init("poll");
      };

    if (doc.readyState == "complete") fn.call(win, "lazy");
    else {
      if (doc.createEventObject && root.doScroll) {
        try {
          top = !win.frameElement;
        } catch (e) {}
        if (top) poll();
      }
      doc[add](pre + "DOMContentLoaded", init, false);
      doc[add](pre + "readystatechange", init, false);
      win[add](pre + "load", init, false);
    }
  };

  // when the page has loaded, run our init function
  _contentLoaded(window, _init);

  // exposed to allow re-initialization for dynamic environments
  return {
    init: _init,
  };
});
