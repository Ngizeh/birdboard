(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Layouts/AppComponent.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Layouts/AppComponent.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'AppComponent',
  computed: {
    username: function username() {
      return this.$page.props.auth;
    },
    canLogin: function canLogin() {
      return this.$page.props.canLogin;
    },
    canRegister: function canRegister() {
      return this.$page.props.canRegister;
    },
    guest: function guest() {
      return this.$page.props.guest;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CardComponent.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Components/CardComponent.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'CardComponent',
  props: {
    project: Object
  },
  methods: {
    deletePost: function deletePost() {
      this.$inertia["delete"](this.route('projects.destroy', this.project.id));
    }
  },
  computed: {
    can: function can() {
      return this.$page.props.auth.id === this.project.owner_id;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Layouts/AppComponent.vue?vue&type=template&id=b8314340&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Layouts/AppComponent.vue?vue&type=template&id=b8314340& ***!
  \************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "bg-gray-100", attrs: { id: "app" } }, [
    _c("nav", { staticClass: "bg-white py-4" }, [
      _c("div", { staticClass: "container mx-auto" }, [
        _c("div", { staticClass: "flex justify-between py-4 items-center" }, [
          _c("a", { staticClass: "navbar-brand", attrs: { href: "/" } }, [
            _vm._v("\n                    Birdboard\n                    ")
          ]),
          _vm._v(" "),
          _c("ul", { staticClass: "pl-6 mr-auto" }, [
            _c(
              "li",
              [
                _c("inertia-link", { attrs: { href: "/projects" } }, [
                  _vm._v("Projects")
                ])
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("div", { attrs: { id: "navbarSupportedContent" } }, [
            _c("ul", { staticClass: "navbar-nav mr-auto" }),
            _vm._v(" "),
            _c(
              "ul",
              { staticClass: "navbar-nav ml-auto flex space-x-6" },
              [
                _vm.guest
                  ? [
                      _c(
                        "li",
                        { staticClass: "nav-item" },
                        [
                          _c(
                            "inertia-link",
                            {
                              staticClass: "nav-link",
                              attrs: { href: "/login" }
                            },
                            [_vm._v("Login")]
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _vm.canRegister
                        ? _c(
                            "li",
                            { staticClass: "nav-item" },
                            [
                              _c(
                                "inertia-link",
                                {
                                  staticClass: "nav-link",
                                  attrs: { href: "/register" }
                                },
                                [_vm._v("Register")]
                              )
                            ],
                            1
                          )
                        : _vm._e()
                    ]
                  : _c(
                      "li",
                      { staticClass: "nav-item dropdown flex space-x-5" },
                      [
                        _c(
                          "inertia-link",
                          {
                            staticClass: "nav-link dropdown-toggle",
                            attrs: {
                              id: "navbarDropdown",
                              href: "#",
                              role: "button",
                              "data-toggle": "dropdown",
                              "aria-haspopup": "true",
                              "aria-expanded": "false"
                            }
                          },
                          [
                            _vm._v(
                              "\n                                " +
                                _vm._s(_vm.username.name) +
                                "\n                                "
                            ),
                            _c("span", { staticClass: "caret" })
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "dropdown-menu dropdown-menu-right",
                            attrs: { "aria-labelledby": "navbarDropdown" }
                          },
                          [
                            _c(
                              "inertia-link",
                              {
                                attrs: {
                                  href: _vm.route("logout"),
                                  as: "button",
                                  method: "post"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                                    Logout\n                                "
                                )
                              ]
                            )
                          ],
                          1
                        )
                      ],
                      1
                    )
              ],
              2
            )
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _c(
      "main",
      { staticClass: "py-4 container mx-auto" },
      [_vm._t("default")],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CardComponent.vue?vue&type=template&id=6e4da0f2&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Components/CardComponent.vue?vue&type=template&id=6e4da0f2& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "card" }, [
    _c(
      "div",
      { staticClass: "border-l-4 border-blue-300 -ml-5 py-3" },
      [
        _c(
          "inertia-link",
          {
            staticClass: "font-normal text-xl py-4 ml-6",
            attrs: { href: "/projects/" + _vm.project.id }
          },
          [_vm._v("\n            " + _vm._s(_vm.project.title) + "\n        ")]
        )
      ],
      1
    ),
    _vm._v(" "),
    _c("div", { staticClass: "text-gray-400 py-5" }, [
      _vm._v(_vm._s(_vm.project.description))
    ]),
    _vm._v(" "),
    _vm.can
      ? _c("div", { staticClass: "text-right" }, [
          _c(
            "form",
            {
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.deletePost($event)
                }
              }
            },
            [
              _c(
                "button",
                {
                  staticClass:
                    "bg-red-600 py-2 px-6 font-bold text-white rounded",
                  attrs: { type: "submit" }
                },
                [_vm._v("Delete")]
              )
            ]
          )
        ])
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/Layouts/AppComponent.vue":
/*!***********************************************!*\
  !*** ./resources/js/Layouts/AppComponent.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AppComponent_vue_vue_type_template_id_b8314340___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AppComponent.vue?vue&type=template&id=b8314340& */ "./resources/js/Layouts/AppComponent.vue?vue&type=template&id=b8314340&");
/* harmony import */ var _AppComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AppComponent.vue?vue&type=script&lang=js& */ "./resources/js/Layouts/AppComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AppComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AppComponent_vue_vue_type_template_id_b8314340___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AppComponent_vue_vue_type_template_id_b8314340___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null

)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Layouts/AppComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Layouts/AppComponent.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/Layouts/AppComponent.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./AppComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Layouts/AppComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]);

/***/ }),

/***/ "./resources/js/Layouts/AppComponent.vue?vue&type=template&id=b8314340&":
/*!******************************************************************************!*\
  !*** ./resources/js/Layouts/AppComponent.vue?vue&type=template&id=b8314340& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AppComponent_vue_vue_type_template_id_b8314340___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./AppComponent.vue?vue&type=template&id=b8314340& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Layouts/AppComponent.vue?vue&type=template&id=b8314340&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AppComponent_vue_vue_type_template_id_b8314340___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AppComponent_vue_vue_type_template_id_b8314340___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/CardComponent.vue":
/*!***************************************************!*\
  !*** ./resources/js/Components/CardComponent.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CardComponent_vue_vue_type_template_id_6e4da0f2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CardComponent.vue?vue&type=template&id=6e4da0f2& */ "./resources/js/components/CardComponent.vue?vue&type=template&id=6e4da0f2&");
/* harmony import */ var _CardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CardComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/CardComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CardComponent_vue_vue_type_template_id_6e4da0f2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CardComponent_vue_vue_type_template_id_6e4da0f2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null

)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Components/CardComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/CardComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/Components/CardComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./CardComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CardComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]);

/***/ }),

/***/ "./resources/js/components/CardComponent.vue?vue&type=template&id=6e4da0f2&":
/*!**********************************************************************************!*\
  !*** ./resources/js/Components/CardComponent.vue?vue&type=template&id=6e4da0f2& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardComponent_vue_vue_type_template_id_6e4da0f2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./CardComponent.vue?vue&type=template&id=6e4da0f2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/CardComponent.vue?vue&type=template&id=6e4da0f2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardComponent_vue_vue_type_template_id_6e4da0f2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardComponent_vue_vue_type_template_id_6e4da0f2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
