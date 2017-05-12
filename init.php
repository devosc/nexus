<?php
/**
 *
 */
include __DIR__ . '/src/Arg.php';
include __DIR__ . '/src/Signal.php';
include __DIR__ . '/src/Resolvable.php';
include __DIR__ . '/src/Config/ArrayAccess.php';
include __DIR__ . '/src/Config/Iterator.php';
include __DIR__ . '/src/Config/PropertyAccess.php';
include __DIR__ . '/src/Config/Config.php';
include __DIR__ . '/src/Config/Model.php';
include __DIR__ . '/src/Config/Configuration.php';
include __DIR__ . '/src/Config/Immutable.php';
include __DIR__ . '/src/Config/Overload.php';
include __DIR__ . '/src/Config/ReadOnly.php';
include __DIR__ . '/src/Config/Scope.php';
include __DIR__ . '/src/Exception/Exception.php';
include __DIR__ . '/src/Exception/Generator.php';
include __DIR__ . '/src/Exception/Throwable.php';
include __DIR__ . '/src/Exception/Domain.php';
include __DIR__ . '/src/Exception/ErrorException.php';
include __DIR__ . '/src/Exception/InvalidArgument.php';
include __DIR__ . '/src/Exception/Runtime.php';
include __DIR__ . '/src/Exception.php';
include __DIR__ . '/src/Service/Alias.php';
include __DIR__ . '/src/Service/Container.php';
include __DIR__ . '/src/Service/Context.php';
include __DIR__ . '/src/Service/Builder.php';
include __DIR__ . '/src/Service/Facade.php';
include __DIR__ . '/src/Service/Service.php';
include __DIR__ . '/src/Service/Manager.php';
include __DIR__ . '/src/Service/Plugin.php';
include __DIR__ . '/src/Event/Event.php';
include __DIR__ . '/src/Event/Generator.php';
include __DIR__ . '/src/Event/Model.php';
include __DIR__ . '/src/Event/EventModel.php';
include __DIR__ . '/src/Config.php';
include __DIR__ . '/src/Container.php';
include __DIR__ . '/src/Event.php';
include __DIR__ . '/src/Model.php';
include __DIR__ . '/src/Overload.php';
include __DIR__ . '/src/Plugins/Config.php';
include __DIR__ . '/src/Plugins/Log.php';
include __DIR__ . '/src/Plugins/Messages.php';
include __DIR__ . '/src/Plugins/Render.php';
include __DIR__ . '/src/Plugins/Response.php';
include __DIR__ . '/src/Plugins/Session.php';
include __DIR__ . '/src/Plugins/Service.php';
include __DIR__ . '/src/Plugins/Url.php';
include __DIR__ . '/src/Plugins/User.php';
include __DIR__ . '/src/Plugins/View.php';
include __DIR__ . '/src/Cookie/Cookies.php';
include __DIR__ . '/src/Cookie/Config/Cookies.php';
include __DIR__ . '/src/Cookie/Config.php';
include __DIR__ . '/src/Http/Cookies.php';
include __DIR__ . '/src/Http/Error.php';
include __DIR__ . '/src/Http/Headers.php';
include __DIR__ . '/src/Http/Uri.php';
include __DIR__ . '/src/Http/Request.php';
include __DIR__ . '/src/Http/Response.php';
include __DIR__ . '/src/Http/Config/Cookies.php';
include __DIR__ . '/src/Http/Config/Error.php';
include __DIR__ . '/src/Http/Config/Headers.php';
include __DIR__ . '/src/Http/Config/Uri.php';
include __DIR__ . '/src/Http/Config/Request.php';
include __DIR__ . '/src/Http/Config/Response.php';
include __DIR__ . '/src/Http/Cookies/Config.php';
include __DIR__ . '/src/Http/Error/Error.php';
include __DIR__ . '/src/Http/Error/BadRequest.php';
include __DIR__ . '/src/Http/Error/MethodNotAllowed.php';
include __DIR__ . '/src/Http/Error/NotFound.php';
include __DIR__ . '/src/Http/Error/ServerError.php';
include __DIR__ . '/src/Http/Headers/Config.php';
include __DIR__ . '/src/Http/Request/Config.php';
include __DIR__ . '/src/Http/Response/Config.php';
include __DIR__ . '/src/Http/Status/ReasonPhrase.php';
include __DIR__ . '/src/Http/Uri/Config.php';
include __DIR__ . '/src/Response/Config/Response.php';
include __DIR__ . '/src/Response/Emitter.php';
include __DIR__ . '/src/Response/Emitter/Callback.php';
include __DIR__ . '/src/Response/Emitter/PassThru.php';
include __DIR__ . '/src/Response/Emitter/ReadFile.php';
include __DIR__ . '/src/Response/Send/Send.php';
include __DIR__ . '/src/Response/Status/Status.php';
include __DIR__ . '/src/Response/Version/Version.php';
include __DIR__ . '/src/Response/Response.php';
include __DIR__ . '/src/Response/Config.php';
include __DIR__ . '/src/Response/Dispatch.php';
include __DIR__ . '/src/Response/Json.php';
include __DIR__ . '/src/Response/Redirect.php';
include __DIR__ . '/src/Response/Send.php';
include __DIR__ . '/src/Response/Status.php';
include __DIR__ . '/src/Response/Version.php';
include __DIR__ . '/src/Log/ErrorLog.php';
include __DIR__ . '/src/Log/ThrowException.php';
include __DIR__ . '/src/Log/Logger.php';
include __DIR__ . '/src/Template/Config/TemplateLayout.php';
include __DIR__ . '/src/Template/Config/TemplateModel.php';
include __DIR__ . '/src/Template/Layout/Layout.php';
include __DIR__ . '/src/Template/Layout/Assign.php';
include __DIR__ . '/src/Template/TemplateModel.php';
include __DIR__ . '/src/Template/TemplateLayout.php';
include __DIR__ . '/src/Template/Model.php';
include __DIR__ . '/src/Template/Layout.php';
include __DIR__ . '/src/View/View.php';
include __DIR__ . '/src/View/ViewEngine.php';
include __DIR__ . '/src/View/ViewModel.php';
include __DIR__ . '/src/View/ViewLayout.php';
include __DIR__ . '/src/View/Config/ViewModel.php';
include __DIR__ . '/src/View/Config/ViewLayout.php';
include __DIR__ . '/src/View/Engine/PhpEngine.php';
include __DIR__ . '/src/View/Template/Path.php';
include __DIR__ . '/src/View/Template/Find.php';
include __DIR__ . '/src/View/Template/Model.php';
include __DIR__ . '/src/View/Template/Traverse.php';
include __DIR__ . '/src/View/Template/Render.php';
include __DIR__ . '/src/View/Model.php';
include __DIR__ . '/src/View/Render.php';
include __DIR__ . '/src/View/Renderer.php';
include __DIR__ . '/src/ViewModel.php';
include __DIR__ . '/src/ViewLayout.php';
include __DIR__ . '/src/Request/Config/Request.php';
include __DIR__ . '/src/Request/Error/Config/ErrorModel.php';
include __DIR__ . '/src/Request/Error/Controller.php';
include __DIR__ . '/src/Request/Error/Error.php';
include __DIR__ . '/src/Request/Error/ErrorModel.php';
include __DIR__ . '/src/Request/Error/ViewModel.php';
include __DIR__ . '/src/Request/Exception/Controller.php';
include __DIR__ . '/src/Request/Exception/Exception.php';
include __DIR__ . '/src/Request/Service/Container.php';
include __DIR__ . '/src/Request/Service/Share.php';
include __DIR__ . '/src/Request/Request.php';
include __DIR__ . '/src/Request/Config.php';
include __DIR__ . '/src/Request/Error.php';
include __DIR__ . '/src/Request/Exception.php';
include __DIR__ . '/src/Route/Config/Route.php';
include __DIR__ . '/src/Route/Definition/Dash.php';
include __DIR__ . '/src/Route/Definition/Regex.php';
include __DIR__ . '/src/Route/Definition/Tokens.php';
include __DIR__ . '/src/Route/Definition/Build.php';
include __DIR__ . '/src/Route/Definition/Compiler.php';
include __DIR__ . '/src/Route/Route.php';
include __DIR__ . '/src/Route/Generator.php';
include __DIR__ . '/src/Route/Match/Plugin/Optional.php';
include __DIR__ . '/src/Route/Match/Plugin/Params.php';
include __DIR__ . '/src/Route/Match/Action.php';
include __DIR__ . '/src/Route/Match/Controller.php';
include __DIR__ . '/src/Route/Match/Host.php';
include __DIR__ . '/src/Route/Match/Merge.php';
include __DIR__ . '/src/Route/Match/Method.php';
include __DIR__ . '/src/Route/Match/Middleware.php';
include __DIR__ . '/src/Route/Match/Path.php';
include __DIR__ . '/src/Route/Match/Scheme.php';
include __DIR__ . '/src/Route/Match/Wildcard.php';
include __DIR__ . '/src/Route/Dispatch/Router.php';
include __DIR__ . '/src/Route/Config.php';
include __DIR__ . '/src/Route/Dispatch.php';
include __DIR__ . '/src/Route/Match.php';
include __DIR__ . '/src/Controller/Action.php';
include __DIR__ . '/src/Url/Route/Generator.php';
include __DIR__ . '/src/Url/Assemble.php';
include __DIR__ . '/src/Url/Plugin.php';
include __DIR__ . '/src/Url/Generator.php';
include __DIR__ . '/src/Resolver/Build.php';
include __DIR__ . '/src/Resolver/Container.php';
include __DIR__ . '/src/Resolver/Dispatch.php';
include __DIR__ . '/src/Resolver/Generator.php';
include __DIR__ . '/src/Resolver/Service.php';
include __DIR__ . '/src/Resolver/Resolver.php';
include __DIR__ . '/src/Resolver/Unresolvable.php';
include __DIR__ . '/src/Session/Config/Container.php';
include __DIR__ . '/src/Session/Config/Messages.php';
include __DIR__ . '/src/Session/Config/Session.php';
include __DIR__ . '/src/Session/Session.php';
include __DIR__ . '/src/Session/Config.php';
include __DIR__ . '/src/Session/SessionContainer.php';
include __DIR__ . '/src/Session/Container.php';
include __DIR__ . '/src/Session/Model.php';
include __DIR__ . '/src/Session/SessionMessages.php';
include __DIR__ . '/src/Session/Messages.php';
include __DIR__ . '/src/Plugin/Config/Args.php';
include __DIR__ . '/src/Plugin/Config/Plugin.php';
include __DIR__ . '/src/Plugin/Config/Child.php';
include __DIR__ . '/src/Plugin/Config/Config.php';
include __DIR__ . '/src/Plugin/Config/Hydrator.php';
include __DIR__ . '/src/Plugin/Config/Name.php';
include __DIR__ . '/src/Plugin/Gem/Gem.php';
include __DIR__ . '/src/Plugin/Gem/Plugin.php';
include __DIR__ . '/src/Plugin/Gem/Args.php';
include __DIR__ . '/src/Plugin/Gem/Call.php';
include __DIR__ . '/src/Plugin/Gem/Calls.php';
include __DIR__ . '/src/Plugin/Gem/Child.php';
include __DIR__ . '/src/Plugin/Gem/Config.php';
include __DIR__ . '/src/Plugin/Gem/Copy.php';
include __DIR__ . '/src/Plugin/Gem/Factory.php';
include __DIR__ . '/src/Plugin/Gem/FileInclude.php';
include __DIR__ . '/src/Plugin/Gem/Filter.php';
include __DIR__ . '/src/Plugin/Gem/Invokable.php';
include __DIR__ . '/src/Plugin/Gem/Invoke.php';
include __DIR__ . '/src/Plugin/Gem/Link.php';
include __DIR__ . '/src/Plugin/Gem/Param.php';
include __DIR__ . '/src/Plugin/Gem/Plug.php';
include __DIR__ . '/src/Plugin/Gem/Provide.php';
include __DIR__ . '/src/Plugin/Gem/Scoped.php';
include __DIR__ . '/src/Plugin/Gem/Shared.php';
include __DIR__ . '/src/Plugin/Gem/SignalArgs.php';
include __DIR__ . '/src/Plugin/Gem/Value.php';
include __DIR__ . '/src/Plugin/Plugin.php';
include __DIR__ . '/src/Plugin/App.php';
include __DIR__ . '/src/Plugin/Args.php';
include __DIR__ . '/src/Plugin/Call.php';
include __DIR__ . '/src/Plugin/Calls.php';
include __DIR__ . '/src/Plugin/Child.php';
include __DIR__ . '/src/Plugin/Config.php';
include __DIR__ . '/src/Plugin/Controller.php';
include __DIR__ . '/src/Plugin/Copy.php';
include __DIR__ . '/src/Plugin/End.php';
include __DIR__ . '/src/Plugin/Factory.php';
include __DIR__ . '/src/Plugin/FileInclude.php';
include __DIR__ . '/src/Plugin/Filter.php';
include __DIR__ . '/src/Plugin/Form.php';
include __DIR__ . '/src/Plugin/Hydrator.php';
include __DIR__ . '/src/Plugin/Invokable.php';
include __DIR__ . '/src/Plugin/Invoke.php';
include __DIR__ . '/src/Plugin/Link.php';
include __DIR__ . '/src/Plugin/Param.php';
include __DIR__ . '/src/Plugin/Plug.php';
include __DIR__ . '/src/Plugin/Plugins.php';
include __DIR__ . '/src/Plugin/Provide.php';
include __DIR__ . '/src/Plugin/Register.php';
include __DIR__ . '/src/Plugin/Response.php';
include __DIR__ . '/src/Plugin/Scope.php';
include __DIR__ . '/src/Plugin/Scoped.php';
include __DIR__ . '/src/Plugin/Callback.php';
include __DIR__ . '/src/Plugin/ScopedCall.php';
include __DIR__ . '/src/Plugin/Service.php';
include __DIR__ . '/src/Plugin/Session.php';
include __DIR__ . '/src/Plugin/Shared.php';
include __DIR__ . '/src/Plugin/SignalArgs.php';
include __DIR__ . '/src/Plugin/Value.php';
include __DIR__ . '/src/Plugin/ViewModel.php';
include __DIR__ . '/src/Plugin/GlobalVar.php';
include __DIR__ . '/src/Plugin/NullValue.php';
include __DIR__ . '/src/Web/Controller.php';
include __DIR__ . '/src/Web/Context.php';
include __DIR__ . '/src/Web/Error.php';
include __DIR__ . '/src/Web/Layout.php';
include __DIR__ . '/src/Web/Render.php';
include __DIR__ . '/src/Web/Route.php';
include __DIR__ . '/src/Web/Send.php';
include __DIR__ . '/src/Web/Service.php';
include __DIR__ . '/src/Web/Status.php';
include __DIR__ . '/src/Web/Version.php';
include __DIR__ . '/src/App.php';
include __DIR__ . '/src/Web.php';
include __DIR__ . '/src/Middleware.php';
