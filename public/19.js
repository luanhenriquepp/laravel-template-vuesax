(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[19],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SupplierForm__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SupplierForm */ "./resources/js/src/views/pages/Suppliers/SupplierForm.vue");
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
  name: "SupplierCreate",
  components: {
    SupplierForm: _SupplierForm__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      visible: true,
      title: this.$route.meta.title || '',
      data: '',
      modalMessage: false,
      modalMessageData: '',
      modalErrorMessage: false,
      modalErrorData: '',
      uuid: this.$route.params.uuid,
      subtitle: '',
      errors: {}
    };
  },
  watch: {
    modalMessage: function modalMessage(val, newVal) {
      var vm = this;

      if (!val) {
        vm.goTo('/suppliers');
      }
    }
  },
  methods: {
    update: function update(data) {
      this.data = data;
    },
    save: function save() {
      var _this = this;

      axios.post('/api/v1/suppliers/', this.data).then(function (response) {
        _this.modalMessage = true;
        _this.modalMessageData = response.data.data;
      })["catch"](function (error) {
        _this.modalErrorMessage = true;
        _this.modalErrorData = error.response.data.data || error.response.data.message;
        var result = {};
        Object.keys(error.response.data.errors).filter(function (item) {
          result[item] = error.response.data.errors[item][0];
        });
        _this.errors = result;
      });
    },
    goTo: function goTo(url) {
      this.$router.push(url);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    [
      _c("h4", { staticClass: "title-page" }, [_vm._v(_vm._s(_vm.title))]),
      _vm._v(" "),
      _c("div", { staticClass: "card w-full mh-100" }, [
        _vm.visible
          ? _c(
              "div",
              { staticClass: "card-body" },
              [
                _c("h5", { staticClass: "card-title" }, [
                  _vm._v(_vm._s(_vm.subtitle))
                ]),
                _vm._v(" "),
                _c("vs-divider"),
                _vm._v(" "),
                _c("supplier-form", {
                  attrs: { errors: _vm.errors },
                  on: { update: _vm.update },
                  scopedSlots: _vm._u(
                    [
                      {
                        key: "buttons",
                        fn: function() {
                          return [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-primary",
                                attrs: { type: "submit" },
                                on: { click: _vm.save }
                              },
                              [_vm._v("Salvar")]
                            ),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-danger",
                                attrs: { type: "submit" },
                                on: {
                                  click: function($event) {
                                    return _vm.goTo("/suppliers")
                                  }
                                }
                              },
                              [_vm._v("Cancelar")]
                            )
                          ]
                        },
                        proxy: true
                      }
                    ],
                    null,
                    false,
                    3070245565
                  )
                })
              ],
              1
            )
          : _vm._e()
      ]),
      _vm._v(" "),
      _c(
        "vs-popup",
        {
          attrs: { title: "Aviso", active: _vm.modalMessage },
          on: {
            "update:active": function($event) {
              _vm.modalMessage = $event
            }
          }
        },
        [_c("p", [_vm._v(_vm._s(_vm.modalMessageData))])]
      ),
      _vm._v(" "),
      _c(
        "vs-popup",
        {
          attrs: { title: "Erro", active: _vm.modalErrorMessage },
          on: {
            "update:active": function($event) {
              _vm.modalErrorMessage = $event
            }
          }
        },
        [_c("p", [_vm._v(_vm._s(_vm.modalErrorData))])]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/pages/Suppliers/SupplierCreate.vue":
/*!*******************************************************************!*\
  !*** ./resources/js/src/views/pages/Suppliers/SupplierCreate.vue ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SupplierCreate_vue_vue_type_template_id_0c94e5f6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true& */ "./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true&");
/* harmony import */ var _SupplierCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SupplierCreate.vue?vue&type=script&lang=js& */ "./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SupplierCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SupplierCreate_vue_vue_type_template_id_0c94e5f6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SupplierCreate_vue_vue_type_template_id_0c94e5f6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "0c94e5f6",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/pages/Suppliers/SupplierCreate.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=script&lang=js&":
/*!********************************************************************************************!*\
  !*** ./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SupplierCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./SupplierCreate.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SupplierCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true&":
/*!**************************************************************************************************************!*\
  !*** ./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true& ***!
  \**************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SupplierCreate_vue_vue_type_template_id_0c94e5f6_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/Suppliers/SupplierCreate.vue?vue&type=template&id=0c94e5f6&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SupplierCreate_vue_vue_type_template_id_0c94e5f6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SupplierCreate_vue_vue_type_template_id_0c94e5f6_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);