//     Create.js 1.0.0alpha4 - On-site web editing interface
//     (c) 2011-2012 Henri Bergius, IKS Consortium
//     Create may be freely distributed under the MIT license.
//     For all details and documentation:
//     http://createjs.org/
(function(e, t) {
    "use strict";
    e.widget("Midgard.midgardCreate", {
        options: {
            toolbar: "full",
            saveButton: null,
            state: "browse",
            highlight: !0,
            highlightColor: "#67cc08",
            editorWidgets: {
                "default": "hallo"
            },
            editorOptions: {
                hallo: {
                    widget: "halloWidget"
                }
            },
            collectionWidgets: {
                "default": "midgardCollectionAdd"
            },
            url: function() {},
            storagePrefix: "node",
            workflows: {
                url: null
            },
            notifications: {},
            vie: null,
            domService: "rdfa",
            stanbolUrl: null,
            dbPediaUrl: null,
            metadata: {},
            buttonContainer: ".create-ui-toolbar-statustoolarea .create-ui-statustools",
            templates: {
                buttonContent: '<%= label %> <i class="<%= icon %>"></i>',
                button: '<li id="<%= id %>"><a class="create-ui-btn"><%= buttonContent %></a></li>'
            },
            localize: function(e, t) {
                return window.midgardCreate.localize(e, t)
            },
            language: null
        },
        _create: function() {
            this.vie = this._setupVIE(this.options), this.domService = this.vie.service(this.options.domService);
            var t = this;
            window.setTimeout(function() {
                t._checkSession()
            }, 10), this.options.language || (this.options.language = e("html").attr("lang")), this._enableToolbar(), this._enableMetadata(), this._saveButton(), this._editButton(), this._prepareStorage(), this.element.midgardWorkflows && this.element.midgardWorkflows(this.options.workflows), this.element.midgardNotifications && this.element.midgardNotifications(this.options.notifications), this._bindShortcuts()
        },
        destroy: function() {
            this.element.midgardStorage("destroy"), this.element.midgardToolbar("destroy"), this.domService.findSubjectElements(this.element).each(function() {
                e(this).midgardEditable("destroy")
            }), this.element.midgardWorkflows && this.element.midgardWorkflows("destroy"), this.element.midgardNotifications && this.element.midgardNotifications("destroy"), _.isEmpty(this.options.metadata) || this.element.midgardMetadata("destroy"), e.Widget.prototype.destroy.call(this)
        },
        _setupVIE: function(e) {
            var t;
            return e.vie ? t = e.vie : t = new VIE, !t.hasService(this.options.domService) && this.options.domService === "rdfa" && t.use(new t.RdfaService), !t.hasService("stanbol") && e.stanbolUrl && t.use(new t.StanbolService({
                proxyDisabled: !0,
                url: e.stanbolUrl
            })), !t.hasService("dbpedia") && e.dbPediaUrl && t.use(new t.DBPediaService({
                proxyDisabled: !0,
                url: e.dbPediaUrl
            })), t
        },
        _prepareStorage: function() {
            this.element.midgardStorage({
                vie: this.vie,
                url: this.options.url,
                localize: this.options.localize,
                language: this.options.language
            });
            var t = this;
            this.element.on("midgardstoragesave", function() {
                e("#midgardcreate-save a").html(_.template(t.options.templates.buttonContent, {
                    label: t.options.localize("Saving", t.options.language),
                    icon: "upload"
                }))
            }), this.element.on("midgardstoragesaved midgardstorageerror", function() {
                e("#midgardcreate-save a").html(_.template(t.options.templates.buttonContent, {
                    label: t.options.localize("Save  ", t.options.language),
                    icon: "glyphicon glyphicon-ok"
                }))
            })
        },
        _init: function() {
            this.setState(this.options.state)
        },
        setState: function(e) {
            this._setOption("state", e), e === "edit" ? this._enableEdit() : this._disableEdit(), this._setEditButtonState(e)
        },
        setToolbar: function(e) {
            this.options.toolbar = e, this.element.midgardToolbar("setDisplay", e)
        },
        showNotification: function(e) {
            if (this.element.midgardNotifications) return this.element.midgardNotifications("create", e)
        },
        configureEditor: function(e, t, n) {
            this.options.editorOptions[e] = {
                widget: t,
                options: n
            }
        },
        setEditorForContentType: function(e, n) {
            if (this.options.editorOptions[n] === t && n !== null) throw new Error("No editor " + n + " configured");
            this.options.editorWidgets[e] = n
        },
        setEditorForProperty: function(e, n) {
            if (this.options.editorOptions[n] === t && n !== null) throw new Error("No editor " + n + " configured");
            this.options.editorWidgets[e] = n
        },
        _checkSession: function() {
            if (!window.sessionStorage) return;
            var e = this.options.storagePrefix + "Midgard.create.toolbar";
            window.sessionStorage.getItem(e) && this.setToolbar(window.sessionStorage.getItem(e));
            var t = this.options.storagePrefix + "Midgard.create.state";
            window.sessionStorage.getItem(t) && this.setState(window.sessionStorage.getItem(t)), this.element.on("midgardcreatestatechange", function(e, n) {
                window.sessionStorage.setItem(t, n.state)
            })
        },
        _bindShortcuts: function() {
            if (!window.Mousetrap) return;
            var e = this;
            window.Mousetrap.bind(["command+e", "ctrl+e"], function() {
                if (e.options.state === "edit") return;
                e.setState("edit")
            }), window.Mousetrap.bind("esc", function(t) {
                if (e.options.state === "browse") return;
                t.stopPropagation(), e.setState("browse")
            }), window.Mousetrap.bind(["command+s", "ctrl+s"], function(t) {
                t.preventDefault();
                if (!e.options.saveButton) return;
                if (e.options.saveButton.hasClass("ui-state-disabled")) return;
                e.options.saveButton.click()
            })
        },
        _saveButton: function() {
            if (this.options.saveButton) return this.options.saveButton;
            var t = this;
            e(this.options.buttonContainer, this.element).append(e(_.template(this.options.templates.button, {
                id: "midgardcreate-save",
                buttonContent: _.template(this.options.templates.buttonContent, {
                    label: t.options.localize("Save  ", t.options.language),
                    icon: "glyphicon glyphicon-ok"
                })
            }))), this.options.saveButton = e("#midgardcreate-save", this.element), this.options.saveButton.hide(), this.options.saveButton.click(function() {
                t.element.midgardStorage("saveRemoteAll")
            }), this.element.on("midgardeditablechanged midgardstorageloaded", function() {
                t.options.saveButton.button({
                    disabled: !1
                })
            }), this.element.on("midgardstoragesaved", function() {
                t.options.saveButton.button({
                    disabled: !0
                })
            }), this.element.on("midgardeditableenable", function() {
                t.options.saveButton.button({
                    disabled: !0
                }), t.options.saveButton.show()
            }), this.element.on("midgardeditabledisable", function() {
                t.options.saveButton.hide()
            })
        },
        _editButton: function() {
            var t = this;
            e(this.options.buttonContainer, this.element).append(e(_.template(this.options.templates.button, {
                id: "midgardcreate-edit",
                buttonContent: ""
            }))), e("#midgardcreate-edit", this.element).on("click", function() {
                if (t.options.state === "edit") {
                    t.setState("browse");
                    return
                }
                t.setState("edit");
                //$(this).find('#hid').val(2);                
            })
        },
        _setEditButtonState: function(t) {
            var n = this,
                r = {
                    edit: _.template(this.options.templates.buttonContent, {
                        label: n.options.localize("Cancel  ", n.options.language),
                        icon: "glyphicon glyphicon-remove-circle pad-move"
                    }),
                    browse: _.template(this.options.templates.buttonContent, {
                        label: n.options.localize("Edit  ", n.options.language),
                        icon: "glyphicon glyphicon-edit"
                    })
                },
                i = e("#midgardcreate-edit a", this.element);                                                          
            if (!i) return;                        
            t === "edit" && i.addClass("selected"), i.html(r[t]);
            //var s = e("#midgardcreate-save a").html();             
//             if(i.html() == 'Cancel <i class="icon-remove"></i>'){
//                if(s != " "){
//                       
//                }else{
//                    i.trigger('click'); 
//                }                                                                                                                 
//            }           
        },
        _enableToolbar: function() {
            var e = this;
            this.element.on("midgardtoolbarstatechange", function(t, n) {
                e.setToolbar(n.display), window.sessionStorage && window.sessionStorage.setItem(e.options.storagePrefix + "Midgard.create.toolbar", n.display)
            }), this.element.midgardToolbar({
                display: this.options.toolbar,
                vie: this.vie
            })
        },
        _enableMetadata: function() {
            if (_.isEmpty(this.options.metadata)) return;
            e(".create-ui-tool-metadataarea", this.element).midgardMetadata({
                vie: this.vie,
                localize: this.options.localize,
                language: this.options.language,
                editors: this.options.metadata,
                createElement: this.element,
                editableNs: "midgardeditable"
            });                        
        },
        _enableEdit: function() {
            this._setOption("state", "edit");
            var t = this,
                n = {
                    toolbarState: t.options.toolbar,
                    disabled: !1,
                    vie: t.vie,
                    domService: t.options.domService,
                    widgets: t.options.editorWidgets,
                    editors: t.options.editorOptions,
                    collectionWidgets: t.options.collectionWidgets,
                    localize: t.options.localize,
                    language: t.options.language
                };
               
            t.options.enableEditor && (n.enableEditor = t.options.enableEditor), t.options.disableEditor && (n.disableEditor = t.options.disableEditor), this.domService.findSubjectElements(this.element).each(function() {
                var r = this;
                if (t.options.highlight) {
                    var i = function(n, i) {
                        if (!e(i.element).is(":visible")) return;
                        if (i.entityElement.get(0) !== r) return;
                        window.Mousetrap && i.element.addClass("mousetrap"), i.element.stop(!0, !0), i.element.effect("highlight", {
                            color: t.options.highlightColor
                        }, 3e3)
                    };
                    e(this).on("midgardeditableenableproperty", i)
                }
                e(this).on("midgardeditabledisable", function() {
                    e(this).off("midgardeditableenableproperty", i)
                }), e(this).midgardEditable(n)
            }), this._trigger("statechange", null, {
                state: "edit"                    
            });             
        },
        _disableEdit: function() {
            var t = this,
                n = {
                    disabled: !0,
                    vie: t.vie,
                    domService: t.options.domService,
                    editorOptions: t.options.editorOptions,
                    localize: t.options.localize,
                    language: t.options.language
                };
            this.domService.findSubjectElements(this.element).each(function() {
                e(this).midgardEditable(n), e(this).removeClass("ui-state-disabled")
            }), this._setOption("state", "browse"), this._trigger("statechange", null, {
                state: "browse"
            })
        }
    })
})(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardCollectionAdd", {
        options: {
            editingWidgets: null,
            collection: null,
            model: null,
            definition: null,
            view: null,
            disabled: !1,
            vie: null,
            editableOptions: null,
            templates: {
                button: '<button class="btn"><i class="icon-<%= icon %>"></i> <%= label %></button>'
            }
        },
        _create: function() {
            this.addButtons = [];
            var e = this;
            if (!e.options.collection.localStorage) try {
                e.options.collection.url = e.options.model.url()
            } catch (t) {
                window.console && console.log(t)
            }
            e.options.collection.on("add", function(t) {
                t.primaryCollection = e.options.collection, e.options.vie.entities.add(t), t.collection = e.options.collection
            }), e.options.collection.on("add remove reset", e.checkCollectionConstraints, e), e._bindCollectionView(e.options.view)
        },
        _bindCollectionView: function(e) {
            var t = this;
            e.on("add", function(e) {
                e.$el.effect("slide", function() {
                    t._makeEditable(e)
                })
            })
        },
        _makeEditable: function(e) {
            this.options.editableOptions.disabled = this.options.disabled, this.options.editableOptions.model = e.model, e.$el.midgardEditable(this.options.editableOptions)
        },
        _init: function() {
            if (this.options.disabled) {
                this.disable();
                return
            }
            this.enable()
        },
        hideButtons: function() {
            _.each(this.addButtons, function(e) {
                e.hide()
            })
        },
        showButtons: function() {
            _.each(this.addButtons, function(e) {
                e.show()
            })
        },
        checkCollectionConstraints: function() {
            if (this.options.disabled) return;
            if (!this.options.view.canAdd()) {
                this.hideButtons();
                return
            }
            if (!this.options.definition) {
                this.showButtons();
                return
            }
            if (!this.options.definition.max || this.options.definition.max === -1) {
                this.showButtons();
                return
            }
            if (this.options.collection.length < this.options.definition.max) {
                this.showButtons();
                return
            }
            this.hideButtons()
        },
        enable: function() {
            var t = this,
                n = e(_.template(this.options.templates.button, {
                    icon: "plus",
                    label: this.options.editableOptions.localize("Add", this.options.editableOptions.language)
                })).button();
            n.addClass("midgard-create-add"), n.click(function() {
                t.addItem(n)
            }), e(t.options.view.el).after(n), t.addButtons.push(n), t.checkCollectionConstraints()
        },
        disable: function() {
            _.each(this.addButtons, function(e) {
                e.remove()
            }), this.addButtons = []
        },
        _getTypeActions: function(e) {
            var t = this,
                n = [];
            return _.each(this.options.definition.range, function(r) {
                var i = t.options.collection.vie.namespaces.uri(r);
                if (!t.options.view.canAdd(i)) return;
                n.push({
                    name: r,
                    label: r,
                    cb: function() {
                        t.options.collection.add({
                            "@type": r
                        }, e)
                    },
                    className: "create-ui-btn"
                })
            }), n
        },
        addItem: function(n, r) {
            r === t && (r = {});
            var i = _.extend({}, r, {
                    validate: !1
                }),
                s = {};
            if (this.options.definition && this.options.definition.range) {
                if (this.options.definition.range.length !== 1) {
                    e("body").midgardNotifications("create", {
                        bindTo: n,
                        gravity: "L",
                        body: this.options.editableOptions.localize("Choose type to add", this.options.editableOptions.language),
                        timeout: 0,
                        actions: this._getTypeActions(i)
                    });
                    return
                }
                s["@type"] = this.options.definition.range[0]
            } else {
                var o = _.keys(this.options.view.templates);
                o.length == 2 && (s["@type"] = o[0])
            }
            this.options.collection.add(s, i)
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardCollectionAddBetween", e.Midgard.midgardCollectionAdd, {
        _bindCollectionView: function(e) {
            var t = this;
            e.on("add", function(e) {
                t._makeEditable(e), t._refreshButtons()
            }), e.on("remove", function() {
                t._refreshButtons()
            })
        },
        _refreshButtons: function() {
            var e = this;
            window.setTimeout(function() {
                e.disable(), e.enable()
            }, 1)
        },
        prepareButton: function(t) {
            var n = this,
                r = e(_.template(this.options.templates.button, {
                    icon: "plus",
                    label: ""
                })).button();
            return r.addClass("midgard-create-add"), r.click(function() {
                n.addItem(r, {
                    at: t
                })
            }), r
        },
        enable: function() {
            var t = this,
                n = t.prepareButton(0);
            e(t.options.view.el).prepend(n), t.addButtons.push(n), e.each(t.options.view.entityViews, function(n, r) {
                var i = t.options.collection.indexOf(r.model),
                    s = t.prepareButton(i + 1);
                e(r.el).append(s), t.addButtons.push(s)
            }), this.checkCollectionConstraints()
        },
        disable: function() {
            var t = this;
            e.each(t.addButtons, function(e, t) {
                t.remove()
            }), t.addButtons = []
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardEditable", {
        options: {
            propertyEditors: {},
            collections: [],
            model: null,
            propertyEditorWidgetsConfiguration: {
                hallo: {
                    widget: "halloWidget",
                    options: {}
                }
            },
            propertyEditorWidgets: {
                "default": "hallo"
            },
            collectionWidgets: {
                "default": "midgardCollectionAdd"
            },
            toolbarState: "full",
            vie: null,
            domService: "rdfa",
            predicateSelector: "[property]",
            disabled: !1,
            localize: function(e, t) {
                return window.midgardCreate.localize(e, t)
            },
            language: null,
            state: null,
            acceptStateChange: !0,
            stateChange: null,
            decorateEditableEntity: null,
            decoratePropertyEditor: null,
            editables: [],
            editors: {},
            widgets: {}
        },
        _params: function(e, t) {
            var n = {
                    entity: this.options.model,
                    editableEntity: this,
                    entityElement: this.element,
                    editable: this,
                    element: this.element,
                    instance: this.options.model
                },
                r = e ? {
                    predicate: e,
                    propertyEditor: this.options.propertyEditors[e],
                    propertyElement: this.options.propertyEditors[e].element,
                    property: e,
                    element: this.options.propertyEditors[e].element
                } : {};
            return _.extend(n, r, t)
        },
        _create: function() {
            this.options.widgets && (this.options.propertyEditorWidgets = _.extend(this.options.propertyEditorWidgets, this.options.widgets)), this.options.editors && (this.options.propertyEditorWidgetsConfiguration = _.extend(this.options.propertyEditorWidgetsConfiguration, this.options.editors)), this.vie = this.options.vie, this.domService = this.vie.service(this.options.domService);
            if (!this.options.model) {
                var e = this;
                this.vie.load({
                    element: this.element
                }).from(this.options.domService).execute().done(function(t) {
                    e.options.model = t[0]
                })
            }
            _.isFunction(this.options.decorateEditableEntity) && this.options.decorateEditableEntity(this._params())
        },
        _init: function() {
            this.options.widgets && (this.options.propertyEditorWidgets = _.extend(this.options.propertyEditorWidgets, this.options.widgets)), this.options.editors && (this.options.propertyEditorWidgetsConfiguration = _.extend(this.options.propertyEditorWidgetsConfiguration, this.options.editors));
            if (this.options.disabled === !0) {
                this.setState("inactive");
                return
            }
            if (this.options.disabled === !1 && this.options.state === "inactive") {
                this.setState("candidate");
                return
            }
            this.options.disabled = !1;
            if (this.options.state) {
                this.setState(this.options.state);
                return
            }
            this.setState("candidate")
        },
        setState: function(e, n, r, i) {
            var s = this.options.state,
                o = e;
            if (o === s) return;
            if (this.options.acceptStateChange === t || !_.isFunction(this.options.acceptStateChange)) {
                this._doSetState(s, o, n, r), _.isFunction(i) && i(!0);
                return
            }
            var u = this;
            this.options.acceptStateChange(s, o, n, r, function(e) {
                e && u._doSetState(s, o, n, r), _.isFunction(i) && i(e);
                return
            })
        },
        getState: function() {
            return this.options.state
        },
        _doSetState: function(e, t, n, r) {
            this.options.state = t, t === "inactive" ? this.disable() : (e === null || e === "inactive") && t !== "inactive" && this.enable(), this._trigger("statechange", null, this._params(n, {
                previous: e,
                current: t,
                context: r
            }))
        },
        findEditablePredicateElements: function(t) {
            this.domService.findPredicateElements(this.options.model.id, e(this.options.predicateSelector, this.element), !1).each(t)
        },
        getElementPredicate: function(e) {
            return this.domService.getElementPredicate(e)
        },
        enable: function() {
            var t = this;
            if (!this.options.model) return;
            this.findEditablePredicateElements(function() {
                t._enablePropertyEditor(e(this))
            }), this._trigger("enable", null, this._params());
            if (!this.vie.view || !this.vie.view.Collection) return;
            _.each(this.domService.views, function(e) {
                if (e instanceof this.vie.view.Collection && this.options.model === e.owner) {
                    var n = e.collection.predicate,
                        r = _.clone(this.options);
                    r.state = null;
                    var i = this.enableCollection({
                        model: this.options.model,
                        collection: e.collection,
                        property: n,
                        definition: this.getAttributeDefinition(n),
                        view: e,
                        element: e.el,
                        vie: t.vie,
                        editableOptions: r
                    });
                    t.options.collections.push(i)
                }
            }, this)
        },
        disable: function() {
            _.each(this.options.propertyEditors, function(e) {
                this.disablePropertyEditor({
                    widget: this,
                    editable: e,
                    entity: this.options.model,
                    element: e.element
                })
            }, this), this.options.propertyEditors = {}, this.options.editables = [], _.each(this.options.collections, function(e) {
                var t = _.clone(this.options);
                t.state = "inactive", this.disableCollection({
                    widget: this,
                    model: this.options.model,
                    element: e,
                    vie: this.vie,
                    editableOptions: t
                })
            }, this), this.options.collections = [], this._trigger("disable", null, this._params())
        },
        _enablePropertyEditor: function(e) {
            var t = this,
                n = this.getElementPredicate(e);
            if (!n) return !0;
            if (this.options.model.get(n) instanceof Array) return !0;
            var r = this.enablePropertyEditor({
                widget: this,
                element: e,
                entity: this.options.model,
                property: n,
                vie: this.vie,
                decorate: this.options.decoratePropertyEditor,
                decorateParams: _.bind(this._params, this),
                changed: function(e) {
                    t.setState("changed", n);
                    var r = {};
                    r[n] = e, t.options.model.set(r, {
                        silent: !0
                    }), t._trigger("changed", null, t._params(n))
                },
                activating: function() {
                    t.setState("activating", n)
                },
                activated: function() {
                    t.setState("active", n), t._trigger("activated", null, t._params(n))
                },
                deactivated: function() {
                    t.setState("candidate", n), t._trigger("deactivated", null, t._params(n))
                }
            });
            if (!r) return;
            var i = r.data("createWidgetName");
            this.options.propertyEditors[n] = r.data(i), this.options.editables.push(r), this._trigger("enableproperty", null, this._params(n))
        },
        _propertyEditorName: function(e) {
            if (this.options.propertyEditorWidgets[e.property] !== t) return this.options.propertyEditorWidgets[e.property];
            var n = "default",
                r = this.getAttributeDefinition(e.property);
            return r && (n = r.range[0]), this.options.propertyEditorWidgets[n] !== t ? this.options.propertyEditorWidgets[n] : this.options.propertyEditorWidgets["default"]
        },
        _propertyEditorWidget: function(e) {
            return this.options.propertyEditorWidgetsConfiguration[e].widget
        },
        _propertyEditorOptions: function(e) {
            return this.options.propertyEditorWidgetsConfiguration[e].options
        },
        getAttributeDefinition: function(e) {
            var t = this.options.model.get("@type");
            if (!t) return;
            if (!t.attributes) return;
            return t.attributes.get(e)
        },
        enableEditor: function(e) {
            return this.enablePropertyEditor(e)
        },
        enablePropertyEditor: function(t) {
            var n = this._propertyEditorName(t);
            if (n === null) return;
            var r = this._propertyEditorWidget(n);
            t.editorOptions = this._propertyEditorOptions(n), t.toolbarState = this.options.toolbarState, t.disabled = !1, t.editorName = n, t.editorWidget = r;
            if (typeof e(t.element)[r] != "function") throw new Error(r + " widget is not available");
            return e(t.element)[r](t), e(t.element).data("createWidgetName", r), e(t.element)
        },
        disableEditor: function(e) {
            return this.disablePropertyEditor(e)
        },
        disablePropertyEditor: function(t) {
            t.element[t.editable.widgetName]({
                disabled: !0
            }), e(t.element).removeClass("ui-state-disabled"), t.element.is(":focus") && t.element.blur()
        },
        collectionWidgetName: function(e) {
            if (this.options.collectionWidgets[e.property] !== t) return this.options.collectionWidgets[e.property];
            var n = "default",
                r = this.getAttributeDefinition(e.property);
            return r && (n = r.range[0]), this.options.collectionWidgets[n] !== t ? this.options.collectionWidgets[n] : this.options.collectionWidgets["default"]
        },
        enableCollection: function(t) {
            var n = this.collectionWidgetName(t);
            if (n === null) return;
            t.disabled = !1;
            if (typeof e(t.element)[n] != "function") throw new Error(n + " widget is not available");
            return e(t.element)[n](t), e(t.element).data("createCollectionWidgetName", n), e(t.element)
        },
        disableCollection: function(t) {
            var n = e(t.element).data("createCollectionWidgetName");
            if (n === null) return;
            t.disabled = !0, n && (e(t.element)[n](t), e(t.element).removeClass("ui-state-disabled"))
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Create.editWidget", {
        options: {
            disabled: !1,
            vie: null
        },
        enable: function() {
            this.element.attr("contenteditable", "true")
        },
        disable: function(e) {
            this.element.attr("contenteditable", "false")
        },
        _create: function() {
            this._registerWidget(), this._initialize(), _.isFunction(this.options.decorate) && _.isFunction(this.options.decorateParams) && this.options.decorate(this.options.decorateParams(null, {
                propertyName: this.options.property,
                propertyEditor: this,
                propertyElement: this.element,
                editor: this,
                predicate: this.options.property,
                element: this.element
            }))
        },
        _init: function() {
            if (this.options.disabled) {
                this.disable();
                return
            }
            this.enable()
        },
        _initialize: function() {
            var t = this;
            this.element.on("focus", function() {
                if (t.options.disabled) return;
                t.options.activated()
            }), this.element.on("blur", function() {
                if (t.options.disabled) return;
                t.options.deactivated()
            });
            var n = this.element.html();
            this.element.on("keyup paste", function(r) {
                if (t.options.disabled) return;
                var i = e(this).html();
                n !== i && (n = i, t.options.changed(i))
            })
        },
        _registerWidget: function() {
            this.element.data("createWidgetName", this.widgetName)
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Create.alohaWidget", e.Create.editWidget, {
        _initialize: function() {},
        enable: function() {
            var e = this.options,
                t, n = Aloha.jQuery(e.element.get(0)).aloha();
            _.each(Aloha.editables, function(e) {
                e.obj.get(0) === n.get(0) && (t = e)
            });
            if (!t) return;
            t.vieEntity = e.entity, Aloha.bind("aloha-editable-activated", function(n, r) {
                if (r.editable !== t) return;
                e.activated()
            }), Aloha.bind("aloha-editable-deactivated", function(n, r) {
                if (r.editable !== t) return;
                e.deactivated()
            }), Aloha.bind("aloha-smart-content-changed", function(n, r) {
                if (r.editable !== t) return;
                if (!r.editable.isModified()) return !0;
                e.changed(r.editable.getContents()), r.editable.setUnmodified()
            }), this.options.disabled = !1
        },
        disable: function() {
            Aloha.jQuery(this.options.element.get(0)).mahalo(), this.options.disabled = !0
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Create.ckeditorWidget", e.Create.editWidget, {
        enable: function() {
            this.element.attr("contentEditable", "true"), this.editor = CKEDITOR.inline(this.element.get(0)), this.options.disabled = !1;
            var e = this;
            this.editor.on("focus", function() {
                e.options.activated()
            }), this.editor.on("blur", function() {
                e.options.activated()
            }), this.editor.on("key", function() {
                e.options.changed(e.editor.getData())
            }), this.editor.on("paste", function() {
                e.options.changed(e.editor.getData())
            }), this.editor.on("afterCommandExec", function() {
                e.options.changed(e.editor.getData())
            })
        },
        disable: function() {
            if (!this.editor) return;
            this.element.attr("contentEditable", "false"), this.editor.destroy(), this.editor = null
        },
        _initialize: function() {
            CKEDITOR.disableAutoInline = !0
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Create.halloWidget", e.Create.editWidget, {
        options: {
            editorOptions: {},
            disabled: !0,
            toolbarState: "full",
            vie: null,
            entity: null
        },
        enable: function() {
            e(this.element).hallo({
                editable: !0
            }), this.options.disabled = !1
        },
        disable: function() {
            e(this.element).hallo({
                editable: !1
            }), this.options.disabled = !0
        },
        _initialize: function() {
            e(this.element).hallo(this.getHalloOptions());
            var t = this;
            e(this.element).on("halloactivated", function(e, n) {
                t.options.activated()
            }), e(this.element).on("hallodeactivated", function(e, n) {
                t.options.deactivated()
            }), e(this.element).on("hallomodified", function(e, n) {
                t.options.changed(n.content), n.editable.setUnmodified()
            }), e(document).on("midgardtoolbarstatechange", function(e, n) {
                if (n.display === t.options.toolbarState) return;
                t.options.toolbarState = n.display;
                var r = t.getHalloOptions();
                t.element.hallo("changeToolbar", r.parentElement, r.toolbar, !0)
            })
        },
        getHalloOptions: function() {
            var t = {
                plugins: {
                    halloformat: {},
                    halloblock: {},
                    hallolists: {},
                    hallolink: {},
                    halloimage: {
                        entity: this.options.entity
                    }
                },
                buttonCssClass: "create-ui-btn-small",
                placeholder: "[" + this.options.property + "]"
            };
            return typeof this.element.annotate == "function" && this.options.vie.services.stanbol && (t.plugins.halloannotate = {
                vie: this.options.vie
            }), this.options.toolbarState === "full" ? (t.parentElement = e(".create-ui-toolbar-dynamictoolarea .create-ui-tool-freearea"), t.toolbar = "halloToolbarFixed") : (t.parentElement = "body", t.toolbar = "halloToolbarContextual"), _.extend(t, this.options.editorOptions)
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Create.redactorWidget", e.Create.editWidget, {
        editor: null,
        options: {
            editorOptions: {},
            disabled: !0
        },
        enable: function() {
            e(this.element).redactor(this.getRedactorOptions()), this.options.disabled = !1
        },
        disable: function() {
            e(this.element).destroyEditor(), this.options.disabled = !0
        },
        _initialize: function() {
            var t = this;
            e(this.element).on("focus", function(e) {
                t.options.activated()
            })
        },
        getRedactorOptions: function() {
            var t = this,
                n = {
                    keyupCallback: function(n, r) {
                        t.options.changed(e(t.element).getCode())
                    },
                    execCommandCallback: function(n, r) {
                        t.options.changed(e(t.element).getCode())
                    }
                };
            return _.extend(t.options.editorOptions, n)
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardMetadata", {
        contentArea: null,
        editorElements: {},
        options: {
            vie: null,
            templates: {
                button: '<button class="create-ui-btn"><i class="icon-<%= icon %>"></i> <%= label %></button>',
                contentArea: '<div class="dropdown-menu"></div>'
            },
            localize: function(e, t) {
                return window.midgardCreate.localize(e, t)
            },
            language: null,
            createElement: "body",
            editableNs: "midgardeditable"
        },
        _create: function() {
            this._render()
        },
        _init: function() {
            this._prepareEditors(), this._bindEditables()
        },
        _prepareEditors: function() {
            _.each(this.options.editors, function(t, n) {
                var r = e("<div></div>").addClass(n);
                this.contentArea.append(r);
                if (!_.isFunction(r[n])) throw new Error("Metadata editor widget " + n + " is not available");
                _.extend(t, {
                    vie: this.options.vie,
                    language: this.options.language,
                    localize: this.options.localize,
                    createElement: this.options.createElement,
                    editableNs: this.options.editableNs
                }), r[n](t), this.editorElements[n] = r
            }, this)
        },
        activateEditors: function(e) {
            this.element.show(), _.each(this.options.editors, function(t, n) {
                if (!this.editorElements[n]) return;
                this.editorElements[n][n]("activate", e)
            }, this)
        },
        _bindEditables: function() {
            var t = this,
                n = e(this.options.createElement);
            n.on(this.options.editableNs + "activated", function(e, n) {
                t.activateEditors({
                    entity: n.entity,
                    entityElement: n.entityElement,
                    predicate: n.predicate
                })
            })
        },
        _prepareEditorArea: function(t) {
            var n = e(_.template(this.options.templates.contentArea, {}));
            return n.hide(), n
        },
        _render: function() {
            var t = this,
                n = e(_.template(this.options.templates.button, {
                    icon: "info-sign",
                    label: this.options.localize("Metadata", this.options.language)
                }));
            this.element.empty(), this.element.append(n), this.element.hide(), this.contentArea = this._prepareEditorArea(n), n.after(this.contentArea), n.on("click", function(e) {
                e.preventDefault();
                var r = n.position();
                t.contentArea.css({
                    position: "absolute",
                    left: r.left
                }), t.contentArea.toggle()
            })
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    var n = [],
        r = function(t, r) {
            var i = {
                    class_prefix: "midgardNotifications",
                    timeout: 3e3,
                    auto_show: !0,
                    body: "",
                    bindTo: null,
                    gravity: "T",
                    effects: {
                        onShow: function(e, t) {
                            e.animate({
                                opacity: "show"
                            }, 600, t)
                        },
                        onHide: function(e, t) {
                            e.animate({
                                opacity: "hide"
                            }, 600, t)
                        }
                    },
                    actions: [],
                    callbacks: {}
                },
                s = {},
                o = {},
                u = null,
                a = null,
                f = null,
                l = t,
                c = null,
                h = {
                    constructor: function(e) {
                        s = _.extend(i, e || {}), o = {
                            container: s.class_prefix + "-container",
                            item: {
                                wrapper: s.class_prefix + "-item",
                                arrow: s.class_prefix + "-arrow",
                                disregard: s.class_prefix + "-disregard",
                                content: s.class_prefix + "-content",
                                actions: s.class_prefix + "-actions",
                                action: s.class_prefix + "-action"
                            }
                        }, this._generate()
                    },
                    getId: function() {
                        return a
                    },
                    getElement: function() {
                        return u
                    },
                    _generate: function() {
                        var t = this,
                            r, i, f = null;
                        u = r = e('<div class="' + o.item.wrapper + '-outer"/>'), r.css({
                            display: "none"
                        }), i = e('<div class="' + o.item.wrapper + '-inner"/>'), i.appendTo(r);
                        if (s.bindTo) {
                            r.addClass(o.item.wrapper + "-binded");
                            var h = e('<div class="' + o.item.arrow + '"/>');
                            h.appendTo(r)
                        } else r.addClass(o.item.wrapper + "-normal");
                        f = e('<div class="' + o.item.content + '"/>'), f.html(s.body), f.appendTo(i);
                        if (s.actions.length) {
                            var p = e('<div class="' + o.item.actions + '"/>');
                            p.appendTo(i), e.each(s.actions, function(n, r) {
                                var i = e('<button name="' + r.name + '" class="button-' + r.name + '">' + r.label + "</button>").button();
                                i.on("click", function(e) {
                                    c ? r.cb(e, c, t) : r.cb(e, t)
                                }), r.className && i.addClass(r.className), p.append(i)
                            })
                        }
                        u.on("click", function(e) {
                            s.callbacks.onClick ? s.callbacks.onClick(e, t) : c || t.close()
                        }), s.auto_show && this.show(), this._setPosition(), a = n.push(this), l.append(u)
                    },
                    _calculatePositionForGravity: function(e, t, n, r) {
                        e.find("." + o.item.arrow).addClass(o.item.arrow + "_" + t);
                        switch (t) {
                            case "TL":
                                return {
                                    left: n.left,
                                    top: n.top + n.height + "px"
                                };
                            case "TR":
                                return {
                                    left: n.left + n.width - r.width + "px",
                                    top: n.top + n.height + "px"
                                };
                            case "BL":
                                return {
                                    left: n.left + "px",
                                    top: n.top - r.height + "px"
                                };
                            case "BR":
                                return {
                                    left: n.left + n.width - r.width + "px",
                                    top: n.top - r.height + "px"
                                };
                            case "LT":
                                return {
                                    left: n.left + n.width + "px",
                                    top: n.top + "px"
                                };
                            case "LB":
                                return {
                                    left: n.left + n.width + "px",
                                    top: n.top + n.height - r.height + "px"
                                };
                            case "RT":
                                return {
                                    left: n.left - r.width + "px",
                                    top: n.top + "px"
                                };
                            case "RB":
                                return {
                                    left: n.left - r.width + "px",
                                    top: n.top + n.height - r.height + "px"
                                };
                            case "T":
                                return {
                                    left: n.left + n.width / 2 - r.width / 2 + "px",
                                    top: n.top + n.height + "px"
                                };
                            case "R":
                                return {
                                    left: n.left - r.width + "px",
                                    top: n.top + n.height / 2 - r.height / 2 + "px"
                                };
                            case "B":
                                return {
                                    left: n.left + n.width / 2 - r.width / 2 + "px",
                                    top: n.top - r.height + "px"
                                };
                            case "L":
                                return {
                                    left: n.left + n.width + "px",
                                    top: n.top + n.height / 2 - r.height / 2 + "px"
                                }
                        }
                    },
                    _isFixed: function(e) {
                        if (e === document) return !1;
                        if (e.css("position") === "fixed") return !0;
                        var t = e.offsetParent();
                        return t.get(0) === e.get(0) ? !1 : this._isFixed(t)
                    },
                    _setPosition: function() {
                        var t;
                        if (s.bindTo) {
                            var r = {
                                width: u.width() ? u.width() : 280,
                                height: u.height() ? u.height() : 109
                            };
                            f = e(s.bindTo);
                            var i = {},
                                o = {
                                    width: f.outerWidth(),
                                    height: f.outerHeight()
                                };
                            this._isFixed(f) ? (i.position = "inherit", o.left = f.offset().left, o.top = f.position().top) : (i.position = "absolute", o.left = f.offset().left, o.top = f.offset().top), t = this._calculatePositionForGravity(u, s.gravity, o, r), i.top = t.top, i.left = t.left, u.css(i);
                            return
                        }
                        s.position || (s.position = "top right");
                        var a = e(".create-ui-toolbar-wrapper").outerHeight(!0) + 6;
                        t = {
                            position: "fixed"
                        };
                        var l, c = function(t) {
                            var n = 0;
                            return e.each(t, function(e, t) {
                                if (!t) return;
                                n += t.getElement().height()
                            }), n
                        };
                        s.position.match(/top/) && (t.top = a + c(n) + "px"), s.position.match(/bottom/) && (t.bottom = n.length - 1 * l.height() + l.height() + 10 + "px"), s.position.match(/right/) && (t.right = "20px"), s.position.match(/left/) && (t.left = "20px"), u.css(t)
                    },
                    show: function() {
                        var t = this,
                            n, r, i, o, a, f;
                        s.callbacks.beforeShow && s.callbacks.beforeShow(t);
                        if (s.bindTo) {
                            var l = e(s.bindTo);
                            n = e(window).scrollTop(), r = e(window).scrollTop() + e(window).height(), o = parseFloat(u.offset().top, 10), a = l.offset().top, f = l.outerHeight(), a < o && (o = a), i = parseFloat(u.offset().top, 10) + u.height(), a + f > i && (i = a + f)
                        }
                        s.timeout > 0 && !s.actions.length && window.setTimeout(function() {
                            t.close()
                        }, s.timeout), s.bindTo && (o < n || o > r) || i < n || i > r ? e("html, body").stop().animate({
                            scrollTop: o
                        }, 500, "easeInOutExpo", function() {
                            s.effects.onShow(u, function() {
                                s.callbacks.afterShow && s.callbacks.afterShow(t)
                            })
                        }) : s.effects.onShow(u, function() {
                            s.callbacks.afterShow && s.callbacks.afterShow(t)
                        })
                    },
                    close: function() {
                        var e = this;
                        s.callbacks.beforeClose && s.callbacks.beforeClose(e), s.effects.onHide(u, function() {
                            s.callbacks.afterClose && s.callbacks.afterClose(e), e.destroy()
                        })
                    },
                    destroy: function() {
                        var t = this;
                        e.each(n, function(e, r) {
                            r && r.getId() == t.getId() && delete n[e]
                        }), e(u).remove()
                    },
                    setStory: function(e) {
                        c = e
                    },
                    setName: function(e) {
                        u.addClass(o.item.wrapper + "-custom-" + e), this.name = e
                    }
                };
            return h.constructor(r), delete h.constructor, h
        },
        i = function(t, n) {
            var i = {},
                s = {},
                o = {},
                u = {},
                a = null,
                f = null,
                l = null,
                c = null,
                h = {
                    constructor: function(e) {
                        s = _.extend(i, e || {})
                    },
                    setStoryline: function(t) {
                        var n = {
                            content: "",
                            actions: [],
                            show_actions: !0,
                            notification: {},
                            back: null,
                            back_label: null,
                            forward: null,
                            forward_label: null,
                            beforeShow: null,
                            afterShow: null,
                            beforeClose: null,
                            afterClose: null
                        };
                        o = {}, c = null, a = null, f = null, l = null;
                        var r = this;
                        return e.each(t, function(t, i) {
                            var s = e.extend({}, n, i);
                            s.name = t;
                            var u = e.extend({}, n.notification, i.notification || {});
                            u.body = s.content, u.auto_show = !1, s.actions.length && (u.delay = 0), u.callbacks = {
                                beforeShow: function(e) {
                                    s.beforeShow && s.beforeShow(e, r)
                                },
                                afterShow: function(e) {
                                    s.afterShow && s.afterShow(e, r)
                                },
                                beforeClose: function(e) {
                                    s.beforeClose && s.beforeClose(e, r)
                                },
                                afterClose: function(e) {
                                    s.afterClose && s.afterClose(e, r), a = e.name
                                }
                            }, u.actions = [];
                            if (s.show_actions) {
                                if (s.back) {
                                    var c = s.back_label;
                                    c || (c = "Back"), u.actions.push({
                                        name: "back",
                                        label: c,
                                        cb: function(e, t, n) {
                                            t.previous()
                                        }
                                    })
                                }
                                if (s.forward) {
                                    var h = s.forward_label;
                                    h || (h = "Back"), u.actions.push({
                                        name: "forward",
                                        label: h,
                                        cb: function(e, t, n) {
                                            t.next()
                                        }
                                    })
                                }
                                s.actions.length && e.each(s.actions, function(e, t) {
                                    u.actions.push(s.actions[e])
                                })
                            }
                            f || (f = t), l = t, s.notification = u, o[t] = s
                        }), o
                    },
                    start: function() {
                        this._showNotification(o[f])
                    },
                    stop: function() {
                        c.close(), c = null, a = null
                    },
                    next: function() {
                        c.close();
                        if (o[c.name].forward) {
                            var e = o[c.name].forward;
                            this._showNotification(o[e])
                        } else this._showNotification(o[l])
                    },
                    previous: function() {
                        if (a) {
                            c.close();
                            if (o[c.name].back) {
                                var e = o[c.name].back;
                                this._showNotification(o[e])
                            } else this._showNotification(o[a])
                        } else this.stop()
                    },
                    _showNotification: function(t) {
                        return c = new r(e("body"), t.notification), c.setStory(this), c.setName(t.name), c.show(), c
                    }
                };
            return h.constructor(t), delete h.constructor, n && h.setStoryline(n), h
        },
        s = {
            start: {
                content: "Welcome to CreateJS tutorial!",
                forward: "toolbar_toggle",
                forward_label: "Start tutorial",
                actions: [{
                    name: "quit",
                    label: "Quit",
                    cb: function(e, t, n) {
                        t.
                        stop()
                    }
                }]
            },
            toolbar_toggle: {
                content: "This is the CreateJS toolbars toggle button.<br />You can hide and show the full toolbar by clicking here.<br />Try it now.",
                forward: "edit_button",
                show_actions: !1,
                afterShow: function(t, n) {
                    e("body").on("midgardtoolbarstatechange", function(t, r) {
                        r.display == "full" && (n.next(), e("body").off("midgardtoolbarstatechange"))
                    })
                },
                notification: {
                    bindTo: "#midgard-bar-hidebutton",
                    timeout: 0,
                    gravity: "TL"
                }
            },
            edit_button: {
                content: "This is the edit button.<br />Try it now.",
                show_actions: !1,
                afterShow: function(t, n) {
                    e("body").on("midgardcreatestatechange", function(t, r) {
                        r.state == "edit" && (n.next(), e("body").off("midgardcreatestatechange"))
                    })
                },
                notification: {
                    bindTo: ".ui-button[for=midgardcreate-edit]",
                    timeout: 0,
                    gravity: "TL"
                }
            },
            end: {
                content: "Thank you for watching!<br />Happy content editing times await you!"
            }
        };
    e.widget("Midgard.midgardNotifications", {
        options: {
            notification_defaults: {
                class_prefix: "midgardNotifications",
                position: "top right"
            }
        },
        _create: function() {
            this.classes = {
                container: this.options.notification_defaults.class_prefix + "-container"
            }, e("." + this.classes.container, this.element).length ? (this.container = e("." + this.classes.container, this.element), this._parseFromDOM()) : (this.container = e('<div class="' + this.classes.container + '" />'), this.element.append(this.container))
        },
        destroy: function() {
            this.container.remove(), e.Widget.prototype.destroy.call(this)
        },
        _init: function() {},
        _parseFromDOM: function(e) {},
        showStory: function(e, t) {
            var n = new i(e, t);
            return n.start(), n
        },
        create: function(t) {
            t = e.extend({}, this.options.notification_defaults, t || {});
            var n = new r(this.container, t);
            return n.show(), n
        },
        showTutorial: function() {
            this.showStory({}, s)
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardStorage", {
        saveEnabled: !0,
        options: {
            localStorage: !1,
            removeLocalstorageOnIgnore: !0,
            vie: null,
            url: "",
            autoSave: !1,
            autoSaveInterval: 5e3,
            saveReferencedNew: !1,
            saveReferencedChanged: !1,
            editableNs: "midgardeditable",
            editSelector: "#midgardcreate-edit a",
            localize: function(e, t) {
                return window.midgardCreate.localize(e, t)
            },
            language: null
        },
        _create: function() {
            var e = this;
            this.changedModels = [], window.localStorage && (this.options.localStorage = !0), this.vie = this.options.vie, this.vie.entities.on("add", function(t) {
                t.url = e.options.url, t.toJSON = t.toJSONLD
            }), e._bindEditables(), e.options.autoSave && e._autoSave()
        },
        _autoSave: function() {
            var e = this;
            e.saveEnabled = !0;
            var t = function() {
                    if (!e.saveEnabled) return;
                    if (e.changedModels.length === 0) return;
                    e.saveRemoteAll({
                        silent: !0
                    })
                },
                n = window.setInterval(t, e.options.autoSaveInterval);
            this.element.on("startPreventSave", function() {
                n && (window.clearInterval(n), n = null), e.disableAutoSave()
            }), this.element.on("stopPreventSave", function() {
                n || (n = window.setInterval(t, e.options.autoSaveInterval)), e.enableAutoSave()
            })
        },
        enableAutoSave: function() {
            this.saveEnabled = !0
        },
        disableAutoSave: function() {
            this.saveEnabled = !1
        },
        _bindEditables: function() {
            var e = this;
            this.restorables = [];
            var t;
            e.element.on(e.options.editableNs + "changed", function(t, n) {
                _.indexOf(e.changedModels, n.instance) === -1 && e.changedModels.push(n.instance), e._saveLocal(n.instance)
            }), e.element.on(e.options.editableNs + "disable", function(t, n) {
                e.revertChanges(n.instance)
            }), e.element.on(e.options.editableNs + "enable", function(t, n) {
                n.instance._originalAttributes || (n.instance._originalAttributes = _.clone(n.instance.attributes)), !n.instance.isNew() && e._checkLocal(n.instance) && e.restorables.push(n.instance)
            }), e.element.on("midgardcreatestatechange", function(n, r) {
                if (r.state === "browse" || e.restorables.length === 0) {
                    e.restorables = [], t && t.close();
                    return
                }
                t = e.checkRestore()
            }), e.element.on("midgardstorageloaded", function(t, n) {
                _.indexOf(e.changedModels, n.instance) === -1 && e.changedModels.push(n.instance)
            })
        },
        checkRestore: function() {
            var t = this;
            if (t.restorables.length === 0) return;
            var n, r;
            t.restorables.length === 1 ? n = _.template(t.options.localize("localModification", t.options.language), {
                label: t.restorables[0].getSubjectUri()
            }) : n = _.template(t.options.localize("localModifications", t.options.language), {
                number: t.restorables.length
            });
            var i = function(e, n) {
                    t.restoreLocalAll(), r.close()
                },
                s = function(e, n) {
                    t.ignoreLocal(), r.close()
                };
            return r = e("body").midgardNotifications("create", {
                bindTo: t.options.editSelector,
                gravity: "TR",
                body: n,
                timeout: 0,
                actions: [{
                    name: "restore",
                    label: t.options.localize("Restore", t.options.language),
                    cb: i,
                    className: "create-ui-btn"
                }, {
                    name: "ignore",
                    label: t.options.localize("Ignore", t.options.language),
                    cb: s,
                    className: "create-ui-btn"
                }],
                callbacks: {
                    beforeShow: function() {
                        if (!window.Mousetrap) return;
                        window.Mousetrap.bind(["command+shift+r", "ctrl+shift+r"], function(e) {
                            e.preventDefault(), i()
                        }), window.Mousetrap.bind(["command+shift+i", "ctrl+shift+i"], function(e) {
                            e.preventDefault(), s()
                        })
                    },
                    afterClose: function() {
                        if (!window.Mousetrap) return;
                        window.Mousetrap.unbind(["command+shift+r", "ctrl+shift+r"]), window.Mousetrap.unbind(["command+shift+i", "ctrl+shift+i"])
                    }
                }
            }), r
        },
        restoreLocalAll: function() {
            _.each(this.restorables, function(e) {
                this.readLocal(e)
            }, this), this.restorables = []
        },
        ignoreLocal: function() {
            this.options.removeLocalstorageOnIgnore && _.each(this.restorables, function(e) {
                this._removeLocal(e)
            }, this), this.restorables = []
        },
        saveReferences: function(e) {
            _.each(e.attributes, function(e, t) {
                if (!e || !e.isCollection) return;
                e.each(function(e) {
                    if (this.changedModels.indexOf(e) !== -1) return;
                    if (e.isNew() && this.options.saveReferencedNew) return e.save();
                    if (e.hasChanged() && this.options.saveReferencedChanged) return e.save()
                }, this)
            }, this)
        },
        saveRemote: function(e, t) {
            this.saveReferences(e), this._trigger("saveentity", null, {
                entity: e,
                options: t
            });
            var n = this;
            e.save(null, _.extend({}, t, {
                success: function(r, i) {
                    e._originalAttributes = _.clone(e.attributes), n._removeLocal(e), window.setTimeout(function() {
                        n.changedModels.splice(n.changedModels.indexOf(e), 1)
                    }, 0), _.isFunction(t.success) && t.success(r, i), n._trigger("savedentity", null, {
                        entity: e,
                        options: t
                    })
                },
                error: function(e, n) {
                    _.isFunction(t.error) && t.error(e, n)
                }
            }))
        },
        saveRemoteAll: function(t) {
            var n = this;
            if (n.changedModels.length === 0) return;
            n._trigger("save", null, {
                entities: n.changedModels,
                options: t,
                models: n.changedModels
            });
            var r, i = n.changedModels.length;
            i > 1 ? r = _.template(n.options.localize("saveSuccessMultiple", n.options.language), {
                number: i
            }) : r = _.template(n.options.localize("saveSuccess", n.options.language), {
                label: n.changedModels[0].getSubjectUri()
            }), n.disableAutoSave(), _.each(n.changedModels, function(s) {
                this.saveRemote(s, {
                    success: function(s, o) {
                        i--, i <= 0 && (n._trigger("saved", null, {
                            options: t
                        }), t && _.isFunction(t.success) && t.success(s, o), e("body").midgardNotifications("create", {
                            body: r
                        }), n.enableAutoSave())
                    },
                    error: function(r, i) {
                        t && _.isFunction(t.error) && t.error(r, i), e("body").midgardNotifications("create", {
                            body: _.template(n.options.localize("saveError", n.options.language), {
                                error: i.responseText || ""
                            }),
                            timeout: 0
                        }), n._trigger("error", null, {
                            instance: s
                        })
                    }
                })
            }, this)
        },
        _saveLocal: function(e) {
            if (!this.options.localStorage) return;
            if (e.isNew()) {
                if (!e.primaryCollection) return;
                return this._saveLocalReferences(e.primaryCollection.subject, e.primaryCollection.predicate, e)
            }
            window.localStorage.setItem(e.getSubjectUri(), JSON.stringify(e.toJSONLD()))
        },
        _getReferenceId: function(e, t) {
            return e.id + ":" + t
        },
        _saveLocalReferences: function(e, t, n) {
            if (!this.options.localStorage) return;
            if (!e || !t) return;
            var r = this,
                i = e + ":" + t,
                s = n.toJSONLD();
            if (window.localStorage.getItem(i)) {
                var o = JSON.parse(window.localStorage.getItem(i)),
                    u = _.pluck(o, "@").indexOf(s["@"]);
                u !== -1 ? o[u] = s : o.push(s), window.localStorage.setItem(i, JSON.stringify(o));
                return
            }
            window.localStorage.setItem(i, JSON.stringify([s]))
        },
        _checkLocal: function(e) {
            if (!this.options.localStorage) return !1;
            var t = window.localStorage.getItem(e.getSubjectUri());
            return t ? !0 : !1
        },
        hasLocal: function(e) {
            return this.options.localStorage ? window.localStorage.getItem(e.getSubjectUri()) ? !0 : !1 : !1
        },
        readLocal: function(e) {
            if (!this.options.localStorage) return;
            var t = window.localStorage.getItem(e.getSubjectUri());
            if (!t) return;
            e._originalAttributes || (e._originalAttributes = _.clone(e.attributes));
            var n = JSON.parse(t),
                r = this.vie.entities.addOrUpdate(n, {
                    overrideAttributes: !0
                });
            this._trigger("loaded", null, {
                instance: r
            })
        },
        _readLocalReferences: function(e, t, n) {
            if (!this.options.localStorage) return;
            var r = this._getReferenceId(e, t),
                i = window.localStorage.getItem(r);
            if (!i) return;
            n.add(JSON.parse(i))
        },
        revertChanges: function(e) {
            var t = this;
            if (!e) return;
            _.each(e.attributes, function(e, n) {
                if (e instanceof t.vie.Collection) {
                    var r = [];
                    e.forEach(function(e) {
                        e.isNew() && r.push(e)
                    }), e.remove(r)
                }
            });
            if (!e.changedAttributes()) {
                e._originalAttributes && e.set(e._originalAttributes);
                return
            }
            e.set(e.previousAttributes())
        },
        _removeLocal: function(e) {
            if (!this.options.localStorage) return;
            window.localStorage.removeItem(e.getSubjectUri())
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardTags", {
        enhanced: !1,
        options: {
            predicate: "skos:related",
            vie: null,
            templates: {
                tags: '<div class="create-ui-tags <%= type %>Tags"><h3><%= label %></h3><input type="text" class="tags" value="" /></div>'
            },
            localize: function(e, t) {
                return window.midgardCreate.localize(e, t)
            },
            language: null
        },
        _init: function() {
            this.vie = this.options.vie
        },
        activate: function(e) {
            var t = this._render(e.entity);
            this.loadTags(e.entity, e.predicate, t)
        },
        _normalizeSubject: function(e) {
            return this.vie.entities.isReference(e) ? e : (e.substr(0, 7) !== "http://" && (e = "urn:tag:" + e), e = this.vie.entities.toReference(e), e)
        },
        _tagLabel: function(e) {
            return e = this.vie.entities.fromReference(e), e.substr(0, 8) === "urn:tag:" && (e = e.substr(8, e.length - 1)), e.substring(0, 7) == "http://" && (e = e.substr(e.lastIndexOf("/") + 1, e.length - 1), e = e.replace(/_/g, " ")), e
        },
        addTag: function(e, n, r, i) {
            r === t && (r = this._tagLabel(n)), n = this._normalizeSubject(n);
            var s = e.get(this.options.predicate);
            if (s && s.isCollection && s.get(n)) return;
            i && !e.isReference(i) && (i = e.toReference(i));
            var o = this.vie.entities.addOrUpdate({
                "@subject": n,
                "rdfs:label": r,
                "@type": i
            });
            if (!s) {
                e.set(this.options.predicate, o);
                return
            }
            s.addOrUpdate(o)
        },
        removeTag: function(e, t) {
            var n = e.get(this.options.predicate);
            if (!n) return;
            t = this._normalizeSubject(t);
            var r = n.get(t);
            if (!r) return;
            n.remove(t)
        },
        _listenAnnotate: function(e, t) {
            var n = this;
            t.on("annotateselect", function(t, r) {
                n.addTag(e, r.linkedEntity.uri, r.linkedEntity.label, r.linkedEntity.type[0])
            }), t.on("annotateremove", function(t, r) {
                n.removeTag(e, r.linkedEntity.uri)
            })
        },
        _render: function(t) {
            this.element.empty();
            var n = e(_.template(this.options.templates.tags, {
                    type: "article",
                    label: this.options.localize("Item tags", this.options.language)
                })),
                r = e(_.template(this.options.templates.tags, {
                    type: "suggested",
                    label: this.options.localize("Suggested tags", this.options.language)
                }));
            return e("input", n).attr("id", "articleTags-" + t.cid), e("input", r).attr("id", "suggestedTags-" + t.cid), this.element.append(n), this.element.append(r), this._renderInputs(t, n, r), {
                tags: n,
                suggested: r
            }
        },
        _renderInputs: function(t, n, r) {
            var i = this,
                s = t.getSubject();
            n.tagsInput({
                width: "auto",
                height: "auto",
                onAddTag: function(e) {
                    i.addTag(t, e)
                },
                onRemoveTag: function(e) {
                    i.removeTag(t, e)
                },
                defaultText: this.options.localize("add a tag", this.options.language)
            });
            var o = function() {
                var n = e.trim(e(this).text());
                i.addTag(t, n), r.removeTag(n)
            };
            r.tagsInput({
                width: "auto",
                height: "auto",
                interactive: !1,
                onAddTag: function(t) {
                    e(".tag span", r).off("click", o), e(".tag span", r).on("click", o)
                },
                onRemoveTag: function(t) {
                    e(".tag span", r).off("click", o), e(".tag span", r).on("click", o)
                },
                remove: !1
            })
        },
        _getTagStrings: function(e) {
            var t = [];
            return _.isString(e) ? (t.push(e), t) : e.isCollection ? (e.each(function(e) {
                t.push(e.get("rdfs:label"))
            }), t) : (_.each(e, function(e) {
                t.push(this._tagLabel(e))
            }, this), t)
        },
        loadTags: function(t, n, r) {
            var i = this,
                s = t.get(this.options.predicate);
            if (s) {
                var o = this._getTagStrings(s);
                _.each(o, r.tags.addTag, r.tags)
            }
            this.vie.services.stanbol || e(".suggestedTags", i.element).hide()
        },
        _getLabelLang: function(e) {
            if (!_.isArray(e)) return null;
            var t;
            return _.each(e, function(e) {
                e["@language"] === "en" && (t = e["@value"])
            }), t
        },
        _addEnhancement: function(e, t) {
            if (!t.isEntity) return;
            var n = this._getLabelLang(t.get("rdfs:label"));
            if (!n) return;
            var r = e.get(this.options.predicate);
            if (r && r.isCollection && r.indexOf(t) !== -1) return;
            this.suggestedTags.addTag(n)
        },
        enhance: function(t, n) {
            if (this.enhanced) return;
            this.enhanced = !0;
            var r = this;
            this.vie.analyze({
                element: e("[property]", n)
            }).using(["stanbol"]).execute().success(function(e) {
                _.each(e, function(e) {
                    r._addEnhancement(t, e)
                })
            }).fail(function(e) {})
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardToolbar", {
        options: {
            display: "full",
            templates: {
                minimized: '<div class="create-ui-logo"><a class="create-ui-toggle" id="create-ui-toggle-toolbar"></a></div>',
                full: '<div class="create-ui-toolbar-wrapper"><div class="create-ui-toolbar-toolarea"><%= dynamic %><%= status %></div></div>',
                toolcontainer: '<div class="create-ui-toolbar-<%= name %>toolarea"><ul class="create-ui-<%= name %>tools"><%= content %></ul></div>',
                toolarea: '<li class="create-ui-tool-<%= name %>area"></li>'
            }
        },
        _create: function() {
            this.element.append(this._getMinimized()), this.element.append(this._getFull());
            var t = this;
            e(".create-ui-toggle", this.element).click(function() {
                t.options.display === "full" ? t.setDisplay("minimized") : t.setDisplay("full")
            }), e(this.element).on("midgardcreatestatechange", function(e, n) {
                n.state == "browse" && t._clearWorkflows()
            }), e(this.element).on("midgardworkflowschanged", function(n, r) {
                t._clearWorkflows(), r.workflows.length && r.workflows.each(function(n) {
                    var i = e("body").data().midgardWorkflows.prepareItem(r.instance, n, function(e, n) {
                        t._clearWorkflows();
                        if (e) return
                    });
                    e(".create-ui-tool-workflowarea", t.element).append(i)
                })
            })
        },
        _init: function() {
            this.setDisplay(this.options.display)
        },
        setDisplay: function(e) {
            if (e === this.options.display) return;
            e === "minimized" ? (this.hide(), this.options.display = "minimized") : (this.show(), this.options.display = "full"), this._trigger("statechange", null, this.options)
        },
        hide: function() {
            e("div.create-ui-toolbar-wrapper").fadeToggle("fast", "linear")
        },
        show: function() {
            e("div.create-ui-toolbar-wrapper").fadeToggle("fast", "linear")
        },
        _getMinimized: function() {
            return e(_.template(this.options.templates.minimized, {}))
        },
        _getFull: function() {
            return e(_.template(this.options.templates.full, {
                dynamic: _.template(this.options.templates.toolcontainer, {
                    name: "dynamic",
                    content: _.template(this.options.templates.toolarea, {
                        name: "metadata"
                    }) + _.template(this.options.templates.toolarea, {
                        name: "workflow"
                    }) + _.template(this.options.templates.toolarea, {
                        name: "free"
                    })
                }),
                status: _.template(this.options.templates.toolcontainer, {
                    name: "status",
                    content: ""
                })
            }))
        },
        _clearWorkflows: function() {
            e(".create-ui-tool-workflowarea", this.element).empty()
        }
    })
}(jQuery),
function(e, t) {
    "use strict";
    e.widget("Midgard.midgardWorkflows", {
        options: {
            url: function(e) {},
            templates: {
                button: '<button class="create-ui-btn" id="<%= id %>"><%= label %></button>'
            },
            renderers: {
                button: function(t, n, r, i) {
                    var s = "midgardcreate-workflow_" + n.get("name"),
                        o = e(_.template(this.options.templates.button, {
                            id: s,
                            label: n.get("label")
                        })).button();
                    return o.on("click", function(e) {
                        r(t, n, i)
                    }), o
                }
            },
            action_types: {
                backbone_save: function(e, t, n) {
                    var r = e.url,
                        i = e.clone();
                    i.url = r;
                    var s = t.get("action");
                    s.url && (e.url = s.url), i.save(null, {
                        success: function(t) {
                            e.url = r, e.change(), n(null, e)
                        },
                        error: function(t, i) {
                            e.url = r, e.change(), n(i, e)
                        }
                    })
                },
                backbone_destroy: function(e, t, n) {
                    var r = e.url,
                        i = e.clone();
                    i.url = r;
                    var s = t.get("action");
                    s.url && (e.url = s.url), e.destroy({
                        success: function(t) {
                            e.url = r, e.change(), n(null, t)
                        },
                        error: function(t, i) {
                            e.url = r, e.change(), n(i, e)
                        }
                    })
                },
                http: function(t, n, r) {
                    var i = n.get("action");
                    if (!i.url) return r("No action url defined!");
                    var s = {};
                    i.http && (s = i.http);
                    var o = e.extend({
                        url: i.url,
                        type: "POST",
                        data: t.toJSON(),
                        success: function() {
                            t.fetch({
                                success: function(e) {
                                    r(null, e)
                                },
                                error: function(e, t) {
                                    r(t, e)
                                }
                            })
                        }
                    }, s);
                    e.ajax(o)
                }
            }
        },
        _init: function() {
            this._renderers = {}, this._action_types = {}, this._parseRenderersAndTypes(), this._last_instance = null, this.ModelWorkflowModel = Backbone.Model.extend({
                defaults: {
                    name: "",
                    label: "",
                    type: "button",
                    action: {
                        type: "backbone_save"
                    }
                }
            }), this.workflows = {};
            var t = this;
            e(this.element).on("midgardeditableactivated", function(e, n) {
                t._fetchWorkflows(n.instance)
            })
        },
        _fetchWorkflows: function(e) {
            var t = this;
            if (e.isNew()) {
                t._trigger("changed", null, {
                    instance: e,
                    workflows: []
                });
                return
            }
            if (t._last_instance == e) {
                t.workflows[e.cid] && t._trigger("changed", null, {
                    instance: e,
                    workflows: t.workflows[e.cid]
                });
                return
            }
            t._last_instance = e;
            if (t.workflows[e.cid]) {
                t._trigger("changed", null, {
                    instance: e,
                    workflows: t.workflows[e.cid]
                });
                return
            }
            if (t.options.url) t._fetchModelWorkflows(e);
            else {
                var n = new(t._generateCollectionFor(e))([], {});
                t._trigger("changed", null, {
                    instance: e,
                    workflows: n
                })
            }
        },
        _parseRenderersAndTypes: function() {
            var t = this;
            e.each(this.options.renderers, function(e, n) {
                t.setRenderer(e, n)
            }), e.each(this.options.action_types, function(e, n) {
                t.setActionType(e, n)
            })
        },
        setRenderer: function(e, t) {
            this._renderers[e] = t
        },
        getRenderer: function(e) {
            return this._renderers[e] ? this._renderers[e] : !1
        },
        setActionType: function(e, t) {
            this._action_types[e] = t
        },
        getActionType: function(e) {
            return this._action_types[e]
        },
        prepareItem: function(e, t, n) {
            var r = this,
                i = this.getRenderer(t.get("type")),
                s = this.getActionType(t.get("action").type);
            return i.call(this, e, t, s, function(i, s) {
                delete r.workflows[e.cid], r._last_instance = null, t.get("action").type !== "backbone_destroy" && r._fetchModelWorkflows(e), n(i, s)
            })
        },
        _generateCollectionFor: function(e) {
            var t = {
                model: this.ModelWorkflowModel
            };
            return this.options.url && (t.url = this.options.url(e)), Backbone.Collection.extend(t)
        },
        _fetchModelWorkflows: function(e) {
            if (e.isNew()) return;
            var t = this;
            t.workflows[e.cid] = new(this._generateCollectionFor(e))([], {}), t.workflows[e.cid].fetch({
                success: function(n) {
                    t.workflows[e.cid].reset(n.models), t._trigger("changed", null, {
                        instance: e,
                        workflows: t.workflows[e.cid]
                    })
                },
                error: function(e, t) {}
            })
        }
    })
}(jQuery), window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.bg = {
    Save: "Запази",
    Saving: "Запазване",
    Cancel: "Откажи",
    Edit: "Редактирай",
    localModification: 'Елементът "<%= label %>" има локални модификации',
    localModifications: "<%= number %> елемента на тази страница имат локални модификации",
    Restore: "Възстанови",
    Ignore: "Игнорирай",
    saveSuccess: 'Елементът "<%= label %>" беше успешно запазен',
    saveSuccessMultiple: "<%= number %> елемента бяха успешно запазени",
    saveError: "Възника грешка при запазване<br /><%= error %>",
    "Item tags": "Етикети на елемента",
    "Suggested tags": "Препоръчани етикети",
    Tags: "Етикети",
    "add a tag": "добави етикет",
    Add: "Добави",
    "Choose type to add": "Избери тип за добавяне"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.cs = {
    Save: "Uložit",
    Saving: "Probíhá ukládání",
    Cancel: "Zrušit",
    Edit: "Upravit",
    localModification: 'Blok "<%= label %>" obsahuje lokální změny',
    localModifications: "<%= number %> bloků na této stránce má lokální změny",
    Restore: "Aplikovat lokální změny",
    Ignore: "Zahodit lokální změny",
    saveSuccess: 'Blok "<%= label %>" byl úspěšně uložen',
    saveSuccessMultiple: "<%= number %> bloků bylo úspěšně uloženo",
    saveError: "Při ukládání došlo k chybě<br /><%= error %>",
    "Item tags": "Štítky bloku",
    "Suggested tags": "Navrhované štítky",
    Tags: "Štítky",
    "add a tag": "Přidat štítek",
    Add: "Přidat",
    "Choose type to add": "Vyberte typ k přidání"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.da = {
    Save: "Gem",
    Saving: "Gemmer",
    Cancel: "Annullér",
    Edit: "Rediger",
    localModification: 'Element "<%= label %>" har lokale ændringer',
    localModifications: "<%= number %> elementer på denne side har lokale ændringer",
    Restore: "Gendan",
    Ignore: "Ignorer",
    saveSuccess: 'Element "<%= label %>" er gemt',
    saveSuccessMultiple: "<%= number %> elementer er gemt",
    saveError: "Der opstod en fejl under lagring<br /><%= error %>",
    "Item tags": "Element tags",
    "Suggested tags": "Foreslåede tags",
    Tags: "Tags",
    "add a tag": "tilføj et tag",
    Add: "Tilføj",
    "Choose type to add": "Vælg type der skal tilføjes"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.de = {
    Save: "Speichern",
    Saving: "Speichert",
    Cancel: "Abbrechen",
    Edit: "Bearbeiten",
    localModification: 'Das Dokument "<%= label %>" auf dieser Seite hat lokale Änderungen',
    localModifications: "<%= number %> Dokumente auf dieser Seite haben lokale Änderungen",
    Restore: "Wiederherstellen",
    Ignore: "Ignorieren",
    saveSuccess: 'Dokument "<%= label %>" erfolgreich gespeichert',
    saveSuccessMultiple: "<%= number %> Dokumente erfolgreich gespeichert",
    saveError: "Fehler beim Speichern<br /><%= error %>",
    "Item tags": "Schlagwörter des Dokuments",
    "Suggested tags": "Schlagwortvorschläge",
    Tags: "Schlagwörter",
    "add a tag": "Neues Schlagwort",
    Add: "Hinzufügen",
    "Choose type to add": "Typ zum Hinzufügen wählen"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.en = {
    Save: "Save",
    Saving: "Saving",
    Cancel: "Cancel",
    Edit: "Edit",
    localModification: 'Item "<%= label %>" has local modifications',
    localModifications: "<%= number %> items on this page have local modifications",
    Restore: "Restore",
    Ignore: "Ignore",
    saveSuccess: 'Item "<%= label %>" saved successfully',
    saveSuccessMultiple: "<%= number %> items saved successfully",
    saveError: "Error occurred while saving<br /><%= error %>",
    "Item tags": "Item tags",
    "Suggested tags": "Suggested tags",
    Tags: "Tags",
    "add a tag": "add a tag",
    Add: "Add",
    "Choose type to add": "Choose type to add"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.es = {
    Save: "Guardar",
    Saving: "Guardando",
    Cancel: "Cancelar",
    Edit: "Editar",
    localModification: 'El elemento "<%= label %>" tiene modificaciones locales',
    localModifications: "<%= number %> elementos en la página tienen modificaciones locales",
    Restore: "Restaurar",
    Ignore: "Ignorar",
    saveSuccess: 'El elemento "<%= label %>" se guardó exitosamente',
    saveSuccessMultiple: "<%= number %> elementos se guardaron exitosamente",
    saveError: "Ha ocurrido un error cuando se guardaban los datos<br /><%= error %>",
    "Item tags": "Etiquetas de los elementos",
    "Suggested tags": "Etiquetas sugeridas",
    Tags: "Etiquetas",
    "add a tag": "añadir una etiqueta",
    Add: "Añadir",
    "Choose type to add": "Escoge el tipo a añadir"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.fi = {
    Save: "Tallenna",
    Saving: "Tallennetaan",
    Cancel: "Peruuta",
    Edit: "Muokkaa",
    localModification: 'Dokumentilla "<%= label %>" on paikallisia muutoksia',
    localModifications: "<%= number %> dokumenttia sivulla omaa paikallisia muutoksia",
    Restore: "Palauta",
    Ignore: "Poista",
    saveSuccess: 'Dokumentti "<%= label %>" tallennettu',
    saveSuccessMultiple: "<%= number %> dokumenttia tallennettu",
    saveError: "Virhe tallennettaessa<br /><%= error %>",
    "Item tags": "Avainsanat",
    "Suggested tags": "Ehdotukset",
    Tags: "Avainsanat",
    "add a tag": "lisää avainsana",
    Add: "Lisää",
    "Choose type to add": "Mitä haluat lisätä?"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.fr = {
    Save: "Sauver",
    Saving: "En cours",
    Cancel: "Annuler",
    Edit: "Editer",
    localModification: 'Objet "<%= label %>" sur cette page ont des modifications locales',
    localModifications: "<%= number %> élements sur cette page ont des modifications locales",
    Restore: "Récupérer",
    Ignore: "Ignorer",
    saveSuccess: '"<%= label %>" est sauvegardé avec succès',
    saveSuccessMultiple: "<%= number %> éléments ont été sauvegardé avec succès",
    saveError: "Une erreur est survenue durant la sauvegarde:<br /><%= error %>",
    "Item tags": "Tags des objets",
    "Suggested tags": "Tags suggérés",
    Tags: "Tags",
    "add a tag": "ajouter un tag",
    Add: "Ajouter",
    "Choose type to add": "Choisir le type à ajouter"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.he = {
    Save: "שמור",
    Saving: "שומר",
    Cancel: "בטל",
    Edit: "ערוך",
    localModification: 'לפריט "<%= label %>" שינויים מקומיים',
    localModifications: "ל<%= number %> פריטים בדף זה שינויים מקומיים",
    Restore: "שחזר",
    Ignore: "התעלם",
    saveSuccess: 'פריט "<%= label %>" נשמר בהצלחה',
    saveSuccessMultiple: "<%= number %> פריטים נשמרו בהצלחה",
    saveError: "שגיאה בשמירה<br /><%= error %>",
    "Item tags": "סיווגי פריט",
    "Suggested tags": "סיווגים מומלצים",
    Tags: "סיווגים",
    "add a tag": "הוסף סיווג",
    Add: "הוסף",
    "Choose type to add": "בחר סוג להוספה"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.it = {
    Save: "Salva",
    Saving: "Salvataggio",
    Cancel: "Cancella",
    Edit: "Modifica",
    localModification: 'Articolo "<%= label %>" in questa pagina hanno modifiche locali',
    localModifications: "<%= number %> articoli in questa pagina hanno modifiche locali",
    Restore: "Ripristina",
    Ignore: "Ignora",
    saveSuccess: 'Articolo "<%= label %>" salvato con successo',
    saveSuccessMultiple: "<%= number %> articoli salvati con successo",
    saveError: "Errore durante il salvataggio<br /><%= error %>",
    "Item tags": "Tags articolo",
    "Suggested tags": "Tags suggerite",
    Tags: "Tags",
    "add a tag": "Aggiungi una parola chiave",
    Add: "Aggiungi",
    "Choose type to add": "Scegli il tipo da aggiungere"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.nl = {
    Save: "Opslaan",
    Saving: "Bezig met opslaan",
    Cancel: "Annuleren",
    Edit: "Bewerken",
    localModification: 'Items "<%= label %>" op de pagina heeft lokale wijzigingen',
    localModifications: "<%= number %> items op de pagina hebben lokale wijzigingen",
    Restore: "Herstellen",
    Ignore: "Negeren",
    saveSuccess: 'Item "<%= label %>" succesvol opgeslagen',
    saveSuccessMultiple: "<%= number %> items succesvol opgeslagen",
    saveError: "Fout opgetreden bij het opslaan<br /><%= error %>",
    "Item tags": "Item tags",
    "Suggested tags": "Tag suggesties",
    Tags: "Tags",
    "add a tag": "tag toevoegen",
    Add: "Toevoegen",
    "Choose type to add": "Kies type om toe te voegen"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.no = {
    Save: "Lagre",
    Saving: "Lagrer",
    Cancel: "Avbryt",
    Edit: "Rediger",
    localModification: 'Element "<%= label %>" på denne siden er modifisert lokalt',
    localModifications: "<%= number %> elementer på denne siden er modifisert lokalt",
    Restore: "Gjenopprett",
    Ignore: "Ignorer",
    saveSuccess: 'Element "<%= label %>" ble lagret',
    saveSuccessMultiple: "<%= number %> elementer ble lagret",
    saveError: "En feil oppstod under lagring<br /><%= error %>",
    "Item tags": "Element-tagger",
    "Suggested tags": "Anbefalte tagger",
    Tags: "Tagger",
    "add a tag": "legg til tagg",
    Add: "Legg til",
    "Choose type to add": "Velg type å legge til"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.pl = {
    Save: "Zapisz",
    Saving: "Zapisuję",
    Cancel: "Anuluj",
    Edit: "Edytuj",
    localModification: 'Artykuł "<%= label %>" posiada lokalne modyfikacje',
    localModifications: "<%= number %> artykułów na tej stronie posiada lokalne modyfikacje",
    Restore: "Przywróć",
    Ignore: "Ignoruj",
    saveSuccess: 'Artykuł "<%= label %>" został poprawnie zapisany',
    saveSuccessMultiple: "<%= number %> artykułów zostało poprawnie zapisanych",
    saveError: "Wystąpił błąd podczas zapisywania<br /><%= error %>",
    "Item tags": "Tagi artykułów",
    "Suggested tags": "Sugerowane tagi",
    Tags: "Tagi",
    "add a tag": "dodaj tag",
    Add: "Dodaj",
    "Choose type to add": "Wybierz typ do dodania"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.pt_BR = {
    Save: "Salvar",
    Saving: "Salvando",
    Cancel: "Cancelar",
    Edit: "Editar",
    localModification: 'Item "<%= label %>" nesta página possuem modificações locais',
    localModifications: "<%= number %> itens nesta página possuem modificações locais",
    Restore: "Restaurar",
    Ignore: "Ignorar",
    saveSuccess: 'Item "<%= label %>" salvo com sucesso',
    saveSuccessMultiple: "<%= number %> itens salvos com sucesso",
    saveError: "Erro ocorrido ao salvar<br /><%= error %>",
    "Item tags": "Tags de item",
    "Suggested tags": "Tags sugeridas",
    Tags: "Tags",
    "add a tag": "adicionar uma tag",
    Add: "Adicionar",
    "Choose type to add": "Selecione o tipo para adicionar"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.ro = {
    Save: "Salvează",
    Saving: "Se salvează",
    Cancel: "Anulează",
    Edit: "Editare",
    localModification: 'Zona "<%= label %>" a fost modificată',
    localModifications: "<%= number %> zone din această pagină au fost modificate",
    Restore: "Revenire",
    Ignore: "Ignoră",
    saveSuccess: 'Zona "<%= label %>" a fost salvată',
    saveSuccessMultiple: "<%= number %> zone au fost salvate",
    saveError: "S-a produs o eroare în timpul salvării<br /><%= error %>",
    "Item tags": "Etichetele zonei",
    "Suggested tags": "Etichete sugerate",
    Tags: "Etichete",
    "add a tag": "adaugă o etichetă",
    Add: "Adăugare",
    "Choose type to add": "Alegeți un tip pentru adăugare"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.ru = {
    Save: "Сохранить",
    Saving: "Сохраняю",
    Cancel: "Отмена",
    Edit: "Редактировать",
    localModification: 'В запись "<%= label %>" внесены несохранённые изменения',
    localModifications: "В записи на этой странице (<%= number %> шт.) внесены несохранённые изменения",
    Restore: "Восстановить",
    Ignore: "Игнорировать",
    saveSuccess: 'Запись "<%= label %>" была успешно сохранена',
    saveSuccessMultiple: " Записи (<%= number %> шт.) были успешно сохранены",
    saveError: "Во время сохранения произошла ошибка<br /><%= error %>",
    "Item tags": "Теги записей",
    "Suggested tags": "Предлагаемые теги",
    Tags: "Теги",
    "add a tag": "добавить тег",
    Add: "Добавить",
    "Choose type to add": "Выбрать тип для добавления"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.locale === undefined && (window.midgardCreate.locale = {}), window.midgardCreate.locale.sv = {
    Save: "Spara",
    Saving: "Sparar",
    Cancel: "Avbryt",
    Edit: "Redigera",
    localModification: 'Elementet "<%= label %>" har lokala förändringar',
    localModifications: "<%= number %> element på den här sidan har lokala förändringar",
    Restore: "Återställ",
    Ignore: "Ignorera",
    saveSuccess: 'Elementet "<%= label %>" sparades',
    saveSuccessMultiple: "<%= number %> element sparades",
    saveError: "Ett fel uppstod under sparande<br /><%= error %>",
    "Item tags": "Element-taggar",
    "Suggested tags": "Föreslagna taggar",
    Tags: "Taggar",
    "add a tag": "lägg till en tagg",
    Add: "Lägg till",
    "Choose type to add": "Välj typ att lägga till"
}, window.midgardCreate === undefined && (window.midgardCreate = {}), window.midgardCreate.localize = function(e, t) {
    return window.midgardCreate.locale ? window.midgardCreate.locale[t] && window.midgardCreate.locale[t][e] ? window.midgardCreate.locale[t][e] : window.midgardCreate.locale.en[e] ? window.midgardCreate.locale.en[e]:e:e};